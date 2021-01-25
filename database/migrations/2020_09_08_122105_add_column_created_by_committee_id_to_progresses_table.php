<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Data\Models\Progress;
use App\Data\Models\Committee;

class AddColumnCreatedByCommitteeIdToProgressesTable extends Migration
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
                ->integer('created_by_committee_id')
                ->nullable()
                ->unsigned()
                ->index();
        });

        foreach (Progress::withoutGlobalScopes()->cursor() as $progress) {
            if ($creator = $progress->creator) {
                $progress->created_by_committee_id = $creator->originCommittee()->id;
            } else {
                $progress->created_by_committee_id = Committee::where(
                    'slug',
                    'alo-alerj'
                )->first()->id;
            }
            dump(
                "Alterando o progress {$progress->id} para a comissão {$progress->created_by_committee_id}"
            );
            $progress->save();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('progresses', function (Blueprint $table) {
            $table->dropColumn('created_by_committee_id');
        });
    }
}
