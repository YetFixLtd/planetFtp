<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TVSeriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::Insert("INSERT INTO `tv_series` (`id`, `SubCategoryId`, `tvSeriesTitle`, `publicationStatus`, `created_at`, `updated_at`, `tvSeriesFile`) VALUES
            (1, 10, 'Formula 1 Drive to Survive', 1, '2023-02-26 09:24:25', '2023-02-26 09:24:25', 'tvSeriesFile/42.jpg')"
        );
    }
}
