<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEmailSentAt extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('records', function (Blueprint $table) {
            $table->timestamp('email_sent_at')->nullable();
        });

        Schema::table('progresses', function (Blueprint $table) {
            $table->timestamp('email_sent_at')->nullable();
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
            $table->dropColumn('email_sent_at');
        });

        Schema::table('progresses', function (Blueprint $table) {
            $table->dropColumn('email_sent_at');
        });
    }
}
