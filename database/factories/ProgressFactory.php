<?php
use Faker\Generator as Faker;

use App\Data\Models\Progress as ProgressModel;

use App\Data\Repositories\Origins as OriginsRepository;
use App\Data\Repositories\Records as RecordsRepository;
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

$factory->define(ProgressModel::class, function (Faker $faker) {
    return [
        'origin_id' =>
            $faker->randomElement(
                app(OriginsRepository::class)
                    ->all()
                    ->toArray()
            )['id'],
        'record_id' =>
            $faker->randomElement(
                app(RecordsRepository::class)
                    ->all()
                    ->toArray()
            )['id'],
        'original' => $faker->name,
    ];
});
