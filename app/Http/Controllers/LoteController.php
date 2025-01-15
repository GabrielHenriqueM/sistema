<?php

namespace App\Http\Controllers;

use App\Models\Lote;
use Illuminate\Http\Request;

class LoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lotes = Lote::all();
        return view('lotes.list', compact('lotes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('lotes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'numero_lote' => 'required|string|max:50',
            'rua' => 'required|string|max:255',
            'bairro' => 'required|string|max:255',
            'cidade' => 'required|string|max:255',
            'estado' => 'required|string|max:255',
            'cep' => 'required|string|max:15',
            'area_total' => 'required|numeric|min:0',
            'area_media' => 'nullable|numeric|min:0',
            'valor_loteamento' => 'nullable|numeric|min:0',
            'observacoes' => 'nullable|string|max:500',
            'status' => 'required|string|in:disponivel,vendido',
        ]);

        Lote::create($validated);
        return redirect()->back()->with('success', 'Lote cadastrado com sucesso!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $lote = Lote::findOrFail($id);
        return view('lotes.edit', compact('lote'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'numero_lote' => 'required|string|max:50',
            'rua' => 'required|string|max:255',
            'bairro' => 'required|string|max:255',
            'cidade' => 'required|string|max:255',
            'estado' => 'required|string|max:255',
            'cep' => 'required|string|max:15',
            'area_total' => 'required|numeric|min:0',
            'valor_loteamento' => 'nullable|numeric|min:0',
            'observacoes' => 'nullable|string|max:500',
            'status' => 'required|string|in:disponivel,vendido',
        ]);

        $lote = Lote::findOrFail($id);
        $lote->update($validated);

        return redirect()->route('lotes.list')->with('success', 'Lote atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $lote = Lote::findOrFail($id);
        $lote->delete();

        return redirect()->route('lotes.list')->with('success', 'Lote deletado com sucesso!');
    }
}
