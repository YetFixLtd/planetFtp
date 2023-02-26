<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SliderSeeder extends Seeder
{
    public function run()
    {
        DB::Insert(
            "INSERT INTO `sliders` (`id`, `title`, `description`, `productFile`, `productUrl`, `rating`, `publicationStatus`, `created_at`, `updated_at`) VALUES
            (1, 'Title', 'Description', 'sliderFile/4.jpg', 'http://ftp13.circleftp.net/FILE/Hindi%20Dubbed%20Movies/Enemy%20%282021%29%20Hindi%20Dubbed%201080p%20WEB-DL%20ESub%20AAC2.0%20H264/Enemy%20%282021%29%20Hindi%20Dubbed%201080p%20WEB-DL%20ESub%20AAC2.0%20H264.mkv', NULL, 1, '2023-02-25 12:39:08', '2023-02-26 09:43:56'),
            (2, 'The Amazing Maurice', 'The Amazing Maurice', 'sliderFile/5.jpg', 'http://ftp7.circleftp.net/FILE/Animation%20Movies/2015/Tom%20and%20Jerry%20Spy%20Quest%20%282015%29%201080p%20WEB-DL%20ESub%20DD5.1%20H264/Tom%20and%20Jerry%20Spy%20Quest%20%282015%29%201080p%20WEB-DL%20ESub%20DD5.1%20H264.mkv', '10', 1, '2023-02-26 09:45:30', '2023-02-26 09:45:30'),
            (3, 'Title 2', 'Description', 'sliderFile/16.jpg', 'http://ftp7.circleftp.net/FILE/Animation%20Movies/2022/Tom%20and%20Jerry%20Snowman%27s%20Land%20%282022%29%201080p%20WEB-DL%20H264%20DDP5.1/Tom%20and%20Jerry%20Snowman%27s%20Land%20%282022%29%201080p%20WEB-DL%20H264%20DDP5.1.mkv', '9', 1, '2023-02-26 09:45:52', '2023-02-26 09:45:52'),
            (4, 'Title 3', 'Description', 'sliderFile/15.jpg', 'http://index2.circleftp.net/FILE/English%20Movies/2015/Wild%20Card%20%282015%29%20EXTENDED%201080p%20BluRay%20x265/Wild%20Card%20%282015%29%20EXTENDED%201080p%20BluRay%20x265.mp4', '10', 1, '2023-02-26 09:46:08', '2023-02-26 09:46:08'),
            (5, 'Title 4', 'Description', 'sliderFile/19.jpg', 'http://index2.circleftp.net/FILE/English%20Movies/2021/Werewolves%20Within%20%282021%29%201080p%20BluRay%20H264%20AAC/Werewolves%20Within%20%282021%29%201080p%20BluRay%20H264%20AAC.mp4', '10', 1, '2023-02-26 09:46:31', '2023-02-26 09:46:31'),
            (6, 'Title 6', 'Description', 'sliderFile/21.jpg', 'http://index2.circleftp.net/FILE/English%20Movies/2015/Wild%20Card%20%282015%29%20EXTENDED%201080p%20BluRay%20x265/Wild%20Card%20%282015%29%20EXTENDED%201080p%20BluRay%20x265.mp4', '10', 1, '2023-02-26 09:47:28', '2023-02-26 09:47:28'),
            (7, 'Title 7', 'Description', 'sliderFile/11.jpg', 'http://ftp7.circleftp.net/FILE/Animation%20Movies/2022/Tom%20and%20Jerry%20Snowman%27s%20Land%20%282022%29%201080p%20WEB-DL%20H264%20DDP5.1/Tom%20and%20Jerry%20Snowman%27s%20Land%20%282022%29%201080p%20WEB-DL%20H264%20DDP5.1.mkv', '10', 1, '2023-02-26 09:58:51', '2023-02-26 09:58:51'),
            (8, 'Title 8', 'Description', 'sliderFile/41.jpg', 'http://index2.circleftp.net/FILE/English%20Movies/2021/Werewolves%20Within%20%282021%29%201080p%20BluRay%20H264%20AAC/Werewolves%20Within%20%282021%29%201080p%20BluRay%20H264%20AAC.mp4', '10', 1, '2023-02-26 09:59:41', '2023-02-26 09:59:41'),
            (9, 'Title', 'Description', 'sliderFile/32.jpg', 'http://ftp13.circleftp.net/FILE/Hindi%20Dubbed%20Movies/Enemy%20%282021%29%20Hindi%20Dubbed%201080p%20WEB-DL%20ESub%20AAC2.0%20H264/Enemy%20%282021%29%20Hindi%20Dubbed%201080p%20WEB-DL%20ESub%20AAC2.0%20H264.mkv', '10', 1, '2023-02-26 10:00:30', '2023-02-26 10:00:30'),
            (10, 'Selfiee (2023) Hindi', 'Selfiee (2023) Hindi 1080p HQ S-Print x264 AAC\r\nFebruary 26, 2023', 'sliderFile/43.jpg', 'http://index1.circleftp.net/FILE/Hindi%20Movies/2023/Selfiee%20%282023%29%20Hindi%201080p%20HQ%20S-Print%20x264%20AAC/Selfiee%20%282023%29%20Hindi%201080p%20HQ%20S-Print%20x264%20AAC.mkv', '10', 1, '2023-02-26 10:02:41', '2023-02-26 10:02:41')"
        );
    }
}
