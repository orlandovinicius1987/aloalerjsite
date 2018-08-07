<?php
namespace App\Http\Controllers\CallCenter;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;

class Home extends BaseController
{
    public function index()
    {
        return view('callcenter.home.index');
    }
}
