<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Articulo;
use App\Sucursal;
use App\Articuloxsucursale;
use Faker\Generator as Faker;

$factory->define(Articuloxsucursale::class, function (Faker $faker) {
	$articulos = Articulo::pluck('id');
    $sucursals = Sucursal::pluck('id');
    return [
        'existencia'   => $faker->randomNumber(),
        'stockminimo'  => $faker->randomNumber(),
        'articulo_id'  => $articulos[rand(0, count($articulos) - 1)],
        'sucursal_id'  => $sucursals[rand(0, count($sucursals) - 1)],
    ];
});
