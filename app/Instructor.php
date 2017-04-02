<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    protected $table = 'instructors';
    public function course(){
        return $this->hasMany('App\Course');
    }
}
