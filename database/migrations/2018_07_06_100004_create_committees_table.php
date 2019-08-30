<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommitteesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('committees', function (Blueprint $table) {
            $table->increments('id');

            $table->string('slug');
            $table->string('name');
            $table->string('link_caption');
            $table->string('short_name');
            $table->string('phone');
            $table->text('bio');
            $table->string('president');
            $table->string('vice_president');
            $table->string('office_phone');
            $table->string('office_address');
            $table->string('public')->default(false);

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
        Schema::dropIfExists('committees');
    }
}
