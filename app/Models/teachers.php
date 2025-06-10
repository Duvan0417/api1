<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class teachers extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'email'
    ];
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
