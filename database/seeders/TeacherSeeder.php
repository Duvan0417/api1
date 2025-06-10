<?php

namespace Database\Seeders;

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
            ['name'=>'diego','email'=>'diego@email.com'],
            ['name'=>'sid','email'=>'sid@email.com'],
            ['name'=>'scrat','email'=>'scrat@email.com'],
            ['name'=>'manny','email'=>'manny@email.com'],
            ['name'=>'buck','email'=>'buck@email.com'],
        ];
    }
}
