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
            ['coursenumber'=>'311111111','day'=>'martes'],
            ['coursenumber'=>'365656566','day'=>'miercoles'],
            ['coursenumber'=>'321888888','day'=>'jueves'],
            ['coursenumber'=>'365444322','day'=>'viernes'],
            ['coursenumber'=>'388319999','day'=>'lunes']
        ];
        foreach($course as $course){
            course::create($course);
        }
    }
}
