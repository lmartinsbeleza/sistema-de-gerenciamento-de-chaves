@extends('adminlte::page')

@section('title', 'Cadastrar usuário')

@section('content_header')
    {{--inicio da imagem que fica aparecendo no topo da tela--}}
    <div class="text-center">
        <img class="img-fluid" src="{{ url('img/img_cadastraruser.png') }}" alt="CADASTRAR USUÁRIO">
    </div>
    {{--final da imagem que aparece no topo da tela--}}
@stop

@section('content')
    <div class="container col-md-4">
        <div class="card">
            <div class="card-body">
                {{--inicio do formulário--}}
                <form action="{{ Route('user.store') }}" method="post" class="form">
                    @csrf
                    @include('user._partials.form')
                </form>
                {{--final do formulário--}}
            </div>
        </div>
    </div>

@endsection()
