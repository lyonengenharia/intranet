@extends('layouts.painel')

@section('content')
    <script src="{{URL::asset('js/jquery.js')}}"></script>
    <link rel="stylesheet" href="{{URL::asset('css/listagens.css')}}">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                <a href="{{url('menus/incluir')}}" class="btn btn-info"><span
                            class="glyphicon glyphicon-plus-sign"></span> Incluir</a>
            </div>

        </div>


        <div class="panel panel-info">
            <div class="panel-body cabecalho">
                <div class="col-md-2 col-lg-2">
                    <b>Nome</b>
                </div>
                <div class="col-md-4 col-lg-4">
                    <b>Localização</b>
                </div>
                <div class="col-md-4 col-lg-4">
                    <b>Descrição</b>
                </div>
                <div class="col-md-2 col-lg-2">
                    <b>Ações</b>
                </div>
            </div>
        </div>
        @foreach($menus as $row)
            <div class="panel panel-default">
                <div class="panel-body linha" >
                    <div class="col-md-2">
                        {{$row->nome}}
                    </div>
                    <div class="col-md-4">
                        @foreach($row->Localizacoes as $localizacao)
                            <p class="espacamento-texto">{{$localizacao->location->localizacao}}</p>
                        @endforeach
                    </div>
                    <div class="col-md-4">
                        {{$row->descricao}}
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
        {{$menus->links()}}
    </div>
    <div class="modal fade" tabindex="-1" role="dialog" id="novoitem">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Modal title</h4>
                </div>
                <div class="modal-body">
                    <p>One fine body&hellip;</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    </div>
    <script>
        $(document).ready(function () {
            $(".incluiritens").click(function () {
                $("#novoitem").modal('show');
            });


        });
    </script>
@endsection





