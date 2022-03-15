<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $newUser = new User();
        $newUser->name = 'admin';
        $newUser->email = 'admin@admin';
        $pwd = '12345678';
        $newUser->password = Hash::make($pwd);
        $newUser->role_id = 1;
        $newUser->save();
    }
}
