<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\ProgressType as ProgressTypeModel;

class InsertReopenProgressType extends Migration
{
    public $activeRows = ['Reabertura'];

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        collect($this->activeRows)->each(function ($row) {
            ProgressTypeModel::updateOrCreate(
                [
                    'name' => $row,
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
        collect($this->activeRows)->each(function ($row) {
            ProgressTypeModel::updateOrCreate(
                [
                    'name' => $row,
                ],
                ['is_active' => false]
            );
        });
    }
}
