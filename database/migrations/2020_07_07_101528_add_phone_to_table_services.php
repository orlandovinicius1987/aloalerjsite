<?php

use App\Data\Models\Committee;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class AddPhoneToTableServices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $committees = app(Committee::class)->get();

        foreach ($committees as $committee) {

            if ($committee->committeeServices) {


                foreach ($committee->committeeServices as $committeeService) {

                    $committeeService->phone = $committee->phone;
                    $committeeService->email = $committee->email;
                    $committeeService->save();
                }
            }
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('committee_services')->update(['phone' => null, 'email' => null]);
    }
}
