<?php
namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Data\Models\ContactType;

class ContactWorkflow extends Contact
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return $this->regexRules($attribute, $value);
    }

    public function message()
    {
        return 'O campo :attribute não está em um formato válido.';
    }
}
