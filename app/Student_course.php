<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student_course extends Model
{
    public $timestamps = false;
    protected $table = 'students_courses';
    public function student(){
        return $this->belongsTo(User::class, 'user_id');
    }
    public function course(){
        return $this->belongsToMany(Course::class, 'course_id');
    }
}
