<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    public $timestamps = false;
    public function form(){
        return $this->hasMany(Form::class);
    }
    public function course(){
        return $this->belongsTo(Course::class);
    }
}
