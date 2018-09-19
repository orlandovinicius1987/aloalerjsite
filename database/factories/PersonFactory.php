<?php

namespace Database\Factories;

use Faker\Generator as Faker;
use App\Data\Models\Person;

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

    $cpf_com_pontos = $faker->unique()->cpf_com_pontos;
    $cpf_sem_pontos = preg_replace(
        "/(\d\d\d).(\d\d\d).(\d\d\d)-(\d\d)/",
        "$1$2$3$4",
        $cpf_com_pontos
    );

    return [
        'code' => $cpf_sem_pontos,
        'cpf_cnpj' => $cpf_sem_pontos,
        'cpf_cnpj_com_pontos' => $cpf_com_pontos,
        'name' => $faker->name,
        'identification' => $faker->unique()->randomNumber(8),
        'birthdate' => $faker->date,
        'is_anonymous' => false,
    ];
});
