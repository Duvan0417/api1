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
            ['name'=> 'filosofia','description'=>'aaaaaaaaaaaaaaaaaaaaaa'],
            ['name'=> 'matematicas','description'=>'qqqqqqqqqqqqqqqqqqqqqq'],
            ['name'=> 'ciencias','description'=>'wwwwwwwwwwwwwwwwwwwwww'],
            ['name'=> 'economia','description'=>'rrrrrrrrrrrrrrrrrrrrrr'],
            ['name'=> 'calculo','description'=>'pppppppppppppppppppppp'],
        ];

        foreach ($areas as $areas) {
            Area::create($areas);
        }
    }
}
