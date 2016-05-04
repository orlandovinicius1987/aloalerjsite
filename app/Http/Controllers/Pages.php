<?php

namespace App\Http\Controllers;

class Pages extends Controller
{
    public function show($page)
    {
        return view('pages.'.$page);
    }
}
