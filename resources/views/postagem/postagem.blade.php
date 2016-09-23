@extends('layouts.painel')

@section('content')
    <script src="{!! url('js/jquery/jquery.js') !!}"></script>
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-body">
                <a href="{{url('postagem/incluir')}}" class="btn btn-info"><span
                            class="glyphicon glyphicon-plus-sign"></span> Incluir</a>
            </div>
        </div>
        <table class="table table-bordered table-responsive table-hover">
            <thead>
            <th>Título</th>
            <th>Data criação</th>
            <th>Publicado</th>
            <th>Usuário de criação</th>
            <th>Ações</th>
            </thead>
            <tbody>
            @foreach($postagem as $row)
                <tr>
                    <input type="hidden" id="id" value="{{$row->id}}">
                    <td>{{$row->title}}</td>
                    <td>{{$row->created_at->format('d/m/Y')}}</td>
                    <td>{{$row->published? $row->data_published->format('d/m/Y H:i'):'Não publicado'}}</td>
                    <td>{{$row->users['email']}}</td>
                    <td>
                        <a href="{{url("postagem/editar/$row->id")}}" class="btn btn-xs btn-default"><span
                                    class="glyphicon glyphicon-pencil"></span></a>
                        <button type="button" class="btn btn-xs btn-danger delete"><span
                                    class="glyphicon glyphicon-trash"></span></button>
                        @if(!$row->published)
                            <a href="#" class="btn btn-xs btn-info publicar"><span
                                        class="glyphicon glyphicon-cloud-upload"></span></a>
                        @else
                            <a href="#" class="btn btn-xs btn-warning nao-publicar"><span
                                        class="glyphicon glyphicon-cloud-download"></span></a>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <script>
        $(document).ready(function () {

            $('.delete').click(function () {

                if (window.confirm("Confirma a exclusão do post ?"))
                    $.ajax({
                        url: '{{url('postagem/delete')}}',
                        type: 'delete',
                        dataType: 'json',
                        data: {id: $(this).parent().parent().find('#id').val(), _token: '{!! csrf_token() !!}'},
                        success: function (data) {
                            if (data.erro === 0) {
                                alert(data.msg);
                                location.reload();
                            } else {
                                alert(data.msg);
                            }
                        }
                    });
            });
            $('.publicar').click(function () {
                $.ajax({
                    url: '{{url('postagem/publicar')}}',
                    type: 'put',
                    dataType: 'json',
                    data: {
                        id: $(this).parent().parent().find('#id').val(),
                        _token: '{!! csrf_token() !!}',
                        publicar: 1
                    },
                    success: function (data) {
                        if (data.erro === 0) {
                            alert(data.msg);
                            location.reload();
                        } else {
                            alert(data.msg);
                        }
                    }
                });
            });
            $('.nao-publicar').click(function () {
                $.ajax({
                    url: '{{url('postagem/publicar')}}',
                    type: 'put',
                    dataType: 'json',
                    data: {
                        id: $(this).parent().parent().find('#id').val(),
                        _token: '{!! csrf_token() !!}',
                        publicar: 0
                    },
                    success: function (data) {
                        if (data.erro === 0) {
                            alert(data.msg);
                            location.reload();
                        } else {
                            alert(data.msg);
                        }
                    }
                });
            });
        });
    </script>
    {{$postagem->links()}}
@endsection
