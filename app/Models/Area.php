<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Area extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description'
    ];

    protected $allowInclude = ['courses', 'teachers', 'teachers.trainingcenter'];
    
    public function courses(){
        return $this->hasMany(course::class);
    }
        public function teachers(){
        return $this->hasMany(teachers::class);
    }

    public function scopeInclude(Builder $query)
    {
        if (empty($this->allowInclude) || empty(request('include'))) {
            return $query;
        }
        
        $relations = explode(',', request('include'));
        $allowedRelations = array_intersect($relations, $this->allowInclude);
        
        if (!empty($allowedRelations)) {
            $query->with($allowedRelations);
        }
        
        return $query;
    }
}