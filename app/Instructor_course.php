<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instructor_course extends Model
{
    protected $table = 'instructors_courses';
    public function instructor(){
        return $this->belongsTo('instructor');
    }
}
