<?php

namespace App\Services;

class Phone
{
    public static function addPhoneMask($phoneNumber, $cellphone = false)
    {
        if ($cellphone) {
            $pattern = '/(\d\d)(\d\d\d\d\d)(\d\d\d\d)/';
        } else {
            $pattern = '/(\d\d)(\d\d\d\d)(\d\d\d\d)/';
        }
        return preg_replace($pattern, '($1) $2-$3', $phoneNumber);
    }
}
