<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('person_contacts', function (Blueprint $table) {
            $table->increments('id');

            $table
                ->integer('email_id')
                ->nullable()
                ->unsigned()
                ->index();

            $table
                ->integer('person_id')
                ->unsigned()
                ->index();

            $table->string('contact_type_id'); // email, celular, telefone fixo, whatsapp

            $table->string('contact');

            $table->string('from')->default('personal'); // comercial / pessoal

            $table->string('status')->nullable(); // correspondência, valido

            $table->timestamp('validated_at')->nullable();

            $table
                ->integer('validated_by_id')
                ->nullable()
                ->unsigned()
                ->index();

            $table
                ->integer('provider_enrichment_id')
                ->nullable()
                ->unsigned()
                ->index();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('person_contacts');
    }
}
