<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'courses';
    protected $primaryKey = 'course_id';

    public function instructor()
    {
        return $this->belongsTo(Instructor::class, 'instr_id');
    }

    public function college()
    {
        return $this->belongsTo(College::class, 'college_id');
    }
    public function form(){
        return $this->hasMany(Form::class, 'question_id');

    }
    public function question(){
        return $this->hasMany(Question::class);
    }
    public function instructor_course(){
        return $this->hasMany(Instructor_course::class);
    }
    public function student_course(){
        return $this->hasMany(Student_course::class);
    }
}
