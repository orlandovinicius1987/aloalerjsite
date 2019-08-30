<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            $table->increments('id');

            $table
                ->string('code')
                ->nullable()
                ->index();

            $table
                ->string('cpf_cnpj')
                ->nullable()
                ->index();

            $table
                ->string('name')
                ->nullable()
                ->index();

            $table->string('identification')->nullable();

            $table->date('birthdate')->nullable();

            $table
                ->integer('gender_id')
                ->unsigned()
                ->nullable();

            $table
                ->integer('civil_status_id')
                ->unsigned()
                ->nullable();

            $table->string('spouse_name')->nullable();

            $table
                ->integer('main_occupation_id')
                ->unsigned()
                ->nullable();

            $table
                ->integer('scholarship_id')
                ->unsigned()
                ->nullable();

            $table->float('income')->nullable();

            $table
                ->integer('person_type_id')
                ->unsigned()
                ->nullable();

            $table
                ->integer('updated_by_id')
                ->unsigned()
                ->nullable();

            $table->boolean('is_anonymous')->default(false);

            $table
                ->integer('created_by_id')
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
        Schema::dropIfExists('people');
    }
}
