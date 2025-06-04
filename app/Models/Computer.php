<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Computer extends Model
{
    use HasFactory;
    
    // Definir los campos que se pueden llenar masivamente
    protected $fillable = [
        'number',
        'brand',
    ];


}
