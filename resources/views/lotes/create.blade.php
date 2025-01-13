@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="bg-light shadow p-4 rounded">
        <h1 class="text-center mb-4">Cadastrar Lote</h1>
        <form action="{{ route('lotes.store') }}" method="POST">
            @csrf
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="numero_lote" class="form-label">Número do Lote:</label>
                    <input type="text" class="form-control" id="numero_lote" name="numero_lote" placeholder="Digite o número do lote" required>
                </div>
                <div class="col-md-6">
                    <label for="rua" class="form-label">Rua:</label>
                    <input type="text" class="form-control" id="rua" name="rua" placeholder="Digite a rua" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="bairro" class="form-label">Bairro:</label>
                    <input type="text" class="form-control" id="bairro" name="bairro" placeholder="Digite o bairro" required>
                </div>
                <div class="col-md-6">
                    <label for="cidade" class="form-label">Cidade:</label>
                    <input type="text" class="form-control" id="cidade" name="cidade" placeholder="Digite a cidade" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="estado" class="form-label">Estado:</label>
                    <input type="text" class="form-control" id="estado" name="estado" placeholder="Digite o estado" required>
                </div>
                <div class="col-md-6">
                    <label for="cep" class="form-label">CEP:</label>
                    <input type="text" class="form-control" id="cep" name="cep" placeholder="Digite o CEP" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="area_total" class="form-label">Área Total (m²):</label>
                    <input type="number" step="0.01" class="form-control" id="area_total" name="area_total" placeholder="Digite a área total" required>
                </div>
                <div class="col-md-6">
                    <label for="valor_loteamento" class="form-label">Valor do Loteamento (R$):</label>
                    <input type="number" step="0.01" class="form-control" id="valor_loteamento" name="valor_loteamento" placeholder="Digite o valor do loteamento" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="status" class="form-label">Status:</label>
                    <select class="form-control" id="status" name="status" required>
                        <option value="disponivel">Disponível</option>
                        <option value="vendido">Vendido</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="observacoes" class="form-label">Observações:</label>
                    <textarea class="form-control" id="observacoes" name="observacoes" rows="2" placeholder="Digite observações sobre o lote"></textarea>
                </div>
            </div>
            <button type="submit" class="btn btn-dark w-100 mt-3">Cadastrar Lote</button>
        </form>
    </div>
</div>
@endsection
