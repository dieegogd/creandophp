<?php

use App\Clinica;
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
        factory(Clinica::class, 25)->create();
    }
}
