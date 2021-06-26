<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Factura;
use Faker\Generator as Faker;

$factory->define(Factura::class, function (Faker $faker) {

    return [
        'tie_id' => $faker->randomDigitNotNull,
        'per_id' => $faker->randomDigitNotNull,
        'pro_id' => $faker->randomDigitNotNull,
        'fac_numero_facturas' => $faker->word,
        'fac_fecha' => $faker->word
    ];
});
