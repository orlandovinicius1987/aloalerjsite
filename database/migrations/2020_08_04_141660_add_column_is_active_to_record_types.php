<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Data\Models\RecordType as RecordTypeModel;

class AddColumnIsActiveToRecordTypes extends Migration
{
    public $activeRows = [
        'Elogio',
        'Agradecimento',
        'Demanda sem Clareza',
        'Denúncia',
        'Informação',
        'Outros',
        'Pedido',
        'Queda de Ligação',
        'Reclamação',
        'Reenvio de protocolo',
        'Sugestão'
    ];

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('record_types', function (Blueprint $table) {
            $table->boolean('is_active')->default(false);
        });

        collect($this->activeRows)->each(function ($row) {
            RecordTypeModel::updateOrCreate(
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
        Schema::table('record_types', function (Blueprint $table) {
            $table->dropColumn('is_active');
        });

        //Can't go back with is_active or insert rows
    }
}
