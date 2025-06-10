<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class apprendices extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'email',
        'cellnumber'
    ];
    public function course(){
        return $this->belongsTo(course::class);
    }
        public function computer(){
        return $this->belongsTo(computer::class);
    }
}
