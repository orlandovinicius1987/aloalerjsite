<?php

namespace App\Data\Presenters;

use App\Support\Dates;
use McCool\LaravelAutoPresenter\BasePresenter as McCoolBasePresenter;

class Base extends McCoolBasePresenter
{
    use Dates;
}
