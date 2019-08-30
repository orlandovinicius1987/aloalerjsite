<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('progresses', function (Blueprint $table) {
            $table->increments('id');

            $table
                ->integer('record_id')
                ->index()
                ->unsigned()
                ->nullable();

            $table
                ->integer('progress_type_id')
                ->index()
                ->unsigned()
                ->nullable();

            $table->text('original');

            $table->text('rectified')->nullable();

            $table->timestamp('rectified_at')->nullable();

            $table
                ->integer('rectified_by_id')
                ->nullable()
                ->unsigned()
                ->index();

            $table->timestamps();

            $table
                ->integer('created_by_id')
                ->index()
                ->unsigned()
                ->nullable();

            $table->json('history_fields')->nullable();

            $table->index('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('progresses');
    }
}
