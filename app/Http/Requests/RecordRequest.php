<?php

namespace App\Http\Requests;

use App\Rules\AuthorizedCommitteeUser;
use App\Rules\ContactWorkflow;

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
            'mobile' => [$this->is_anonymous_protocol() ?
                '' :'required_without_all:whatsapp,phone,person_id'],
            'whatsapp' => [$this->is_anonymous_protocol() ?
                '' :'required_without_all:mobile,phone,person_id'],
            'email' => [$this->has_person() ? 'required_with:send_answer_by_email':''],
            'phone' => [$this->is_anonymous_protocol() ?
                '' :
                'required_without_all:mobile,whatsapp,person_id'],
        ];
    }

    private function has_person(){
        return is_null($this->person_id);
    }

    private function is_anonymous_protocol(){
        return $this->is_anonymous == 'true';
    }
}
