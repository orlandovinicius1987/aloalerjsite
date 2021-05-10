<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateAnonymousPerson extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $anonymous = \App\Data\Models\Person::where('is_anonymous', true)->first();

        $anonymous->cpf_cnpj = 'Não se aplica';
        $anonymous->name = 'Anônimo';
        $anonymous->identification = 'Não se aplica';
        $anonymous->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Can't go back
    }
}
