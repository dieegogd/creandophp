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
            'nombre'      => "Consultorio",
            'descripcion' => Str::random(10),
            'contenido'   => Str::random(10)
        ]);
        DB::table('clinicas')->insert([
            'nombre'      => "Sanatorio",
            'descripcion' => Str::random(10),
            'contenido'   => Str::random(10)
        ]);
    }
}
