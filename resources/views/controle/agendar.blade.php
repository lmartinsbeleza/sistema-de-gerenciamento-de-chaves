@extends('adminlte::page')

@section('title', 'Pegar Chave')

@section('content_header')
    {{--inicio da imagem que fica aparecendo no topo da tela--}}
    <div class="text-center">
        <img class="img-fluid" src="{{ url('img/reservas.png') }}" alt="CADASTRAR USUÁRIO">
    </div>
    {{--final da imagem que aparece no topo da tela--}}
@stop

@section('content')
    <div class="container-md col-md-4">
        <div class="card">
            <div class="card-body">
                {{--inicio do formulário--}}
                <form action="{{ route('controle.salvar.agendamento') }}" method="post" class="form">
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
                                <option value="{{ $c->codigo }}">{{ $c->sala()->first()->sala }}</option>
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

                    {{--inicio do input que seleciona a data e a hora que vai ser agendada para pegar a chave--}}
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Data e Hora: </span>
                        </div>
                        <input type="date" min="{{ date('Y-m-d') }}" value="{{ date('Y-m-d') }}" name="dataRetirar" id="dataRetirar" class="form-control" placeholder="Código da Chave" required>
                        <input type="time" min="{{ date('H:i') }}" value="{{ date('H:i') }}" name="horarioRetirar" id="horarioRetirar" class="form-control" placeholder="Código da Chave" required>
                    </div>
                    {{--final do input que seleciona a data e a hora que vai ser agendada para pegar a chave--}}

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
