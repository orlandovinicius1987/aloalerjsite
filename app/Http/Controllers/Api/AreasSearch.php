<?php

namespace App\Http\Controllers\Api;

use App\Data\Repositories\Areas;
use App\Http\Controllers\Controller;

class AreasSearch extends Controller
{
    public function execute()
    {
        return app(Areas::class)->searchByEverything(
            request()->get('search')
        );
    }
}
