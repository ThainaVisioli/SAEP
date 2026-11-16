@extends('layout') @section('title','Editar cliente') @section('content')
<div class="panel"><h1>Editar cliente</h1><form method="POST" action="/clientes/{{$cliente->id}}">@csrf @if(true)<input type="hidden" name="_method" value="PUT">@endif
<label>Nome completo *</label><input name="nome" value="{{old('nome',$cliente->nome ?? '')}}" required>
<label>CPF *</label><input name="cpf" value="{{old('cpf')}}" placeholder="Deixe vazio para manter o CPF atual">
<label>Telefone *</label><input name="telefone" value="{{old('telefone',$cliente->telefone ?? '')}}" required>
<label>E-mail</label><input type="email" name="email" value="{{old('email',$cliente->email ?? '')}}">
<label>Endereço</label><input name="endereco" value="{{old('endereco',$cliente->endereco ?? '')}}">
<button class="btn">Salvar</button> <a class="btn gray" href="/clientes/listar">Cancelar</a></form></div>@endsection