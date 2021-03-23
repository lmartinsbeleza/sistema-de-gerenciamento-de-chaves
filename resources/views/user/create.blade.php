@extends('adminlte::page')

@section('title', 'Cadastrar usuário')

@section('content_header')

    <h1 class="text-center">CADASTRAR NOVO USUÁRIO</h1>

@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ Route('user.store') }}" method="post" class="form">
                @csrf
                @include('user._partials.form')
            </form>
        </div>
    </div>

@endsection()
