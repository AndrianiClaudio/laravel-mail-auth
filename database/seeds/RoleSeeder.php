<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $newRole = new Role();
        $newRole->name = 'admin';
        $newRole->save();
        $newRole = new Role();
        $newRole->name = 'guest';
        $newRole->save();
    }
}
