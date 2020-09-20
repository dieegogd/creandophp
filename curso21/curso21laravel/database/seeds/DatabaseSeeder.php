<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(CategoriaSeeder::class);
        $this->call(UnidadmedidaSeeder::class);
        $this->call(LocalidadSeeder::class);
        $this->call(SucursalSeeder::class);
        $this->call(ArticuloSeeder::class);
        $this->call(ListaprecioSeeder::class);
        $this->call(ClienteSeeder::class);
        $this->call(ArticuloxsucursaleSeeder::class);
        $this->call(VentaSeeder::class);
        $this->call(VentadetalleSeeder::class);
    }
}
