<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class teachers extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'area_id',
        'trainingcenter_id'
    ];
    
    protected $allowInclude = ['courses', 'area', 'trainingcenter','area.courses','area.trainingcenter'];
    
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
    public function courses(){
        return $this->belongsToMany(course::class);
    }
    public function area(){
        return $this->belongsTo(Area::class);
    }
    public function trainingcenter(){
        return $this->belongsTo(TrainingCenter::class);
    }
}
