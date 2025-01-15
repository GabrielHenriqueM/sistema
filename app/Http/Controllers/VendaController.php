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
            switch ($venda->tipo_imovel) {
                case 'casa':
                    $venda->imovel = Casa::find($venda->imovel_id);
                    break;
                case 'apartamento':
                    $venda->imovel = Apartamento::find($venda->imovel_id);
                    break;
                case 'lote':
                    $venda->imovel = Lote::find($venda->imovel_id);
                    break;
                default:
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
            'valor_venda' => 'required|numeric|min:0',
            'data_venda' => 'required|date',
        ]);

        Venda::create($validated);

        $this->atualizarStatusImovel($validated['tipo_imovel'], $validated['imovel_id'], 'vendido');

        return redirect()->route('vendas.create')->with('success', 'Venda registrada e imóvel atualizado para "vendido"!');
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
            'valor_venda' => 'required|numeric|min:0',
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
        $this->atualizarStatusImovel($venda->tipo_imovel, $venda->imovel_id, 'disponivel');

        $venda->delete();

        return redirect()->route('vendas.list')->with('success', 'Venda excluída e imóvel disponibilizado novamente!');
    }

    /**
     * Atualiza o status do imóvel.
     */
    private function atualizarStatusImovel($tipo_imovel, $imovel_id, $status)
    {
        switch ($tipo_imovel) {
            case 'casa':
                Casa::where('id', $imovel_id)->update(['status' => $status]);
                break;
            case 'apartamento':
                Apartamento::where('id', $imovel_id)->update(['status' => $status]);
                break;
            case 'lote':
                Lote::where('id', $imovel_id)->update(['status' => $status]);
                break;
        }
    }

    /**
     * Buscar imóveis disponíveis conforme o tipo.
     */
    public function fetchImoveis(Request $request)
    {
        $tipo = $request->tipo_imovel;

        $imoveis = match ($tipo) {
            'casa' => Casa::where('status', 'disponivel')->get(['id', 'rua', 'numero', 'bairro', 'cidade', 'estado', 'cep', 'area_total']),
            'apartamento' => Apartamento::where('status', 'disponivel')->get(['id', 'bloco_predio', 'numero_apartamento', 'andar', 'bairro', 'cidade', 'estado', 'cep', 'area_total']),
            'lote' => Lote::where('status', 'disponivel')->get(['id', 'numero_lote', 'bairro', 'cidade', 'estado', 'cep', 'area_total']),
            default => [],
        };

        return response()->json($imoveis);
    }
}
