@extends('layouts.painel')

@section('content')
    <link rel="stylesheet" href="{{URL::asset('css/listagens.css')}}">
    <script src="{{URL::asset('js/jquery.js')}}"></script>
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                <a href="{{url('menus/itens/incluir')}}" class="btn btn-info"><span
                            class="glyphicon glyphicon-plus-sign"></span> Incluir</a>
            </div>
        </div>
        <div class="panel panel-info">
            <div class="panel-body cabecalho">
                <div class="col-md-2 col-lg-2">
                    <b>Nome</b>
                </div>
                <div class="col-md-3 col-lg-3">
                    <b>URL</b>
                </div>
                <div class="col-md-2 col-lg-2">
                    <b>Target</b>
                </div>
                <div class="col-md-3 col-lg-3">
                    <b>Menus Associados</b>
                </div>
                <div class="col-md-2 col-lg-2">
                    <b>Ações</b>
                </div>
            </div>
        </div>
        @foreach($itens as $item)
            <div class="panel panel-default">
                <div class="panel-body linha">
                    <div class="col-md-2">
                        {{$item->nome}}
                    </div>
                    <div class="col-md-3">
                        {{$item->url}}
                    </div>
                    <div class="col-md-2">
                        {{$item->target}}
                    </div>
                    <div class="col-md-3">
                        @foreach($item->MenusItens as $menu)
                            <p class="espacamento-texto">{{$menu->Menu['nome']}}</p>
                        @endforeach
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-default btn-xs" title="Editar"><span
                                    class="glyphicon glyphicon-pencil"></span></button>
                        <button class="btn btn-default btn-xs incluiritens" title="Incluir itens"><span
                                    class="glyphicon glyphicon-plus"></span></button>
                        <button class="btn btn-default btn-xs" title="Localizações"><span
                                    class="glyphicon glyphicon-th"></span></button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection





