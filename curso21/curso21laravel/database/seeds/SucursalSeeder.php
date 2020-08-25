<?php

use Illuminate\Database\Seeder;
use App\Sucursal;

class SucursalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Sucursal::class, 15)->create();
    }
}
