<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;

use App\Http\Requests;

class MenusController extends Controller
{

    public function insert(Requests\FormMenus $request){


        $menu = new \App\Menu();
        $menu->nome = $request->get('nome');
        $menu->descricao = $request->get('desc');
        $menu->save();


        $localizacoes = explode(",",$request->get('localizacao')[0]);
        foreach ($localizacoes as $row){
            $localizacaoMenu = new \App\ListaLocalizacaoMenu();
            $localizacaoMenu->menu = $menu->id;
            $localizacaoMenu->localizacao = $row;
            $localizacaoMenu->save();


        }
        return redirect('menus/incluir')->with('status','inserido com sucesso');

    }
    public function iteminsert(Requests\FormItem $request){
        $item = new \App\Item();
        $item->nome = $request->get('nome');
        $item->url = $request->get('url');
        $item->target = $request->get('target');
        $item->save();
        $menus = explode(",",$request->get('assocmenus')[0]);
        foreach ($menus as $menu){
            $menusitens = new \App\MenusItens();
            $menusitens->menus_id = $menu;
            $menusitens->item_id = $item->id;
            $menusitens->save(['updated_at']);
        }
        return redirect('/menus/itens/incluir')->with('status','inserido com sucesso');

    }
}
