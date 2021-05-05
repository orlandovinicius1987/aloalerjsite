<?php

namespace Database\Factories;

use Faker\Generator as Faker;
use App\Models\PersonAddress;

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

$factory->defineAs(PersonAddress::class, 'Workflow', function (Faker $faker) {
    return [
        'zipcode' => '20560085',
        'number' => $faker->numberBetween(10, 100),
        'address' => 'Rua Barão de Cotegipe',
    ];
});
