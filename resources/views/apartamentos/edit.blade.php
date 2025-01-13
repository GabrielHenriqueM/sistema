@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="bg-light shadow p-4 rounded">
        <h1 class="text-center mb-4">Editar Apartamento</h1>
        <form action="{{ route('apartamentos.update', $apartamento->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Bloco/Prédio e Número do Apartamento -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="bloco_predio" class="form-label">Bloco/Prédio:</label>
                    <input type="text" class="form-control" id="bloco_predio" name="bloco_predio" value="{{ $apartamento->bloco_predio }}" required>
                </div>
                <div class="col-md-6">
                    <label for="numero_apartamento" class="form-label">Número do Apartamento:</label>
                    <input type="text" class="form-control" id="numero_apartamento" name="numero_apartamento" value="{{ $apartamento->numero_apartamento }}" required>
                </div>
            </div>

            <!-- Andar e Rua/Endereço -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="andar" class="form-label">Andar:</label>
                    <input type="number" class="form-control" id="andar" name="andar" value="{{ $apartamento->andar }}" required>
                </div>
                <div class="col-md-6">
                    <label for="rua" class="form-label">Rua/Endereço:</label>
                    <input type="text" class="form-control" id="rua" name="rua" value="{{ $apartamento->rua }}" required>
                </div>
            </div>

            <!-- Número e Bairro -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="numero" class="form-label">Número:</label>
                    <input type="text" class="form-control" id="numero" name="numero" value="{{ $apartamento->numero }}" required>
                </div>
                <div class="col-md-6">
                    <label for="bairro" class="form-label">Bairro:</label>
                    <input type="text" class="form-control" id="bairro" name="bairro" value="{{ $apartamento->bairro }}" required>
                </div>
            </div>

            <!-- Cidade e Estado -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="cidade" class="form-label">Cidade:</label>
                    <input type="text" class="form-control" id="cidade" name="cidade" value="{{ $apartamento->cidade }}" required>
                </div>
                <div class="col-md-6">
                    <label for="estado" class="form-label">Estado:</label>
                    <input type="text" class="form-control" id="estado" name="estado" value="{{ $apartamento->estado }}" required>
                </div>
            </div>

            <!-- CEP e Quantidade de Quartos -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="cep" class="form-label">CEP:</label>
                    <input type="text" class="form-control" id="cep" name="cep" value="{{ $apartamento->cep }}" required>
                </div>
                <div class="col-md-6">
                    <label for="quantidade_quartos" class="form-label">Quantidade de Quartos:</label>
                    <input type="number" class="form-control" id="quantidade_quartos" name="quantidade_quartos" value="{{ $apartamento->quantidade_quartos }}" required>
                </div>
            </div>

            <!-- Quantidade de Banheiros e Vagas de Garagem -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="quantidade_banheiros" class="form-label">Quantidade de Banheiros:</label>
                    <input type="number" class="form-control" id="quantidade_banheiros" name="quantidade_banheiros" value="{{ $apartamento->quantidade_banheiros }}" required>
                </div>
                <div class="col-md-6">
                    <label for="quantidade_vagas_garagem" class="form-label">Quantidade de Vagas de Garagem:</label>
                    <input type="number" class="form-control" id="quantidade_vagas_garagem" name="quantidade_vagas_garagem" value="{{ $apartamento->quantidade_vagas_garagem }}" required>
                </div>
            </div>

            <!-- Varanda/Sacada e Área de Lazer -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="varanda_sacada" class="form-label">Varanda/Sacada:</label>
                    <input type="text" class="form-control" id="varanda_sacada" name="varanda_sacada" value="{{ $apartamento->varanda_sacada }}" required>
                </div>
                <div class="col-md-6">
                    <label for="area_lazer_condominio" class="form-label">Área de Lazer/Condomínio:</label>
                    <input type="text" class="form-control" id="area_lazer_condominio" name="area_lazer_condominio" value="{{ $apartamento->area_lazer_condominio }}" required>
                </div>
            </div>

            <!-- Móveis Planejados e Área Total -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="moveis_planejados" class="form-label">Móveis Planejados:</label>
                    <input type="text" class="form-control" id="moveis_planejados" name="moveis_planejados" value="{{ $apartamento->moveis_planejados }}" required>
                </div>
                <div class="col-md-6">
                    <label for="area_total" class="form-label">Área Total (m²):</label>
                    <input type="number" step="0.01" class="form-control" id="area_total" name="area_total" value="{{ $apartamento->area_total }}" required>
                </div>
            </div>

            <!-- Preço e Valor do Condomínio -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="preco_imovel" class="form-label">Preço do Imóvel (R$):</label>
                    <input type="number" step="0.01" class="form-control" id="preco_imovel" name="preco_imovel" value="{{ $apartamento->preco_imovel }}" required>
                </div>
                <div class="col-md-6">
                    <label for="valor_condominio" class="form-label">Valor do Condomínio (R$):</label>
                    <input type="number" step="0.01" class="form-control" id="valor_condominio" name="valor_condominio" value="{{ $apartamento->valor_condominio }}" required>
                </div>
            </div>

            <!-- Status do Apartamento -->
            <div class="row mb-3">
                <div class="col-md-12">
                    <label for="status" class="form-label">Status:</label>
                    <select class="form-control" id="status" name="status" required>
                        <option value="disponivel" {{ $apartamento->status === 'disponivel' ? 'selected' : '' }}>Disponível</option>
                        <option value="vendido" {{ $apartamento->status === 'vendido' ? 'selected' : '' }}>Vendido</option>
                    </select>
                </div>
            </div>

            <!-- Botões de Ação -->
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-dark me-2 w-25">Salvar Alterações</button>
                <a href="{{ route('apartamentos.list') }}" class="btn btn-secondary w-25">Voltar</a>
            </div>
        </form>
    </div>
</div>
@endsection
