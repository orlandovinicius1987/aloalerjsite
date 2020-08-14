<?php

namespace App\Http\Requests;

use App\Rules\AuthorizedCommitteeUser;

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
            'origin_id' => 'required_without:record_id', // Origem → Workflow
            'committee_id' => ['required', new AuthorizedCommitteeUser()], // Comissão
            'record_type_id' => 'required', //Tipo
            //'progress_type_id' => 'required_without:record_id', // Assunto → Workflow
            'area_id' => 'required', //Area
            'cpf_cnpj'=>'required_if:is_anonymous,==,false',
            'name'=>'required_if:is_anonymous,==,false',
            'original' => 'required_without:record_id', // Solicitação  → Workflow
            'mobile' => ['required_without_all:is_anonymous,record_id'],
        ];
    }
}
