<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Data\Models\Record;

class AlterUserAgentAuditsColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if ($emptyRecord = Record::find(1746774)) {
            $emptyRecord->delete();
            dump('O record ' . $emptyRecord->id . ' foi apagado com sucesso.');
        } else {
            dump('O record 1746774 não foi encontrado.');
        }

        Schema::table('audits', function (Blueprint $table) {
            $table->string('user_agent', 1023)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('audits', function (Blueprint $table) {
            $table->string('user_agent')->change();
        });
    }
}
