<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table = 'permissions';
    public $timestamps = false;
    protected $fillable = ['id', 'read','write','user','application'];
    public function users()
    {
        return $this->hasOne('App\Users','id');
    }
    public function application(){
        return $this->hasMany("applications");
    }


}
