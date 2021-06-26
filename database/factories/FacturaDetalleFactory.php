<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\FacturaDetalle;
use Faker\Generator as Faker;

$factory->define(FacturaDetalle::class, function (Faker $faker) {

    return [
        'fac_id' => $faker->randomDigitNotNull,
        'facd_detalle_producto' => $faker->word,
        'facd_valor_producto' => $faker->word,
        'facd_descuento' => $faker->word,
        'facd_valor_total' => $faker->word
    ];
});
