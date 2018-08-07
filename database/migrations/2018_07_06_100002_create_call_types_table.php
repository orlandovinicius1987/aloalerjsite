<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCallTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('call_types', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');

            $table->timestamps();
        });

        $array = [
            [48, 'Agradecimento'],
            [49, 'Demanda sem Clareza'],
            [47, 'Denúncia'],
            [44, 'Informação'],
            [50, 'Outros'],
            [51, 'Pedido'],
            [93, 'Queda de Ligação'],
            [45, 'Reclamação'],
            [97, 'Reenvio de protocolo'],
            [46, 'Sugestão'],
        ];

        foreach ($array as $item) {
            DB::table('call_types')->insert([
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
        Schema::dropIfExists('call_types');
    }
}
