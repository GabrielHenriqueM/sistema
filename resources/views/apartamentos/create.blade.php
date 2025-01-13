@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="bg-light shadow p-4 rounded">
        <h1 class="text-center mb-4">Cadastrar Apartamento</h1>
        <form action="{{ route('apartamentos.store') }}" method="POST">
            @csrf

            <!-- Bloco/Prédio e Número do Apartamento -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="bloco_predio" class="form-label">Bloco/Prédio:</label>
                    <input type="text" class="form-control" id="bloco_predio" name="bloco_predio" placeholder="Informe o bloco ou prédio" required>
                </div>
                <div class="col-md-6">
                    <label for="numero_apartamento" class="form-label">Número do Apartamento:</label>
                    <input type="text" class="form-control" id="numero_apartamento" name="numero_apartamento" placeholder="Informe o número do apartamento" required>
                </div>
            </div>

            <!-- Andar e Rua/Endereço -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="andar" class="form-label">Andar:</label>
                    <input type="number" class="form-control" id="andar" name="andar" placeholder="Informe o andar" required>
                </div>
                <div class="col-md-6">
                    <label for="rua" class="form-label">Rua/Endereço:</label>
                    <input type="text" class="form-control" id="rua" name="rua" placeholder="Informe o endereço" required>
                </div>
            </div>

            <!-- Número e Bairro -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="numero" class="form-label">Número:</label>
                    <input type="text" class="form-control" id="numero" name="numero" placeholder="Informe o número" required>
                </div>
                <div class="col-md-6">
                    <label for="bairro" class="form-label">Bairro:</label>
                    <input type="text" class="form-control" id="bairro" name="bairro" placeholder="Informe o bairro" required>
                </div>
            </div>

            <!-- Cidade e Estado -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="cidade" class="form-label">Cidade:</label>
                    <input type="text" class="form-control" id="cidade" name="cidade" placeholder="Informe a cidade" required>
                </div>
                <div class="col-md-6">
                    <label for="estado" class="form-label">Estado:</label>
                    <input type="text" class="form-control" id="estado" name="estado" placeholder="Informe o estado" required>
                </div>
            </div>

            <!-- CEP e Quantidade de Quartos -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="cep" class="form-label">CEP:</label>
                    <input type="text" class="form-control" id="cep" name="cep" placeholder="Informe o CEP" required>
                </div>
                <div class="col-md-6">
                    <label for="quantidade_quartos" class="form-label">Quantidade de Quartos:</label>
                    <input type="number" class="form-control" id="quantidade_quartos" name="quantidade_quartos" placeholder="Informe a quantidade de quartos" required>
                </div>
            </div>

            <!-- Status do Apartamento -->
            <div class="row mb-3">
                <div class="col-md-12">
                    <label for="status" class="form-label">Status:</label>
                    <select class="form-control" id="status" name="status" required>
                        <option value="disponivel">Disponível</option>
                        <option value="vendido">Vendido</option>
                    </select>
                </div>
            </div>

            <!-- Botão de Cadastrar -->
            <button type="submit" class="btn btn-dark w-100 mt-3">Cadastrar Apartamento</button>
        </form>
    </div>
</div>
@endsection
