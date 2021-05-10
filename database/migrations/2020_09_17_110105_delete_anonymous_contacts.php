<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\PersonContact as PersonContactModel;

class DeleteAnonymousContacts extends Migration
{
    protected $ids = [102253, 102254, 102255];

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        collect($this->ids)->each(function ($id) {
            if ($contact = PersonContactModel::find($id)) {
                $contact->delete();
                dump('Contato ' . $contact->id . ' deletado');
            } else {
                dump('Contato ' . $id . ' não encontrado');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
