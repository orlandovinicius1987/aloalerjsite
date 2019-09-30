<?php
namespace App\Http\Controllers;

use App\Data\Repositories\Committees as CommitteesRepository;

class Pages extends Controller
{
    public function committees()
    {
        return view('pages.committees')->with(
            'committees',
            app(CommitteesRepository::class)->getPublicCommittees()
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
