@extends('adminlte::page')

@section('title', 'Lista de Chaves')

@section('content_header')
    <div class="text-center">
        <img class="img-fluid" src="{{ url('img/img_chaves.png') }}" alt="LISTA DE CHAVES">
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">

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

            <table class="table">
                <thead>
                    <tr>
                        <th>Editar</th>
                        <th>Sala</th>
                        <th>Código</th>
                        <th>Status</th>
                        <th>Deletar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($chaves as $chave)
                        <tr>
                            <td>
                                <div>
                                    <a href="{{ Route('chave.edit', $chave->id) }}" class="btn bg-orange">
                                        <i class="text-white fa fa-edit"></i> <t class="text-white">Editar</t>
                                    </a>
                                </div>
                            </td>
                            <td>{{ $chave->sala()->first()->sala }}</td>
                            <td>{{ $chave->codigo }}</td>
                            <td>{{ $chave->status()->first()->status }}</td>
                            <td>
                                <form action="{{ Route('chave.destroy', $chave->id) }}" method="POST" class="float-left">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fa fa-trash"></i> Deletar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
@section('js')
    <script>
        setTimeout(function() {document.getElementById('close').innerHTML = "";}, 5000);
    </script>
@stop
