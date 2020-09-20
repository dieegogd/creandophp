<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Articulo;
use App\Venta;
use App\Ventadetalle;
use Faker\Generator as Faker;

$factory->define(Ventadetalle::class, function (Faker $faker) {
    $ventas = Venta::pluck('id');
    $articulos = Articulo::pluck('id');
    return [
        'cantidad'      => $faker->randomNumber(),
        'precio'        => $faker->randomFloat(2, 1, 999999),
        'subtotal'      => $faker->randomFloat(2, 1, 999999),
        'venta_id'      => $ventas[rand(0, count($ventas) - 1)],
        'articulo_id'   => $articulos[rand(0, count($articulos) - 1)],
    ];
});
