<?php
use App\Data\Models\Progress;
use App\Data\Models\Record;
use App\Services\ImportCercred;

Artisan::command('cercred:import', function () {
    app(ImportCercred::class)->import($this);
})->describe('Display an inspiring quote');

Artisan::command('cercred:index', function () {
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

Artisan::command('cercred:truncate-records', function () {
    Record::truncate();
    Progress::truncate();
})->describe('Display an inspiring quote');
