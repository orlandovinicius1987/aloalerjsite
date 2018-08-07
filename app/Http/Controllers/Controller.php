<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use App\Data\Repositories\Areas as AreasRepository;
use App\Data\Repositories\Calls as CallsRepository;
use App\Data\Repositories\People as PeopleRepository;
use App\Data\Repositories\Origins as OriginsRepository;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Routing\Controller as IlluminateController;
use App\Data\Repositories\CallTypes as CallTypesRepository;
use App\Data\Repositories\Committees as CommitteesRepository;
use App\Data\Repositories\PersonAddresses as PersonAddressesRepository;
use App\Data\Repositories\PersonContacts as PersonContactsRepository;

abstract class Controller extends  IlluminateController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public $messageDefault = 'Gravado com sucesso';

    /**
     * @var Repository
     */
    protected $peopleRepository;
    protected $callsRepository;
    protected $peopleAddressesRepository;
    protected $peopleContactsRepository;
    protected $originsRepository;
    protected $committeesRepository;
    protected $callTypesRepository;
    protected $areasRepository;

    /**
     * Persons constructor.
     *
     * @param PeopleRepository $personRepository
     * @param CallsRepository $callsRepository
     * @param PersonAddressesRepository $peopleAddressesRepository
     * @param PersonContactsRepository $peopleContactsRepository
     * @param OriginsRepository $originsRepository
     * @param CommitteesRepository $committeesRepository
     * @param CallTypesRepository $callTypesRepository
     * @param AreasRepository $areasRepository
     * @internal param Repository $repository
     */
    public function __construct(
        PeopleRepository $personRepository,
        CallsRepository $callsRepository,
        PersonAddressesRepository $peopleAddressesRepository,
        PersonContactsRepository $peopleContactsRepository,
        OriginsRepository $originsRepository,
        CommitteesRepository $committeesRepository,
        CallTypesRepository $callTypesRepository,
        AreasRepository $areasRepository
    ) {
        $this->peopleRepository = $personRepository;
        $this->callsRepository = $callsRepository;
        $this->peopleAddressesRepository = $peopleAddressesRepository;
        $this->peopleContactsRepository = $peopleContactsRepository;
        $this->originsRepository = $originsRepository;
        $this->committeesRepository = $committeesRepository;
        $this->callTypesRepository = $callTypesRepository;
        $this->areasRepository = $areasRepository;

    }

    /**
     * @param string $message
     *
     * @return array
     */
    public function getSuccessMessage($message = null)
    {
        if (is_null($message)) {
            return ['status' => $this->messageDefault];
        } else {
            return ['status' => $message];
        }
    }

    public function getComboBoxMenus()
    {
        return [
            'committees' => $this->committeesRepository->all(),
            'callTypes' => $this->callTypesRepository->all(),
            'areas' => $this->areasRepository->all(),
            'origins' => $this->originsRepository->all(),
        ];
        //app(TiposLeisRepository::class)->allOrderBy('nome')->pluck('nome', 'id'),
    }
}
