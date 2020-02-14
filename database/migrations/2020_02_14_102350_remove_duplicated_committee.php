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
    static $duplicateRecords =  [1740857,1740542,1740514,1740447,1740357,1740241];

    public function up()
    {
        //create backup, if fallback
        DB::table('records')
                    ->where('committee_id',40)
                    ->update(['committee_id'=> 9]);

        DB::table('user_committees')
            ->where('committee_id',40)
            ->delete();

        DB::table('committees')
            ->where('id',40)
            ->delete();
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
