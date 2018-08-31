<?php
namespace App\Http\Controllers\CallCenter;

use App\Http\Controllers\Controller;

class ContactTypes extends Controller
{
    public function array()
    {
        $array = [];
        $items = $this->contactTypesRepository->all();
        foreach ($items as $item) {
            $array[$item->id] = $item->code;
        }

        return $array;
    }
}
