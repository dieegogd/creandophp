<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'usuario',
            'email' => 'usuario@yopmail.com',
            'password' => Hash::make('usuario'),
        ]);
    }
}
