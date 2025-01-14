<?php

namespace App\Http\Controllers;

use App\Models\Venda;
use App\Models\Cliente;
use App\Models\Casa;
use App\Models\Apartamento;
use App\Models\Lote;
use Illuminate\Http\Request;

class VendaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vendas = Venda::with('cliente')->get()->map(function ($venda) {
            if ($venda->tipo_imovel === 'casa') {
                $venda->imovel = Casa::find($venda->imovel_id);
            } elseif ($venda->tipo_imovel === 'apartamento') {
                $venda->imovel = Apartamento::find($venda->imovel_id);
            } elseif ($venda->tipo_imovel === 'lote') {
                $venda->imovel = Lote::find($venda->imovel_id);
            } else {
                $venda->imovel = null;
            }

            return $venda;
        });

        return view('vendas.list', compact('vendas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clientes = Cliente::all();
        return view('vendas.create', compact('clientes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'tipo_imovel' => 'required|string|in:casa,apartamento,lote',
            'imovel_id' => 'required|integer',
            'valor_venda' => 'required|numeric',
            'data_venda' => 'required|date',
        ]);

        Venda::create([
            'cliente_id' => $validated['cliente_id'],
            'imovel_id' => $validated['imovel_id'],
            'tipo_imovel' => $validated['tipo_imovel'],
            'valor_venda' => $validated['valor_venda'],
            'data_venda' => $validated['data_venda'],
        ]);

        if ($validated['tipo_imovel'] === 'casa') {
            Casa::where('id', $validated['imovel_id'])->update(['status' => 'vendido']);
        } elseif ($validated['tipo_imovel'] === 'apartamento') {
            Apartamento::where('id', $validated['imovel_id'])->update(['status' => 'vendido']);
        } elseif ($validated['tipo_imovel'] === 'lote') {
            Lote::where('id', $validated['imovel_id'])->update(['status' => 'vendido']);
        }

        return redirect()->route('vendas.create')->with('success', 'Venda registrada e imóvel atualizado para "vendido"!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Venda $venda)
    {
        return view('vendas.show', compact('venda'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Venda $venda)
    {
        return view('vendas.edit', compact('venda'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Venda $venda)
    {
        $validated = $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'tipo_imovel' => 'required|string|in:casa,apartamento,lote',
            'imovel_id' => 'required|integer',
            'valor_venda' => 'required|numeric',
            'data_venda' => 'required|date',
        ]);

        $venda->update($validated);

        return redirect()->route('vendas.index')->with('success', 'Venda atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Venda $venda)
    {
        if ($venda->tipo_imovel === 'casa') {
            Casa::where('id', $venda->imovel_id)->update(['status' => 'disponivel']);
        } elseif ($venda->tipo_imovel === 'apartamento') {
            Apartamento::where('id', $venda->imovel_id)->update(['status' => 'disponivel']);
        } elseif ($venda->tipo_imovel === 'lote') {
            Lote::where('id', $venda->imovel_id)->update(['status' => 'disponivel']);
        }

        $venda->delete();

        return redirect()->route('vendas.list')->with('success', 'Venda excluída e imóvel disponibilizado novamente!');
    }

    /**
     * Fetch imóveis based on the selected tipo_imovel.
     */
    public function fetchImoveis(Request $request)
    {
        $tipo = $request->tipo_imovel;

        if ($tipo === 'casa') {
            $imoveis = Casa::where('status', 'disponivel')->get(['id', 'rua', 'numero', 'bairro', 'cidade', 'estado', 'cep', 'area_total']);
        } elseif ($tipo === 'apartamento') {
            $imoveis = Apartamento::where('status', 'disponivel')->get(['id', 'bloco_predio', 'numero_apartamento', 'andar', 'bairro', 'cidade', 'estado', 'cep', 'area_total']);
        } elseif ($tipo === 'lote') {
            $imoveis = Lote::where('status', 'disponivel')->get(['id', 'numero_lote', 'bairro', 'cidade', 'estado', 'cep', 'area_total']);
        } else {
            $imoveis = [];
        }

        return response()->json($imoveis);
    }
}
