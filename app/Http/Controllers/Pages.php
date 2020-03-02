<?php
namespace App\Http\Controllers;

use App\Data\Repositories\CommitteeServices as CommitteeServicesRepository;

class Pages extends Controller
{
    public function committees()
    {
        return view('pages.committees')->with(
            'committeeServices',
            app(CommitteeServicesRepository::class)->getPublicServices()
        );
    }

    public function aloalerj()
    {
        return view('pages.aloalerj');
    }

    public function telefones()
    {
        return view('pages.telefones');
    }

    public function protocolo()
    {
        return view('pages.telefones');
    }

    public function contact()
    {
        return view('pages.contact');
    }
}
