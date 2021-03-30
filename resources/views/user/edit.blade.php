@extends('adminlte::page')

@section('title', 'Atualizar usuário')

@section('content_header')

    <div class="text-center">
        <img class="img-fluid" src="{{ url('img/img_attuser.png') }}" alt="ATUALIZAR USUÁRIO">
    </div>

@stop

@section('content')
    <div class="container col-md-4">
        <div class="card">
            <div class="card-body">
                <form action="{{ Route('user.update', $user->id) }}" method="post" class="form">
                    @csrf
                    @method('put')
                    @include('user._partials.form')
                </form>
            </div>
        </div>
    </div>

@endsection()
