<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    public $timestamps = false;
    protected $table = 'forms';
    protected $primaryKey = 'course_id';

    public function course()
    {
        return $this->hasMany(Course::class, 'course_id');
    }
    public function question()
    {
        return $this->hasMany(Question::class, 'question_id');
    }
    public function instructor()
    {
        return $this->belongsTo(Instructor::class, 'instr_id');
    }
}
