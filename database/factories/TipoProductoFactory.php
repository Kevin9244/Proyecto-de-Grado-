<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\TipoProducto;
use Faker\Generator as Faker;

$factory->define(TipoProducto::class, function (Faker $faker) {

    return [
        'dis_id' => $faker->randomDigitNotNull,
        'tpro_descripcion' => $faker->word,
        'tpro_estado' => $faker->word
    ];
});
