<?php
namespace App\Http\Controllers;

use App\Services\Workflow;
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
use App\Data\Repositories\CommitteeServices as CommitteeServicesRepository;
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
    protected $committeeServicesRepository;
    protected $recordTypesRepository;
    protected $areasRepository;
    protected $contactTypesRepository;
    protected $progressesRepository;
    protected $progressTypesRepository;

    /**
     * People constructor.
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
        CommitteeServicesRepository $committeeServicesRepository,
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
        $this->committeeServicesRepository = $committeeServicesRepository;
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
        $committees = $this->committeesRepository->allOrderBy('name');
        $recordTypes = $this->recordTypesRepository->allOrderBy('name');
        $areas = $this->areasRepository->allOrderBy('name');
        $origins = $this->originsRepository->allOrderBy('name');
        $contactTypes = $this->contactTypesRepository->allOrderBy('name');
        $progressTypes = $this->progressTypesRepository->allOrderBy('name');

        return [
            'committees' => $committees,
            'recordTypes' => $recordTypes,
            'areas' => $areas,
            'origins' => $origins,
            'contactTypes' => $contactTypes,
            'progressTypes' => $progressTypes
        ];
    }

    protected function flashMessage($message, $type = 'success')
    {
        $alerts = session()->get('alerts') ?: [];

        $alerts[] = ['type' => $type, 'message' => $message];

        session()->flash('alerts', $alerts);
    }

    protected function showSuccessMessage($message = null)
    {
        $this->flashMessage($message ?? $this->messageDefault);
    }

    protected function getPublicCommitteeServices()
    {
        return app(CommitteeServicesRepository::class)->getPublicServices();
    }
}
