<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Detail;
use Faker\Generator as Faker;

$factory->define(Detail::class, function (Faker $faker) {
    return [
        //
        'no' => 'VJCA' . $faker->numberBetween(10000000000, 99999999999),
        'purchase_date' => $faker->date(),
        'detail_summary' => $faker->realText(40),
        'note' => $faker->realText(40),
        'tax_rate' => $faker->randomElement([NULL, 0, 8, 10]),
        'amount' => $faker->numberBetween(1,999999),
    ];
});
