<?php

namespace App\Rules;

use App\Data\Models\Committee;
use Illuminate\Contracts\Validation\Rule;

//Esta regra dita se o usuário autenticado está permitido a marcar uma comissão como responsável pelo protocolo, a partir do campo "Comissão"
class AuthorizedCommitteeUser implements Rule
{
    private $committeeName;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $this->committeeName = Committee::find($value)->name ?? '';

        //Atualmente, o usuário só pode atribuir o protocolo a comissões às quais pertence
        return $value &&
            \Gate::allows('committee-canEdit', [$value, auth()->user()->id]);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return "Você não está autorizado a alterar o protocolo para a comissão {$this->committeeName}.";
    }
}
