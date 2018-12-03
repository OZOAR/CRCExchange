<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\Transaction::class, function (Faker $faker) {
    return [
        'referral_id' => $faker->numberBetween(10, 30),
        'btc_address' => $faker->bothify('******************************'),
        'total_eur'   => $faker->randomFloat(4, 30.0, 2500.5),
        'status'      => $faker->randomElement(['NEW', 'PROCESSING', 'PENDING', 'SUCCESS', 'FAIL']),
    ];
});
