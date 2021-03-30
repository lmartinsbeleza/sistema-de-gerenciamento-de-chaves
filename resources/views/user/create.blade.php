@extends('adminlte::page')

@section('title', 'Cadastrar usuário')

@section('content_header')

    <div class="text-center">
        <img class="img-fluid" src="{{ url('img/img_cadastraruser.png') }}" alt="CADASTRAR USUÁRIO">
    </div>

@stop

@section('content')
    <div class="container col-md-4">
        <div class="card">
            <div class="card-body">
                <form action="{{ Route('user.store') }}" method="post" class="form">
                    @csrf
                    @include('user._partials.form')
                </form>
            </div>
        </div>
    </div>

@endsection()
