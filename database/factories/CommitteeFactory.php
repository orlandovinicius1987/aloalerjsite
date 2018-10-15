<?php

namespace Database\Factories;

use Faker\Generator as Faker;
use App\Data\Models\Committee;

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

$factory->defineAs(Committee::class, 'dusk', function (Faker $faker) {
    $faker = app('Faker');

    $name = $faker->name_without_special_character;

    $short_name = $faker->name_without_special_character;

    $phone = $faker->numberBetween(1000000000, 9999999999);

    $office_phone = $faker->numberBetween(1000000000, 9999999999);

    $email = $name . '@alerj.rj.gov.br';

    $president = $faker->name_without_special_character;

    $vicePresident = $faker->name_without_special_character;

    $office_address = $faker->name_without_special_character;

    return [
        'name' => $name,
        'short_name' => $short_name,
        'phone' => $phone,
        'office_phone' => $office_phone,
        'email' => $email,
        'president' => $president,
        'vicePresident' => $vicePresident,
        'office_address' => $office_address,
        'bio' => $faker->realText($faker->numberBetween(200, 800)),
    ];
});

$factory->defineAs(Person::class, 'massInsert', function ($faker) use (
    $factory
) {
    $issue = $factory->raw(Person::class);
    $issue['name'] = 'massInsert';
    return $issue;
});
