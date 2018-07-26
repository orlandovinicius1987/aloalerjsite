<?php
use App\Data\Models\TipoUsuario as TipoUsuarioModel;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class AddUserTypes extends Migration
{
    public function up()
    {
        TipoUsuarioModel::create(['nome' => 'Administrador']);

        TipoUsuarioModel::create(['nome' => 'Usuario']);

        Schema::table('users', function ($table) {
            $table->integer('user_type_id')->unsigned();
        });
    }

    public function down()
    {
        DB
            ::table('tipos_usuarios')
            ->where('nome', '=', 'Administrador')
            ->delete();
        DB
            ::table('tipos_usuarios')
            ->where('nome', '=', 'Usuario')
            ->delete();

        Schema::table('users', function ($table) {
            $table->dropColumn('user_type_id');
        });
    }
}
