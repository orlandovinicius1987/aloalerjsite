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
        'origin_id' => app(OriginsRepository::class)->randomElement()->id,
        'record_id' => app(RecordsRepository::class)->randomElement()->id,
        'original' => $faker->name,
    ];
});
