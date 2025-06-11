<?php

namespace Database\Seeders;

use App\Models\course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $course=[
            ['coursenumber'=>'311111111','day'=>'martes','area_id' => 1, 'trainingcenter_id' => 1],
            ['coursenumber'=>'365656566','day'=>'miercoles','area_id' => 2, 'trainingcenter_id' => 2],
            ['coursenumber'=>'321888888','day'=>'jueves','area_id' => 3, 'trainingcenter_id' => 3],
            ['coursenumber'=>'365444322','day'=>'viernes','area_id' => 4, 'trainingcenter_id' => 4],
            ['coursenumber'=>'388319999','day'=>'lunes','area_id' => 5, 'trainingcenter_id' => 5]
        ];
        foreach($course as $course){
            course::create($course);
        }
    }
}
