<?php

namespace Database\Seeders;

use App\Models\teachers;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            AreaSeeder::class,
            TrainingCenterSeeder::class,
            ComputerSeeder::class,
            CourseSeeder::class,
            apprendiceSeeder::class,
            TeacherSeeder::class,
        ]);
    }                                           
}
