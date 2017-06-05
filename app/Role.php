<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public $timestamps = false;
    protected $table = 'roles';
    protected $primaryKey = 'id';
    public function users(){
        $this->belongsToMany(User::class,'user_role', 'role_id', 'user_id');
    }
}
