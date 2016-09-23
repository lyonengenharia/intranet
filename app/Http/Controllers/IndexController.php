<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class IndexController extends Controller
{
    public function index(){
        $collectionPost = \App\Posting::where('published','=',1)->orderBy('data_published','DESC')->paginate(10);
        //Menu acesso
        $collectionAcesso = \App\MenusItens::where('menus_id','=','3')->get();
        return view('welcome' ,[
            "breadcrumbs"=>array("Dashboard"=>"home")
            ,"page"=>"Dashboard"
            ,"explanation"=>" estáticas e visão geral"
            ,'postagem'=>$collectionPost
            ,'menuacessos'=>$collectionAcesso
        ]);
    }
}
