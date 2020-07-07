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
        User::create([
            'name' => 'diego',
            'email' => 'diego@yopmail.com',
            'password' => Hash::make('diego'),
        ]);
        User::create([
            'name' => 'ivan',
            'email' => 'ivan@yopmail.com',
            'password' => Hash::make('ivan'),
        ]);
        User::create([
            'name' => 'paola',
            'email' => 'paola@yopmail.com',
            'password' => Hash::make('paola'),
        ]);
        User::create([
            'name' => 'maxi',
            'email' => 'maxi@yopmail.com',
            'password' => Hash::make('maxi'),
        ]);
    }
}
