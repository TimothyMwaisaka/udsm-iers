<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student_course extends Model
{
    public $timestamps = false;
    protected $table = 'course_user';

    public function course(){
        return $this->belongsToMany(Course::class, 'course_id');
    }
}
