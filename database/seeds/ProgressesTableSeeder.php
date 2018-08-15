<?php
use App\Data\Models\Progress as ProgressModel;
use Illuminate\Database\Seeder;

class ProgressesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(ProgressModel::class, 50)->create();
    }
}
