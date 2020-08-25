<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Unidadmedida;
use Faker\Generator as Faker;

$factory->define(Unidadmedida::class, function (Faker $faker) {
    return [
        'nombre' => $faker->name(),
    ];
});
