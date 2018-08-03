<?php
/**
 * Created by PhpStorm.
 * User: afdsilva
 * Date: 26/07/2018
 * Time: 14:29
 */

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BaseRequest extends  FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}