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


        $committee = app(Committee::class)->where('slug','alo-alerj')->first();

        if(!is_null($committee)) {

           $var =  DB::update('update records set committee_id = ? where id=id',[$committee->id]);
           dump('Atualizado ' . $var . ' protocolos.');
        }else{
            dump('Não foi Encontrada a comissão do alo-alerj');
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
