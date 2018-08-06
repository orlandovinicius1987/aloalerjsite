<?php

use App\Services\ImportCercred;

Artisan::command('z:import', function () {
    app(ImportCercred::class)->import($this);
})->describe('Display an inspiring quote');
