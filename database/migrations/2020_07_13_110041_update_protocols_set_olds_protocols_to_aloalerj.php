<?php

use App\Data\Models\Committee;
use App\Data\Models\Record;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateProtocolsSetOldsProtocolsToAloalerj extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        $records = Record::all();
        $commitee = app(Committee::class)->where('slug','alo-alerj')->first();

        foreach ($records as $record) {
            dump('Atualzando o protocolo: ' . $record->protocol);
            $record->committee_id = $commitee->id;
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

    }
}
