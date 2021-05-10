<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Models\User;
use App\Models\UserType;
use App\Data\Repositories\Users as UsersRepository;
use App\Data\Repositories\UserTypes as UserTypesRepository;

class InsertUserTypes extends Migration
{
    private $userTypes = ['Gerente', 'Supervisor', 'Operador', 'Comissao'];

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        foreach ($this->userTypes as $userType) {
            $row = new UserType();
            $row->name = $userType;
            $row->save();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $userTypesRepository = app(UserTypesRepository::class);
        foreach ($this->userTypes as $userType) {
            $row = $userTypesRepository->findByColumn('name', $userType);
            $row->delete();
        }
    }
}
