<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    public function course()
    {
        return $this->belongsTo('App\Course', 'course_id');
    }
    public function instructor()
    {
        return $this->belongsTo('App\Instructor', 'instr_id');
    }
    public function question()
    {
        return $this->hasMany('App\Question', 'question_id');
    }
}
