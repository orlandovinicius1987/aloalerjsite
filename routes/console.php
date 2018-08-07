<?php
use App\Data\Models\Person;
use App\Services\ImportCercred;

Artisan::command('cercred:import', function () {
    app(ImportCercred::class)->import($this);
})->describe('Display an inspiring quote');

Artisan::command('cercred:test', function () {
    dd(Person::find(3)->addresses->toArray());
})->describe('Display an inspiring quote');
