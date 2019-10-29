<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class DateBetween implements Rule
{
    protected $initialDate;
    protected $finalDate;

    /**
     * Create a new rule instance.
     *
     * @return void
     */

    public function __construct($initialDate, $finalDate)
    {
        $this->initialDate = $initialDate;
        $this->finalDate = $finalDate;
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
        return 'A data inicial não pode ser maior que a data final.';
    }
}
