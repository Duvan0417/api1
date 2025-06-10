<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingCenter extends Model
{
    use HasFactory;
    
    // Definir los campos que se pueden llenar masivamente
    protected $fillable = [
        'name',
        'location',
    ];
    public function teachers(){
        return $this->hasMany(teachers::class);
    }
    public function courses(){
        return $this->hasMany(course::class);
    }
}
