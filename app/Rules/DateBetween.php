<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class DateBetween implements Rule
{
    protected $initialDate;
    protected $finalDate;
    protected $fieldName;

    /**
     * Create a new rule instance.
     *
     * @return void
     */

    public function __construct($initialDate, $finalDate, $fieldName)
    {
        $this->initialDate = $initialDate;
        $this->finalDate = $finalDate;
        $this->fieldName = $fieldName;
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
        return $this->initialDate <= $this->finalDate;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'A data inicial ' .
            ($this->fieldName ? 'de ' . $this->fieldName . ' ' : ' ') .
            'não pode ser maior que a data final.';
    }
}
