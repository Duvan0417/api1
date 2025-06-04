<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TrainingCenter;

class TrainingCenterSeeder extends Seeder
{
    public function run(): void
    {
        $centers = [
            ['name' => 'centro', 'location' => 'popayan'],
            ['name' => 'sur', 'location' => 'cali'],
            ['name' => 'oeste', 'location' => 'timbio'],
            ['name' => 'suroeste', 'location' => 'piendamo'],
        ];

        foreach ($centers as $center) {
            TrainingCenter::create($center);
        }
    }
}
