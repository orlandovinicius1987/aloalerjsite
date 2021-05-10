<?php

namespace App\Console\Commands;

use App\Data\Repositories\Users as UsersRepository;
use Illuminate\Console\Command;
use App\Data\Models\Audit as AuditModel;
use App\Data\Models\Committee as CommitteeModel;
use App\Data\Models\User as UserModel;
use App\Data\Models\Progress as ProgressModel;
use Carbon\Carbon;
use App\Services\Authorization;

class fixRecordCommittee extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'aloalerj:fix-record-commitee {created_at} {record_id?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fix the user_type and committes of the user ';

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
        if ($this->argument('created_at')) {
            $creation_start_at = $this->argument('created_at');
        }

        $progresses = ProgressModel::whereDate(
            'created_at',
            '>=',
            Carbon::createFromFormat('Y-m-d', $creation_start_at)
        );

        if ($this->argument('record_id')) {
            $progresses->where('record_id', $this->argument('record_id'));
        }

        //        dd($progresses->toSql());

        foreach ($progresses->cursor() as $progress) {
            $audit = AuditModel::where('auditable_id', $progress->id)
                ->where('event', 'created')
                ->where('auditable_type', 'App\Data\Models\Progress')
                ->first();
            //            dump($audit);
            //            ->user_id);

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
