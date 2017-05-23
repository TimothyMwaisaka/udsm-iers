<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student_course extends Model
{
    public $timestamps = false;
    protected $table = 'students_courses';
    public function student(){
        return $this->belongsTo(Student::class, 'stud_id');
    }
    public function course(){
        return $this->belongsTo(Course::class, 'course_id');
    }
}
