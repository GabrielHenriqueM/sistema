<?php

namespace App\Http\Controllers;

use App\Models\Apartamento;
use Illuminate\Http\Request;

class ApartamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $apartamentos = Apartamento::all();
        return view('apartamentos.list', compact('apartamentos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('apartamentos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'bloco_predio' => 'required|string|max:255',
            'numero_apartamento' => 'required|string|max:10',
            'andar' => 'required|integer',
            'rua' => 'required|string|max:255',
            'numero' => 'required|string|max:10',
            'bairro' => 'required|string|max:255',
            'cidade' => 'required|string|max:255',
            'estado' => 'required|string|max:50',
            'cep' => 'required|string|max:15',
            'quantidade_quartos' => 'required|integer',
            'quantidade_banheiros' => 'required|integer',
            'quantidade_vagas_garagem' => 'required|integer',
            'varanda_sacada' => 'required|string|max:255',
            'area_lazer_condominio' => 'required|string|max:255',
            'moveis_planejados' => 'required|string|max:255',
            'area_total' => 'required|numeric',
            'preco_imovel' => 'required|numeric',
            'valor_condominio' => 'required|numeric',
            'status' => 'required|string|in:disponivel,vendido',
        ]);

        Apartamento::create($validated);

        return redirect()->route('apartamentos.list')->with('success', 'Apartamento cadastrado com sucesso!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $apartamento = Apartamento::findOrFail($id);
        return view('apartamentos.edit', compact('apartamento'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $apartamento = Apartamento::findOrFail($id);

        $validated = $request->validate([
            'bloco_predio' => 'required|string|max:255',
            'numero_apartamento' => 'required|string|max:10',
            'andar' => 'required|integer',
            'rua' => 'required|string|max:255',
            'numero' => 'required|string|max:10',
            'bairro' => 'required|string|max:255',
            'cidade' => 'required|string|max:255',
            'estado' => 'required|string|max:50',
            'cep' => 'required|string|max:15',
            'quantidade_quartos' => 'required|integer',
            'quantidade_banheiros' => 'required|integer',
            'quantidade_vagas_garagem' => 'required|integer',
            'varanda_sacada' => 'required|string|max:255',
            'area_lazer_condominio' => 'required|string|max:255',
            'moveis_planejados' => 'required|string|max:255',
            'area_total' => 'required|numeric',
            'preco_imovel' => 'required|numeric',
            'valor_condominio' => 'required|numeric',
            'status' => 'required|string|in:disponivel,vendido',
        ]);

        $apartamento->update($validated);

        return redirect()->route('apartamentos.list')->with('success', 'Apartamento atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $apartamento = Apartamento::findOrFail($id);
        $apartamento->delete();

        return redirect()->route('apartamentos.list')->with('success', 'Apartamento deletado com sucesso!');
    }
}