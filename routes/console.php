<?php
use App\Data\Models\Person;
use App\Services\ImportCercred;

Artisan::command('cercred:import', function () {
    app(ImportCercred::class)->import($this);
})->describe('Display an inspiring quote');


Artisan::command('cercred:index', function () {
    $this->info('INDEXING...');

    Schema::connection('cercred')->table('historico', function ($table) {
        $this->info('historico historico_id');
        $table->index('historico_id');

        $this->info('historico objeto_id');
        $table->index('objeto_id');
    });

    Schema::connection('cercred')->table('objeto', function ($table) {
        $this->info('objeto historico_id');
        $table->index('historico_id');

        $this->info('objeto objeto_id');
        $table->index('objeto_id');

        $this->info('objeto pessoa_id');
        $table->index('pessoa_id');

        $this->info('objeto codigo');
        $table->index('codigo');
    });

    Schema::connection('cercred')->table('protocolo', function ($table) {
        $this->info('protocolo protocolo_id');
        $table->index('protocolo_id');

        $this->info('protocolo historico_id');
        $table->index('historico_id');

        $this->info('protocolo objeto_id');
        $table->index('objeto_id');
    });

    Schema::connection('cercred')->table('pessoa', function ($table) {
        $this->info('pessoa pessoa_id');
        $table->index('pessoa_id');
        $table->index('codigo');
    });
})->describe('index');

