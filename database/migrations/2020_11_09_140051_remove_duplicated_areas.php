<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveDuplicatedAreas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //pessoa deficiente -> pessoa com deficiência

        DB::table('records')
            ->where('area_id', 1000008)
            ->update(['area_id'=> 20]);

        DB::table('progresses')
            ->where('area_id', 1000008)
            ->update(['area_id'=> 20]);

        DB::table('areas')
            ->where('id',1000008)
            ->delete();

        //mulheres -> defesa dos direitos da mulher

        DB::table('records')
            ->where('area_id', 16)
            ->update(['area_id'=> 1000009]);

        DB::table('progresses')
            ->where('area_id', 16)
            ->update(['area_id'=> 1000009]);

        DB::table('areas')
            ->where('id',16)
            ->delete();

        //animais e maus tratos -> defesa e direito dos animais

        DB::table('records')
            ->where('area_id', 2)
            ->update(['area_id'=> 1000003]);

        DB::table('records')
            ->where('area_id', 1000039)
            ->update(['area_id'=> 1000003]);

        DB::table('progresses')
            ->where('area_id', 2)
            ->update(['area_id'=> 1000003]);

        DB::table('progresses')
            ->where('area_id', 1000039)
            ->update(['area_id'=> 1000003]);

        DB::table('areas')
            ->where('id',2)
            ->delete();

        DB::table('areas')
            ->where('id',1000039)
            ->delete();

        //abuso aos direitos humanos e direitos humanos e cidadania -> defesa dos direitos humanos e cidadania

        DB::table('records')
            ->where('area_id', 0)
            ->update(['area_id'=> 1000012]);

        DB::table('records')
            ->where('area_id', 1000047)
            ->update(['area_id'=> 1000012]);

        DB::table('progresses')
            ->where('area_id', 0)
            ->update(['area_id'=> 1000012]);

        DB::table('progresses')
            ->where('area_id', 1000047)
            ->update(['area_id'=> 1000012]);

        DB::table('areas')
            ->where('id',0)
            ->delete();

        DB::table('areas')
            ->where('id',1000047)
            ->delete();

        //idosos -> idoso

        DB::table('records')
            ->where('area_id', 13)
            ->update(['area_id'=> 1000011]);

        DB::table('progresses')
            ->where('area_id', 13)
            ->update(['area_id'=> 1000011]);

        DB::table('areas')
            ->where('id',13)
            ->delete();

        //consumidor , Defesa do consumidor , contribuinte defesa do consumidor -> Defesa do Consumidor

        DB::table('records')
            ->where('area_id', 1000019)
            ->update(['area_id'=> 1000002]);

        DB::table('records')
            ->where('area_id', 1000021)
            ->update(['area_id'=> 1000002]);

        DB::table('records')
            ->where('area_id', 1000031)
            ->update(['area_id'=> 1000002]);

        DB::table('progresses')
            ->where('area_id', 1000019)
            ->update(['area_id'=> 1000002]);

        DB::table('progresses')
            ->where('area_id', 1000021)
            ->update(['area_id'=> 1000002]);

        DB::table('progresses')
            ->where('area_id', 1000031)
            ->update(['area_id'=> 1000002]);

        DB::table('areas')
            ->where('id',1000019)
            ->delete();

        DB::table('areas')
            ->where('id',1000021)
            ->delete();

        DB::table('areas')
            ->where('id',1000031)
            ->delete();

        //transportes (2x)

        DB::table('records')
            ->where('area_id', 1000010)
            ->update(['area_id'=> 23]);

        DB::table('progresses')
            ->where('area_id', 1000010)
            ->update(['area_id'=> 23]);

        DB::table('areas')
            ->where('id',1000010)
            ->delete();

        //trabalho, legislação social e seguridade social (2x)

        DB::table('records')
            ->where('area_id', 1000020)
            ->update(['area_id'=> 1000007]);

        DB::table('progresses')
            ->where('area_id', 1000020)
            ->update(['area_id'=> 1000007]);

        DB::table('areas')
            ->where('id',1000020)
            ->delete();

        //segurança -> segurança pública

        DB::table('records')
            ->where('area_id', 22)
            ->update(['area_id'=> 1000015]);

        DB::table('progresses')
            ->where('area_id', 22)
            ->update(['area_id'=> 1000015]);

        DB::table('areas')
            ->where('id',22)
            ->delete();

        //preconceitos -> discriminações e preconceitos

        DB::table('records')
            ->where('area_id', 1000016)
            ->update(['area_id'=> 1000033]);

        DB::table('progresses')
            ->where('area_id', 1000016)
            ->update(['area_id'=> 1000033]);

        DB::table('areas')
            ->where('id',1000016)
            ->delete();

        //criação da área de adolescentes

        \App\Data\Models\Area::insert([
            'name' => 'Adolescentes'
        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
