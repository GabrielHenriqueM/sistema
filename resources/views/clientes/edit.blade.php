@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="bg-light shadow p-4 rounded">
            <h1 class="text-center mb-4">Editar Cliente</h1>
            <form action="{{ route('clientes.update', $cliente->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="nome_completo" class="form-label">Nome completo:</label>
                        <input type="text" class="form-control" id="nome_completo" name="nome_completo" value="{{ $cliente->nome_completo }}" required>
                    </div>
                    <div class="col-md-6">
                        <label for="telefone" class="form-label">Telefone:</label>
                        <input type="text" class="form-control" id="telefone" name="telefone" value="{{ $cliente->telefone }}" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="email" class="form-label">E-mail:</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ $cliente->email }}" required>
                    </div>
                    <div class="col-md-6">
                        <label for="estado_civil" class="form-label">Estado civil:</label>
                        <select class="form-select" id="estado_civil" name="estado_civil" required>
                            <option value="solteiro" {{ $cliente->estado_civil == 'solteiro' ? 'selected' : '' }}>Solteiro</option>
                            <option value="casado" {{ $cliente->estado_civil == 'casado' ? 'selected' : '' }}>Casado</option>
                            <option value="divorciado" {{ $cliente->estado_civil == 'divorciado' ? 'selected' : '' }}>Divorciado</option>
                            <option value="viuvo" {{ $cliente->estado_civil == 'viuvo' ? 'selected' : '' }}>Viúvo</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="genero" class="form-label">Gênero:</label>
                        <select class="form-select" id="genero" name="genero" required>
                            <option value="masculino" {{ $cliente->genero == 'masculino' ? 'selected' : '' }}>Masculino</option>
                            <option value="feminino" {{ $cliente->genero == 'feminino' ? 'selected' : '' }}>Feminino</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="faixa_preco" class="form-label">Faixa de preço:</label>
                        <input type="text" class="form-control" id="faixa_preco" name="faixa_preco" value="{{ $cliente->faixa_preco }}" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="tipo_imovel_interesse" class="form-label">Tipo de imóvel de interesse:</label>
                    <select class="form-select" id="tipo_imovel_interesse" name="tipo_imovel_interesse" required>
                        <option value="casa" {{ $cliente->tipo_imovel_interesse == 'casa' ? 'selected' : '' }}>Casa</option>
                        <option value="apartamento" {{ $cliente->tipo_imovel_interesse == 'apartamento' ? 'selected' : '' }}>Apartamento</option>
                        <option value="terreno" {{ $cliente->tipo_imovel_interesse == 'terreno' ? 'selected' : '' }}>Terreno</option>
                    </select>
                </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-dark me-2 w-25">Salvar Alterações</button>
                    <a href="{{ route('clientes.list') }}" class="btn btn-secondary w-25">Voltar</a>
                </div>
            </form>
        </div>
    </div>
@endsection
