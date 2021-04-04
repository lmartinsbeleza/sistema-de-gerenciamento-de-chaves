@extends('adminlte::page')

@section('title', 'Editar Chave')

@section('content_header')
    {{--inicio da imagem que fica aparecendo no topo da tela--}}
    <div class="text-center">
        <img class="img-fluid" src="{{ url('img/img_attuchave.png') }}" alt="EDITAR CHAVE">
    </div>
    {{--final da imagem que aparece no topo da tela--}}
@stop

@section('content')
    <div class="container col-md-4">
        <div class="card">
            <div class="card-body">
                {{--inicio do formulário--}}
                <form action="{{ route('chave.store', $chave->id) }}" method="post" class="form">
                    @csrf
                    @method('put')
                    @include('chave._partials.form')
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
    </script>
@endsection
