@extends('adminlte::page')

@section('title', 'Cadastrar Chave')

@section('content_header')
    <div class="text-center">
        <img src="{{ url('img/img_cadastrachave.png') }}" alt="CADASTRAR CHAVE">
    </div>
@stop

@section('content')
    <div class="container col-md-4">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('chave.store') }}" method="post" class="form">
                    @csrf
                    @method('post')
                    @include('chave._partials.form')
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
@endsection
