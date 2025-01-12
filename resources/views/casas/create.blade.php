@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="bg-light shadow p-4 rounded">
        <h1 class="text-center mb-4">Cadastrar Casa</h1>
        <form action="{{ route('casas.store') }}" method="POST">
            @csrf
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="rua" class="form-label">Rua:</label>
                    <input type="text" class="form-control" id="rua" name="rua" placeholder="Digite a rua" required>
                </div>
                <div class="col-md-6">
                    <label for="numero" class="form-label">Número:</label>
                    <input type="text" class="form-control" id="numero" name="numero" placeholder="Digite o número" required>
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
                    <label for="quantidade_quartos" class="form-label">Quantidade de Quartos:</label>
                    <input type="number" class="form-control" id="quantidade_quartos" name="quantidade_quartos" placeholder="Digite a quantidade de quartos" required>
                </div>
                <div class="col-md-6">
                    <label for="area_de_lazer" class="form-label">Área de Lazer:</label>
                    <input type="text" class="form-control" id="area_de_lazer" name="area_de_lazer" placeholder="Digite a área de lazer" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="quantidade_banheiros" class="form-label">Quantidade de Banheiros:</label>
                    <input type="number" class="form-control" id="quantidade_banheiros" name="quantidade_banheiros" placeholder="Digite a quantidade de banheiros" required>
                </div>
                <div class="col-md-6">
                    <label for="garagem" class="form-label">Garagem (número de carros):</label>
                    <input type="number" class="form-control" id="garagem" name="garagem" placeholder="Digite a quantidade de vagas" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="area_total" class="form-label">Área Total (m²):</label>
                    <input type="number" step="0.01" class="form-control" id="area_total" name="area_total" placeholder="Digite a área total" required>
                </div>
                <div class="col-md-6">
                    <label for="preco_imovel" class="form-label">Preço do Imóvel (R$):</label>
                    <input type="number" step="0.01" class="form-control" id="preco_imovel" name="preco_imovel" placeholder="Digite o preço do imóvel" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-12">
                    <label for="status" class="form-label">Status:</label>
                    <select class="form-select" id="status" name="status" required>
                        <option value="disponível" selected>Disponível</option>
                        <option value="vendido">Vendido</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-dark w-100 mt-3">Cadastrar Casa</button>
        </form>
    </div>
</div>
@endsection
