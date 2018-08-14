<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropAnswerFromRecord extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('records', function (Blueprint $table) {
            $table->dropColumn('answer');

            $table->dropColumn('answered_at');

            $table->dropColumn('answered_by_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('records', function (Blueprint $table) {
            $table->text('answer')->nullable();

            $table->timestamp('answered_at')->nullable();

            $table
                ->integer('answered_by_id')
                ->nullable()
                ->unsigned()
                ->index();
        });
    }
}
