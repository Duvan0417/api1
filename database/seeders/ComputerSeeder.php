<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Computer;

class ComputerSeeder extends Seeder
{
    public function run(): void
    {
        $computers = [
            ['number' => 'PC-001', 'brand' => 'Dell'],
            ['number' => 'PC-002', 'brand' => 'HP'],
            ['number' => 'PC-003', 'brand' => 'Asus'],
            ['number' => 'PC-004', 'brand' => 'Lenovo'],
        ];

        foreach ($computers as $computer) {
            Computer::create($computer);
        }
    }
}
