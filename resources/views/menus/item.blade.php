@extends('layouts.painel')

@section('content')
    <script src="{{URL::asset('js/jquery.js')}}"></script>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            @if (session('status'))
                <div class="alert alert-warning">
                    {{ session('status') }}
                </div>
            @endif
            <form name="novomenu" action="{{url('menus/item/insert')}}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    @if ($errors->has('nome'))
                        <span class="help-block">
                            <strong>{{ $errors->first('nome') }}</strong>
                        </span>
                    @endif
                    <label for="nome">Nome</label>
                    <input id="nome" name="nome" class="form-control" type="text">
                </div>
                <div class="form-group">
                    @if ($errors->has('url'))
                        <span class="help-block">
                            <strong>{{ $errors->first('url') }}</strong>
                        </span>
                    @endif
                    <label for="url">URL</label>
                    <input id="url" name="url" class="form-control"/>
                </div>
                <div class="form-group">
                    @if ($errors->has('target'))
                        <span class="help-block">
                            <strong>{{ $errors->first('target') }}</strong>
                        </span>
                    @endif
                    <label for="Menu">Target</label>

                    <select id="target" name="target" class="form-control" required>
                        <option value="_self">_self</option>
                        <option value="_blank">_blank</option>
                        <option value="_parent">_parent</option>
                        <option value="_top">_top</option>
                    </select>

                </div>
                <div class="form-group">
                    @if ($errors->has('assocmenus'))
                        <span class="help-block">
                            <strong>{{ $errors->first('assocmenus')}}</strong>
                        </span>
                    @endif
                    <label for="menu">Menu</label>
                    <div class="input-group">
                        <select id="menu" class="form-control">
                            @foreach($menus as $row)
                                <option value="{{$row->id}}">{{$row->nome}}</option>
                            @endforeach
                        </select>
                        <div class="input-group-btn">
                            <button type="button" class="btn btn-default" id="incluirmenu">Incluir</button>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-group">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Lista de localização
                            </div>
                            <div class="panel-body" id="listamenus">
                                <input type="hidden" multiple="multiple" name="assocmenus[]" >
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" id="btnEnviar" class="btn btn-info">Salvar</button>
            </form>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            var Menus = [];
            $('#incluirmenu').click(function () {
                var menuatual = $("#menu :selected");
                if(menuatual.val()!==undefined){
                    $("#menu :selected").remove();
                    Menus.push(menuatual);
                    linhaloc = "<div class=\"alert alert-info \" role=\"alert\">" +
                            "<button type=\"button\" class=\"close remover\"><span aria-hidden=\"true\">&times;</span></button>" +
                            "id: <span id='idlocal'>" + menuatual.val() + "</span>  " + menuatual.text() + "</div>";
                    $("#listamenus").append(linhaloc);

                }
            });
            $(document).on('click', '.remover', function () {
                idlocal = $(this).parent().find("#idlocal").text();
                $.each(Menus, function (key, value) {
                    if (value.val() == idlocal) {
                        opt = document.createElement('option');
                        opt.value = value.val();
                        opt.innerHTML = value.text();
                        $("#menu").append(opt);
                        Menus.splice(key, 1);

                    }


                });
                $(this).parent().remove();
            });
            $("form[name='novomenu']").submit(function (e) {
                $("input[name='assocmenus[]']").empty();
                opcoes = [];
                $.each(Menus, function (Key, value) {
                    opcoes.push(value.val());
                });
                $("input[name='assocmenus[]']").val(opcoes);



            });
        });

    </script>
@endsection





