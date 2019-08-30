<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('person_addresses', function (Blueprint $table) {
            $table->increments('id');

            $table
                ->integer('person_id')
                ->unsigned()
                ->index();

            $table
                ->string('zipcode')
                ->nullable()
                ->index();

            $table
                ->string('street')
                ->nullable()
                ->index();

            $table
                ->string('complement')
                ->nullable()
                ->index();

            $table
                ->string('neighbourhood')
                ->nullable()
                ->index();

            $table
                ->string('city')
                ->nullable()
                ->index();

            $table
                ->string('state')
                ->nullable()
                ->index();

            $table
                ->string('from')
                ->nullable()
                ->index(); // comercial / residencial

            $table
                ->integer('provider_enrichment_id')
                ->nullable()
                ->unsigned()
                ->index();

            $table->string('status')->nullable();

            $table->boolean('is_mailable')->default(false);

            $table->timestamp('validated_at')->nullable();

            $table
                ->integer('validated_by_id')
                ->nullable()
                ->unsigned()
                ->index();

            $table
                ->integer('address_id')
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
        Schema::dropIfExists('person_addresses');
    }
}
