<?php

namespace App\Http\Controllers\Api;

use App\Data\Repositories\Origins;
use App\Http\Controllers\Controller;

class OriginsSearch extends Controller
{
    public function execute()
    {
        return app(Origins::class)->searchByEverything(request()->get('search'));
    }
}
