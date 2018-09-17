<?php

namespace Database\Factories;

use Faker\Generator as Faker;
use App\Data\Models\Record;

use App\Data\Repositories\Records as RecordsRepository;
use App\Data\Repositories\Committees as CommitteesRepository;
use App\Data\Repositories\Origins as OriginsRepository;
use App\Data\Repositories\ProgressTypes as ProgressTypesRepository;
use App\Data\Repositories\RecordTypes as RecordTypesRepository;
use App\Data\Repositories\Areas as AreasRepository;

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

$factory->defineAs(Record::class, 'Workflow', function (Faker $faker) {
    $origin = (object) $faker->randomElement(
        app(OriginsRepository::class)
            ->all()
            ->toArray()
    );
    $committee = (object) $faker->randomElement(
        app(CommitteesRepository::class)
            ->all()
            ->toArray()
    );

    $recordType = (object) $faker->randomElement(
        app(RecordTypesRepository::class)
            ->all()
            ->toArray()
    );

    $progressType = (object) $faker->randomElement(
        app(ProgressTypesRepository::class)
            ->all()
            ->toArray()
    );

    $area = (object) $faker->randomElement(
        app(AreasRepository::class)
            ->all()
            ->toArray()
    );

    return [
        'origin_id' => $origin->id,
        'committee_id' => $committee->id,
        'record_type_id' => $recordType->id,
        'progress_type_id' => $progressType->id,
        'area_id' => $area->id,
        'original' => $faker->realText($faker->numberBetween(200, 800)),
    ];
});
