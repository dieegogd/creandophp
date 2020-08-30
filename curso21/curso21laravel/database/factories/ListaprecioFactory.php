<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Articulo;
use App\Listaprecio;
use App\Localidad;
use Faker\Generator as Faker;

$factory->define(Listaprecio::class, function (Faker $faker) {
    $articulos = Articulo::pluck('id');
    $localidads = Localidad::pluck('id');
    return [
        'precio'       => $faker->randomFloat(2, 1, 999999),
        'articulo_id'  => $articulos[rand(0, count($articulos) - 1)],
        'localidad_id' => $localidads[rand(0, count($localidads) - 1)],
    ];
});
