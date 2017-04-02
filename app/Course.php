<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'courses';

    public function instructor1()
    {
        return $this->belongsTo('App\Instructor', 'instr_id');
    }
}
