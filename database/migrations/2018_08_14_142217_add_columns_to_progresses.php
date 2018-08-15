<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToProgresses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('progresses', function (Blueprint $table) {
            $table->integer('origin_id')->unsigned();

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
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('progresses', function (Blueprint $table) {
            $table->dropColumn('origin_id');
            $table->dropColumn('record_type_id');
            $table->dropColumn('area_id');
        });
    }
}
