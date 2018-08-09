<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('records', function (Blueprint $table) {
            $table->increments('id');

            $table
                ->integer('person_id')
                ->unsigned()
                ->index();

            $table
                ->string('protocol')
                ->index()
                ->nullable();

            $table
                ->integer('committee_id')
                ->nullable()
                ->unsigned()
                ->index();

            $table
                ->integer('record_type_id')
                ->unsigned()
                ->nullable()
                ->index();

            $table
                ->integer('area_id')
                ->unsigned()
                ->nullable()
                ->index();


            $table
                ->integer('record_action_id')
                ->index()
                ->unsigned()
                ->nullable();

            $table->integer('origin_id')->unsigned();

            $table
                ->integer('answer_address_id')
                ->unsigned()
                ->index()
                ->nullable();

            $table->boolean('send_answer_by_email')->default(true);

            $table->text('answer')->nullable();

            $table->timestamp('answered_at')->nullable();

            $table
                ->integer('answered_by_id')
                ->nullable()
                ->unsigned()
                ->index();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('records');
    }
}
