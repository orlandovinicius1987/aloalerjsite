<?php
namespace App\Http\Requests;

class CommitteeServiceRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'short_name' => 'required',
            'bio' => 'required',
            'link_caption' => 'required'
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
