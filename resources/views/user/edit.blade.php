@extends('adminlte::page')

@section('title', 'Atualizar usuário')

@section('content_header')

    <h1 CLASS="text-center">ATUALIZAÇÃO DE USUÁRIO</h1>

@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ Route('user.update', $user->id) }}" method="post" class="form">
                @csrf
                @method('put')
                @include('user._partials.form')
            </form>
        </div>
    </div>

@endsection()
