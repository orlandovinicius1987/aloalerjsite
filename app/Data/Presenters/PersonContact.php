<?php

namespace App\Data\Presenters;

class PersonContact extends Base
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
