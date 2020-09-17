<?php

namespace Database\Factories;

use App\Models\Listaprecio;
use App\Models\Articulo;
use App\Models\Localidad;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ListaprecioFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Listaprecio::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $articulos = Articulo::pluck('id');
        $localidads = Localidad::pluck('id');
        return [
            'precio'       => $this->faker->randomFloat(2, 1, 999999),
            'articulo_id'  => $articulos[rand(0, count($articulos) - 1)],
            'localidad_id' => $localidads[rand(0, count($localidads) - 1)],
        ];
    }
}
