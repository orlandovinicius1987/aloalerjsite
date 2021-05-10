<?php

namespace App\Console\Commands;

use App\Data\Models\Person;
use App\Data\Models\PersonAddress;
use App\Data\Models\PersonContact;
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
    protected $signature = 'aloalerj:unify-people {person_id_from} {person_id_to}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Unify two person id in one, the first person id will be deleted';

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
        $person_id_from = $this->argument('person_id_from');
        $person_id_to = $this->argument('person_id_to');

        $personFrom = Person::where('id', $person_id_from)->first();
        $personTo = Person::where('id', $person_id_to)->first();

        if ($personFrom && $personTo) {
            dump('Updating users ' . $personFrom->name . ' -> ' . $personTo->name);

            RecordModel::withoutGlobalScopes()
                ->where('person_id', $personFrom->id)
                ->get()
                ->each(function ($record) use ($personFrom, $personTo) {
                    dump(
                        "Updating record {$record->protocol} from {$personFrom->name} to {$personTo->name}"
                    );
                    $record->person_id = $personTo->id;
                    $record->save();
                });

            PersonContact::where('person_id', $personFrom->id)
                ->get()
                ->each(function ($personContact) use ($personFrom, $personTo) {
                    if (
                        $personContactTo = PersonContact::where('person_id', $personTo->id)
                            ->where('contact', $personContact->contact)
                            ->first()
                    ) {
                        dump(
                            "Já existe o contato {$personContact->contact} para {$personTo->name} "
                        );
                        $personContactTo->status = $personFrom->status;
                        $personContactTo->save();

                        $personContact->delete();
                    } else {
                        dump(
                            "Updating Contact {$personContact->contact} from {$personFrom->name} to {$personTo->name}"
                        );
                        $personContact->person_id = $personTo->id;
                        $personContact->save();
                    }
                });

            PersonAddress::where('person_id', $personFrom->id)
                ->get()
                ->each(function ($personAddress) use ($personFrom, $personTo) {
                    if (
                        $personAddressTo = PersonAddress::where('person_id', $personTo->id)
                            ->where('zipcode', $personAddress->zipcode)
                            ->where('number', $personAddress->number)
                            ->first()
                    ) {
                        dump(
                            "Já existe o endereço {$personAddressTo->zipcode} {$personAddressTo->number} " .
                                "para {$personTo->name} "
                        );

                        $personAddressTo->status = $personAddress->status;
                        $personAddressTo->save();

                        $personAddress->delete();
                    } else {
                        dump(
                            "Updating Address {$personAddress->zipcode} {$personAddress->number}" .
                                " from {$personFrom->name} to {$personTo->name}"
                        );
                        $personAddress->person_id = $personTo->id;

                        $personAddress->save();
                    }
                });
            $personFrom->delete();
        } else {
            dump('Informe um id válido');
        }
    }
}
