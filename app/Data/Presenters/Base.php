<?php

namespace App\Data\Presenters;

use McCool\LaravelAutoPresenter\BasePresenter as McCoolBasePresenter;

class Base extends McCoolBasePresenter
{
    public function created_at_formatted()
    {
        return $this->wrappedObject->created_at->format($this->getDateFormat());
    }

    private function getDateFormat()
    {
        return 'd/m/Y h:m:i';
    }

    public function updated_at_formatted()
    {
        return $this->wrappedObject->created_at ==
        $this->wrappedObject->created_at
            ? ''
            : $this->wrappedObject->updated_at->format($this->getDateFormat());
    }
}
