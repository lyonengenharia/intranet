<?php


Route::get('/', 'IndexController@index');


/**
 * Login e Logout
 */
Route::post('/acesso', 'login@acesso');
Route::get('/logout', 'login@logout');
Route::get('/login', 'login@index');
/**
 * Painel administrativo
 */
Route::get('/home', ['middleware' => 'authacess', 'uses' => 'HomeController@index']);


Route::group(['prefix' => 'postagem', 'middleware' => 'authacess'], function () {
    Route::get('/', ['middleware' => 'authacess', 'uses' => 'PostagemController@index']);

    Route::get('/incluir', ['middleware' => 'authacess', 'uses' => 'PostagemController@incluir']);
    Route::post('/insert', ['middleware' => 'authacess', 'uses' => 'PostagemController@insert']);

    Route::get('/editar/{id}', ['middleware' => 'authacess', 'uses' => 'PostagemController@editar']);
    Route::post('/update', ['middleware' => 'authacess', 'uses' => 'PostagemController@update']);

    Route::delete('/delete/', ['middleware' => 'authacess', 'uses' => 'PostagemController@delete']);

    Route::put('/publicar/', ['middleware' => 'authacess', 'uses' => 'PostagemController@publicacao']);
});


/**
 * Menus
 */
Route::group(['prefix' => 'menus', 'middleware' => 'authacess'], function () {

    Route::get('/', function (){
        $menus =\App\Menu::paginate(5);
        return view('menus.menus', [
            "breadcrumbs" => array("Menus" => "#")
            ,"page" => "Menus"
            ,"explanation" => " lista de menus"
            ,"menus"=>$menus
        ]);
    });
    Route::get('/itens', function (){
        $itens = \App\Item::paginate(5);
        return view('menus.itens', [
            "breadcrumbs" => array("Menus" => "menus","Itens"=>"#")
            , "page" => "Itens"
            , "explanation" => " lista de itens"
            , "itens"=>$itens
        ]);
    });
    Route::get('/itens/incluir', function () {
        $menus =\App\Menu::all();
        return view('menus.item', [
            "breadcrumbs" => array("Menus" => "menus", "Itens" => "menus","Incluir"=>"#")
            ,"page" => "Item"
            ,"explanation" => " Inserção de um novo item"
            ,"menus"=>$menus
        ]);
    });
    Route::get('/incluir', function (){
        //Localizações
        $localizacoes = \App\LocalizacaoMenu::all();
        return view('menus.menu', ["breadcrumbs" => array("Menus" => "menus","Incluir"=>"#"),
            "page" => "Menus",
            "explanation" => " inclusão",
            "localizacoes"=>$localizacoes
        ]);
    });
    Route::post('/item/insert', 'MenusController@iteminsert');
    Route::post('/insert', 'MenusController@insert');
    Route::get('/editar', 'MenusController@editar');
});


/**
 * Imagens
 */
Route::get('/imagens/', ['middleware' => 'authacess', 'uses' => 'ImagemController@imagens']);
Route::post('/imagens/upload', "ImagemController@upload");


