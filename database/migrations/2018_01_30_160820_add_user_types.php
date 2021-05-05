<?php
use App\Models\UserType as UserTypeModel;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class AddUserTypes extends Migration
{
    public function up()
    {
        UserTypeModel::create(['name' => 'Administrador']);

        UserTypeModel::create(['name' => 'Usuario']);

        Schema::table('users', function ($table) {
            $table->integer('user_type_id')->unsigned();
        });
    }

    public function down()
    {
        DB::table('user_types')
            ->where('name', '=', 'Administrador')
            ->delete();
        DB::table('user_types')
            ->where('name', '=', 'Usuario')
            ->delete();

        Schema::table('users', function ($table) {
            $table->dropColumn('user_type_id');
        });
    }
}
