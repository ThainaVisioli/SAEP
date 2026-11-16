<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function listar(Request $request)
    {
        $query = Cliente::query();

        if ($request->filled('termo')) {
            $termo = $request->termo;

            $query->where(function ($q) use ($termo) {
                $q->where('nome', 'like', "%$termo%")
                    ->orWhere('email', 'like', "%$termo%")
                    ->orWhere('telefone', 'like', "%$termo%");
            });
        }

        $clientes = $query->orderBy('nome')->get();

        return view('clientes.listar', compact('clientes'));
    }

    public function create()
    {
        return view('clientes.create');
    }

    public function store(Request $request)
    {
        $dados = $request->validate([
            'nome' => 'required|string|max:150',
            'cpf' => 'required|string|max:20',
            'telefone' => 'required|string|max:20',
            'email' => 'nullable|email|max:150',
            'endereco' => 'nullable|string|max:255',
        ]);

        Cliente::create($dados);

        return redirect('/clientes/listar')
            ->with('success', 'Cliente cadastrado com sucesso.');
    }

    public function edit($id)
    {
        $cliente = Cliente::findOrFail($id);

        return view('clientes.edit', compact('cliente'));
    }

    public function update(Request $request, $id)
    {
        $cliente = Cliente::findOrFail($id);

        $dados = $request->validate([
            'nome' => 'required|string|max:150',
            'cpf' => 'nullable|string|max:20',
            'telefone' => 'required|string|max:20',
            'email' => 'nullable|email|max:150',
            'endereco' => 'nullable|string|max:255',
        ]);

        if (empty($dados['cpf'])) {
            unset($dados['cpf']);
        }

        $cliente->update($dados);

        return redirect('/clientes/listar')
            ->with('success', 'Cliente atualizado com sucesso.');
    }
}
