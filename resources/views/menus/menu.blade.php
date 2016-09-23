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
            <form name="menu" action="{{url('menus/insert')}}" method="post" enctype="application/x-www-form-urlencoded">
                {{ csrf_field() }}
                <div class="form-group">
                    @if ($errors->has('nome'))
                        <span class="help-block">
                            <strong>{{ $errors->first('nome') }}</strong>
                        </span>
                    @endif
                    <label for="nome">Nome</label>
                    <input id="nome" name="nome" class="form-control" type="text" value="">
                </div>
                <div class="form-group">
                    @if ($errors->has('desc'))
                        <span class="help-block">
                            <strong>{{ $errors->first('desc') }}</strong>
                        </span>
                    @endif
                    <label for="desc">Descrição</label>
                    <textarea id="desc" name="desc" class="form-control" rows="3"></textarea>
                </div>
                <div class="form-group">
                    @if ($errors->has('localizacao'))
                        <span class="help-block">
                            <strong>{{ $errors->first('localizacao') }}</strong>
                        </span>
                    @endif
                    <label for="localizacao">Localização</label>
                    <div class="input-group">
                        <select id="localizacao" class="form-control">
                            @foreach($localizacoes as $localizacao)
                                <option value="{{$localizacao->id}}">{{$localizacao->localizacao}}</option>
                            @endforeach
                        </select>
                        <div class="input-group-btn">
                            <button type="button" class="btn btn-default" id="incluirLocalizacao">Incluir</button>
                        </div>

                    </div>
                    <input type="hidden" multiple="multiple" name="localizacao[]" style="#display: none" >

                </div>
                <div class="form-group">
                    <div class="form-group">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Lista de localização
                            </div>
                            <div class="panel-body" id="listaLocalizaco">

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
            var Localizacoes = [];
            $('#incluirLocalizacao').click(function () {
                localizacaoatual = $("#localizacao :selected");
                $("#localizacao :selected").remove();
                Localizacoes.push(localizacaoatual);
                linhaloc = "<div class=\"alert alert-info \" role=\"alert\">" +
                        "<button type=\"button\" class=\"close remover\"><span aria-hidden=\"true\">&times;</span></button>" +
                        "id: <span id='idlocal'>" + localizacaoatual.val() + "</span>  " + localizacaoatual.text() + "</div>";

                $("#listaLocalizaco").append(linhaloc);
                $(document).on('click', '.remover', function () {
                    idlocal = $(this).parent().find("#idlocal").text();
                    $.each(Localizacoes, function (key, value) {
                        if (value.val() == idlocal) {
                            opt = document.createElement('option');
                            opt.value = value.val();
                            opt.innerHTML = value.text();
                            $("#localizacao").append(opt);
                            Localizacoes.splice(key, 1);
                        }

                    });
                    $(this).parent().remove();
                })
            });
            $("form[name='menu']").submit(function (e) {
                $("input[name='localizacao[]']").empty();
                opcoes = [];
                $.each(Localizacoes, function (Key, value) {
                     opcoes.push(value.val());
                });
                $("input[name='localizacao[]']").val(opcoes);


            });
        });


    </script>
@endsection





