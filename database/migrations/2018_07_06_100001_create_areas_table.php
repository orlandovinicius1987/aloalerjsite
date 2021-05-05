<?php
use App\Models\Area;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAreasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('areas', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');

            $table->timestamps();
        });

        $array = [
            [999999, 'Desconhecido'],
            [0, 'Abuso aos direitos humanos'],
            [1, 'Ação social'],
            [2, 'Animais'],
            [3, 'Assuntos trabalhistas'],
            [4, 'Concursos públicos'],
            [5, 'Crianças'],
            [6, 'Crianças e Adolescentes Desaparecidos'],
            [7, 'Educação'],
            [8, 'Empresa Privada'],
            [9, 'Empresa Pública'],
            [10, 'Esporte e Lazer'],
            [11, 'Estudantes'],
            [12, 'Habitação'],
            [13, 'Idosos'],
            [14, 'Infra-estrutura'],
            [15, 'Leis'],
            [16, 'Mulheres'],
            [17, 'Multas'],
            [18, 'Orçamento participativo'],
            [19, 'Outros'],
            [20, 'Pessoa com deficiência'],
            [21, 'Saúde'],
            [22, 'Segurança'],
            [23, 'Transportes'],
        ];

        foreach ($array as $item) {
            DB::table('areas')->insert([
                'id' => $item[0],
                'name' => $item[1],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        DB::statement("SELECT setval('public.areas_id_seq', (SELECT max(id) FROM public.areas));");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('areas');
    }
}
