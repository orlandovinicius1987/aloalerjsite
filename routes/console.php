<?php
use App\Data\Models\Progress;
use App\Data\Models\Record;
use App\Services\ImportCercred;

Artisan::command('aloalerj:cercred:import', function () {
    app(ImportCercred::class)->import($this);
})->describe('Display an inspiring quote');

Artisan::command('aloalerj:cercred:update-progresses', function () {
    app(ImportCercred::class)->updateProgressTypes($this);
})->describe('Display an inspiring quote');

Artisan::command('aloalerj:cercred:index', function () {
    Schema::connection('cercred')->table('historico', function ($table) {
        $table->index('historico_id');

        $table->index('objeto_id');
    });

    Schema::connection('cercred')->table('objeto', function ($table) {
        $table->index('historico_id');

        $table->index('objeto_id');

        $table->index('pessoa_id');

        $table->index('codigo');
    });

    Schema::connection('cercred')->table('protocolo', function ($table) {
        $table->index('protocolo_id');

        $table->index('historico_id');

        $table->index('objeto_id');
    });

    Schema::connection('cercred')->table('pessoa', function ($table) {
        $table->index('pessoa_id');
        $table->index('codigo');
    });

    Schema::connection('cercred')->table('historico_propriedade', function (
        $table
    ) {
        $table->index('historico_id');
        $table->index('historico_propriedade_tipo');
    });

    Schema::connection('cercred')->table('historico_tipo', function ($table) {
        $table->index('historico_tipo');
    });

    Schema::connection('cercred')->table('action_historico', function ($table) {
        $table->index('historico_tipo');
    });

    Schema::connection('cercred')->table('action', function ($table) {
        $table->index('action_id');
    });

    Schema::connection('cercred')->table('action_type', function ($table) {
        $table->index('action_type');
    });
})->describe('index');

Artisan::command('aloalerj:cercred:truncate-records', function () {
    Record::truncate();
    Progress::truncate();
})->describe('Display an inspiring quote');

Artisan::command('aloalerj:update-sequences', function () {
    $tables = [
        'areas',
        'audits',
        'committees',
        'contact_types',
        'hows',
        'migrations',
        'origins',
        'people',
        'person_addresses',
        'person_contacts',
        'progress_types',
        'progresses',
        'record_actions',
        'record_types',
        'records',
        'user_types',
        'users',
    ];

    coollect($tables)->each(function ($table) {
        $this->info('fix sequence for ' . $table);

        DB::statement(
            "SELECT setval('public.{$table}_id_seq', (SELECT max(id) FROM public.{$table}));"
        );
    });
})->describe('Display an inspiring quote');

Artisan::command('aloalerj:protocol', function () {
    dd(preg_replace('/[^0-9]/', '', '2018.0903.0000.0002.1505.0150.7996'));
})->describe('Display an inspiring quote');
