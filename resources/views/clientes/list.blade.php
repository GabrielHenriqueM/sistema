@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="bg-light shadow p-4 rounded">
            <h1 class="text-center mb-4">Lista de Clientes</h1>
            <div class="table-wrapper">
                <table class="table table-bordered">
                    <thead class="table-dark text-center">
                        <tr>
                            <th>Nome Completo</th>
                            <th>Estado Civil</th>
                            <th>Telefone</th>
                            <th>E-mail</th>
                            <th>Gênero</th>
                            <th>Faixa de Preço</th>
                            <th>Tipo de Imóvel</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($clientes as $cliente)
                            <tr>
                                <td>{{ $cliente->nome_completo }}</td>
                                <td>{{ ucfirst($cliente->estado_civil) }}</td>
                                <td>{{ $cliente->telefone }}</td>
                                <td>{{ $cliente->email }}</td>
                                <td>{{ ucfirst($cliente->genero) }}</td>
                                <td>R$ {{ number_format($cliente->faixa_preco, 2, ',', '.') }}</td>
                                <td>{{ ucfirst($cliente->tipo_imovel_interesse) }}</td>
                                <td class="d-flex justify-content-center">
                                    <a href="{{ route('clientes.edit', $cliente->id) }}" class="btn btn-success btn-sm mx-1">Editar</a>
                                    <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST" class="delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm mx-1 delete-button">Deletar</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center">Nenhum cliente cadastrado.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
