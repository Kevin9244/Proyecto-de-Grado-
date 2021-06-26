<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Distribuidor;
use Faker\Generator as Faker;

$factory->define(Distribuidor::class, function (Faker $faker) {

    return [
        'tie_id' => $faker->randomDigitNotNull,
        'dis_nombre' => $faker->word,
        'dis_direccion' => $faker->word,
        'dis_correo' => $faker->word,
        'dis_telefono' => $faker->randomDigitNotNull
    ];
});
