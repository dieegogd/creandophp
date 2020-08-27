<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Articulo;
use App\Categoria;
use App\Unidadmedida;
use Faker\Generator as Faker;

$factory->define(Articulo::class, function (Faker $faker) {
    $categorias = Categoria::pluck('id');
    $unidadmedidas = Unidadmedida::pluck('id');
    return [
        'nombre'          => $faker->name(),
        'categoria_id'    => $categorias[rand(0, count($categorias) - 1)],
        'unidadmedida_id' => $unidadmedidas[rand(0, count($unidadmedidas) - 1)],
    ];
});
