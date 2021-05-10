<?php

use App\Models\Committee;
use App\Models\CommitteeService;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterCommitteesTableDropCollumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        $committees = Committee::all();

        foreach ($committees as $committee) {
            $committeeservice = new CommitteeService();
            $committeeservice->committee_id = $committee->id;
            $committeeservice->short_name = $committee->short_name;
            $committeeservice->link_caption = $committee->link_caption;
            $committeeservice->bio = $committee->bio;
            $committeeservice->public = $committee->public;
            $committeeservice->save();
        }
        Schema::table('committees', function (Blueprint $table) {
            $table->dropColumn('short_name');
            $table->dropColumn('link_caption');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('committees', function (Blueprint $table) {
            $table->string('short_name');
            $table->string('link_caption');
        });
    }
}
