@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="text-center">DASHBOARD</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {{--inicio do alert que vai mostrar as mensagens de sucesso--}}
            @if(session('mensagem'))
                <div class="container"  id="close">
                    <div class="alert alert-success alert-dismissible fade show col-md-4 mx-auto">
                        <j class="text-center">{{session('mensagem')}}</j>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            @endif
            {{--final do alert que vai mostar as mensagens de sucesso--}}

            {{--Começo da parte que mostra a quantidade de chaves--}}
            <div class="text-center col-md-12">
                <h3 class="text-center">QUANTIDADE DE CHAVES</h3>
            </div>
            <div class="row">
                <div class="col px-md-12">
                    <div class="info-box p-0">
                        <span class="info-box-icon bg-green" style="border-radius: 0"><i class="fa fa-key" aria-hidden="true"></i></span>
                        <div class="text-center info-box-content bg-light">
                            <h4 class="info-box-text">Disponível</h4>
                            <h5 class="info-box-number">{{ $quantidadeChaves->quantidade(1)->quantidade ?? "Não possui" }}</h5>
                        </div>
                    </div>
                </div>
                <div class="col px-md-12">
                    <div class="info-box p-0">
                        <span class="info-box-icon bg-yellow" style="border-radius: 0"><i class="fa fa-key text-white" aria-hidden="true"></i></span>
                        <div class="text-center info-box-content bg-light">
                            <h4 class="info-box-text">Indisponível</h4>
                            <h5 class="info-box-number">{{ $quantidadeChaves->quantidade(2)->quantidade ?? "Não possui" }}</h5>
                        </div>
                    </div>
                </div>
                <div class="col px-md-12">
                    <div class="info-box p-0">
                        <span class="info-box-icon bg-blue" style="border-radius: 0"><i class="fa fa-key" aria-hidden="true"></i></span>
                        <div class="text-center info-box-content bg-light">
                            <h4 class="info-box-text">Agendadas</h4>
                            <h5 class="info-box-number">{{ $quantidadeChaves->quantidade(3)->quantidade ?? "Não possui" }}</h5>
                        </div>
                    </div>
                </div>
            </div>
            {{--fim da parte que mostra a quantidade de chaves--}}

            {{--começo da tabela que mostra as informações--}}
            <div class="container responsive">
                <table class="table table-bordered table-hover table-head-fixed table-responsive-sm">
                    <thead>
                    <tr>
                        <th>Chave da sala</th>
                        <th>Código</th>
                        <th>Pessoa</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($chaves as $chave)
                        <tr>
                            <td>{{ $chave->sala()->first()->sala }}</td>
                            <td>{{ $chave->codigo }}</td>
                            <td>{{ $chave->controle()->orderBy('id','desc')->first() ? ( is_null($chave->controle()->orderBy('id','desc')->first()->devolveu) ? $chave->controle()->first()->retirou()->first()->name : "Não foi agendada" ) : "Não foi agendada" }}</td>
                            <td>{{ $chave->status()->first()->status }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                        <td colspan="4">
                            <span class="float-right">
                                {{ $chaves->links() }}
                            </span>
                        </td>
                    </tfoot>
                </table>
            </div>
            {{--final da tabela que mostra as informações--}}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        setTimeout(function() {document.getElementById('close').innerHTML = "";}, 5000);
    </script>
@stop
