<?php

namespace App\Data\Presenters;

class PersonAddress extends Base
{
    public function active_string()
    {
        $active = $this->wrappedObject->active;
        if ($active) {
            return 'Ativo';
        } else {
            return 'Inativo';
        }
    }
}
