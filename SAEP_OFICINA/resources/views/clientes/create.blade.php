@extends('layout') @section('title','Novo cliente') @section('content')
<div class="panel"><h1>Novo cliente</h1><form method="POST" action="/clientes">@csrf @if(false)<input type="hidden" name="_method" value="PUT">@endif
<label>Nome completo *</label><input name="nome" value="{{old('nome',$cliente->nome ?? '')}}" required>
<label>CPF *</label><input name="cpf" value="{{old('cpf')}}" placeholder="Somente números ou com pontuação" required>
<label>Telefone *</label><input name="telefone" value="{{old('telefone',$cliente->telefone ?? '')}}" required>
<label>E-mail</label><input type="email" name="email" value="{{old('email',$cliente->email ?? '')}}">
<label>Endereço</label><input name="endereco" value="{{old('endereco',$cliente->endereco ?? '')}}">
<button class="btn">Salvar</button> <a class="btn gray" href="/clientes/listar">Cancelar</a></form></div>@endsection