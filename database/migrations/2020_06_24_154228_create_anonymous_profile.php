<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnonymousProfile extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        \App\Data\Models\Person::insert([
            'cpf_cnpj' => 'Não se aplica',
            'name' => 'Anônimo',
            'identification' => 'Não se aplica',
            'is_anonymous' => true

        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \App\Data\Models\Person::where('is_anonymous', true)->first()->delete();
    }
}
