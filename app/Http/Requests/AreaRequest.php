<?php
namespace App\Http\Requests;

class AreaRequest extends Request
{
    public function authorize()
    {
        if ($updating = !!request()->get('id')) {
            return \Auth::user()->can('areas:update');
        } else {
            return \Auth::user()->can('areas:store');
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'required_without' => 'O campo nome não pode ser vazio.'
        ];
    }
}
