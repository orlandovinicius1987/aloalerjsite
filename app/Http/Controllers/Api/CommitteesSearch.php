<?php

namespace App\Http\Controllers\Api;

use App\Data\Repositories\Committees;
use App\Http\Controllers\Controller;

class CommitteesSearch extends Controller
{
    public function execute()
    {
        return app(Committees::class)->searchByEverything(request()->get('search'));
    }
}
