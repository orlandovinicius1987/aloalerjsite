<?php

use App\Data\Models\Area;
use App\Data\Models\ContactType;
use App\Data\Models\Origin;
use App\Data\Models\PersonContact;
use App\Data\Models\ProgressType;
use App\Data\Models\Record;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConvertProtocolAndPhoneOnlyNumber extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        PersonContact::whereIn(
            'contact_type_id',
            ContactType::whereIn('code', ['mobile', 'whatsapp', 'phone'])
                ->get()
                ->pluck('id')
        )->each(function ($c) {
            $c->contact = only_numbers($c->contact);
            
        });

        Record::all()->each(function ($p) {
            $p->protocol = only_numbers($p->protocol);
            $p->save();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    }
}
