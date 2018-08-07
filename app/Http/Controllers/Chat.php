<?php
namespace App\Http\Controllers;

class Chat extends BaseController
{
    public function index()
    {
        return view('chat.client.index')->with(['layout' => 'alerj-aloalerj']);
    }

    public function create()
    {
        return view('chat.client.create')->with(['layout' => 'alerj-aloalerj']);
    }

    public function terminated()
    {
        return view('chat.client.terminated')->with([
            'layout' => 'alerj-aloalerj',
        ]);
    }
}
