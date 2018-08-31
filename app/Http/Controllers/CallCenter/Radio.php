<?php
namespace App\Http\Controllers\CallCenter;

use App\Http\Controllers\Controller;

class Radio extends Controller
{
    public function index()
    {
        return view('radio.index');
    }
}
