<?php

use Illuminate\Database\Seeder;
use App\Localidad;

class LocalidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Localidad::class, 15)->create();
    }
}
