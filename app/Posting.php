<?php

namespace App;

use Faker\Provider\cs_CZ\DateTime;
use Illuminate\Database\Eloquent\Model;

class Posting extends Model
{
    protected $table = 'posting';
    protected $fillable =  ['title', 'body', 'published', 'data_published', 'user_published','update_at','create_at'];
    protected $dates =['create_at','data_published','update_at'];
    public $timestamps = true;

    public function users()
    {
        return $this->hasOne('App\Users','id','user_published');
    }



}
