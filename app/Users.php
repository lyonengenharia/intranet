<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    //protected $table = 'users';
    public $timestamps = false;
    protected $fillable = ['id', 'email'];


    Public function permission(){
        return $this->hasMany('App\Permission','user');
    }

}
