<?php

namespace App\Http\Controllers;

use App\Models\Agendamento;
use App\Models\Empresa;
use App\Models\Sala;
use Illuminate\Http\Request;

class AgendamentoController extends Controller
{
    public function listar()
    {
        $agendamentos = Agendamento::orderBy('data')
            ->orderBy('hora')
            ->get();

        return view('agendamento.listar', compact('agendamentos'));
    }

    public function create()
    {
        $empresas = Empresa::all();
        $salas = Sala::all();

        return view('agendamento.create', compact('salas', 'empresas'));
    }

    public function store(Request $request)
    {
        Agendamento::create([
            'data' => $request->data,
            'hora' => $request->hora,
            'descricao' => $request->descricao,
            'sala_id' => $request->sala_id,
        ]);

        return redirect()->back()->with('success','Cadastrado com sucesso!');
    }

    public function edit($id)
    {
        $agendamento = Agendamento::findOrFail($id);

        $salas = Sala::all();

        return view('agendamento.edit',compact('agendamento', 'salas'));
    }

    public function update(Request $request, $id)
    {
        $agendamento = Agendamento::findOrFail($id);

        $agendamento->update([
            'data' => $request->data,
            'hora' => $request->hora,
            'descricao' => $request->descricao,
            'sala_id' => $request->sala_id,
        ]);

        return redirect()->back()->with('success','Atualizado com sucesso!');
    }

    public function destroy($id)
    {
        Agendamento::destroy($id);

        return redirect()->back()->with('success','Deletado com sucesso!');
    }
}