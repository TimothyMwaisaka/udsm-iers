<?php


namespace App;

use Illuminate\Database\Eloquent\Model;

class College extends Model
{
    protected $primaryKey = 'college_id';
    public function user(){
        return $this->hasMany(User::class, 'college_id');
    }
}
