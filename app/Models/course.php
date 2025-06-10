<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class course extends Model
{
    use HasFactory;

    protected $fillable=[
        'coursenumber',
        'day'
    ];
    public function area(){
        return $this->belongsTo(Area::class);
    }
    public function apprendice(){
        return $this->hasMany(apprendices::class);
    }
    public function trainingcenter(){
        return $this->belongsTo(TrainingCenter::class);
    }
    public function teacher(){
        return $this->belongsToMany(Area::class);
    }
}
