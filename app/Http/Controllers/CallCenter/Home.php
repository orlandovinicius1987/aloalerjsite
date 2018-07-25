<?php

namespace App\Http\Controllers\CallCenter;

use App\Http\Controllers\Controller;

class Home extends Controller
{
    public function index()
    {
        return view('callcenter.home.index');
    }
}
