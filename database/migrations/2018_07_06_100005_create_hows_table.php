<?php
use App\Models\How;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hows', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');

            $table->timestamps();
        });

        $array = [
            [54, 'Amigos'],
            [88, 'Cartazes/Placas/Outdoor'],
            [56, 'Carteirada do bem'],
            [82, 'Contas à pagar'],
            [72, 'Deputados'],
            [58, 'Internet'],
            [60, 'Jornal'],
            [86, 'Lista telefônica'],
            [84, 'Não Informado'],
            [74, 'Nota Fiscal'],
            [76, 'Ônibus da Defesa'],
            [78, 'Órgãos/Secretarias'],
            [62, 'Rádio'],
            [80, 'Redes Sociais'],
            [64, 'Site da Alerj'],
            [66, 'Televisão'],
        ];

        foreach ($array as $item) {
            How::insert([
                'id' => $item[0],
                'name' => $item[1],
                'created_at' => now(),
                'updated_at' => now(),
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
        Schema::dropIfExists('hows');
    }
}
