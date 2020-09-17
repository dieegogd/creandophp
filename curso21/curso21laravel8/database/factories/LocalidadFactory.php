<?php

namespace Database\Factories;

use App\Models\Localidad;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class LocalidadFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Localidad::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->name(),
        ];
    }
}
