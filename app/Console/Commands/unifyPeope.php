<?php

namespace App\Console\Commands;

use App\Data\Models\Person;
use App\Data\Models\Record as RecordModel;
use App\Data\Repositories\Users as UsersRepository;
use Illuminate\Console\Command;
use App\Data\Models\Audit as AuditModel;
use App\Data\Models\Committee as CommitteeModel;
use App\Data\Models\User as UserModel;
use App\Data\Models\Progress as ProgressModel;
use Carbon\Carbon;
use App\Services\Authorization;

class unifyPeope extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'aloalerj:unify-People {person_id1} {person_id2}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Unify two person id in one, the second person id will be deleted';

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

        //dd($this->argument('person_id1') . $this->argument('person_id2') );
        $person_id_old = $this->argument('person_id1');
        $person_id_new = $this->argument('person_id2');

        $personOld = Person::where('id', $person_id_old)->first();
        $personNew = Person::where('id', $person_id_new)->first();


        if($person_id_old && $person_id_new) {


            dump('Updating users ' . $personOld->name . ' <- ' . $personNew->name);

            RecordModel::withoutGlobalScopes()
                ->where('person_id', $personNew->id)
                ->get()
                ->each(function ($record) use ($personOld, $personNew) {
                    dump(
                        "Updating record {$record->protocol} from {$personNew->name} to {$personOld->name}"
                    );
                    $record->person_id = $personOld->name;
//                    $record->save();
                });


        }else{
            dump('Informe um id válido');
        }
    }
}
