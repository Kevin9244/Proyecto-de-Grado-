<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Tienda;
use Faker\Generator as Faker;

$factory->define(Tienda::class, function (Faker $faker) {

    return [
        'tie_razon_social' => $faker->word,
        'tie_nombre' => $faker->word,
        'tie_direccion' => $faker->word,
        'tie_telefono' => $faker->randomDigitNotNull,
        'tie_correo' => $faker->word,
        'tie_pagina_web' => $faker->randomDigitNotNull,
        'tie_ruc' => $faker->randomDigitNotNull
    ];
});
