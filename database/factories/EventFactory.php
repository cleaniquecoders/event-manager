<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Event::class, function (Faker $faker) {
    return [
        'name'        => $faker->name,
        'description' => $faker->paragraph,
        'date'        => $faker->date,
        'time'        => $faker->time,
        'venue'       => $faker->address,
        'payment_url' => $faker->url,
    ];
});
