<?php

namespace App\Http\Controllers;


use App\Http\Requests;
use App\Posting;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PostagemController extends Controller
{

    public function index()
    {
        //$posts = new Posting();

        $collectionPost = \App\Posting::paginate(10);
        return view('postagem.postagem', ["breadcrumbs" => array("Postagens" => "postagem"), "page" => "Postagens", "explanation" => " lista de posts", 'postagem' => $collectionPost]);

    }

    public function incluir()
    {
        return view('postagem.incluir', ["breadcrumbs" => array("Postagens" => "postagem", "Incluir" => "#"), "page" => "Postagens", "explanation" => " inclusão de post"]);
    }

    public function editar($id)
    {
        $posting = Posting::find($id);
        return view('postagem.editar', ["breadcrumbs" => array("Postagens" => "postagem", "Editar" => "#"), "page" => "Postagens", "explanation" => " edição de post", "post" => $posting]);
    }

    public function insert(Requests\FormLogin $request)
    {
        //return $request->all();
        $publicar = 0;
        if ($request->has('publicar')) {
            $publicar = 1;
        }
        $post = new \App\Posting([
            'title' => $request->get('titulo'),
            'body' => $request->get('corpo'),
            'published' => $publicar,
            'data_published' => '',
            'user_published' => 1
        ]);
        $post->save();
        return redirect('postagem/incluir')->with('status', 'Post incluido com sucesso');
    }

    public function update(Requests\Postagem $request)
    {
        $post = Posting::find($request->get('id'));
        $post->body = $request->get('corpo');
        $post->title = $request->get('titulo');
        if ($request->has('publicar')) {
            $post->published = 1;
            $post->data_published = Carbon::now();
        } else {
            $post->published = 0;
        }
        if ($post->save()) {
            return redirect("postagem/editar/$post->id")->with('status', 'Post atualizado com sucesso com sucesso');
        } else {
            return redirect("postagem/editar/$post->id")->with('status', 'Erro ao incluir, procure a ti por favor.');
        }
    }

    public function publicacao(Request $request)
    {
        if ($request->has('id')) {
            $post = Posting::find($request->get('id'));
            if(empty($post)){
                return json_encode(['erro' => 1, 'msg' => 'Post não encontrado!']);
            }else{
                $post->published = $request->get('publicar');
                $post->data_published = Carbon::now();
                $post->save();
                $msg = $request->get('publicar')?'Post publicado com sucesso!':'Post não publicado';
                return json_encode(['erro' => 0, 'msg' => $msg]);
            }

        } else {

            return json_encode(['erro' => 1, 'msg' => 'Parâmetro incorreto!']);

        }
        return $request->all();
    }

    public function delete(Request $request)
    {
        if ($request->has('id')) {
            $post = Posting::find($request->get('id'));
            if(empty($post)){
                return json_encode(['erro' => 1, 'msg' => 'Post não encontrado!']);
            }else{
                $post->delete();
                return json_encode(['erro' => 0, 'msg' => 'Post removido com sucesso!']);
            }

        } else {

            return json_encode(['erro' => 1, 'msg' => 'Parâmetro incorreto!']);

        }
        return $request->all();
    }
}
