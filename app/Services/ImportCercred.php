<?php

namespace App\Services;

use App\Data\Models\PersonModel;
use Illuminate\Support\Facades\DB;

class ImportCercred
{
    private $command;

    private function db()
    {
        return DB::connection('cercred');
    }

    public function import($command)
    {
        ini_set('memory_limit', '2048M');

        $this->command = $command;

        $this->importPersons();
    }

    private function importPersons()
    {
        $counter = 0;

        if (
            PersonModel::count() ==
            $this->db()
                ->table('pessoa')
                ->count()
        ) {
            $this->info('PERSONS: done');

            return;
        }

        PersonModel::truncate();

        $this->db()
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
    }

    private function info($message)
    {
        $this->command->info($message);
    }
}
