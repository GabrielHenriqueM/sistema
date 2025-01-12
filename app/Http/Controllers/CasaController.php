<?php

namespace App\Http\Controllers;

use App\Models\Casa;
use Illuminate\Http\Request;

class CasaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $casas = Casa::all();
        return view('casas.list', compact('casas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('casas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'rua' => 'required|string|max:255',
            'numero' => 'required|string|max:10',
            'bairro' => 'required|string|max:255',
            'cidade' => 'required|string|max:255',
            'estado' => 'required|string|max:50',
            'cep' => 'required|string|max:15',
            'quantidade_quartos' => 'required|integer',
            'area_de_lazer' => 'required|string|max:255',
            'quantidade_banheiros' => 'required|integer',
            'garagem' => 'required|integer',
            'area_total' => 'required|numeric',
            'preco_imovel' => 'required|numeric',
            'status' => 'required|string|in:disponivel,vendido', // Validação do status
        ]);

        Casa::create($validated);

        return redirect()->back()->with('success', 'Casa cadastrada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Não implementado
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $casa = Casa::findOrFail($id);
        return view('casas.edit', compact('casa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $casa = Casa::findOrFail($id);

        $validated = $request->validate([
            'rua' => 'required|string|max:255',
            'numero' => 'required|string|max:10',
            'bairro' => 'required|string|max:255',
            'cidade' => 'required|string|max:255',
            'estado' => 'required|string|max:50',
            'cep' => 'required|string|max:15',
            'quantidade_quartos' => 'required|integer',
            'area_de_lazer' => 'required|string|max:255',
            'quantidade_banheiros' => 'required|integer',
            'garagem' => 'required|integer',
            'area_total' => 'required|numeric',
            'preco_imovel' => 'required|numeric',
            'status' => 'required|string|in:disponivel,vendido', // Validação do status
        ]);

        $casa->update($validated);

        return redirect()->route('casas.list')->with('success', 'Casa atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $casa = Casa::findOrFail($id);
        $casa->delete();

        return redirect()->route('casas.list')->with('success', 'Casa deletada com sucesso!');
    }
}
