<!DOCTYPE html>
<html>
<head>
    <title>Editar Empresa</title>
</head>
<body>

    <h1>Editar Empresa</h1>

    <form action="/empresas/{{ $empresa->id }}" method="POST">

        @csrf
        @method('PUT')

        <label>Nome:</label>

        <input
            type="text"
            name="nome"
            value="{{ $empresa->nome }}"
        >

        <br><br>

        <label>CNPJ:</label>

        <input
            type="text"
            name="cnpj"
            value="{{ $empresa->cnpj }}"
        >

        <br><br>

        <label>Telefone:</label>

        <input
            type="text"
            name="telefone"
            value="{{ $empresa->telefone }}"
        >

        <br><br>

        <label>E-mail:</label>

        <input
            type="email"
            name="email"
            value="{{ $empresa->email }}"
        >

        <br><br>

        <button type="submit">
            Salvar
        </button>

    </form>

    <br>

    <a href="/empresas/listar">
        Voltar
    </a>

</body>
</html>