@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="bg-light shadow p-4 rounded">
        <h1 class="text-center mb-4">Registrar Venda</h1>
        <form action="{{ route('vendas.store') }}" method="POST">
            @csrf

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="cliente_id" class="form-label">Cliente:</label>
                    <select class="form-control" id="cliente_id" name="cliente_id" required>
                        <option value="" disabled selected>Selecione o cliente</option>
                        @foreach ($clientes as $cliente)
                            <option value="{{ $cliente->id }}">{{ $cliente->nome_completo }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="tipo_imovel" class="form-label">Tipo de Imóvel:</label>
                    <select class="form-control" id="tipo_imovel" name="tipo_imovel" required>
                        <option value="" disabled selected>Selecione o tipo de imóvel</option>
                        <option value="casa">Casa</option>
                        <option value="apartamento">Apartamento</option>
                        <option value="lote">Lote</option>
                    </select>
                </div>
            </div>

            <div class="row mb-3" id="imovel-container" style="display: none;">
                <div class="col-md-12">
                    <label for="imovel_id" class="form-label">Imóvel:</label>
                    <select class="form-control" id="imovel_id" name="imovel_id" required>
                        <option value="" disabled selected>Selecione o imóvel</option>
                    </select>
                </div>
            </div>

            {{-- Informações da Venda --}}
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="valor_venda" class="form-label">Valor da Venda (R$):</label>
                    <input type="number" step="0.01" class="form-control" id="valor_venda" name="valor_venda" required>
                </div>
                <div class="col-md-6">
                    <label for="data_venda" class="form-label">Data da Venda:</label>
                    <input type="date" class="form-control" id="data_venda" name="data_venda" required>
                </div>
            </div>

            <button type="submit" class="btn btn-dark w-100 mt-3">Registrar Venda</button>
        </form>
    </div>
</div>

@endsection
