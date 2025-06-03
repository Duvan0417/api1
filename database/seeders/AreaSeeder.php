<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Area;

class AreaSeeder extends Seeder
{
    public function run(): void
    {
        $areas = [
            'brandon',
            'duvan',
            'will',
            'andres',
            'santiago',
        ];

        foreach ($areas as $name) {
            Area::create(['name' => $name]);
        }
    }
}
