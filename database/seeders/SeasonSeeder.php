<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeasonSeeder extends Seeder
{
    public function run()
    {
        DB::Insert("INSERT INTO `seasons` (`id`, `tvSeriesId`, `seasonTitle`, `seasonFile`, `publicationStatus`, `created_at`, `updated_at`) VALUES
            (1, 1, 'Season 1', 'seasonFile/42.jpg', 1, '2023-02-26 09:24:52', '2023-02-26 09:24:52'),
            (2, 1, 'Season 2', 'seasonFile/42.jpg', 1, '2023-02-26 09:26:20', '2023-02-26 09:26:20')"
        );
    }
}
