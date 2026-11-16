@extends('layout')

@section('title', 'Página principal')

@section('content')
<div class="panel">
    <h1>Bem-vindo ao sistema da oficina!</h1>
    <p>Usuário conectado: <strong>{{ session('usuario_nome') }}</strong></p>

    <h2>Menu principal</h2>

    <div class="menu">
        <a class="tile" href="/clientes/listar">Gerenciar clientes</a>
        <a class="tile" href="/veiculos/listar">Gerenciar veículos</a>
        <a class="tile" href="/agendamentos/listar">Gerenciar agendamentos</a>
    </div>
</div>
@endsection
