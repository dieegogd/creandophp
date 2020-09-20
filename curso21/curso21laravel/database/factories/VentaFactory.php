<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Cliente;
use App\Sucursal;
use App\Localidad;
use App\Venta;
use Faker\Generator as Faker;

$factory->define(Venta::class, function (Faker $faker) {
    $clientes = Cliente::pluck('id');
    $sucursals = Sucursal::pluck('id');
    $localidads = Localidad::pluck('id');
    return [
        'fecha'        => $faker->datetime(),
        'total'        => $faker->randomFloat(2, 1, 999999),
        'cliente_id'   => $clientes[rand(0, count($clientes) - 1)],
        'sucursal_id'  => $sucursals[rand(0, count($sucursals) - 1)],
        'localidad_id' => $localidads[rand(0, count($localidads) - 1)],
    ];
});
