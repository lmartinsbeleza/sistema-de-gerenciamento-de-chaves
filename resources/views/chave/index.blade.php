@extends('adminlte::page')

@section('title', 'Lista de Chaves')

@section('content_header')
    <h3 class="text-center">LISTA DE CHAVES</h3>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table>
                <thead>
                    <tr>
                        <th>Sala</th>
                        <th>Código</th>
                        <th>Status</th>
                        @if(\Illuminate\Support\Facades\Auth::id() == 1)
                            <th>Ação</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach($chaves as $chave)
                        <tr>
                            <td>{{ $chave->sala }}</td>
                            <td>{{ $chave->codigo }}</td>
                            <td>{{ $chave->status }}</td>
                            <td>
                                @if(\Illuminate\Support\Facades\Auth::id() == 1)
                                    <td>
                                        <div class="row">
                                            <a href="{{ Route('chave.edit', $chave->id) }}" class="btn bg-orange">
                                                <i class="text-white fa fa-edit"></i> <t class="text-white">Editar</t>
                                            </a>
                                        </div>
                                        <form action="{{ Route('chave.destroy', $chave->id) }}" method="POST" class="row">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">
                                                <i class="fa fa-trash"></i> Deletar
                                            </button>
                                        </form>
                                    </td>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
