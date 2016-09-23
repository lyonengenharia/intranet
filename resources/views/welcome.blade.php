@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">
                        <div class="item active">
                            <img src="http://intranet.lyonengenharia.com.br/Intranet/Procedimentos/Informatica/Infografico.jpg"
                                 alt="Informativo TI" width="400px" style="max-height:1070px ">
                            <div class="carousel-caption">
                                Informativo Ti
                            </div>
                        </div>
                        <div class="item">
                            <img src="http://intranet.lyonengenharia.com.br/Intranet/Procedimentos/Plano_de_Auditoria_-_Parte_2.jpg"
                                 alt="..." width="400px">
                            <div class="carousel-caption">
                                SGI
                            </div>
                        </div>
                    </div>
                    <!-- Controls -->
                    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>

            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-4">

                        <div class="panel panel-default" style="margin-top: 15px">
                            <div class="panel-heading">Acessos</div>
                            <div class="panel-body">
                                @php
                                    $count = 0;
                                @endphp

                                @foreach($menuacessos as $acesso)
                                    @if($count==0)
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                    @endif
                                        <p><a href="{{$acesso->url}}" target="{{$acesso->target}}"> {{$acesso->Item->nome}}</a></p>

                                    @if($count==5)
                                        </div>
                                        @php
                                            $count = 0;
                                        @endphp
                                    @endif
                                    @php
                                        $count++;
                                    @endphp



                                @endforeach
                                {{--<div class="col-md-6 col-sm-6 col-xs-6">--}}
                                {{--<p><a href="#">Ações Sociais</a></p>--}}
                                {{--<p><a href="#">Aniversariantes</a></p>--}}
                                {{--<p><a href="#">Calendário</a></p>--}}
                                {{--<p><a href="#">Centro de Custos</a></p>--}}
                                {{--<p><a href="#">Eventos</a></p>--}}
                                {{--<p><a href="#">Facilidades PABX</a></p>--}}
                                {{--</div>--}}
                                {{--<div class="col-md-6 col-sm-6 col-xs-6">--}}
                                {{--<p><a href="#">Malote</a></p>--}}
                                {{--<p><a href="#">Mapa de Risco</a></p>--}}
                                {{--<p><a href="#">Sugestões</a></p>--}}
                                {{--<p><a href="#">Organanograma</a></p>--}}
                                {{--<p><a href="#">Padronização Lyon</a></p>--}}
                                {{--<p><a href="#">Ramais</a></p>--}}
                                {{--</div>--}}
                                {{--<div class="col-md-12">--}}
                                {{--<p><a href="#">Minuto Saúde e Segurança</a></p>--}}
                                {{--</div>--}}
                            </div>
                        </div>


                        <div class="panel panel-default" style="margin-top: 15px">
                            <div class="panel-heading">Sistemas</div>
                            <div class="panel-body">
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <p><a href="#">Ged Administrativo</a></p>
                                    <p><a href="#">Web-Mail</a></p>
                                    <p><a href="#">EPM Lyon</a></p>
                                    <p><a href="#">Meridian Web</a></p>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <p><a href="#">Tasker</a></p>
                                    <p><a href="#">Sogi</a></p>
                                    <p><a href="#">Sapiens Web</a></p>

                                </div>
                                <div class="col-md-12">
                                    <hr>
                                    <p><a href="#">Gedweb Gestão de normas técnicas</a></p>
                                    <p><a href="#">Sistema de controle Projeto Luz para todos</a></p>
                                    <p><a href="#">Sistema de Controle de horas</a></p>
                                    <p><a href="#">Sistema de Cadastro de curriculum</a></p>
                                    <p><a href="#">Sistema de Acompanhamento de obras</a></p>
                                    <p><a href="#">Sistema de Gestão de Malotes</a></p>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-8">
                        @foreach($postagem as $post)
                            <div class="panel panel-default" style="margin-top: 15px">
                                <div class="panel-heading">{{$post->title}}
                                    <span style="float: right">
                                        {{$post->updated_at->format('d/m/Y H:i')}}
                                    </span>
                                </div>
                                <div class="panel-body">
                                    {!!$post->body!!}
                                </div>
                            </div>
                        @endforeach
                        {{$postagem->links()}}
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
