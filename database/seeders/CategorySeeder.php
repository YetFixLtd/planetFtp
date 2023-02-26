<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run()
    {
        DB::Insert(
            "INSERT INTO `categories` (`id`, `categoryTitle`, `publicationStatus`, `created_at`, `updated_at`) VALUES
            (1, 'Movie', 1, '2023-02-25 11:33:42', '2023-02-25 11:33:42'),
            (2, 'Game', 1, '2023-02-25 11:33:47', '2023-02-25 11:33:47'),
            (3, 'Software', 1, '2023-02-25 11:33:55', '2023-02-25 11:33:55'),
            (4, 'TV Series', 1, '2023-02-25 11:34:03', '2023-02-25 11:34:03'),
            (5, 'Others', 1, '2023-02-26 08:31:54', '2023-02-26 08:31:54')"
        );
    }
}
