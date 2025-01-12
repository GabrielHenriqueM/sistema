@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="bg-light shadow p-4 rounded">
            <h1 class="text-center mb-4">Cadastrar Cliente</h1>
            <form action="{{ route('clientes.store') }}" method="POST">
                @csrf
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="nome_completo" class="form-label">Nome completo:</label>
                        <input type="text" class="form-control" id="nome_completo" name="nome_completo" placeholder="Digite o nome completo" required>
                    </div>
                    <div class="col-md-6">
                        <label for="telefone" class="form-label">Telefone:</label>
                        <input type="text" class="form-control" id="telefone" name="telefone" placeholder="Digite o telefone" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="email" class="form-label">E-mail:</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Digite o e-mail" required>
                    </div>
                    <div class="col-md-6">
                        <label for="estado_civil" class="form-label">Estado civil:</label>
                        <select class="form-select" id="estado_civil" name="estado_civil" required>
                            <option value="" disabled selected>Selecione o estado civil</option>
                            <option value="solteiro">Solteiro</option>
                            <option value="casado">Casado</option>
                            <option value="divorciado">Divorciado</option>
                            <option value="viuvo">Viúvo</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="genero" class="form-label">Gênero:</label>
                        <select class="form-select" id="genero" name="genero" required>
                            <option value="" disabled selected>Selecione o gênero</option>
                            <option value="masculino">Masculino</option>
                            <option value="feminino">Feminino</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="faixa_preco" class="form-label">Faixa de preço:</label>
                        <input type="text" class="form-control" id="faixa_preco" name="faixa_preco" placeholder="Digite a faixa de preço" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="tipo_imovel_interesse" class="form-label">Tipo de imóvel de interesse:</label>
                    <select class="form-select" id="tipo_imovel_interesse" name="tipo_imovel_interesse" required>
                        <option value="" disabled selected>Selecione o tipo de imóvel</option>
                        <option value="casa">Casa</option>
                        <option value="apartamento">Apartamento</option>
                        <option value="terreno">Terreno</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-dark w-100 mt-3">Cadastrar Cliente</button>
            </form>
        </div>
    </div>
@endsection
