@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="bg-light shadow p-4 rounded">
        <h1 class="text-center mb-4">Listagem de Vendas</h1>
        <table class="table table-striped table-bordered">
            <thead class="table-dark text-center">
                <tr>
                    <th>ID</th>
                    <th>Cliente</th>
                    <th>Tipo de Imóvel</th>
                    <th>Detalhes do Imóvel</th>
                    <th>Valor da Venda (R$)</th>
                    <th>Data da Venda</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($vendas as $venda)
                    <tr class="text-center">
                        <td>{{ $venda->id }}</td>
                        <td>{{ $venda->cliente->nome_completo }}</td>
                        <td>{{ ucfirst($venda->tipo_imovel) }}</td>
                        <td>
                            @if ($venda->imovel)
                                @if ($venda->tipo_imovel === 'casa')
                                    {{ $venda->imovel->rua }}, {{ $venda->imovel->numero }}, Bairro {{ $venda->imovel->bairro }}, {{ $venda->imovel->cidade }}
                                @elseif ($venda->tipo_imovel === 'apartamento')
                                    {{ $venda->imovel->bloco_predio }}, Ap. {{ $venda->imovel->numero_apartamento }}, Bairro {{ $venda->imovel->bairro }}, {{ $venda->imovel->cidade }}
                                @elseif ($venda->tipo_imovel === 'lote')
                                    {{ $venda->imovel->numero_lote }}, Bairro {{ $venda->imovel->bairro }}, {{ $venda->imovel->cidade }}
                                @endif
                            @else
                                <span class="text-danger">Imóvel não encontrado</span>
                            @endif
                        </td>
                        <td>{{ number_format($venda->valor_venda, 2, ',', '.') }}</td>
                        <td>{{ date('d/m/Y', strtotime($venda->data_venda)) }}</td>
                        <td>
                            {{-- Botão de excluir --}}
                            <form action="{{ route('vendas.destroy', $venda->id) }}" method="POST" class="d-inline delete-form">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash"></i> Excluir
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">Nenhuma venda registrada.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
