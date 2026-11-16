<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class VerificarLogin
{
    public function handle(Request $request, Closure $next)
    {
        if (!$request->session()->has('usuario_id')) {
            return redirect('/login');
        }

        return $next($request);
    }
}
