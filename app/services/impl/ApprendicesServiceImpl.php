<?php

namespace App\Services\impl;

use App\Models\Apprendices;
use App\Services\ApprendicesService;

class ApprendicesServiceImpl implements ApprendicesService{
    public function create(array $data)
    {
        return Apprendices::create($data);
    }
}
