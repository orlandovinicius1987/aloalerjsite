<?php
namespace App\Http\Requests;

class ProgressRequest extends Request
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
            'original' => 'required',
            'progress_type_id' => 'required',
        ];
    }

    public function authorize()
    {
        return \Gate::allows('committee-canEdit', [
            $this->request->get('committee_id'),
            $this->user()->id,
        ]);
    }
}
