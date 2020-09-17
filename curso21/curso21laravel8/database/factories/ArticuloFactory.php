<?php

namespace Database\Factories;

use App\Models\Articulo;
use App\Models\Categoria;
use App\Models\Unidadmedida;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ArticuloFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Articulo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $categorias = Categoria::pluck('id');
        $unidadmedidas = Unidadmedida::pluck('id');
        return [
            'nombre'          => $this->faker->name(),
            'categoria_id'    => $categorias[rand(0, count($categorias) - 1)],
            'unidadmedida_id' => $unidadmedidas[rand(0, count($unidadmedidas) - 1)],
        ];
    }
}
