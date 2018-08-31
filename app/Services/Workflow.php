<?php

namespace App\Services;

class Workflow
{
    public static function started()
    {
        return session()->get('workflow');
    }

    public static function start()
    {
        session()->put('workflow', true);
    }

    public static function end()
    {
        session()->forget('workflow');
    }
}
