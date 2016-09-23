@extends('layouts.painel')

@section('content')
    <script src="{{URL::asset('js/jquery.js')}}"></script>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">

            <form enctype="multipart/form-data" id="formimagens" action="{{url('imagens/upload')}}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <input id="file-5" name="file[]" class="form-control" type="file" multiple>
                </div>
                <button type="submit" id="btnEnviar" class="btn btn-info">Upload Fotos</button>
            </form>
        </div>
    </div>

    <script>
        $(document).ready(function () {




        });

    </script>
@endsection





