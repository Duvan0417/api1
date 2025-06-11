<?php

namespace Database\Seeders;

use App\Models\teachers;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $teacher=[
            ['name'=>'diego','email'=>'diego@email.com', 'area_id' => 1, 'trainingcenter_id' => 1],
            ['name'=>'sid','email'=>'sid@email.com', 'area_id' => 2, 'trainingcenter_id' => 2],
            ['name'=>'scrat','email'=>'scrat@email.com', 'area_id' => 3, 'trainingcenter_id' => 3],
            ['name'=>'manny','email'=>'manny@email.com', 'area_id' => 4, 'trainingcenter_id' => 4],
            ['name'=>'buck','email'=>'buck@email.com', 'area_id' => 5, 'trainingcenter_id' => 5],
        ];
        foreach($teacher as $teacher){
            teachers::create($teacher);
        }
    }
}
