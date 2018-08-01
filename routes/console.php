<?php

Artisan::command('z:import', function () {
    ini_set('memory_limit', '2048M');

    $file = file(base_path('Base_Exportada/Historico.txt'));

    $columns = collect(explode(' ', trim(preg_replace('/\s+/', ' ',$file[0]))));

    $columns = collect(explode(' ', $file[1]))->map(function($value, $key) use ($columns) {
        return [
            'column' => $columns[$key],
            'size' => strlen($value),
        ];
    });

    unset($file[0]);
    unset($file[1]);

    foreach ($file as $line) {
        $fields = collect();

        foreach ($columns as $column) {
            $fields->push(substr($line, 0, $column['size']));

            $line = substr($line, $column['size']);
        }

        $fields->dump();
    }



})->describe('Display an inspiring quote');

