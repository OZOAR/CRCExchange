<?php

use Illuminate\Database\Seeder;

class TestPartnersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\User::class, 50)
            ->create()
            ->each(function($user) {
                factory(\App\Models\Transaction::class, 2)->create([
                    'user_id' => $user->getId()
                ]);
            });
    }
}
