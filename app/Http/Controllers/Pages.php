<?php
namespace App\Http\Controllers;

use App\Data\Repositories\CommitteeServices as CommitteeServicesRepository;

class Pages extends Controller
{
    public function committees()
    {
        return view('pages.committees')->with(
            'committeeServices',
            $this->getPublicCommitteeServices()
        );
    }

    public function aloalerj()
    {
        return view('pages.aloalerj')->with(
            'committeeServices',
            $this->getPublicCommitteeServices()
        );
    }

    public function telefones()
    {
        return view('pages.telefones')->with(
            'committeeServices',
            $this->getPublicCommitteeServices()
        );
    }

    public function protocolo()
    {
        return view('pages.telefones')->with(
            'committeeServices',
            $this->getPublicCommitteeServices()
        );
    }

    public function contact()
    {
        return view('pages.contact')->with(
            'committeeServices',
            $this->getPublicCommitteeServices()
        );
    }
}
