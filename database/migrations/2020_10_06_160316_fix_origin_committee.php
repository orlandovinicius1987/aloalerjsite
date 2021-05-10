<?php

use App\Models\Audit as AuditModel;
use App\Models\Committee as CommitteeModel;
use App\Models\User as UserModel;
use Illuminate\Database\Migrations\Migration;
use App\Models\Progress as ProgressModel;
use Carbon\Carbon;

class FixOriginCommittee extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        foreach (
            ProgressModel::whereDate(
                'created_at',
                '>=',
                Carbon::createFromFormat('Y-m-d', '2020-08-01')
            )
                //                ->whereNull('created_by_id')
                ->where('progress_type_id', 66)
                ->cursor()
            as $progress
        ) {
            $audit = AuditModel::where('auditable_id', $progress->id)
                ->where('event', 'created')
                ->where('auditable_type', 'App\Models\Progress')
                ->first();
            //            dump($audit);
            //            ->user_id);

            if ($audit && ($userId = $audit->user_id)) {
                $progress->created_by_id = $userId;

                $progress->save();

                if ($creator = $progress->creator) {
                    $progress->created_by_committee_id = $creator->originCommittee()->id;
                } else {
                    $progress->created_by_committee_id = CommitteeModel::where(
                        'slug',
                        'alo-alerj'
                    )->first()->id;
                }

                dump(
                    "Alterando o progress {$progress->id} para a comissão {$progress->created_by_committee_id}"
                );

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
