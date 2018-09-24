<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Data\Repositories\People as PeopleRepository;
use App\Data\Models\Person as PersonModel;

use App\Http\Middleware\TrimStrings;

class DoubleSpaceTrimPersonNames extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $people = PersonModel::all();

        foreach ($people as $person) {
            $person->name = app(TrimStrings::class)->doubleSpaceTrim(
                $person->name
            );
            $person->save();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Can't go back
    }
}
