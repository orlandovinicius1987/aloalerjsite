<?php
namespace App\Http\Controllers\Api;

use Auth;
use App\Http\Controllers\Controller;
//use PragmaRX\ZipCode\Contracts\ZipCode as ZipCodeContract;
use Canducci\ZipCode\Contracts\ZipCodeContract;

class ZipCode extends Controller
{
    protected $zipcodeContract;

    public function __construct(ZipCodeContract $zipcodeContract)
    {
        $this->zipcodeContract = $zipcodeContract;
    }

    public function get($zipCode)
    {
        if (strlen(only_numbers($zipCode)) >= 8) {
            return $this->zipcodeContract->find($zipCode, true)->getArray();
        }
    }
}
