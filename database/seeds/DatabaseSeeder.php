<?php

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
        $this->call([
            UserSeeder::class,
            StudentSeeder::class,
            DaySeeder::class,
            SubjectSeeder::class,
            ScheduleSeeder::class,
            ArticleSeeder::class,
            SettingSeeder::class,
        ]);
    }
}
