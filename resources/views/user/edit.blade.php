@extends('adminlte::page')

@section('title', 'Atualizar usuário')

@section('content_header')
    {{--inicio da imagem que fica aparecendo no topo da tela--}}
    <div class="text-center">
        <img class="img-fluid" src="{{ url('img/img_attuser.png') }}" alt="ATUALIZAR USUÁRIO">
    </div>
    {{--final da imagem que aparece no topo da tela--}}
@stop

@section('content')
    <div class="container col-md-4">
        <div class="card">
            <div class="card-body">
                {{--inicio do formulário--}}
                <form action="{{ Route('user.update', $user->id) }}" method="post" class="form">
                    @csrf
                    @method('put')
                    @include('user._partials.form')
                </form>
                {{--final do formulário--}}
            </div>
        </div>
    </div>

@endsection()
