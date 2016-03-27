<?php

namespace App\Http\Controllers;

use App\Http\Requests\Home as HomeRequest;
use Illuminate\Support\Facades\Session;

class Home extends Controller
{
    /**
     * @var HomeRequest
     */
    private $request;

    public function __construct(HomeRequest $request)
    {
        $this->request = $request;
    }

    private function checkClient()
    {
        if ($this->request->get('client') == 'app')
        {
            Session::put('client', 'app');
        }
    }

    public function index()
    {
        $this->checkClient();

        return view('home.index')->with('css', 'home')->with('home', true);
    }

    public function offline()
    {
        return $this->index()->with('offline', true);
    }
}
