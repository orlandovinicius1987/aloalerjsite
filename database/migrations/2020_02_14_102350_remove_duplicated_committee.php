<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveDuplicatedCommittee extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        DB::table('records')
            ->where('committee_id', 40)
            ->update(['committee_id' => 9]);

        DB::table('records')
            ->where('committee_id', 20)
            ->update(['committee_id' => 2]);

        DB::table('user_committees')
            ->where('committee_id', 40)
            ->delete();

        DB::table('committees')
            ->where('id', 40)
            ->delete();

        DB::table('committees')
            ->where('id', 20)
            ->delete();

        DB::table('committee_services')
            ->where('committee_id', 40)
            ->update(['committee_id' => 9]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
