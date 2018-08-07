<?php

namespace App\Services;

use App\Data\Models\ContactType;
use App\Data\Models\PersonAddress;
use App\Data\Models\PersonContact;
use App\Data\Models\Person;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ImportCercred
{
    private $command;

    public function import($command)
    {
        ini_set('memory_limit', '2048M');

        $this->command = $command;

        $this->people();

        $this->emails();

        $this->phones();

        $this->addresses();
    }

    private function addresses()
    {
        $counter = 0;

        if (
            PersonAddress::count() ==
            $this->db()
                ->table('endereco')
                ->count()
        ) {
            $this->info('ADDRESSES: done');

            return;
        }

        $this->info('Importing ADDRESSES...');

        PersonAddress::truncate();

        $statuses = coollect(
            $this->db()
                ->table('endereco_status')
                ->get()
        );

        $types = coollect(
            $this->db()
                ->table('endereco_tipo')
                ->get()
        );

        $this->db()
            ->table('endereco')
            ->get()
            ->each(function ($endereco) use (&$counter, $statuses, $types) {
                $type = lower(
                    $types
                        ->where('endereco_tipo', $endereco->endereco_tipo)
                        ->first()->descricao
                );

                $status = lower(
                    $statuses
                        ->where('endereco_status', $endereco->endereco_status)
                        ->first()->descricao
                );

                PersonAddress::create([
                    'person_id' => $endereco->pessoa_id,
                    'zipcode' => $endereco->cep,
                    'street' => $endereco->endereco,
                    'complement' => $endereco->complemento,
                    'neighbourhood' => $endereco->bairro,
                    'city' => $endereco->cidade,
                    'state' => $endereco->uf,
                    'is_mailable' => true,
                    'from' => $type,
                    'status' => $status,
                    'address_id' => $endereco->endereco_id,
                ]);

                $counter++;

                if ($counter % 100 === 0) {
                    $this->info("{$counter} = {$endereco->endereco}");
                }
            });
    }

    private function phones()
    {
        $counter = 0;

        $phoneId = ContactType::where('code', 'phone')->first()->id;
        $mobileId = ContactType::where('code', 'mobile')->first()->id;

        if (
            PersonContact::whereIn('contact_type_id', [
                $phoneId,
                $mobileId,
            ])->count() ==
            $this->db()
                ->table('telefone')
                ->count()
        ) {
            $this->info('PHONES: done');

            return;
        }

        $this->info('Importing PHONES...');

        PersonContact::truncate();

        $statuses = $this->db()
            ->table('telefone_status')
            ->get();

        $types = $this->db()
            ->table('telefone_tipo')
            ->get();

        $this->db()
            ->table('telefone')
            ->get()
            ->each(function ($telefone) use (
                &$counter,
                $phoneId,
                $mobileId,
                $statuses,
                $types
            ) {
                $type = lower(
                    coollect($types)
                        ->where('telefone_tipo', $telefone->telefone_tipo)
                        ->first()->descricao
                );

                $status = lower(
                    coollect($statuses)
                        ->where('telefone_status', $telefone->telefone_status)
                        ->first()->descricao
                );

                PersonContact::create([
                    'person_id' => $telefone->pessoa_id,
                    'contact_type_id' =>
                        $type == 'celular' ? $mobileId : $phoneId,
                    'contact' => $telefone->ddd . $telefone->telefone,
                    'from' => $type == 'celular' ? 'pessoal' : $type,
                    'status' => $status,
                    'provider_enrichment_id' =>
                        $telefone->enriquecimento_provedor_id,
                    'telefone_id' => $telefone->telefone_id,
                    'created_at' => Carbon::parse($telefone->inclusao),
                ]);

                $counter++;

                if ($counter % 100 === 0) {
                    $this->info("{$counter} = {$telefone->telefone}");
                }
            });
    }

    private function emails()
    {
        $counter = 0;

        $contactTypeId = ContactType::where('code', 'email')->first()->id;

        if (
            PersonContact::where(
                'contact_type_id',
                $contactTypeId
            )->count() ==
            $this->db()
                ->table('email')
                ->count()
        ) {
            $this->info('EMAILS: done');

            return;
        }

        $this->info('Importing EMAILS...');

        PersonContact::truncate();

        $statuses = $this->db()
            ->table('email_status')
            ->get();

        $types = $this->db()
            ->table('email_tipo')
            ->get();

        $this->db()
            ->table('email')
            ->get()
            ->each(function ($email) use (
                &$counter,
                $contactTypeId,
                $statuses,
                $types
            ) {
                $type = coollect($types)
                    ->where('email_tipo', $email->email_tipo)
                    ->first()->descricao;

                $status = coollect($statuses)
                    ->where('email_status', $email->email_status)
                    ->first()->descricao;

                PersonContact::create([
                    'person_id' => $email->pessoa_id,
                    'contact_type_id' => $contactTypeId,
                    'contact' => $email->email,
                    'from' => lower($type),
                    'status' => lower($status),
                    'provider_enrichment_id' =>
                        $email->enriquecimento_provedor_id,
                    'email_id' => $email->email_id,
                ]);

                $counter++;

                if ($counter % 100 === 0) {
                    $this->info(
                        "{$counter} = {$email->email} - {$email->email_id}"
                    );
                }
            });
    }

    private function people()
    {
        $counter = 0;

        if (
            Person::count() ==
            $this->db()
                ->table('pessoa')
                ->count()
        ) {
            $this->info('PERSONS: done');

            return;
        }

        $this->info('Importing PERSONS...');

        Person::truncate();

        $this->db()
            ->table('pessoa')
            ->get()
            ->each(function ($person) use (&$counter) {
                Person::insert([
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

    private function db()
    {
        return DB::connection('cercred');
    }
}
