<?php
namespace App\Http\Controllers;

class Pages extends BaseController
{
    public function show($page)
    {
        return view('pages.' . $page);
    }
}
