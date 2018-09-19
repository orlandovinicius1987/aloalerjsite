<?php

namespace Database\Factories;

use Faker\Generator as Faker;
use App\Data\Models\Record;

use App\Data\Repositories\Records as RecordsRepository;
use App\Data\Repositories\Committees as CommitteesRepository;
use App\Data\Repositories\Origins as OriginsRepository;
use App\Data\Repositories\ProgressTypes as ProgressTypesRepository;
use App\Data\Repositories\RecordTypes as RecordTypesRepository;
use App\Data\Repositories\People as PeopleRepository;
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

$factory->define(Record::class, function (Faker $faker) {
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

    $area = (object) $faker->randomElement(
        app(AreasRepository::class)
            ->all()
            ->toArray()
    );

    $person = (object) $faker->randomElement(
        app(PeopleRepository::class)
            ->all()
            ->toArray()
    );

    return [
        'protocol' => $faker->numberBetween(1000, 1000000),
        'send_answer_by_email' => rand(0, 1) == 1,
        'committee_id' => $committee->id,
        'record_type_id' => $recordType->id,
        'area_id' => $area->id,
        'person_id' => $person->id,
    ];
});

$factory->defineAs(Record::class, 'Workflow', function (Faker $faker) use (
    $factory
) {
    $issue = $factory->raw(Record::class);

    $origin = (object) $faker->randomElement(
        app(OriginsRepository::class)
            ->all()
            ->toArray()
    );

    $progressType = (object) $faker->randomElement(
        app(ProgressTypesRepository::class)
            ->all()
            ->toArray()
    );

    $issue = array_merge($issue, [
        'progress_type_id' => $progressType->id,
        'origin_id' => $origin->id,
        'original' => $faker->realText($faker->numberBetween(200, 800)),
    ]);

    return $issue;
});
