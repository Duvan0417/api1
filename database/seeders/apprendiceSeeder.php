<?php

namespace Database\Seeders;

use App\Models\apprendices;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class apprendiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $apprendice =[
            ['name'=>'andres','email'=>'andres@email.com','cellnumber'=>'321111111','course_id' => 1, 'computer_id' => 1],
            ['name'=>'carlos','email'=>'carlos@email.com','cellnumber'=>'322222222','course_id' => 2, 'computer_id' => 2],
            ['name'=>'felipe','email'=>'felipe@email.com','cellnumber'=>'333333333','course_id' => 3, 'computer_id' => 3],
            ['name'=>'camila','email'=>'camila@email.com','cellnumber'=>'344444444','course_id' => 4, 'computer_id' => 4],
            ['name'=>'camilo','email'=>'camilo@email.com','cellnumber'=>'355555555','course_id' => 5, 'computer_id' => 5]
        ];
        foreach ($apprendice as $apprendice){
            apprendices::create($apprendice);
        }
    }
}
