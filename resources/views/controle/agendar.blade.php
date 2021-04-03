@extends('adminlte::page')

@section('title', 'Pegar Chave')

@section('content_header')
    <div class="text-center">
        <img class="img-fluid" src="{{ url('img/reservas.png') }}" alt="CADASTRAR USUÁRIO">
    </div>
@stop

@section('content')
    <div class="container-md col-md-4">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('controle.salvar.agendamento') }}" method="post" class="form">
                    @method('post')
                    @csrf
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Sala: </span>
                        </div>
                        <select class="select2 select form-control" name="sala" onchange="inputCodigo(value)" required>
                            <option value="" disabled selected>Escolha...</option>
                            @foreach($chave as $c)
                                <option value="{{ $c->codigo }}">{{ $c->sala()->first()->sala }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Cód. Chave: </span>
                        </div>
                        <input type="text" name="codigo" id="codigo" class="form-control" placeholder="Código da Chave" required>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Data e Hora: </span>
                        </div>
                        <input type="date" min="{{ date('Y-m-d') }}" value="{{ date('Y-m-d') }}" name="dataRetirar" id="dataRetirar" class="form-control" placeholder="Código da Chave" required>
                        <input type="time" min="{{ date('H:i') }}" value="{{ date('H:i') }}" name="horarioRetirar" id="horarioRetirar" class="form-control" placeholder="Código da Chave" required>
                    </div>

                    <div class="row float-right">
                        <button type="submit" class="btn btn-success">Pegar</button>
                    </div>

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
