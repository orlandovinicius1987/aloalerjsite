<?php
use App\Models\RecordType;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecordTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('record_types', function (Blueprint $table) {
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
            [46, 'Sugestão']
        ];

        foreach ($array as $item) {
            DB::table('record_types')->insert([
                'id' => $item[0],
                'name' => $item[1],
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

        DB::statement(
            "SELECT setval('public.record_types_id_seq', (SELECT max(id) FROM public.record_types));"
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('record_types');
    }
}
