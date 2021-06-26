<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Inventario;
use Faker\Generator as Faker;

$factory->define(Inventario::class, function (Faker $faker) {

    return [
        'pro_id' => $faker->randomDigitNotNull,
        'tie_id' => $faker->randomDigitNotNull,
        'per_id' => $faker->randomDigitNotNull,
        'inv_fecha' => $faker->word,
        'inv_hora' => $faker->word,
        'inv_cantidad' => $faker->randomDigitNotNull,
        'inv_documento' => $faker->randomDigitNotNull,
        'inv_serie' => $faker->randomDigitNotNull
    ];
});
