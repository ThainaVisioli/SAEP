<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function autenticar(Request $request)
    {
        $senha = $request->senha;
        $email = $request->email;

        $usuario = User::where('email', $email)
            ->whereRaw('senha = SHA2(?, 256)', [$senha])
            ->first();

        if ($usuario) {
            $request->session()->put('usuario_nome', $usuario->nome);
            return redirect('/principal');
        } else {
            return back()->with('erro', 'Login inválido');
        }
    }

    public function logout(Request $request)
    {
        $request->session()->forget('usuario_nome');

        return redirect('/login');
    }
}