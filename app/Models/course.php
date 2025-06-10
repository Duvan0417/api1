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
    protected $allowFilter = ['id','day'];

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

    public function area()
    {
        return $this->belongsTo(Area::class);
    }
    public function apprendices()
    {
        return $this->hasMany(Apprendices::class);
    }
    public function trainingcenter()
    {
        return $this->belongsTo(TrainingCenter::class);
    }
    public function teachers()
    {
        return $this->belongsToMany(Area::class);
    }
}
