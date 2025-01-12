<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = Cliente::all();
        return view('clientes.list', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome_completo' => 'required|string|max:255',
            'estado_civil' => 'required|string|max:50',
            'telefone' => 'required|string|max:15',
            'email' => 'required|email|unique:clientes,email',
            'genero' => 'required|string|max:20',
            'faixa_preco' => 'required|numeric',
            'tipo_imovel_interesse' => 'required|string|max:50',
        ]);

        Cliente::create($validated);
        return redirect()->back()->with('success', 'Cliente cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $cliente = Cliente::findOrFail($id);
        return view('clientes.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $cliente = Cliente::findOrFail($id);

        $validated = $request->validate([
            'nome_completo' => 'required|string|max:255',
            'estado_civil' => 'required|string|max:50',
            'telefone' => 'required|string|max:15',
            'email' => "required|email|unique:clientes,email,{$id}",
            'genero' => 'required|string|max:20',
            'faixa_preco' => 'required|numeric',
            'tipo_imovel_interesse' => 'required|string|max:50',
        ]);

        $cliente->update($validated);
        return redirect()->back()->with('success', 'Cliente atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->delete();
        return redirect()->route('clientes.list')->with('success', 'Cliente deletado com sucesso!');
    }
}
