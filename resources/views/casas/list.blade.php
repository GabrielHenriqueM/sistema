@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="bg-light shadow p-4 rounded">
        <h1 class="text-center mb-4">Lista de Casas</h1>
        <div class="table-wrapper">
            <table class="table table-bordered">
                <thead class="table-dark text-center">
                    <tr>
                        <th>Rua</th>
                        <th>Número</th>
                        <th>Bairro</th>
                        <th>Cidade</th>
                        <th>Estado</th>
                        <th>CEP</th>
                        <th>Preço (R$)</th>
                        <th>Status</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($casas as $casa)
                        <tr>
                            <td>{{ $casa->rua }}</td>
                            <td>{{ $casa->numero }}</td>
                            <td>{{ $casa->bairro }}</td>
                            <td>{{ $casa->cidade }}</td>
                            <td>{{ $casa->estado }}</td>
                            <td>{{ $casa->cep }}</td>
                            <td>R$ {{ number_format($casa->preco_imovel, 2, ',', '.') }}</td>
                            <td class="text-center">
                                @if ($casa->status === 'vendido')
                                    <span class="badge bg-danger">
                                        <i class="bi bi-x-circle"></i> Vendido
                                    </span>
                                @else
                                    <span class="badge bg-success">
                                        <i class="bi bi-check-circle"></i> Disponível
                                    </span>
                                @endif
                            </td>
                            <td class="d-flex justify-content-center">
                                <a href="{{ route('casas.edit', $casa->id) }}" class="btn btn-success btn-sm mx-1">Editar</a>
                                <form action="{{ route('casas.destroy', $casa->id) }}" method="POST" class="delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm mx-1 delete-button">Deletar</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-center">Nenhuma casa cadastrada.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
