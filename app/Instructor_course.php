<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instructor_course extends Model
{
    public $timestamps = false;
    protected $table = 'instructors_courses';
    protected $fillable = ['instr_id', 'course_id'];

    public function course(){
        return $this->belongsTo(Course::class, 'course_id');
    }
}
