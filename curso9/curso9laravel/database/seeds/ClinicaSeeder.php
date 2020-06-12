<?php

use Illuminate\Database\Seeder;

class ClinicaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clinicas')->insert([
            'nombre' => "Consultorio Alas",
            'direccion' => Str::random(10),
            'telefono' => Str::random(10),
            'fax' => Str::random(10),
            'email' => 'consultorioalas@yopmail.com',
        ]);
        DB::table('clinicas')->insert([
            'nombre' => "IMAC",
            'direccion' => Str::random(10),
            'telefono' => Str::random(10),
            'fax' => Str::random(10),
            'email' => 'imac@yopmail.com',
        ]);
    }
}
