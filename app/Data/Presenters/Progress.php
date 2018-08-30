<?php

namespace App\Data\Presenters;

class Progress extends Base
{
    public function link()
    {
        $id = $this->wrappedObject->id;

        return route('progresses.show', ['id' => $id]);
    }
}
