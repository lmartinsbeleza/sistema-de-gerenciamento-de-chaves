@extends('adminlte::page')

@section('title', 'Lista de Usuários')

@section('content_header')
    {{--inicio da imagem que fica aparecendo no topo da tela--}}
    <div class="text-center">
        <img class="img-fluid" src="{{ url('img/img_users.png') }}" alt="LISTA DE USUÁRIO">
    </div>
    {{--final da imagem que aparece no topo da tela--}}
@stop

@section('content')
    <div class="card container">
        <div class="card-body">

            @if(session('mensagem'))
                <div class="container"  id="close">
                    <div class="alert alert-success alert-dismissible fade show col-md-4 mx-auto">
                        <j class="text-center">{{session('mensagem')}}</j>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            @endif

            <table class="table">
                <thead>
                <tr>
                    @if(\Illuminate\Support\Facades\Auth::id() == 1)
                        <th>Editar</th>
                    @endif
                    <th>Nome</th>
                    <th>Email</th>
                    @if(\Illuminate\Support\Facades\Auth::id() == 1)
                        <th>Ações</th>
                    @endif
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        @if(\Illuminate\Support\Facades\Auth::id() == 1)
                            <td>
                                <div>
                                    <a href="{{ Route('user.edit', $user->id) }}" class="btn bg-orange">
                                        <i class="text-white fa fa-edit"></i> <t class="text-white">Editar</t>
                                    </a>
                                </div>
                            </td>
                        @endif
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        @if(\Illuminate\Support\Facades\Auth::id() == 1)
                            <td>
                                <form action="{{ Route('user.destroy', $user->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fa fa-trash"></i> Deletar
                                    </button>
                                </form>
                            </td>
                        @endif
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
@section('js')
    <script>
        setTimeout(function() {document.getElementById('close').innerHTML = "";}, 5000);
    </script>
@stop
