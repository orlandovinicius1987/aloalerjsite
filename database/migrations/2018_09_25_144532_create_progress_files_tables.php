<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgressFilesTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('progress_files', function (Blueprint $table) {
            $table->increments('id');

            $table->text('description');
            $table
                ->integer('file_id')
                ->unsigned()
                ->index();
            $table
                ->integer('progress_id')
                ->unsigned()
                ->index();

            $table->timestamps();
        });

        Schema::create('files', function (Blueprint $table) {
            $table->increments('id');

            $table->text('url');
            $table->text('sha1_hash');

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
        Schema::dropIfExists('progress_files');
        Schema::dropIfExists('files');
    }
}
