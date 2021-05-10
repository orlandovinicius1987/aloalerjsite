<?php

namespace App\Console\Commands;

use App\Data\Repositories\Users as UsersRepository;
use Illuminate\Console\Command;
use App\Models\Audit as AuditModel;
use App\Models\Committee as CommitteeModel;
use App\Models\User as UserModel;
use App\Models\Progress as ProgressModel;
use Carbon\Carbon;
use App\Services\Authorization;

class fixEverything extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fix-everything';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        foreach (UserModel::cursor() as $user) {
            $permissions = app(Authorization::class)->getRemoteUserPermissions($user->username);

            app(UsersRepository::class)->updateCurrentUserTypeViaPermissions($permissions, $user);

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
                ->where('auditable_type', 'App\Models\Progress')
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
}
