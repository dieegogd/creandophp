<?php

use App\Articuloxsucursale;
use Illuminate\Database\Seeder;

class ArticuloxsucursaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Articuloxsucursale::class, 150)->create();
    }
}
