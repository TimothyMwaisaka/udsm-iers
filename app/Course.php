<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'courses';

    public function instructor()
    {
        return $this->belongsTo('App\Instructor', 'instr_id');
    }
    public function formQuestion()
    {
        return $this->belongsTo('App\Question', 'question_id');
    }
}
