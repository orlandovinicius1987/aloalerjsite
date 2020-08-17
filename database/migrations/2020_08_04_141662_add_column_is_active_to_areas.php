<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Data\Models\Area as AreaModel;

class AddColumnIsActiveToAreas extends Migration
{
    public $activeRows = [
        'ALERJ',
        'Agricultura, Pecuária, Políticas Rural, Agrária e Pesqueira',
        'Animais',
        'Asfalto e Pavimentação',
        'Assuntos trabalhistas',
        'Ciência e Tecnologia',
        'Concursos públicos',
        'Consumidor',
        'Crianças, Adolescentes e Idosos',
        'Cultura',
        'Defesa Civil',
        'Deputados',
        'Discriminações e Preconceitos',
        'Demanda sem clareza',
        'Denúncia',
        'Educação',
        'Esporte e Lazer',
        'Falta de fiscalização',
        'Habitação',
        'Iluminação Pública',
        'Leis',
        'Lixo',
        'Maus tratos',
        'Meio ambiente',
        'Mulheres',
        'Pandemia Covid-19',
        'Pessoa com deficiência',
        'Pirataria',
        'Prevenção às drogas',
        'Projetos de Lei',
        'Outros',
        'Saneamento Básico - Água e Esgoto',
        'Saúde',
        'Segurança Alimentar',
        'Segurança Pública',
        'Serviços Privados',
        'Serviços Públicos',
        'Transportes',
        'Turismo'
    ];

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('areas', function (Blueprint $table) {
            $table->boolean('is_active')->default(false);
        });

        collect($this->activeRows)->each(function ($row) {
            AreaModel::updateOrCreate(
                [
                    'name' => $row
                ],
                ['is_active' => true]
            );
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('areas', function (Blueprint $table) {
            $table->dropColumn('is_active');
        });

        //Can't go back with is_active or insert rows
    }
}
