<?php

use App\Data\Models\PersonModel;

Artisan::command('z:import', function () {
    ini_set('memory_limit', '2048M');

    $counter = 0;

    PersonModel::truncate();

    DB::connection('cercred')
        ->table('pessoa')
        ->get()
        ->each(function ($person) use (&$counter) {
            PersonModel::create([
                'id' => $person->pessoa_id,
                'code' => $person->codigo,
                'name' => $person->nome,
                'cpf_cnpj' => $person->cpf,
                'identification' => $person->rg,
                'birthdate' => $person->nascimento,
                'gender_id' => $person->sexo,
                'civil_status_id' => $person->estado_civil_id,
                'spouse_name' => $person->nome_conjuge,
                'main_occupation_id' => $person->ocupacao_principal,
                'scholarship_id' => $person->escolaridade_id,
                'income' => (float) str_replace('$', '', $person->renda),
                'person_type_id' => $person->tipo_pessoa,
                'created_at' => $person->inclusao,
                'updated_by' => $person->usuario_id_alteracao,
            ]);

            $counter++;

            if ($counter % 100 === 0) {
                $this->info(
                    "{$counter} = {$person->pessoa_id} - {$person->nome}"
                );
            }
        });
})->describe('Display an inspiring quote');
