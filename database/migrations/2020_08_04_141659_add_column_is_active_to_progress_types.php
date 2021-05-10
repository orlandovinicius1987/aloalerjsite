<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Data\Models\ProgressType as ProgressTypeModel;

class AddColumnIsActiveToProgressTypes extends Migration
{
    public $activeRows = ['Encaminhamento', 'Entrada', 'Finalização', 'Triagem', 'Resposta'];

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('progress_types', function (Blueprint $table) {
            $table->boolean('is_active')->default(false);
        });

        collect($this->activeRows)->each(function ($row) {
            ProgressTypeModel::updateOrCreate(
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
        Schema::table('progress_types', function (Blueprint $table) {
            $table->dropColumn('is_active');
        });

        //Can't go back with is_active or insert rows
    }
}
