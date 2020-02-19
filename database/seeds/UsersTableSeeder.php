<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $user = User::create([
            'first_name' => 'admin',
            'last_name' => 'supervisor',
            'email' => 'admin@admin.com',
            'password' => bcrypt('123123')
        ]);
        $user->attachRole('super_admin');
    }
}
