@extends('adminlte::page')

@section('title', 'Pegar Chave')

@section('content_header')
    {{--Inicio da frase no topo da tela--}}
    <h4 class="text-center">PEGAR CHAVE</h4>
    {{--final da frase no topo da tela--}}
@stop

@section('content')
    <div class="container-md col-md-4">
        <div class="card">
            <div class="card-body">
                {{--inicio do formulário--}}
                <form action="{{ route('controle.retirar') }}" method="post" class="form">
                    @method('post')
                    @csrf
                    {{--inicio do input que vai ser utilizado para selecionar a chave que vai ser pega--}}
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Sala: </span>
                        </div>
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
                    {{--final do input que vai ser utilizado para selecionar a chave que vai ser pega--}}

                    {{--inicio do input que vai mostra o código da chave que esta sendo pega--}}
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Cód. Chave: </span>
                        </div>
                        <input type="text" name="codigo" id="codigo" class="form-control" placeholder="Código da Chave" required>
                    </div>
                    {{--final do input que vai mostra o código da chave que esta sendo pega--}}

                    {{--botão que envia as informações--}}
                    <div class="row float-right">
                        <button type="submit" class="btn btn-success">Pegar</button>
                    </div>
                </form>
                {{--final do formulário--}}
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        //comando que habilita o select2 para uso
        $(document).ready(function() {
            $('.select2').select2();
        });

        //função que coloca as informação da chave no input de código da chave toda vez que a sala da chave for alterada
        function inputCodigo(value){
            var inputCodigo = document.getElementById('codigo');
            inputCodigo.removeAttribute('value');
            inputCodigo.setAttribute('value', value)
        }
    </script>
@endsection
