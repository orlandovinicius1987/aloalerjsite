<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FixAddressNumberNumeric extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('person_addresses', function (Blueprint $table) {
            $table
                ->string('number')
                ->nullable()
                ->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('person_addresses', function (Blueprint $table) {
            $table
                ->integer('number')
                ->nullable()
                ->change();
        });
    }
}
