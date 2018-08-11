<?php

use Illuminate\Database\Seeder;

class SetUpSuperAdminSeeder extends Seeder
{
    const ADMIN_ROLE_ID = 1;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'role_id' => self::ADMIN_ROLE_ID,
            'name' => env('GLOBAL_ADMIN_USERNAME'),
            'email' => env('GLOBAL_ADMIN_EMAIL'),
            'password' => bcrypt(env('GLOBAL_ADMIN_PASSWORD')),
        ]);
    }
}
