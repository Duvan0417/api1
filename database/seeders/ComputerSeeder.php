<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Computer;

class ComputerSeeder extends Seeder
{
    public function run(): void
    {
        $computers = [
            ['number' => 'PC-001', 'brand' => 'alienware'],
            ['number' => 'PC-002', 'brand' => 'HP'],
            ['number' => 'PC-003', 'brand' => 'msi'],
            ['number' => 'PC-004', 'brand' => 'Acer'],
            ['number' => 'PC-005', 'brand' => 'asus'],
        ];

        foreach ($computers as $computer) {
            Computer::create($computer);
        }
    }
}
