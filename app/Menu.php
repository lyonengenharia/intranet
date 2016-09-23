<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menus';
    protected $fillable =['id','nome','descricao'];
    public $timestamps = true;

    public function itens()
    {
        return $this->hasMany('App\ItensMenu','id','menu');
    }
    public function Localizacoes(){
        //App\LocalizacaoMenu
        return $this->hasMany('App\ListaLocalizacaoMenu',"menu");
    }
}
