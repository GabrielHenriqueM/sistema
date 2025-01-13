@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="bg-light shadow p-4 rounded">
        <h1 class="text-center mb-4">Lista de Apartamentos</h1>
        <div class="table-wrapper">
            <table class="table table-bordered">
                <thead class="table-dark text-center">
                    <tr>
                        <th>Bloco/Prédio</th>
                        <th>N.º Apto</th>
                        <th>Andar</th>
                        <th>Rua</th>
                        <th>Bairro</th>
                        <th>Cidade</th>
                        <th>Estado</th>
                        <th>Área Total</th>
                        <th>Preço (R$)</th>
                        <th>Status</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($apartamentos as $apartamento)
                        <tr>
                            <td>{{ $apartamento->bloco_predio }}</td>
                            <td>{{ $apartamento->numero_apartamento }}</td>
                            <td>{{ $apartamento->andar }}</td>
                            <td>{{ $apartamento->rua }}</td>
                            <td>{{ $apartamento->bairro }}</td>
                            <td>{{ $apartamento->cidade }}</td>
                            <td>{{ $apartamento->estado }}</td>
                            <td>{{ $apartamento->area_total }} m²</td>
                            <td>R$ {{ number_format($apartamento->preco_imovel, 2, ',', '.') }}</td>
                            <td class="text-center">
                                @if ($apartamento->status === 'disponivel')
                                    <span class="badge bg-success">Disponível</span>
                                @else
                                    <span class="badge bg-danger">Vendido</span>
                                @endif
                            </td>
                            <td class="d-flex justify-content-center">
                                <a href="{{ route('apartamentos.edit', $apartamento->id) }}" class="btn btn-success btn-sm mx-1">Editar</a>
                                <form action="{{ route('apartamentos.destroy', $apartamento->id) }}" method="POST" class="delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm mx-1">Deletar</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="11" class="text-center">Nenhum apartamento cadastrado.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
