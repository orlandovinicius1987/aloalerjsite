<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use IlluminateAgnostic\Arr\Support\Carbon;

class AddDeputadosOptionToArea extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \App\Data\Models\Area::insert([
            'name' => 'Deputados',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('areas')
            ->where('name', '=', 'Deputados')
            ->delete();
    }
}
