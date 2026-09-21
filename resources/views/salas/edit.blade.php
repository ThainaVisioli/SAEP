<!DOCTYPE html>
<html>
<head>
    <title>Editar Sala</title>
</head>
<body>

    <h1>Editar Sala</h1>

    <form action="/salas/{{ $sala->id }}" method="POST">

        @csrf
        @method('PUT')

        <label>num_sala:</label>

        <input
            type="text"
            name="placa"
            value="{{ $sala->num_sala }}"
        >

        <br><br>

        <label>bloco:</label>

        <input
            type="text"
            name="marca"
            value="{{ $sala->bloco }}"
        >

        <br><br>

        <label>Empresa:</label>

        <select name="empresa_id">

            @foreach($empresas as $empresa)

                <option
                    value="{{ $empresa->id }}"
                    {{ $sala->empresa_id == $empresa->id ? 'selected' : '' }}
                >
                    {{ $empresa->nome }}
                </option>

            @endforeach

        </select>

        <br><br>

        <button type="submit">
            Salvar
        </button>

    </form>

    <br>

    <a href="/salas/listar">
        Voltar
    </a>

</body>
</html>