<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Producto;
use Faker\Generator as Faker;

$factory->define(Producto::class, function (Faker $faker) {

    return [
        'tpro_id' => $faker->randomDigitNotNull,
        'pro_codigo' => $faker->randomDigitNotNull,
        'pro_descripcion' => $faker->word,
        'pro_marca' => $faker->word,
        'pro_modelo' => $faker->word,
        'pro_material' => $faker->word,
        'pro_medida' => $faker->randomDigitNotNull,
        'pro_capacidad' => $faker->randomDigitNotNull,
        'pro_unidad' => $faker->randomDigitNotNull,
        'pro_nivel_proteccion' => $faker->randomDigitNotNull
    ];
});
