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
    protected $allowFilter = ['id','name'];
    
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

    public function scopeFilter(Builder $query)
{
    // Validar que allowFilter está definido y es un array
    if (!is_array($this->allowFilter) || empty($this->allowFilter)) {
        return $query;
    }

    // Obtener filtros de la solicitud y asegurarse de que es un array
    $filters = request('filter');

    if (!is_array($filters) || empty($filters)) {
        return $query;
    }

    $allowFilter = collect($this->allowFilter);

    foreach ($filters as $filter => $value) {
        if ($allowFilter->contains($filter) && !empty($value)) {
            $query->where($filter, 'LIKE', '%'.$value.'%');
        }
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
