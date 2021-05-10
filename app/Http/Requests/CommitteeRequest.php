<?php
namespace App\Http\Requests;

class CommitteeRequest extends Request
{
    public function authorize()
    {
        if ($updating = !!request()->get('id')) {
            return \Auth::user()->can('committees:update');
        } else {
            return \Auth::user()->can('committees:store');
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
            'name' => 'required',
            //'short_name' => 'required',
            'phone' => 'required',
            'bio' => 'required',
            'president' => 'required',
            'vice_president' => 'required',
            'office_phone' => 'required',
            'office_address' => 'required',
            'public' => 'required',
            'email' => 'sometimes|nullable|email',
            //'link_caption' => 'required',
            'slug' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'required_without' => 'O campo solicitação não pode ser vazio.'
        ];
    }

    /**
     * @return array
     */
    public function sanitize()
    {
        $input = $this->all();

        $input['public'] = !empty($this->get('public')) && $input['public'] ? true : false;

        $this->replace($input);

        return $this->all();
    }
}
