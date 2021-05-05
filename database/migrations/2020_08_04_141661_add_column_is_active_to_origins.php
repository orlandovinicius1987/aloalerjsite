<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\Origin as OriginModel;

class AddColumnIsActiveToOrigins extends Migration
{
    public $activeRows = ['Lei de Acesso a Informação', '0800', 'Chat', 'Whatsapp', 'E-mail', 'Telegram'];

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('origins', function (Blueprint $table) {
            $table->boolean('is_active')->default(false);
        });

        collect($this->activeRows)->each(function ($row) {
            OriginModel::updateOrCreate(
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
        Schema::table('origins', function (Blueprint $table) {
            $table->dropColumn('is_active');
        });

        //Can't go back with is_active or insert rows
    }
}
