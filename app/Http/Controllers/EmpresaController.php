<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    public function listar(Request $request)
    {
        $query = Empresa::query();

        if ($request->filled('nome')) {
            $query->where(
                'nome',
                'like',
                '%' . $request->nome . '%'
            );
        }

        $empresas = $query->get();

        return view('empresas.listar', compact('empresas'));
    }

    public function create()
    {
        return view('empresas.create');
    }

    public function store(Request $request)
    {
        Empresa::create([
            'nome' => $request->nome,
            'cnpj' => $request->cnpj,
            'telefone' => $request->telefone,
            'email' => $request->email,
        ]);

        return redirect()->back()->with('success','Cadastrado com sucesso!');
    }

    public function edit($id)
    {
        $empresa = Empresa::findOrFail($id);

        return view('empresas.edit', compact('empresa'));
    }

    public function update(Request $request, $id)
    {
        $empresa = Empresa::findOrFail($id);

        $empresa->update([
            'nome' => $request->nome,
            'cnpj' => $request->cnpj,
            'telefone' => $request->telefone,
            'email' => $request->email,
        ]);

        return redirect()->back()->with('success','Atualizado com sucesso!');
    }

    public function destroy($id)
    {
        Empresa::destroy($id);

        return redirect()->back()->with('success','Deletado com sucesso!');
    }
}