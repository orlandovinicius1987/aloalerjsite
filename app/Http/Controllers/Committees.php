<?php

namespace App\Http\Controllers;

use App\Data\Models\Committee as CommitteeData;

class Committees extends Controller
{
    public function view($pageName) {
        return view("committees.$pageName")->with('css', 'comissoes/comissao');
    }

    public function show($committeeName)
    {
        $committee_data = new CommitteeData();
        return view('committees.show', ['committee' => $committee_data->find($committeeName)]);
    }
}
