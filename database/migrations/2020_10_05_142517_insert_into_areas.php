<?php

use App\Data\Models\Area as Area;
use App\Data\Repositories\Areas as AreasRepository;
use Illuminate\Database\Migrations\Migration;

class InsertIntoAreas extends Migration
{
    private $areas = ['Direitos Humanos e Cidadania'];

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        foreach ($this->areas as $area) {
            $row = new Area();
            $row->name = $area;
            $row->is_active = true;
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
        $areasRepository = app(AreasRepository::class);
        foreach ($this->areas as $area) {
            $row = $areasRepository->findByColumn('name', $area);
            $row->delete();
        }
    }
}
