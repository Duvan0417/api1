<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class apprendices extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'cellnumber',
        'course_id',
        'computer_id'
    ];
    
    protected $allowInclude = ['course', 'course.area', 'course.trainingcenter', 'computer','course.area.teacher'];
    
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
    
    // Relaciones corregidas
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
    
    public function computer()
    {
        return $this->belongsTo(Computer::class);
    }
    
}
