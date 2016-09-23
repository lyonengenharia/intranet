<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImagemController extends Controller
{
    public function upload(Request $request){
        $files = $request->file('file');
        if(!empty($files)){
            foreach ($files as $file):
                if($file->extension()=='jpeg' || $file->extension()=='jpg' || $file->extension()=='bmp'){
                    if(!Storage::exists('img/'.$file->getClientOriginalName())){
                        Storage::put('img/'.$file->getClientOriginalName(),file_get_contents($file));

                        //return response()->file(Storage::url('img/'.$file->getClientOriginalName()));
                        //Storage::move($file->getClientOriginalName(), 'img/'.$file->getClientOriginalName());
                    }else{
                        return json_encode(['error'=>'Arquivo já existe']);
                    }
                }else{
                    return json_encode(['error'=>'Tipo de arquivo não permitido!']);
                }

                //echo public_path(Storage::url('img/'.$file->getClientOriginalName()));

            endforeach;

            return json_encode('Upload realizado com sucesso');
        }
    }
    public function imagens(){
        return view('imagens.incluir',["breadcrumbs"=>array("Upload Imagens"=>"#"),"page"=>"Upload imagens","explanation"=>" para usar nos posts"]);
    }
}
