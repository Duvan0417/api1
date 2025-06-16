<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class course extends Model
{
use HasFactory;

    protected $fillable = [
        'coursenumber',
        'day',
        'area_id',
        'trainingcenter_id'
    ];
    
    protected $allowInclude = ['area', 'trainingcenter', 'apprendices', 'teachers'];
    
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
    public function area(){
        return $this->belongsTo(Area::class);
    }
    public function apprendices(){
        return $this->hasMany(apprendices::class);
    }
    public function trainingcenter(){
        return $this->belongsTo(TrainingCenter::class);
    }
    public function teachers(){
        return $this->belongsToMany(Area::class);
    }
}
