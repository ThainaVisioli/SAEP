<?php


namespace App\Http\Controllers;

use App\Models\Sala;
use App\Models\Empresa;
use Illuminate\Http\Request;

class SalaController extends Controller
{
    // Listar salas
    public function listar()
    {
        $salas = Sala::all();

        return view('salas.listar', compact('salas'));
    }

    // Formulário de cadastro
    public function create()
    {
        $empresas = Empresa::all();

        return view('salas.create', compact('empresas'));
    }

    // Salvar sala
    public function store(Request $request)
    {
        Sala::create([
            'num_sala' => $request->num_sala,
            'bloco' => $request->bloco,
            'empresa_id' => $request->empresa_id,
        ]);

        return redirect()->back()
            ->with('success', 'Cadastrado com sucesso!');
    }

    // Formulário de edição
    public function edit($id)
    {
        $sala = Sala::findOrFail($id);

        $empresas = Empresa::all();

        return view('salas.edit', compact('sala', 'empresas'));
    }

    // Atualizar sala
    public function update(Request $request, $id)
    {
        $sala = Sala::findOrFail($id);

        $sala->update([
            'num_sala' => $request->num_sala,
            'bloco' => $request->bloco,
            'empresa_id' => $request->empresa_id,
        ]);

        return redirect()->back()
            ->with('success', 'Atualizado com sucesso!');
    }

    // Excluir sala
    public function destroy($id)
    {
        Sala::destroy($id);

        return redirect()->back()
            ->with('success', 'Deletado com sucesso!');
    }
}