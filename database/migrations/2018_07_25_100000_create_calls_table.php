<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCallsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persons', function (Blueprint $table) {
            $table->increments('id');

            $table
                ->string('cpf_cnpj')
                ->unique()
                ->nullable()
                ->index();
            $table
                ->string('name')
                ->nullable()
                ->index();
            $table
                ->string('identification')
                ->nullable()
                ->index();
            $table->boolean('is_anonymous')->default(false);
            $table
                ->integer('created_by_id')
                ->nullable()
                ->unsigned()
                ->index();

            $table->timestamps();
        });

        Schema::create('persons_addresses', function (Blueprint $table) {
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
            $table->boolean('is_mailable')->default(false);

            $table->timestamp('validated_at')->nullable();
            $table
                ->integer('validated_by_id')
                ->nullable()
                ->unsigned()
                ->index();

            $table->timestamps();
        });

        Schema::create('persons_contacts', function (Blueprint $table) {
            $table->increments('id');

            $table
                ->integer('person_id')
                ->unsigned()
                ->index();

            $table->string('contact_type'); // email, celular, telefone fixo, whatsapp
            $table->string('contact');
            $table->string('from'); // comercial / residencial

            $table->timestamp('validated_at')->nullable();
            $table
                ->integer('validated_by_id')
                ->nullable()
                ->unsigned()
                ->index();

            $table->timestamps();
        });

        Schema::create('calls', function (Blueprint $table) {
            $table->increments('id');

            $table
                ->integer('person_id')
                ->unsigned()
                ->index();

            $table->text('request_original');
            $table->text('request_rectified')->nullable();
            $table->timestamp('rectified_at')->nullable();
            $table
                ->integer('rectified_by_id')
                ->nullable()
                ->unsigned()
                ->index();

            $table->timestamps();
        });

        Schema::create('committees', function (Blueprint $table) {
            $table->increments('id');

            $table->string('slug');
            $table->string('name');
            $table->string('link_caption');
            $table->string('short_name');
            $table->string('phone');
            $table->text('bio');
            $table->string('president');
            $table->string('vice_president');
            $table->string('office_phone');
            $table->string('office_address');

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
        Schema::dropIfExists('persons');
        Schema::dropIfExists('persons_addresses');
        Schema::dropIfExists('persons_contacts');
        Schema::dropIfExists('calls');
        Schema::dropIfExists('committees');
    }
}
