<?php

namespace App\Data\Presenters;

class Progress extends Base
{
    public function link()
    {
        $id = $this->wrappedObject->id;

        return route('progresses.show', ['id' => $id]);
    }

    public function finalize()
    {
        $finalize = $this->wrappedObject->record->resolve_progress_id;
        return $finalize ? true : false;
    }
}
