<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Veiculo;
use Illuminate\Http\Request;

class VeiculoController extends Controller
{
    public function listar()
    {
        $veiculos = Veiculo::with('cliente')
            ->orderBy('placa')
            ->get();

        return view('veiculos.listar', compact('veiculos'));
    }

    public function create()
    {
        $clientes = Cliente::orderBy('nome')->get();

        return view('veiculos.create', compact('clientes'));
    }

    public function store(Request $request)
    {
        $dados = $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'marca' => 'required|string|max:80',
            'modelo' => 'required|string|max:100',
            'ano' => 'required|integer|min:1900|max:2100',
            'placa' => 'required|string|max:10|unique:veiculos,placa',
            'cor' => 'nullable|string|max:40',
        ]);

        Veiculo::create($dados);

        return redirect('/veiculos/listar')
            ->with('success', 'Veículo cadastrado com sucesso.');
    }

    public function edit($id)
    {
        $veiculo = Veiculo::findOrFail($id);

        $clientes = Cliente::orderBy('nome')->get();

        return view('veiculos.edit', compact('veiculo', 'clientes'));
    }

    public function update(Request $request, $id)
    {
        $veiculo = Veiculo::findOrFail($id);

        $dados = $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'marca' => 'required|string|max:80',
            'modelo' => 'required|string|max:100',
            'ano' => 'required|integer|min:1900|max:2100',
            'placa' => 'required|string|max:10|unique:veiculos,placa,' . $id,
            'cor' => 'nullable|string|max:40',
        ]);

        $veiculo->update($dados);

        return redirect('/veiculos/listar')
            ->with('success', 'Veículo atualizado com sucesso.');
    }
}
