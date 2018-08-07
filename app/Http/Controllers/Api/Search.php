<?php

namespace App\Http\Controllers\Api;

use App\Data\Repositories\PersonsRepository;
use App\Http\Controllers\Controller;

class Search extends Controller
{
    public function execute()
    {
        return app(PersonsRepository::class)->searchByEverything(
            request()->get('search')
        );
    }
}
