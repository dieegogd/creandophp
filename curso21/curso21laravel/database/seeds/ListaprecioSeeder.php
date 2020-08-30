<?php

use App\Listaprecio;
use Illuminate\Database\Seeder;

class ListaprecioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Listaprecio::class, 50)->create();
    }
}
