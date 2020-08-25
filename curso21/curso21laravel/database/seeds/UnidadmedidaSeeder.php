<?php

use Illuminate\Database\Seeder;
use App\Unidadmedida;

class UnidadmedidaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(Unidadmedida::class, 10)->create();  
    }
}
