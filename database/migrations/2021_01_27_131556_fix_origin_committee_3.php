<?php

use App\Data\Models\Audit as AuditModel;
use App\Data\Models\Committee as CommitteeModel;
use App\Data\Models\User;
use Illuminate\Database\Migrations\Migration;
use App\Data\Models\Record as RecordModel;
use Carbon\Carbon;

class FixOriginCommittee3 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        foreach (
            RecordModel::withoutGlobalScopes()
                ->whereDate('created_at', '>=', Carbon::createFromFormat('Y-m-d', '2020-08-01'))
                ->whereDate('created_at', '<=', Carbon::createFromFormat('Y-m-d', '2020-12-01'))
                ->cursor()
            as $record
        ) {
            $progress = $record->firstProgress(false);

            $audit = AuditModel::where('auditable_id', $progress->id)
                ->where('event', 'created')
                ->where('auditable_type', 'App\Data\Models\Progress')
                ->first();

            if ($audit && ($userId = $audit->user_id)) {
                $oldCommitteeId = $progress->created_by_committee_id;

                $progress->created_by_id = $userId;

                $progress->save();

                if ($creator = User::find($userId)) {
                    $newCommitteeId = $progress->created_by_committee_id = $creator->originCommittee()->id;
                } else {
                    $newCommitteeId = $progress->created_by_committee_id = CommitteeModel::where(
                        'slug',
                        'alo-alerj'
                    )->first()->id;
                }

                if ($oldCommitteeId != $newCommitteeId) {
                    dump(
                        "Alterando o progress {$progress->id} da comissão {$oldCommitteeId} para a comissão {$newCommitteeId}"
                    );
                } else {
                    dump(
                        "Mantendo o progress {$progress->id} na comissão {$progress->created_by_committee_id}"
                    );
                }

                $progress->save();
            } else {
                dump(
                    "Não foi possível resgatar o audit do progress {$progress->id}. Audit encontrado = " .
                        $audit->id ??
                        'null'
                );
            }
        }
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
