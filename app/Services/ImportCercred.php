<?php

namespace App\Services;

use Carbon\Carbon;
use App\Data\Models\User;
use App\Data\Models\Record;
use App\Data\Models\RecordType;
use App\Data\Models\Person;
use App\Data\Models\Progress;
use App\Data\Models\UserType;
use App\Data\Models\ContactType;
use App\Data\Models\ProgressType;
use App\Data\Models\PersonAddress;
use App\Data\Models\PersonContact;
use Illuminate\Support\Facades\DB;
use App\Data\Models\RecordType;

class ImportCercred
{
    protected $command;

    private function createRecordFromHistory($history)
    {
        return Record::insert([
            'protocol' => $history->protocolo_codigo,
            'person_id' => $history->pessoa_id,
            'record_type_id' => $history->pessoa_id,
        ]);
    }

    public function import($command)
    {
        ini_set('memory_limit', '2048M');

        $this->command = $command;

//        $this->people();
//
//        $this->emails();
//
//        $this->phones();
//
//        $this->addresses();
//
//        $this->users();

        $this->recordTypes();

        $this->progressTypes();

        $this->recordsAndProgress();
    }

    private function recordTypes()
    {
        $this->info('Importing RECORD TYPES...');

        ProgressType::truncate();

        $this->db()
             ->table('historico_tipo')
             ->get()
             ->each(function ($row) {
                 RecordType::insert([
                      'id' => $row->historico_tipo,
                      'name' => $row->descricao,
                 ]);
             });

        $last =
            RecordType::orderBy('id', 'desc')
                        ->take(1)
                        ->get()
                        ->first()->id + 1;

        DB::raw("setval('record_types_id_seq', {$last}, true);");
    }

    protected function recordsAndProgress()
    {
        $this->info('Importing RECORDS AND PROGRESS...');

        Record::truncate();
        Progress::truncate();

        Person::all()->each(function($person) {
            $this->getHistoryRecordsForPerson($person)->each(function($history) {
                $record = $this->createRecordFromHistory($history);
            });
        });

        $last =
            ProgressType::orderBy('id', 'desc')
                        ->take(1)
                        ->get()
                        ->first()->id + 1;

        DB::raw("setval('progress_types_id_seq', {$last}, true);");
    }

    protected function progressTypes()
    {
        $this->info('Importing PROGRESS TYPES...');

        ProgressType::truncate();

        $this->db()
             ->table('historico_tipo')
             ->get()
             ->each(function ($row) {
                 ProgressType::insert([
                                         'id' => $row->historico_tipo,
                                         'name' => $row->descricao,
                                     ]);
             });

        $last =
            ProgressType::orderBy('id', 'desc')
                        ->take(1)
                        ->get()
                        ->first()->id + 1;

        DB::raw("setval('progress_types_id_seq', {$last}, true);");
    }

    protected function users()
    {
        $this->info('Importing USERS...');

        User::truncate();

        $this->db()
             ->table('usuario')
             ->get()
             ->each(function ($row) {
                 User::insert([
                                  'id' => $row->usuario_id,
                                  'name' => $row->nome,
                                  'email' => $row->nome.'@cercred.com.br',
                                  'username' => $row->nome,
                                  'user_type_id' => UserType::where('name', 'Usuario')->first()->id,
                                  'password' => bcrypt($row->nome.$row->usuario_id),
                              ]);
             });
    }

    protected function addresses()
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

        $last =
            PersonAddress::orderBy('id', 'desc')
                ->take(1)
                ->get()
                ->first()->id + 1;

        DB::raw("setval('person_addresses_id_seq', {$last}, true);");
    }

    protected function phones()
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

        PersonContact::whereIn('contact_type_id', [
            $phoneId,
            $mobileId,
        ])->delete();

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

        $last =
            PersonContact::orderBy('id', 'desc')
                ->take(1)
                ->get()
                ->first()->id + 1;

        DB::raw("setval('person_contacts_id_seq', {$last}, true);");
    }

    protected function emails()
    {
        $counter = 0;

        $contactTypeId = ContactType::where('code', 'email')->first()->id;

        if (
            PersonContact::where('contact_type_id', $contactTypeId)->count() ==
            $this->db()
                ->table('email')
                ->count()
        ) {
            $this->info('EMAILS: done');

            return;
        }

        $this->info('Importing EMAILS...');

        PersonContact::where('contact_type_id', $contactTypeId)->delete();

        $statuses = $this->db()
            ->table('email_status')
            ->get();

        $types = $this->db()
            ->table('email_tipo')
            ->get();

        $this->db()
            ->table('email')
            //->where('email', 'sandrinhabs_35@yahoo.com.br')
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

                $contact = PersonContact::create([
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

        $last =
            PersonContact::orderBy('id', 'desc')
                ->take(1)
                ->get()
                ->first()->id + 1;

        DB::raw("setval('person_contacts_id_seq', {$last}, true);");
    }

    protected function people()
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
                    'updated_by_id' => $person->usuario_id_alteracao,
                ]);

                $counter++;

                if ($counter % 100 === 0) {
                    $this->info(
                        "{$counter} = {$person->pessoa_id} - {$person->nome}"
                    );
                }
            });

        $last =
            Person::orderBy('id', 'desc')
                ->take(1)
                ->get()
                ->first()->id + 1;

        DB::raw("setval('people_id_seq', {$last}, true);");
    }

    protected function info($message)
    {
        $this->command->info($message);
    }

    protected function db()
    {
        return DB::connection('cercred');
    }

    private function getHistoryRecordsForPerson($person)
    {
        return coollect($this->db()
                    ->select("select
  pessoa.pessoa_id,
  pessoa.nome pessoa_nome,
  protocolo.protocolo_id,
  protocolo.protocolo_codigo,
  objeto.objeto_id,
  objeto.codigo objeto_codigo,
  objeto.objeto_tipo,
  objeto_status.descricao objeto_status_descricao,
  historico.historico_id,
  historico.complemento historico_complemento,
  historico_tipo.descricao historico_tipo_descricao,
  historico.usuario_id historico_usuario_id,
  historico.usuario_id_alteracao historico_usuario_id_alteracao,
  historico.*

from protocolo
  left join objeto on protocolo.objeto_id = objeto.objeto_id
  left join historico on protocolo.objeto_id = historico.objeto_id
  left join historico_tipo on historico.historico_tipo = historico_tipo.historico_tipo
  left join pessoa on historico.pessoa_id = pessoa.pessoa_id
  left join objeto_status on objeto_status.objeto_status = objeto.objeto_status
where pessoa.pessoa_id = {$person->id}
order by pessoa.pessoa_id, protocolo.protocolo_id, historico.data_inicio_atendimento"));
    }
}
