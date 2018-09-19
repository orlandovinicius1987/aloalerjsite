<?php
namespace App\Http\Controllers\Api;

use App\Data\Repositories\Committees;
use App\Data\Repositories\People as PeopleRepository;
use App\Http\Controllers\Controller;

class CommitteesSearch extends Controller
{
    public function execute()
    {
        info(request()->all());

        return app(Committees::class)->searchByEverything(
            request()->get('search')
        );
    }
}
