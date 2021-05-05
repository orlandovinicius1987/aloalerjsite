<?php

use App\Models\Area;
use App\Models\ContactType;
use App\Models\Origin;
use App\Models\PersonContact;
use App\Models\ProgressType;
use App\Models\Record;
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
        $contacts = PersonContact::whereIn(
            'contact_type_id',
            ContactType::whereIn('code', ['mobile', 'whatsapp', 'phone'])
                ->get()
                ->pluck('id')
        )->cursor();

        foreach ($contacts as $contact) {
            $contact->contact = only_numbers($contact->contact);
            $contact->save();
        }

        foreach (Record::cursor() as $record) {
            $record->protocol = only_numbers($record->protocol);
            $record->save();
        }
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
