@extends('layouts.painel')

@section('content')
    <link href="{{URL::asset('css/fileinput.css')}}" rel="stylesheet">
    <script src="{{URL::asset('js/jquery.js')}}"></script>
    <script src="{{URL::asset('js/fileinput.js')}}"></script>
    <script src="{{URL::asset('js/locales/pt-BR.js')}}"></script>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            @if (session('status'))
                <div class="alert alert-warning">
                    {{ session('status') }}
                </div>
            @endif
            <form method="post" action="{{url("postagem/insert")}}">
                {{ csrf_field() }}
                <div class="form-group">
                    @if ($errors->has('titulo'))
                        <div class="alert alert-warning alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <strong>Atenção!</strong>{{ $errors->first('titulo') }}
                        </div>
                    @endif
                    <label>Título</label>
                    <input type="text" name="titulo" class="form-control" placeholder="Título Postagem"/>
                </div>
                <div class="form-group">
                    @if ($errors->has('corpo'))
                        <div class="alert alert-warning alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <strong>Atenção!</strong>{{ $errors->first('corpo')}}
                        </div>
                    @endif
                    <label>Postagem</label>
                    <textarea class="form-control" rows="15" name="corpo"></textarea>
                </div>
                <div class="checkbox">
                    <button type="submit" id="SalvarPost" class="btn btn-info">Salvar Postagem</button>
                    <label> <input type="checkbox" name="publicar">Publicar</label>

                </div>


            </form>


            <form enctype="multipart/form-data" id="formimagens" style="margin-top: 15px">
                {{ csrf_field() }}
                <div class="form-group">
                    <input id="file" name="file[]" type="file" multiple class="file"
                           data-upload-url="{{url('imagens/upload')}}" data-preview-file-type="jpg,png,gif">
                </div>
            </form>

        </div>

    </div>

    <script>
        /*var form = document.getElementById('formimagens');
         var request = new XMLHttpRequest();

         form.addEventListener('submit',function (e) {
         e.preventDefault();
         var formdata = new FormData(form);
         request.open('post','url');
         request.addEventListener('load',transferComplete);
         request.send(formdata);

         });
         function transferComplete(data) {
         console.log(data.currentTarget.response);

         }*/


    </script>
@endsection





