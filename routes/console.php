<?php

use App\Data\Models\Area;
use App\Data\Models\Record;
use App\Data\Models\Progress;
use App\Data\Models\Committee;
use Illuminate\Support\Carbon;
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

Artisan::command('aloalerj:fix-created-at-1', function () {
    ini_set('memory_limit', '2048M');

    $current = [];

    Record::whereNull('created_at')
        ->get()
        ->each(function ($record) use (&$current) {
            $progresses = $record->progresses;

            if ($first = $progresses->sortBy('created_at')->first()) {
                $record->created_at = $first->created_at;
            } else {
                $record->created_at = Carbon::parse('2015-01-01');
            }

            $record->save();

            increment('RECORDS', 100, "record", $current);
        });
})->describe('fixdata');

Artisan::command('aloalerj:fix-resolved-at', function () {
    ini_set('memory_limit', '2048M');

    $current = [];

    foreach (
        Record::whereNull('resolved_at')
            ->where('created_at', '<', '2018-08-28')
            ->cursor()
        as $record
    ) {
        $progress = $record->progresses->where(
            'historico_id',
            $record->historico_id_finalizador
        )->first();

        $record->resolved_at = $progress
            ? $progress->created_at
            : $record->created_at;

        $record->resolved_by_id = 0;

        if ($progress) {
            $record->resolve_progress_id = $progress->id;
        }

        $record->save();

        increment('RECORDS', 100, "record", $current);
    }
})->describe('fixdata');

function increment($counterName, $mod = 100, $message = '', &$counter)
{
    if (!isset($counter[$counterName])) {
        $counter[$counterName] = 0;
    }

    $counter[$counterName]++;

    if ($counter[$counterName] == 1 || $counter[$counterName] % $mod === 0) {
        $counterX = str_pad($counter[$counterName], 8, ' ', STR_PAD_LEFT);

        $memory = str_pad(
            number_format(memory_get_peak_usage()),
            13,
            ' ',
            STR_PAD_LEFT
        );

        echo "{$counterName} - {$counterX} records {$memory} bytes = {$message} \n";
    }
}

//        'Comissão de Constituição e Justiça;Constituição e Justiça;André Lazaroni;MDB;Chiquinho da Mangueira ;PSC ;Tatiana;311',
//        'Comissão de Orçamento, Finanças, Fiscalização Financeira e Controle;Orçamento, Finanças, Fiscalização Financeira e Controle;Gustavo Tutuca;MDB;André Correa;DEM;Ada;316',
//        'Comissão de Tributação, Controle da Arrecadação Estadual e de Fiscalização dos Tributos Estaduais;Tributação, Controle da Arrecadação Estadual e de Fiscalização dos Tributos Estaduais;Luiz Paulo ;PSDB;Comte Bittencourt ;PPS;Orlando;316',
//        'Comissão de Agricultura, Pecuária e Políticas Rural, Agrária e Pesqueira;Agricultura, Pecuária e Políticas Rural, Agrária e Pesqueira;João Peixoto ;PSDC;Figueiredo;PSDC ;Rogério;316',
//        'Comissão de Ciência e Tecnologia;Ciência e Tecnologia;Rosenverg Reis;MDB;Waldeck Carneiro;PT;Marcelo;316',
//'Comissão de Combate às Discriminações e Preconceitos de Raça, Cor, Etnia, Religião e Procedência Nacional;Combate às Discriminações e Preconceitos de Raça, Cor, Etnia, Religião e Procedência Nacional;Carlos Minc;PSB;Tia Ju;PRB;Gilma;316',
//        'Comissão de Cultura;Cultura;Zaqueu Teixeira;PSD;André Lazaroni;MDB;Haroldo;316',
//        'Comissão de Defesa dos Direitos Humanos e Cidadania;Defesa dos Direitos Humanos e Cidadania;Marcelo Freixo;PSOL;;MDB;Viviane;316',
//        'Comissão de Defesa Civil;Defesa Civil;Flávio Bolsonaro;PSL;Dica;PRB;Mauro;316',
//        'Comissão de Defesa do Consumidor;Defesa do Consumidor;Luiz Martins;PDT;;PDT;Gisela;316',
//        'Comissão de Defesa do Meio Ambiente;Defesa do Meio Ambiente;André Lazaroni;MDB;Carlos Minc;PSB;Jefferson;316',
//        'Comissão de Defesa dos Direitos da Mulher;Defesa dos Direitos da Mulher;Enfermeira Rejane;PC DO B;Martha Rocha;PDT;Gilma;316',
//        'Comissão de Economia, Indústria e Comércio;Economia, Indústria e Comércio;Waldeck Carneiro;PT;Osório;PSDB;Lia;316',
//        'Comissão de Pessoa com Deficiência;Pessoa com Deficiência;Márcio Pacheco;PSC;Márcia Jeovani;DEM;Carlos Chagas;316',
//        'Comissão de Educação;Educação;Comte Bittencourt;PPS;André Lazaroni;MDB;Lúcia;316',
//        'Comissão de Indicações Legislativas;Indicações Legislativas;Marcos Abrahão;AVANTE;;PSB;Cláudio;316',
//        'Comissão de Esporte e Lazer;Esporte e Lazer;Chiquinho da Mangueira;PSC;Dica;PR;Sandra de Jesus;316',
//        'Comissão de Prevenção ao Uso de Drogas e Dependentes Químicos em Geral;Prevenção ao Uso de Drogas e Dependentes Químicos em Geral;Dr. Deodalto;DEM;Tio Carlos;SD;Carla;316',
//        'Comissão de Política Urbana, Habitação e Assuntos Fundiários;Política Urbana, Habitação e Assuntos Fundiários;Zeidan Lula;PT;Dica;PR;Rômulo;316',
//        'Comissão de Segurança Alimentar;Segurança Alimentar;Lucinha;PSDB;Nivaldo Mulim;PR;Eduardo;316',
//        'Comissão de Saneamento Ambiental;Saneamento Ambiental;Cidinha Campos;PDT;Lucinha;PSDB;Luiz Cláudio;316',
//        'Comissão de Segurança Pública e Assuntos de Polícia;Segurança Pública e Assuntos de Polícia;Martha Rocha;PDT;Bruno Dauaire;PRP;Lina;316',
//        'Comissão de Trabalho, Legislação Social e Seguridade Social;Trabalho, Legislação Social e Seguridade Social;Paulo Ramos;PDT;;MDB;Tanizza;316',
//        'Comissão de Turismo;Turismo;Silas Bento;PSL;Zeidan Lula;PT;Fábio;316',
//        'Comissão para Prevenir e Combater a Pirataria no Estado do Rio de Janeiro;Prevenir e Combater a Pirataria no Estado do Rio de Janeiro;Dionisio Lins;PP;Zaqueu Teixeira;PSD;Charley;316',

Artisan::command('aloalerj:add-new-committees', function () {
    ini_set('memory_limit', '2048M');

    $current = [
        'Comissão de Assuntos da Criança, do Adolescente e do Idoso;Assuntos da Criança, do Adolescente e do Idoso;Tia Ju ;PRB;Tio Carlos ; SD ;João Batista;316',
        'Comissão de Assuntos Municipais e de Desenvolvimento Regional;Assuntos Municipais e de Desenvolvimento Regional;Márcia Jeovani;DEM;Wanderson Nogueira;PSOL;Fernando;316',
        'Comissão de Emendas Constitucionais e Vetos;Emendas Constitucionais e Vetos;Marcos Muller;PHS;Marcos Abrahão;AVANTE;Emil;316',
        'Comissão de Minas e Energia;Minas e Energia;Filipe Soares;DEM;Osório;PSDB;Valéria;316',
        'Comissão de Legislação Constitucional Complementar e Códigos;Legislação Constitucional Complementar e Códigos;Bruno Dauaire;PRP;Carlos Minc;PSB;Anderson;316',
        'Comissão de Obras Públicas;Obras Públicas;Iranildo Campos;SD;;MDB;Cecília;316',
        'Comissão de Normas Internas e Proposições Externas;Normas Internas e Proposições Externas;Dica;PR;Coronel Jairo;SDD;Cláudia;316',
        'Comissão de Saúde;Saúde;Fábio Silva;DEM;Dr. Deodalto;DEM;Fernando;316',
        'Comissão de Redação;Redação;Coronel Jairo;SDD;;MDB;Tatiana;316',
        'Comissão de Servidores Públicos;Servidores Públicos;Nivaldo Mulim;PR;;MDB;Alexandre;316',
        'Comissão de Transportes;Transportes;Marcelo Simão;PP;Dionísio Lins;PP;Viviane;316',
        'ALÔ ALERJ;ALÔ ALERJ;;;;;;',
    ];

    collect($current)->each(function ($committee) {
        $columns = explode(';', $committee);

        if (Committee::where('name', trim($columns[0]))->first()) {
            return;
        }

        $this->info("adding " . trim($columns[0]));

        Committee::create([
            'name' => trim($columns[0]),
            'slug' => trim(str_slug($columns[1])),
            'short_name' => trim($columns[1]),
            'link_caption' => trim($columns[1]),
            'phone' => trim(''),
            'bio' => trim(''),
            'president' => trim($columns[2]),
            'vice_president' => trim($columns[3]),
            'office_phone' => trim(''),
            'office_address' => trim(''),
        ]);
    });
})->describe('fix committee_id');

//    foreach (
//        Record::whereNull('committee_id')
//            ->where('created_at', '<', '2018-08-28')
//            ->cursor()
//        as $record
//    ) {
//
//
//        increment('RECORDS', 100, "record", $current);
//    }
Artisan::command('aloalerj:fix-committee-names', function () {
    ini_set('memory_limit', '2048M');

    Committee::all()->map(function ($committee) {
        $committee->name = trim($committee->name);

        $committee->save();
    });

    Committee::where(
        'name',
        'Comissão de Para Prevenir e Combater Pirataria no Estado do Rio de Janeiro'
    )->update([
        'name' =>
            'Comissão para Prevenir e Combater a Pirataria no Estado do Rio de Janeiro',
    ]);
    Committee::where(
        'name',
        'Comissão de Trabalho Legislação Social e Seguridade Social'
    )->update([
        'name' => 'Comissão de Trabalho, Legislação Social e Seguridade Social',
    ]);
    Committee::where(
        'name',
        'Comissão de Assuntos da Criança do Adolescente e do Idoso'
    )->update([
        'name' => 'Comissão de Assuntos da Criança, do Adolescente e do Idoso',
    ]);
    Committee::where(
        'name',
        'Comissão de Agricultura Pecuária e Políticas Rural Agraria e Pesqueira'
    )->update([
        'name' =>
            'Comissão de Agricultura, Pecuária e Políticas Rural, Agrária e Pesqueira',
    ]);
    Committee::where(
        'name',
        'Comissão de Política Urbana Habitação e Assuntos Fundiários'
    )->update([
        'name' =>
            'Comissão de Política Urbana, Habitação e Assuntos Fundiários',
    ]);
    Committee::where(
        'name',
        'Comissão de Orçamento Finanças Fiscalização Financeira e Controle'
    )->update([
        'name' =>
            'Comissão de Orçamento, Finanças, Fiscalização Financeira e Controle',
    ]);
    Committee::where(
        'name',
        'Comissão de Economia Indústria e Comércio'
    )->update(['name' => 'Comissão de Economia, Indústria e Comércio']);
    Committee::where(
        'name',
        'Comissão de Comissão de Ciência e Tecnologia'
    )->update(['name' => 'Comissão de Ciência e Tecnologia']);
    Committee::where(
        'name',
        'Comissão de Tributação Controle da Arrecadação Estadual e de Fiscalização dos Tributos Estaduais'
    )->update([
        'name' =>
            'Comissão de Tributação, Controle da Arrecadação Estadual e de Fiscalização dos Tributos Estaduais',
    ]);
})->describe('fix committee_id');

Artisan::command('aloalerj:fix-null-commitees', function () {
    ini_set('memory_limit', '2048M');

    $current = [];

    $commitees = [
        'Abuso aos direitos humanos' =>
            'Comissão de Defesa dos Direitos Humanos e Cidadania',
        'Animais' => 'Comissão de Proteção ao Direito dos Animais',
        'Assuntos trabalhistas' =>
            'Comissão de Trabalho, Legislação Social e Seguridade Social',
        'Crianças' =>
            'Comissão de Assuntos da Criança, do Adolescente e do Idoso',
        'Crianças e Adolescentes Desaparecidos' =>
            'Comissão de Assuntos da Criança, do Adolescente e do Idoso',
        'Educação' => 'Comissão de Educação',
        'Esporte e Lazer' => 'Comissão de Esporte e Lazer',
        'Estudantes' => 'Comissão de Educação',
        'Habitação' =>
            'Comissão de Política Urbana Habitação e Assuntos Fundiários',
        'Idosos' =>
            'Comissão de Assuntos da Criança, do Adolescente e do Idoso',
        'Mulheres' => 'Comissão de Defesa dos Direitos da Mulher',
        'Pessoa com deficiência' => 'Comissão de Pessoa com Deficiência',
        'Segurança' => 'Comissão de Segurança Pública e Assuntos de Polícia',
        'Defesa do Consumidor' => 'Comissão de Defesa do Consumidor',
        'Defesa dos Direitos dos Animais' =>
            'Comissão de Proteção ao Direito dos Animais',
        'Saneamento Ambiental' => 'Comissão de Saneamento Ambiental',
        'Meio ambiente' => 'Comissão de Defesa do Meio Ambiente',
        'Trabalho Legislação Social e Seguridade Social' =>
            'Comissão de Trabalho, Legislação Social e Seguridade Social',
        'Pessoa Deficiente' => 'Comissão de Pessoa com Deficiência',
        'Defesa dos Direitos da Mulher' =>
            'Comissão de Defesa dos Direitos da Mulher',
        'Idoso' => 'Comissão de Assuntos da Criança, do Adolescente e do Idoso',
        'Defesa dos Direitos Humanos e Cidadania' =>
            'Comissão de Defesa dos Direitos Humanos e Cidadania',
        'Assuntos da Criança e do Adolescente' =>
            'Comissão de Assuntos da Criança, do Adolescente e do Idoso',
        'Segurança Alimentar' => 'Comissão de Segurança Alimentar',
        'Segurança Pública' =>
            'Comissão de Segurança Pública e Assuntos de Polícia',
        'Preconceitos' =>
            'Comissão de Combate às Discriminações e Preconceitos de Raça, Cor, Etnia, Religião e Procedência Nacional',
        'Pirataria' =>
            'Comissão para Prevenir e Combater a Pirataria no Estado do Rio de Janeiro',
        'Defesa do consumidor' => 'Comissão de Defesa do Consumidor',
        'Trabalho Legislação Social e Seguridade Social' =>
            'Comissão de Trabalho, Legislação Social e Seguridade Social',
        'Contribuinte,Defesa do consumidor' =>
            'Comissão de Defesa do Consumidor',
        'Tributação, Controle da Arrecadação Estadual e de Fiscalização dos Tributos Estaduais' =>
            'Comissão de Tributação, Controle da Arrecadação Estadual e de Fiscalização dos Tributos Estaduais',
        'Ação social' =>
            'Comissão de Trabalho, Legislação Social e Seguridade Social',
        'Orçamento participativo' =>
            'Comissão de Orçamento, Finanças, Fiscalização Financeira e Controle',
        'Saúde' => 'Comissão de Saúde',
        'Transportes' => 'Comissão de Transportes',
        'Empresa Privada' =>
            'Comissão de Defesa dos Direitos Humanos e Cidadania',
        'Desconhecido' => 'ALÔ ALERJ',
        'Empresa Pública' =>
            'Comissão de Orçamento, Finanças, Fiscalização Financeira e Controle',
        'Infra-estrutura' => 'Comissão de Obras Públicas',
        'Concursos públicos' => 'Comissão de Servidores Públicos',
        'Leis' => 'Comissão de Constituição e Justiça',
        'Multas' => 'Comissão de Transportes',
        'Contribuinte' =>
            'Comissão de Tributação, Controle da Arrecadação Estadual e de Fiscalização dos Tributos Estaduais',
        'Outros' => 'ALÔ ALERJ',
        'ALÔ-ALERJ' => 'ALÔ ALERJ',
        'ALÔ ALERJ' => 'ALÔ ALERJ',
        'Nenhum' => 'ALÔ ALERJ',
    ];

    foreach (
        Record::with(['area'])
            ->whereNull('committee_id')
            ->where('area_id', '!=', 999999)
            ->cursor()
        as $record
    ) {
        $old = $record->area->name;

        if (!$commitees[$old]) {
            continue;
        }

        $new = Cache::remember($record->area->name, 10, function () use (
            $old,
            $commitees
        ) {
            $this->info("find for {$old} = {$commitees[$old]}");

            return Committee::where('name', $commitees[$old])->first();
        });

        if (!$new) {
            dd('NOT FOUND: ' . $commitees[$old]);
        }

        $record->committee_id = $new->id;
        $record->save();

        increment('RECORDS', 100, "record", $current);
    }
})->describe('fixdata');

Artisan::command('aloalerj:dedup-aloalerj', function () {
    ini_set('memory_limit', '2048M');

    if (is_null($bad = Area::where('name', 'ALÔ-ALERJ')->first())) {
        $this->info('already done');

        return;
    }

    $good = Area::where('name', 'ALÔ ALERJ')->first();

    Record::where('area_id', $bad->id)->update(['area_id' => $good->id]);

    $bad->delete();

    $this->info('done');
})->describe('fixdata');
