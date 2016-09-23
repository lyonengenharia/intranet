<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'item';
    protected $fillable = ['id','nome','url','target'];
    protected $timestamp = true;

    public function MenusItens(){
        return $this->hasMany('App\MenusItens');
    }
}
