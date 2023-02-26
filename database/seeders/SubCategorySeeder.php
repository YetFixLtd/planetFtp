<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubCategorySeeder extends Seeder
{

    public function run()
    {
        DB::Insert(
            "INSERT INTO `sub_categories` (`id`, `categoryId`, `subCategoryTitle`, `type`, `publicationStatus`, `created_at`, `updated_at`) VALUES
            (1, 1, 'English Movie', '', 1, '2023-02-25 11:35:02', '2023-02-26 06:31:09'),
            (2, 2, 'PC Game', '', 1, '2023-02-25 11:35:14', '2023-02-25 11:35:14'),
            (3, 3, 'Application Software', '', 1, '2023-02-25 11:35:28', '2023-02-25 11:35:28'),
            (4, 4, 'Bangla TV Series', 'tv_series', 1, '2023-02-25 11:35:42', '2023-02-25 11:35:42'),
            (5, 1, 'Animation Movie', '', 1, '2023-02-26 05:59:03', '2023-02-26 05:59:03'),
            (6, 1, 'Hinde Movie', '', 1, '2023-02-26 05:59:15', '2023-02-26 05:59:15'),
            (7, 2, 'Mobile Game', '', 1, '2023-02-26 05:59:35', '2023-02-26 05:59:35'),
            (8, 3, 'PC Software', '', 1, '2023-02-26 06:00:00', '2023-02-26 06:00:00'),
            (9, 4, 'Hinde TV Series', 'tv_series', 1, '2023-02-26 06:00:17', '2023-02-26 06:00:17'),
            (10, 4, 'English TV Series', 'tv_series', 1, '2023-02-26 06:00:35', '2023-02-26 06:00:35')"
        );
    }
}
