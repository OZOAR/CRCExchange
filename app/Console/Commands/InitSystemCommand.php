<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class InitSystemCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'system:init';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Initial set-up of the system';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('System initialization has been started!');
        $this->info('Starting migration...');

        $exitMigrateCommandCode = Artisan::call('migrate:refresh');

        if ($exitMigrateCommandCode !== 0) {
            $this->error('Error during \'migrate\' command. Error code: ' . $exitMigrateCommandCode);
            return;
        }

        $this->info('Migration successfully passed.');
        $this->info('Starting seeding...');

        $exitSeedCommandCode = Artisan::call('db:seed');

        if ($exitSeedCommandCode !== 0) {
            $this->error('Error during \'db:seed\' command. Error code: ' . $exitSeedCommandCode);
            return;
        }

        $this->info('Seeding successfully passed.');
        $this->info('Starting set-up of SuperAdmin user...');

        $exitSetUpSuperAdminSeedCommandCode = Artisan::call('db:seed', [
            '--class' => 'SetUpSuperAdminSeeder',
        ]);

        if ($exitSetUpSuperAdminSeedCommandCode !== 0) {
            $this->error('Error during set-up SuperAdmin user. Error code: ' . $exitSetUpSuperAdminSeedCommandCode);
            return;
        }

        $this->info('Set-up of SuperAdmin user successfully passed.');
    }
}
