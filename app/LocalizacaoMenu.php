<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LocalizacaoMenu extends Model
{
    protected $fillable = ["id","localizacao","descricao"];
    protected $timestamp = true;

}
