<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MenusItens extends Model
{
    protected $table = 'menus_itens';
    protected $fillable = ['id','item_id','menus_id'];
    public $timestamps = false;


    public function Menu(){
        return $this->hasOne('App\Menu','id','menus_id');
    }
    public function Item(){
        return $this->hasOne('App\Item','id','item_id');
    }
    public function getUpdatedAtColumn() {
        return null;
    }
}
