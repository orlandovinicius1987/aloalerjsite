<?php

namespace Database\Factories;

use Faker\Generator as Faker;
use App\Models\Person;

use App\Data\Repositories\Persons as PersonsRepository;

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

$factory->define(Person::class, function (Faker $faker) {
    $faker = app('Faker');

    $cpf = $faker->unique()->cpf_sem_pontos;

    return [
        'code' => $cpf,
        'cpf_cnpj' => $cpf,
        'name' => $faker->name_without_special_character,
        'identification' => $faker->unique()->randomNumber(8),
        'birthdate' => $faker->date,
        'is_anonymous' => false
    ];
});

$factory->defineAs(Person::class, 'massInsert', function ($faker) use ($factory) {
    $issue = $factory->raw(Person::class);
    $issue['name'] = 'massInsert';
    return $issue;
});
