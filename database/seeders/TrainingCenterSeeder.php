<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TrainingCenter;

class TrainingCenterSeeder extends Seeder
{
    public function run(): void
    {
        $centers = [
            ['name' => 'lomas', 'location' => 'popayan'],
            ['name' => 'esmeralda', 'location' => 'cali'],
            ['name' => 'julomito', 'location' => 'popayan'],
            ['name' => 'lomas2', 'location' => 'bogota'],
        ];

        foreach ($centers as $center) {
            TrainingCenter::create($center);
        }
    }
}
