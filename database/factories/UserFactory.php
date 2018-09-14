<?php

namespace Database\Factories;

use Faker\Generator as Faker;
use App\Data\Models\User;

use App\Data\Repositories\UserTypes as UserTypesRepository;

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

$factory->define(User::class, function (Faker $faker) {
    $name = $faker->unique()->name;

    return [
        'name' => $name,
        'username' => $name,
        'email' => $name . '@alerj.rj.gov.br',
        'password' =>
            '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
        'user_type_id' =>
            $faker->randomElement(
                app(UserTypesRepository::class)
                    ->all()
                    ->toArray()
            )['id'],
    ];
});
