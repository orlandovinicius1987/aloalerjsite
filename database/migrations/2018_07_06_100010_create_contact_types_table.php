<?php
use App\Models\ContactType;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_types', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name'); // email, celular, telefone fixo, whatsapp
            $table->string('code'); // email, celular, telefone fixo, whatsapp

            $table->timestamps();
        });

        $array = [
            [0, 'Celular', 'mobile'],
            [1, 'Whatsapp', 'whatsapp'],
            [2, 'E-mail', 'email'],
            [3, 'Telefone Fixo', 'phone'],
            [4, 'Facebook', 'facebook'],
            [5, 'Twitter', 'twitter'],
            [6, 'Instagram', 'instagram']
        ];

        foreach ($array as $item) {
            ContactType::insert([
                'id' => $item[0],
                'name' => $item[1],
                'code' => $item[2],
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contact_types');
    }
}
