<?php

use App\Ventadetalle;
use Illuminate\Database\Seeder;

class VentadetalleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Ventadetalle::class, 15)->create();
    }
}
