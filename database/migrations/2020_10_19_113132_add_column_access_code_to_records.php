<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Data\Models\Record;
use Illuminate\Support\Str;

class AddColumnAccessCodeToRecords extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('records', function (Blueprint $table) {
            $table->text('access_code')->nullable();
        });

        foreach(
            Record::cursor() as $record
            
        ){
            $record->access_code = strtoupper(Str::random(4));
            dump('Atualizando o protocolo de id - '. $record->id);
            $record->save();
        }   
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('records', function (Blueprint $table) {
            $table->dropColumn('access_code');
        });
    }
}
