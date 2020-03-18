<?php
namespace App\Http\Controllers;

use App\Http\Requests\Home as HomeRequest;
use Carbon\Carbon;
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
        if ($this->request->get('client') == 'app') {
            Session::put('client', 'app');
        }
    }

    public function index()
    {
        $this->checkClient();

        return view('home.index')
            ->with('css', 'home')
            ->with('home', true)
            ->with('offline', $this->checkOffline())
            ->with(
                'committeeServices',
                $this->getPublicCommitteeServices()
            );;
    }

    public function offline()
    {
        return $this->index()->with('offline', true);
    }

    private function checkOffline()
    {
        $now = Carbon::now();

        return $now->hour >= 19 || $now->hour < 8 || $now->isWeekend();
    }
}
