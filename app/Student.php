<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public $timestamps = false;
    protected $table = 'students';
    protected $primaryKey = 'id';
    public function course(){
        return $this->hasMany(Course::class);
    }
    public function college(){
        return $this->belongsTo(College::class);
    }
}
