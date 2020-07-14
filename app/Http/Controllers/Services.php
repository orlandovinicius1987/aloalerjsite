<?php

namespace App\Http\Controllers;

use App\Data\Repositories\CommitteeServices as CommitteeServicesRepository;

class Services extends Controller
{

    protected $committeeServicesRepository;

    public function __construct(CommitteeServicesRepository $committeeServicesRepository)
    {
        $this->committeeServicesRepository = $committeeServicesRepository;
    }



    public function show($id)
    {
        return view('services.show')->with(
            'committeeService',
            $this->committeeServicesRepository->findById($id)
        )
            ->with(
                'committeeServices',
                $this->getPublicCommitteeServices()
            );
    }
}
