<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EpisodeSeeder extends Seeder
{

    public function run()
    {
        DB::Insert("INSERT INTO `episodes` (`id`, `SubCategoryId`, `tvSeriesId`, `seasonId`, `episodeTitle`, `episodeDescription`, `episodeFile`, `episodeUrl`, `rating`, `year`, `publicationStatus`, `created_at`, `updated_at`) VALUES
        (1, 10, 1, 1, 'Formula 1 Drive to Survive (TV Series 2019-)', 'Formula 1 Drive to Survive (TV Series 2019-)\r\nFebruary 26, 2023', 'episodeFile/42.jpg', 'http://ftp9.circleftp.net/FILE/English%20%26%20Foreign%20TV%20Series/Formula%201%20Drive%20to%20Survive%20%28TV%20Series%202019-%29/Season%201%201080p/Formula.1.Drive.To.Survive.S01E01.1080p.NF.WEB-DL.DDP5.1.HFR.HEVC-NTG.mkv', '10', '2023', 1, '2023-02-26 09:25:39', '2023-02-26 09:25:39'),
        (2, 10, 1, 2, 'Formula 1 Drive to Survive (TV Series 2019-)', 'Formula 1 Drive to Survive (TV Series 2019-)\r\nFebruary 26, 2023', 'episodeFile/42.jpg', 'http://ftp9.circleftp.net/FILE/English%20%26%20Foreign%20TV%20Series/Formula%201%20Drive%20to%20Survive%20%28TV%20Series%202019-%29/Season%202%201080p/Formula.1.Drive.to.Survive.S02E01.Lights.Out.1080p.NF.WEB-DL.DDP5.1.x264-NTG.mkv', '10', '2023', 1, '2023-02-26 09:27:11', '2023-02-26 09:27:11');
        "
        );
    }
}
