<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function login()
    {
        if (session()->has('usuario_id')) {
            return redirect()->route('principal');
        }

        return view('login');
    }

    public function autenticar(Request $request)
    {
        $dados = $request->validate([
            'email' => 'required|email',
            'senha' => 'required|string',
        ]);

        $usuario = User::where('email', $dados['email'])->first();

        if (!$usuario || !Hash::check($dados['senha'], $usuario->senha)) {
            return back()
                ->withInput($request->only('email'))
                ->with('erro', 'E-mail ou senha inválidos.');
        }

        $request->session()->regenerate();

        $request->session()->put([
            'usuario_id' => $usuario->id,
            'usuario_nome' => $usuario->nome,
        ]);

        return redirect()->route('principal');
    }

    public function logout(Request $request)
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
