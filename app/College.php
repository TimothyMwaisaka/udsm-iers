<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class College extends Model
{
    protected $primaryKey = 'college_id';

    public function instructor(){
        return $this->hasMany(Instructor::class);
    }
}
