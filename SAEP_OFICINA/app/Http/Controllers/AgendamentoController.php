<?php

namespace App\Http\Controllers;

use App\Models\Agendamento;
use App\Models\Cliente;
use App\Models\Veiculo;
use Illuminate\Http\Request;

class AgendamentoController extends Controller
{
    public function listar()
    {
        $agendamentos = Agendamento::with(['cliente', 'veiculo'])
            ->orderBy('data_agendamento')
            ->orderBy('hora')
            ->get();

        return view('agendamentos.listar', compact('agendamentos'));
    }

    public function create()
    {
        $clientes = Cliente::orderBy('nome')->get();
        $veiculos = Veiculo::with('cliente')->orderBy('placa')->get();

        return view('agendamentos.create', compact('clientes', 'veiculos'));
    }

    public function store(Request $request)
    {
        $dados = $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'veiculo_id' => 'required|exists:veiculos,id',
            'data_agendamento' => 'required|date',
            'hora' => 'required|date_format:H:i',
            'servico' => 'required|string|max:150',
            'observacoes' => 'nullable|string',
            'status' => 'required|in:Agendado,Concluído,Cancelado',
        ]);

        $veiculo = Veiculo::findOrFail($dados['veiculo_id']);

        if ((int) $veiculo->cliente_id !== (int) $dados['cliente_id']) {
            return back()
                ->withInput()
                ->withErrors(['veiculo_id' => 'O veículo selecionado não pertence ao cliente informado.']);
        }

        Agendamento::create($dados);

        return redirect('/agendamentos/listar')
            ->with('success', 'Agendamento cadastrado com sucesso.');
    }

    public function edit($id)
    {
        $agendamento = Agendamento::with(['cliente', 'veiculo'])->findOrFail($id);

        return view('agendamentos.edit', compact('agendamento'));
    }

    public function update(Request $request, $id)
    {
        $agendamento = Agendamento::findOrFail($id);

        $dados = $request->validate([
            'data_agendamento' => 'required|date',
            'hora' => 'required|date_format:H:i',
            'status' => 'required|in:Agendado,Concluído,Cancelado',
        ]);

        $agendamento->update($dados);

        return redirect('/agendamentos/listar')
            ->with('success', 'Agendamento atualizado com sucesso.');
    }
}
