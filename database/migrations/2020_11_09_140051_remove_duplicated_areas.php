<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\Area as AreaModel;
use App\Models\Progress as ProgressModel;
use App\Models\Record as RecordModel;

class RemoveDuplicatedAreas extends Migration
{
    public $changes = [
        [
            'name' => 'pessoa deficiente -> pessoa com deficiência',
            'oldAreas' => [1000008],
            'toArea' => 20,
            'isActive' => true,
        ],

        [
            'name' => 'mulheres -> defesa dos direitos da mulher',
            'oldAreas' => [16],
            'toArea' => 1000009,
            'isActive' => true,
        ],

        [
            'name' => 'animais e maus tratos -> defesa e direito dos animais',
            'oldAreas' => [2, 1000039],
            'toArea' => 1000003,
            'isActive' => true,
        ],

        [
            'name' =>
                'abuso aos direitos humanos e direitos humanos e cidadania -> defesa dos direitos humanos e cidadania',
            'oldAreas' => [0, 1000047],
            'toArea' => 1000012,
            'isActive' => true,
        ],
        [
            'name' => 'idosos -> idoso',
            'oldAreas' => [13],
            'toArea' => 1000011,
            'isActive' => true,
        ],

        [
            'name' =>
                'consumidor , Defesa do consumidor , contribuinte defesa do consumidor -> Defesa do Consumidor',
            'oldAreas' => [1000019, 1000021, 1000031],
            'toArea' => 1000002,
            'isActive' => true,
        ],

        [
            'name' => 'transportes (2x)',
            'oldAreas' => [1000010],
            'toArea' => 23,
            'isActive' => true,
        ],

        [
            'name' => 'trabalho, legislação social e seguridade social (2x)',
            'oldAreas' => [1000020],
            'toArea' => 1000007,
            'isActive' => false,
        ],

        [
            'name' => 'segurança -> segurança pública',
            'oldAreas' => [22],
            'toArea' => 1000015,
            'isActive' => true,
        ],

        [
            'name' => 'preconceitos -> discriminações e preconceitos',
            'oldAreas' => [1000016],
            'toArea' => 1000033,
            'isActive' => true,
        ],
    ];

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        collect($this->changes)->each(function ($row) {
            dump("Updating {$row['name']}");

            collect($row['oldAreas'])->each(function ($oldArea) use ($row) {
                //Update progresses
                ProgressModel::withoutGlobalScopes()
                    ->where('area_id', $oldArea)
                    ->get()
                    ->each(function ($progress) use ($row) {
                        dump(
                            "Updating progress {$progress->id} from area {$progress->area_id} to {$row['toArea']}"
                        );
                        $progress->area_id = $row['toArea'];
                        $progress->save();
                    });

                //Update records
                RecordModel::withoutGlobalScopes()
                    ->where('area_id', $oldArea)
                    ->get()
                    ->each(function ($record) use ($row) {
                        dump(
                            "Updating record {$record->id} from area {$record->area_id} to {$row['toArea']}"
                        );
                        $record->area_id = $row['toArea'];
                        $record->save();
                    });
            });

            //Delete old areas
            collect($row['oldAreas'])->each(function ($areaId) {
                if ($area = AreaModel::withoutGlobalScopes()->find($areaId)) {
                    dump("Deleting area {$area->id}");
                    $area->delete();
                }
            });

            if ($toArea = AreaModel::withoutGlobalScopes()->find($row['toArea'])) {
                $toArea->is_active = $row['isActive'];
                $toArea->save();
            }
        });

        //criação da área de adolescentes
        AreaModel::updateOrCreate(['name' => 'Adolescentes'], ['is_active' => true]);

        AreaModel::updateOrCreate(['name' => 'Crianças'], ['is_active' => true]);
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
