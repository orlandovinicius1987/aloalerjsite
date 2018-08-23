<?php
/**
 * Created by PhpStorm.
 * User: afdsilva
 * Date: 19/01/2018
 * Time: 16:28.
 */

namespace App\Data\Presenters;

class ProgressPresenter extends BasePresenter
{
    public function show_link()
    {
        $id = $this->wrappedObject->id;

        return route('progresses.show', ['id' => $id]);
    }
}
