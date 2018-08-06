<?php
namespace App\Http\Controllers;

use App\Data\Repositories\AreasRepository;
use App\Data\Repositories\CallsRepository;
use App\Data\Repositories\CallTypesRepository;
use App\Data\Repositories\CommitteesRepository;
use App\Data\Repositories\OriginsRepository;
use App\Data\Repositories\PersonsAddressesRepository;
use App\Data\Repositories\PersonsContactsRepository;
use App\Data\Repositories\PersonsRepository;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;

use Illuminate\Routing\Controller;
use PragmaRX\ZipCode\Contracts\ZipCode;

abstract class BaseController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public $messageDefault = 'Gravado com sucesso';

    /**
     * @var Repository
     */
    protected $personsRepository;
    protected $callsRepository;
    protected $personsAddressesRepository;
    protected $personsContactsRepository;
    protected $originsRepository;
    protected $committeesRepository;
    protected $callTypesRepository;
    protected $areasRepository;
    protected $zipcode;

    /**
     * Persons constructor.
     *
     * @param Repository $repository
     */
    public function __construct(
        PersonsRepository $personRepository,
        CallsRepository $callsRepository,
        PersonsAddressesRepository $personsAddressesRepository,
        PersonsContactsRepository $personsContactsRepository,
        OriginsRepository $originsRepository,
        CommitteesRepository $committeesRepository,
        CallTypesRepository $callTypesRepository,
        AreasRepository $areasRepository,
        ZipCode $zipcode
    ) {
        $this->personsRepository = $personRepository;
        $this->callsRepository = $callsRepository;
        $this->personsAddressesRepository = $personsAddressesRepository;
        $this->personsContactsRepository = $personsContactsRepository;
        $this->originsRepository = $originsRepository;
        $this->committeesRepository = $committeesRepository;
        $this->callTypesRepository = $callTypesRepository;
        $this->areasRepository = $areasRepository;
        $this->zipcode = $zipcode;
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
