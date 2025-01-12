@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="bg-light shadow p-4 rounded">
        <h1 class="text-center mb-4">Editar Casa</h1>
        <form action="{{ route('casas.update', $casa->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="rua" class="form-label">Rua:</label>
                    <input type="text" class="form-control" id="rua" name="rua" value="{{ $casa->rua }}" required>
                </div>
                <div class="col-md-6">
                    <label for="numero" class="form-label">Número:</label>
                    <input type="text" class="form-control" id="numero" name="numero" value="{{ $casa->numero }}" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="bairro" class="form-label">Bairro:</label>
                    <input type="text" class="form-control" id="bairro" name="bairro" value="{{ $casa->bairro }}" required>
                </div>
                <div class="col-md-6">
                    <label for="cidade" class="form-label">Cidade:</label>
                    <input type="text" class="form-control" id="cidade" name="cidade" value="{{ $casa->cidade }}" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="estado" class="form-label">Estado:</label>
                    <input type="text" class="form-control" id="estado" name="estado" value="{{ $casa->estado }}" required>
                </div>
                <div class="col-md-6">
                    <label for="cep" class="form-label">CEP:</label>
                    <input type="text" class="form-control" id="cep" name="cep" value="{{ $casa->cep }}" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="quantidade_quartos" class="form-label">Quantidade de Quartos:</label>
                    <input type="number" class="form-control" id="quantidade_quartos" name="quantidade_quartos" value="{{ $casa->quantidade_quartos }}" required>
                </div>
                <div class="col-md-6">
                    <label for="area_de_lazer" class="form-label">Área de Lazer:</label>
                    <input type="text" class="form-control" id="area_de_lazer" name="area_de_lazer" value="{{ $casa->area_de_lazer }}" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="quantidade_banheiros" class="form-label">Quantidade de Banheiros:</label>
                    <input type="number" class="form-control" id="quantidade_banheiros" name="quantidade_banheiros" value="{{ $casa->quantidade_banheiros }}" required>
                </div>
                <div class="col-md-6">
                    <label for="garagem" class="form-label">Garagem (número de carros):</label>
                    <input type="number" class="form-control" id="garagem" name="garagem" value="{{ $casa->garagem }}" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="area_total" class="form-label">Área Total (m²):</label>
                    <input type="number" step="0.01" class="form-control" id="area_total" name="area_total" value="{{ $casa->area_total }}" required>
                </div>
                <div class="col-md-6">
                    <label for="preco_imovel" class="form-label">Preço do Imóvel (R$):</label>
                    <input type="number" step="0.01" class="form-control" id="preco_imovel" name="preco_imovel" value="{{ $casa->preco_imovel }}" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-12">
                    <label for="status" class="form-label">Status:</label>
                    <select class="form-select" id="status" name="status" required>
                        <option value="disponível" {{ $casa->status === 'disponível' ? 'selected' : '' }}>Disponível</option>
                        <option value="vendido" {{ $casa->status === 'vendido' ? 'selected' : '' }}>Vendido</option>
                    </select>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-dark me-2 w-25">Salvar Alterações</button>
                <a href="{{ route('casas.list') }}" class="btn btn-secondary w-25">Voltar</a>
            </div>
        </form>
    </div>
</div>
@endsection
