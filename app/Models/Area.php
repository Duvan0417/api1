<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Area extends Model
{
    use HasFactory;

    // Definir los campos que se pueden llenar masivamente
    protected $fillable = [
        'name',
        'description'
    ];

    protected $allowIncluded =['teacher','teacher.trainingcenter'];
    public function courses(){
        return $this->hasMany(course::class);
    }
    public function teachers(){
        return $this->hasMany(teachers::class);
    }

    public function scopeInclude(Builder $query){
        $relation=explode(',',request('include'));
        $query->with($relation);
    }
}
