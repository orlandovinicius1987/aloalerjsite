<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Data\Models\Record as Record;

class ValidatePublicSearch implements Rule
{
    public $array;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($array)
    {
        $this->array = $array;
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
        $record = Record::where('protocol', $this->array['protocol'])->first();

        if ($record) {
            if (is_null($record->access_code)) {
                return true;
            } else {
                return $record->access_code == $this->array['access_code'];
            }
        } else {
            return false;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Dados Inválidos';
    }
}
