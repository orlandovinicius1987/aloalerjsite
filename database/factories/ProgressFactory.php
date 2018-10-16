<?php
use Faker\Generator as Faker;

use App\Data\Models\Progress as ProgressModel;

use App\Data\Repositories\Origins as OriginsRepository;
use App\Data\Repositories\Records as RecordsRepository;
use App\Data\Repositories\ProgressTypes as ProgressTypesRepository;
use App\Data\Repositories\RecordTypes as RecordTypesRepository;
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

$factory->defineAs(ProgressModel::class, 'CreateDusk', function (
    Faker $faker
) use ($factory) {
    $issue = $factory->raw(ProgressModel::class);

    $origin = app(OriginsRepository::class)->randomElement();

    $progressType = app(ProgressTypesRepository::class)->randomElement();

    $recordType = app(RecordTypesRepository::class)->randomElement();

    $area = app(\App\Data\Repositories\Areas::class)->randomElement();

    $issue = array_merge($issue, [
        'progress_type_id' => $progressType->id,
        'origin_id' => $origin->id,
        'original' => $faker->realText($faker->numberBetween(200, 800)),
        'record_type_id' => $recordType->id,
        'area_id' => $area->id,
    ]);

    return $issue;
});
