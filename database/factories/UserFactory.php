<?php

namespace Database\Factories;

use Faker\Generator as Faker;
use App\Data\Models\User;

use App\Data\Repositories\UserTypes as UserTypesRepository;
use App\Data\Repositories\Users as UsersRepository;

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
    $usersRepository = app(UsersRepository::class);

    do {
        $name = strtolower($faker->unique()->firstName);
    } while (
        !is_null(
            $usersRepository->findByColumn('email', $name . '@alerj.rj.gov.br')
        )
    );

    return [
        'name' => $name,
        'username' => $name,
        'email' => $name . '@alerj.rj.gov.br',
        'password' =>
            '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
        'user_type_id' => app(UserTypesRepository::class)->randomElement(),
    ];
});

foreach (app(UserTypesRepository::class)->all() as $userType) {
    $factory->defineAs(User::class, $userType->name, function ($faker) use (
        $factory,
        $userType
    ) {
        $issue = $factory->raw(User::class);
        $userTypesRepository = app(UserTypesRepository::class);
        $userType = $userTypesRepository->findByColumn('name', $userType->name);

        $issue['user_type_id'] = $userType->id;

        return $issue;
    });
}
