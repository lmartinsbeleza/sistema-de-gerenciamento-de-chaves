@extends('adminlte::page')

@section('title', 'Editar Chave')

@section('content_header')
    <div class="text-center">
        <img class="img-fluid" src="{{ url('img/img_attuchave.png') }}" alt="EDITAR CHAVE">
    </div>
@stop

@section('content')
    <div class="container col-md-4">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('chave.store', $chave->id) }}" method="post" class="form">
                    @csrf
                    @method('put')
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
