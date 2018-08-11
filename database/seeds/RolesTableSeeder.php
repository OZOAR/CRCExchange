<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    private $roles = [
        'admin' => 'SuperAdmin', 'partner' => 'Partner'
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->delete();

        foreach ($this->roles as $slug => $title) {
            App\Models\Role::create(['slug' => $slug, 'title' => $title]);
        }
    }
}
