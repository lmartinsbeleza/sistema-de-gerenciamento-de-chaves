@extends('adminlte::page')

@section('title', 'Lista de Usuários')

@section('content_header')
    <h3 class="text-center">LISTA DE USUÁRIOS</h3>
@stop

@section('content')
    <div class="container">
        <table>
            <thead>
            <tr>
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
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    @if(\Illuminate\Support\Facades\Auth::id() == 1)
                        <td>
                            <div class="">
                                <a href="{{ Route('user.edit', $user->id) }}" class="btn bg-orange">
                                    <i class="text-white fa fa-edit"></i> <t class="text-white">Editar</t>
                                </a>
                            </div>
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
@endsection
