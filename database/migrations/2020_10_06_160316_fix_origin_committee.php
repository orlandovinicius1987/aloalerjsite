<?php

use App\Data\Models\Audit as AuditModel;
use App\Data\Models\Committee as CommitteeModel;
use App\Data\Models\User as UserModel;
use Illuminate\Database\Migrations\Migration;
use App\Data\Models\Progress as ProgressModel;
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
        foreach (UserModel::cursor() as $user) {
            $permissions = app(
                App\Services\Authorization::class
            )->getUserPermissions($user->username);

            app(
                App\Data\Repositories\Users::class
            )->updateCurrentUserTypeViaPermissions($permissions, $user);

            dump('Updating user ' . $user->username);
        }

        foreach (
            ProgressModel::whereDate(
                'created_at',
                '>=',
                Carbon::createFromFormat('Y-m-d', '2020-08-01')
            )
                ->whereNull('created_by_id')
                ->cursor()
            as $progress
        ) {
            $audit = AuditModel::where('auditable_id', $progress->id)
                ->where('event', 'created')
                ->where('auditable_type', 'App\Data\Models\Progress')
                ->first();

            if ($userId = $audit->user_id) {
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
