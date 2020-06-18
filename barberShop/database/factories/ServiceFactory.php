<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Service;
use Faker\Generator as Faker;

$factory->define(Service::class, function (Faker $faker) {
    return [
        'client_id' => factory(\App\Client::class),
        'employee_id' => factory(\App\Employee::class),
        'scheduled_date' => $faker->date(),
        'scheduled_hour' => $faker->time(),
        'service_type' => $faker->word,
    ];
});
