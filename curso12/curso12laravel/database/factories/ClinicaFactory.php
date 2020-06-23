<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Clinica;
use Faker\Generator as Faker;

$factory->define(Clinica::class, function (Faker $faker) {
    return [
        "nombre"    => $faker->name(),
        "direccion" => $faker->streetAddress(),
        "telefono"  => $faker->phoneNumber(),
        "cuil"      => $faker->numberBetween(10000000000, 30000000000),
        "fax"       => $faker->phoneNumber(),
        "email"     => $faker->unique()->safeEmail,
    ];
});
