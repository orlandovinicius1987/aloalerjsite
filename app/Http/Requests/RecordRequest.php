<?php
namespace App\Http\Requests;

class RecordRequest extends Request
{
    protected $errorBag = 'validation';

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'origin_id' => 'required',
            'committee_id' => 'required',
            'record_type_id' => 'required',
            'progress_type_id' => 'required_without:record_id',
            'area_id' => 'required_without:record_id',
            'original' => 'required_without:record_id',
        ];
    }
}
