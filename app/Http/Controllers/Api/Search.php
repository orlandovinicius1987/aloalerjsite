<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Data\Repositories\People as PeopleRepository;

class Search extends Controller
{
    public function execute()
    {
        return app(PeopleRepository::class)->searchByEverything(request()->get('search'));
    }
}
