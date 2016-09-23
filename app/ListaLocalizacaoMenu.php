<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListaLocalizacaoMenu extends Model
{
    protected  $table = "lista_localizacao_menus";
    protected $fillable = ["id","menu","item"];
    protected $timestamp =true;

    public function location(){
        return $this->hasOne('App\LocalizacaoMenu','id','localizacao');
    }
}
