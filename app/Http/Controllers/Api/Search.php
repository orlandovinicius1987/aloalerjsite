<?php

namespace App\Http\Controllers\Api;

use App\Data\Repositories\People as PeopleRepository;
use App\Http\Controllers\Controller;

class Search extends Controller
{
    public function execute()
    {
        return app(PeopleRepository::class)->searchByEverything(
            request()->get('search')
        );
    }
}
