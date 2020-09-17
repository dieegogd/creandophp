<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::create([
            'name' => 'usuario',
            'email' => 'usuario@yopmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$McQM1GqnKGswClEPryugAuhDnfXGHISaCW8YhgYuFheHgN6uZ5g8G',
            'remember_token' => Str::random(10),
        ]);
        \App\Models\User::factory(10)->create();
        \App\Models\Categoria::factory(10)->create();
        \App\Models\Unidadmedida::factory(10)->create();
        \App\Models\Localidad::factory(10)->create();
        \App\Models\Sucursal::factory(10)->create();
        \App\Models\Articulo::factory(10)->create();
        \App\Models\Listaprecio::factory(10)->create();
        \App\Models\Cliente::factory(10)->create();
    }
}
