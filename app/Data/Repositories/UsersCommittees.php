<?php
namespace App\Data\Repositories;

use App\Data\Models\UserCommittee;

class UsersCommittees extends BaseRepository
{
    /**
     * @var $model
     */
    protected $model = UserCommittee::class;

    public function userHasCommittee($user_id, $committee_id)
    {
        return (
            !is_null($this->searchByUserAndCommittee($user_id, $committee_id))
        );
    }

    public function searchByUserAndCommittee($user_id, $committee_id)
    {
        return (
            $this->model::where('user_id', $user_id)
                ->where('committee_id', $committee_id)
                ->first()
        );
    }

    public function insertUserCommittee($user_id, $committee_id)
    {
        $newRow = new UserCommittee();
        $newRow->user_id = $user_id;
        $newRow->committee_id = $committee_id;
        $newRow->save();
    }

    public function deleteUserCommittee($user_id, $committee_id)
    {
        $row = $this->searchByUserAndCommittee($user_id, $committee_id);
        $row->delete();
    }
}
