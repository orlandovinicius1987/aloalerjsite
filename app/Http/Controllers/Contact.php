<?php

namespace App\Http\Controllers;

use App\Http\Requests\Contact as ContactRequest;

class Contact extends Controller
{
    public function index()
    {
        return view('contact.index');
    }

    public function post(ContactRequest $request)
    {
        return view('contact.mailsent')
                ->with('name', $request->get('name'));
    }
}
