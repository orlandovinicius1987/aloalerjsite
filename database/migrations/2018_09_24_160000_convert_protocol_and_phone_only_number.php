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
