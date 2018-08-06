<?php

namespace App\Http\Controllers\Api;

use Auth;
use App\Http\Controllers\Controller;
use PragmaRX\ZipCode\Contracts\ZipCode as ZipCodeContract;

class ZipCode extends Controller
{
    protected $zipcode;

    public function __construct(ZipCodeContract $zipcode)
    {
        $this->zipcode = $zipcode;
    }

    public function get($zipCode)
    {
        return $this->zipcode->find($zipCode);
    }
}
