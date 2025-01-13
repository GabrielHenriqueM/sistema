@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="bg-light shadow p-4 rounded">
        <h1 class="text-center mb-4">Editar Lote</h1>
        <form action="{{ route('lotes.update', $lote->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="numero_lote" class="form-label">Número do Lote:</label>
                    <input type="text" class="form-control" id="numero_lote" name="numero_lote" value="{{ $lote->numero_lote }}" required>
                </div>
                <div class="col-md-6">
                    <label for="rua" class="form-label">Rua:</label>
                    <input type="text" class="form-control" id="rua" name="rua" value="{{ $lote->rua }}" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="bairro" class="form-label">Bairro:</label>
                    <input type="text" class="form-control" id="bairro" name="bairro" value="{{ $lote->bairro }}" required>
                </div>
                <div class="col-md-6">
                    <label for="cidade" class="form-label">Cidade:</label>
                    <input type="text" class="form-control" id="cidade" name="cidade" value="{{ $lote->cidade }}" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="estado" class="form-label">Estado:</label>
                    <input type="text" class="form-control" id="estado" name="estado" value="{{ $lote->estado }}" required>
                </div>
                <div class="col-md-6">
                    <label for="cep" class="form-label">CEP:</label>
                    <input type="text" class="form-control" id="cep" name="cep" value="{{ $lote->cep }}" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="area_total" class="form-label">Área Total (m²):</label>
                    <input type="number" step="0.01" class="form-control" id="area_total" name="area_total" value="{{ $lote->area_total }}" required>
                </div>
                <div class="col-md-6">
                    <label for="valor_loteamento" class="form-label">Valor do Loteamento (R$):</label>
                    <input type="number" step="0.01" class="form-control" id="valor_loteamento" name="valor_loteamento" value="{{ $lote->valor_loteamento }}" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="status" class="form-label">Status:</label>
                    <select class="form-control" id="status" name="status" required>
                        <option value="disponivel" {{ $lote->status === 'disponivel' ? 'selected' : '' }}>Disponível</option>
                        <option value="vendido" {{ $lote->status === 'vendido' ? 'selected' : '' }}>Vendido</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="observacoes" class="form-label">Observações:</label>
                    <textarea class="form-control" id="observacoes" name="observacoes" rows="2">{{ $lote->observacoes }}</textarea>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-dark me-2 w-25">Salvar Alterações</button>
                <a href="{{ route('lotes.list') }}" class="btn btn-secondary w-25">Voltar</a>
            </div>
        </form>
    </div>
</div>
@endsection
