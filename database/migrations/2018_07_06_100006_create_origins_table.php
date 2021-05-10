<?php
use App\Models\Origin;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOriginsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('origins', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');

            $table->timestamps();
        });

        $array = [
            [999999, 'Desconhecido'],
            [0, '0800'],
            [1, 'Chat'],
            [2, 'Whatsapp'],
            [3, 'E-mail'],
            [4, 'Carteirada do Bem'],
            [5, 'Telegram'],
        ];

        foreach ($array as $item) {
            DB::table('origins')->insert([
                'id' => $item[0],
                'name' => $item[1],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        DB::statement(
            "SELECT setval('public.origins_id_seq', (SELECT max(id) FROM public.origins));"
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('origins');
    }
}
