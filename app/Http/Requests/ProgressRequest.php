<?php
namespace App\Http\Requests;

class ProgressRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return ['origin_id' => 'required', 'original' => 'required'];
    }
}
