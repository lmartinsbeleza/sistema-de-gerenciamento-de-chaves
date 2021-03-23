@extends('adminlte::page')

@section('title', 'Cadastrar Chave')

@section('content_header')
    <h3 class="text-center">CADASTRAR CHAVE</h3>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('chave.store') }}" method="post" class="form">
                @csrf
                @method('post')
                @include('chave._partials.form')
            </form>
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
