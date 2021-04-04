@extends('adminlte::page')

@section('title', 'Devolver Chave')

@section('content_header')
    {{--Inicio da frase no topo da tela--}}
    <h4 class="text-center">DEVOLVER CHAVE</h4>
    {{--final da frase no topo da tela--}}
@stop

@section('content')
    <div class="container col-md-4">
        <div class="card">
            <div class="card-body">
                {{--inicio do formulário--}}
                <form action="{{ route('controle.entregar') }}" method="post" class="form">
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
                                    @if($c->controle()->first()->chave == $c->id)
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
