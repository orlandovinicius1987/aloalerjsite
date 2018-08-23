<?php
namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use App\Data\Repositories\Areas as AreasRepository;
use App\Data\Repositories\Records as RecordsRepository;
use App\Data\Repositories\People as PeopleRepository;
use App\Data\Repositories\Origins as OriginsRepository;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Routing\Controller as IlluminateController;
use App\Data\Repositories\RecordTypes as RecordTypesRepository;
use App\Data\Repositories\Committees as CommitteesRepository;
use App\Data\Repositories\PersonAddresses as PersonAddressesRepository;
use App\Data\Repositories\PersonContacts as PersonContactsRepository;
use App\Data\Repositories\ContactTypes as ContactTypesRepository;
use App\Data\Repositories\Progresses as ProgressesRepository;
use App\Data\Repositories\ProgressTypes as ProgressTypesRepository;

abstract class Controller extends IlluminateController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public $messageDefault = 'Gravado com sucesso';

    /**
     * @var Repository
     */
    protected $peopleRepository;
    protected $recordsRepository;
    protected $peopleAddressesRepository;
    protected $peopleContactsRepository;
    protected $originsRepository;
    protected $committeesRepository;
    protected $recordTypesRepository;
    protected $areasRepository;
    protected $contactTypesRepository;
    protected $progressesRepository;
    protected $progressTypesRepository;

    /**
     * Persons constructor.
     *
     * @param PeopleRepository $personRepository
     * @param RecordsRepository $recordsRepository
     * @param PersonAddressesRepository $peopleAddressesRepository
     * @param PersonContactsRepository $peopleContactsRepository
     * @param OriginsRepository $originsRepository
     * @param CommitteesRepository $committeesRepository
     * @param RecordTypesRepository $recordTypesRepository
     * @param AreasRepository $areasRepository
     * @param ContactTypesRepository $contactTypesRepository
     * @param ProgressesRepository $progressesRepository
     * @param ProgressTypesRepository $progressTypesRepository
     * @internal param Repository $repository
     */
    public function __construct(
        PeopleRepository $personRepository,
        RecordsRepository $recordsRepository,
        PersonAddressesRepository $peopleAddressesRepository,
        PersonContactsRepository $peopleContactsRepository,
        OriginsRepository $originsRepository,
        CommitteesRepository $committeesRepository,
        RecordTypesRepository $recordTypesRepository,
        AreasRepository $areasRepository,
        ContactTypesRepository $contactTypesRepository,
        ProgressesRepository $progressesRepository,
        ProgressTypesRepository $progressTypesRepository
    ) {
        $this->peopleRepository = $personRepository;
        $this->recordsRepository = $recordsRepository;
        $this->peopleAddressesRepository = $peopleAddressesRepository;
        $this->peopleContactsRepository = $peopleContactsRepository;
        $this->originsRepository = $originsRepository;
        $this->committeesRepository = $committeesRepository;
        $this->recordTypesRepository = $recordTypesRepository;
        $this->areasRepository = $areasRepository;
        $this->contactTypesRepository = $contactTypesRepository;
        $this->progressesRepository = $progressesRepository;
        $this->progressTypesRepository = $progressTypesRepository;
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
        $committees = $this->committeesRepository->allWhereOperator(
            'bio',
            '<>',
            ''
        );
        $recordTypes = $this->recordTypesRepository->all();
        $areas = $this->areasRepository->all();
        $origins = $this->originsRepository->all();
        $contactTypes = $this->contactTypesRepository->all();
        $progressTypes = $this->progressTypesRepository->all();

        return [
            'committees' => $this->committeesRepository->allWhereOperator(
                'bio',
                '<>',
                ''
            ),
            'recordTypes' => $this->recordTypesRepository->all(),
            'areas' => $this->areasRepository->all(),
            'origins' => $this->originsRepository->all(),
            'contactTypes' => $this->contactTypesRepository->all(),
            'progressTypes' => $this->progressTypesRepository->all(),
        ];
    }

    protected function flashMessage($message, $type = 'success')
    {
        $alerts = session()->get('alerts') ?: [];

        $alerts[] = ['type' => $type, 'message' => $message];

        session()->flash("alerts", $alerts);
    }
}
