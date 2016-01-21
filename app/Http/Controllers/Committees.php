<?php

namespace App\Http\Controllers;

class Committees extends Controller
{
    public function view($pageName) {
        return view("committees.$pageName")->with('css', 'comissoes/comissao');
    }
}
