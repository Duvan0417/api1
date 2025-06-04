<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Area;

class AreaSeeder extends Seeder
{
    public function run(): void
    {
        $areas = [
            'filofia',
            'quimica',
            'ambiental',
            'sociales',
            'barismo',
        ];

        foreach ($areas as $name) {
            Area::create(['name' => $name]);
        }
    }
}
