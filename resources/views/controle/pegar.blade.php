@extends('adminlte::page')

@section('title', 'Pegar Chave')

@section('content_header')
    <h4 class="text-center">PEGAR CHAVE</h4>
@stop

@section('content')
    <div class="container-md col-md-4">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('controle.retirar') }}" method="post" class="form">
                    @method('post')
                    @csrf
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Sala: </span>
                        </div>
{{--                        {{ dd((float)((\Carbon\Carbon::parse($chave[0]->controle()->orderBy('id','desc')->first()->dataAgendou))->floatDiffInMinutes(\Carbon\Carbon::now(), false))) }}--}}
                        <select class="select2 select form-control" name="sala" onchange="inputCodigo(value)" required>
                            <option value="" disabled selected>Escolha...</option>
                            @foreach($chave as $c)
                                @if(isset($c->controle()->first()->chave))
                                    @if($c->controle()->first()->chave == $c->id && (\Carbon\Carbon::parse($c->controle()->orderBy('id', 'desc')->first()->dataAgendou))->floatDiffInMinutes(\Carbon\Carbon::now(), false) >= 0)
                                        <option value="{{ $c->codigo }}">{{ $c->sala()->first()->sala }}</option>
                                    @endif
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Cód. Chave: </span>
                        </div>
                        <input type="text" name="codigo" id="codigo" class="form-control" placeholder="Código da Chave" required>
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
