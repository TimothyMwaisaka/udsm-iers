<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public $timestamps = false;
    protected $table = 'questions';
    protected $primaryKey = 'question_id';
    public function form(){
        return $this->belongsToMany(Form::class);
    }
}
