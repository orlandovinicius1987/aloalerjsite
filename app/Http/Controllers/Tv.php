<?php
namespace App\Http\Controllers;

class Tv extends Controller
{
    public function index()
    {
        return view('tv.index')->with(
            'committeeServices',
            $this->getPublicCommitteeServices()
        );;
    }
}
