<?php
namespace App\Services;

use App\Models\Cercred as CercredModel;
use Illuminate\Support\Facades\DB;

class Cercred
{
    public function import()
    {
        ini_set('memory_limit', '2048M');
        set_time_limit(0);

        $records = 0;

        $tables = coollect(DB::select('SELECT * FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_TYPE=\'BASE TABLE\''))
            ->reject(function ($table) {
                return $table->table_schema !== 'cercred';
            })
            ->each(function ($table) use (&$records) {
                info('------------------------------------------------------------------------ ' . $table->table_name);

                // DB::connection('cercred')->table($table->table_name)->truncate();

                if (DB::connection('cercred')->select('select count (*) from ' . $table->table_name)[0]->count > 0) {
                    info('ALREADY DONE ' . $table->table_name);

                    return;
                }

                coollect(DB::connection('sqlsrv')->select('SELECT * FROM ' . $table->table_name))->each(function (
                    $row
                ) use (&$records, $table) {
                    $cercred = new CercredModel();

                    $cercred->setTable($table->table_name);

                    $row = coollect(json_decode(json_encode($row), true))->mapWithKeys(function ($value, $key) {
                        return [lower($key) => $value];
                    });

                    $cercred->fill($row->toArray());

                    $cercred->save();

                    $records++;

                    if ($records % 100 === 0) {
                        info($table->table_name . ' - ' . $records);
                    }
                });
            });

        dd($tables->pluck('table_name')->toArray());
    }
}
