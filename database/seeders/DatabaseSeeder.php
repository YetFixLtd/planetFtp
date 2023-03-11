<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()

    {

        $this->call(PermissionTableSeeder::class);
        $this->call(CreateAdminUserSeeder::class);
        $this->call(CategorySeeder::class);

        // $this->call(EpisodeSeeder::class);
        // $this->call(ItemSeeder::class);
        // $this->call(SeasonSeeder::class);
        // $this->call(SliderSeeder::class);
        // $this->call(SubCategorySeeder::class);
        // $this->call(TVSeriesSeeder::class);
        //\App\Models\User::factory(10)->create();
    }
}
