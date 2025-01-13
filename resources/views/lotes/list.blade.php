@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="bg-light shadow p-4 rounded">
        <h1 class="text-center mb-4">Lista de Lotes</h1>
        <div class="table-wrapper">
            <table class="table table-bordered">
                <thead class="table-dark text-center">
                    <tr>
                        <th>Número do Lote</th>
                        <th>Rua</th>
                        <th>Bairro</th>
                        <th>Cidade</th>
                        <th>Estado</th>
                        <th>Área Total</th>
                        <th>Valor (R$)</th>
                        <th>Status</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($lotes as $lote)
                        <tr>
                            <td>{{ $lote->numero_lote }}</td>
                            <td>{{ $lote->rua }}</td>
                            <td>{{ $lote->bairro }}</td>
                            <td>{{ $lote->cidade }}</td>
                            <td>{{ $lote->estado }}</td>
                            <td>{{ $lote->area_total }} m²</td>
                            <td>R$ {{ number_format($lote->valor_loteamento, 2, ',', '.') }}</td>
                            <td class="text-center">
                                @if ($lote->status === 'disponivel')
                                    <span class="badge bg-success">Disponível</span>
                                @else
                                    <span class="badge bg-danger">Vendido</span>
                                @endif
                            </td>
                            <td class="d-flex justify-content-center">
                                <a href="{{ route('lotes.edit', $lote->id) }}" class="btn btn-success btn-sm mx-1">Editar</a>
                                <form action="{{ route('lotes.destroy', $lote->id) }}" method="POST" class="delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm mx-1">Deletar</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-center">Nenhum lote cadastrado.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
