<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    protected $table = 'instructors';
    protected $primaryKey = 'id';
    public function course(){
        return $this->hasMany(Course::class);
    }
}
