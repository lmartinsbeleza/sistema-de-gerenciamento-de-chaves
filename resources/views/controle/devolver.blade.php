@extends('adminlte::page')

@section('title', 'Devolver Chave')

@section('content_header')
    <h4 class="text-center">DEVOLVER CHAVE</h4>
@stop

@section('content')
    <div class="container col-md-4">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('controle.entregar') }}" method="post" class="form">
                    @method('post')
                    @csrf
                    @include('controle._partials.form')
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

        function inputCodigo(value){
            var inputCodigo = document.getElementById('codigo');
            inputCodigo.removeAttribute('value');
            inputCodigo.setAttribute('value', value)
        }
    </script>
@endsection
