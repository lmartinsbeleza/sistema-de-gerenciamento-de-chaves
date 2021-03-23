@extends('adminlte::page')

@section('title', 'Editar Chave')

@section('content_header')
    <h3 class="text-center">EDITAR CHAVE</h3>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('chave.store', $chave->id) }}" method="post" class="form">
                @csrf
                @method('put')
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
