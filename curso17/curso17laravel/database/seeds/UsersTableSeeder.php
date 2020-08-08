<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'diego',
            'email' => 'diego@yopmail.com',
            'password' => Hash::make('diego'),
        ]);
        $user->assignRole('Administrador');
        $user = User::create([
            'name' => 'ivan',
            'email' => 'ivan@yopmail.com',
            'password' => Hash::make('ivan'),
        ]);
        $user->assignRole('Usuario');
        $user = User::create([
            'name' => 'paola',
            'email' => 'paola@yopmail.com',
            'password' => Hash::make('paola'),
        ]);
        $user->assignRole('Usuario');
        $user = User::create([
            'name' => 'maxi',
            'email' => 'maxi@yopmail.com',
            'password' => Hash::make('maxi'),
        ]);
        $user->assignRole('Usuario');
    }
}
