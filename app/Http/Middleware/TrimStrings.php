<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\TrimStrings as Middleware;

class TrimStrings extends Middleware
{
    /**
     * The names of the attributes that should not be trimmed.
     *
     * @var array
     */
    protected $except = ['password', 'password_confirmation'];

    public function doubleSpaceTrim($string)
    {
        $count = 0;
        do {
            $string = preg_replace("/\s\s/", " ", $string, -1, $count);
        } while ($count > 0);
        return $string;
    }

    /**
     * Transform the given value.
     *
     * @param  string  $key
     * @param  mixed  $value
     * @return mixed
     */
    protected function transform($key, $value)
    {
        $value = parent::transform($key, $value);

        if (in_array($key, $this->except, true)) {
            return $value;
        }

        return is_string($value) ? $this->doubleSpaceTrim($value) : $value;
    }
}
