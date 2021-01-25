<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Data\Models\Progress as ProgressModel;

class RemoveAttendantNameFromProgresses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        foreach (ProgressModel::withoutGlobalScopes()->cursor() as $progress) {
            $afterRegex = preg_replace(
                '/(Protocolo finalizado sem observações em .*?)( pelo usuário .*)/',
                '$1',
                $progress->original
            );

            if ($progress->original != $afterRegex) {
                dump(
                    'Alterando o texto do andamento ' .
                        $progress->id .
                        ' de ' .
                        $progress->original .
                        ' para ' .
                        $afterRegex
                );

                $progress->original = $afterRegex;
                $progress->save();
            }
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Can't go back
    }
}
