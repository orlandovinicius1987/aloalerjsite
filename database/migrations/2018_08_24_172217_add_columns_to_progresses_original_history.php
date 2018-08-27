<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToProgressesOriginalHistory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('progresses', function (Blueprint $table) {
            $table
                ->integer('original_history_id')
                ->unsigned()
                ->index()
                ->nullable();
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
            $table->dropColumn('original_history_id');
        });
    }
}
