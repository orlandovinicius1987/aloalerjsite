<?php

namespace Database\Factories;

use Faker\Generator as Faker;
use App\Models\PersonContact;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->defineAs(PersonContact::class, 'Workflow', function (Faker $faker) {
    return [
        'mobile' => $faker->numberBetween(10000000000, 99999999999),
        'whatsapp' => $faker->numberBetween(10000000000, 99999999999),
        'email' => $faker->email,
        'phone' => $faker->numberBetween(1000000000, 9999999999),
    ];
});
