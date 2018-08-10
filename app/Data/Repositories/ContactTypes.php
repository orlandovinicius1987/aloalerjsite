<?php
namespace App\Data\Repositories;

use App\Data\Models\ContactType;

class ContactTypes extends BaseRepository
{
    /**
     * @var $model
     */
    protected $model = ContactType::class;
}
