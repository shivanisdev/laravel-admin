<?php

use Faker\Generator as Faker;

$factory->define(App\Package::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'total_storage' => $faker->numberBetween(1,100),
        
    ];
});
