
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Salas</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            min-height: 100vh;
            background: #eef2f6;
            padding: 30px 20px;
            color: #16324f;
        }

        .container {
            width: 100%;
            max-width: 1000px;
            margin: 0 auto;
        }

        .sala-box {
            background: #ffffff;
            padding: 35px;
            border-radius: 16px;
            border: 1px solid #dce3ea;
            box-shadow: 0 8px 25px rgba(15, 35, 55, 0.10);
        }

        h1 {
            text-align: center;
            color: #163f68;
            font-size: 30px;
            margin-bottom: 30px;
        }

        .topo {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-bottom: 25px;
        }

        .btn {
            display: inline-block;
            padding: 12px 18px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
            border: none;
            cursor: pointer;
            font-size: 14px;
        }

        .btn-voltar {
            color: #1b4773;
            text-decoration: none;
            font-weight: bold;
        }

        .btn-voltar:hover {
            text-decoration: underline;
        }

        .btn-cadastrar {
            background: #1b4773;
            color: white;
        }

        .btn-cadastrar:hover {
            background: #143858;
        }

        .tabela-container {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
        }

        th {
            background: #1b4773;
            color: white;
            padding: 14px;
            text-align: left;
            font-size: 14px;
        }

        td {
            padding: 14px;
            border-bottom: 1px solid #dce3ea;
            color: #496b8c;
            font-size: 14px;
        }

        tr:hover {
            background: #f5f8fb;
        }

        .acoes {
            display: flex;
            gap: 8px;
            align-items: center;
        }

        .acoes form {
            display: inline;
        }

        .btn-editar {
            background: #1b4773;
            color: white;
            padding: 8px 12px;
        }

        .btn-excluir {
            background: #b94a48;
            color: white;
            padding: 8px 12px;
        }

        .btn-editar:hover {
            background: #143858;
        }

        .btn-excluir:hover {
            background: #963b39;
        }

        .vazio {
            text-align: center;
            color: #78909c;
            padding: 25px;
        }

        .mensagem-sucesso {
            background: #e8f5e9;
            color: #2e7d32;
            padding: 12px;
            border-radius: 8px;
            text-align: center;
            margin-bottom: 20px;
        }

        @media (max-width: 650px) {
            .sala-box {
                padding: 22px 18px;
            }

            .topo {
                flex-direction: column;
                align-items: stretch;
            }

            .acoes {
                flex-direction: column;
                align-items: stretch;
            }

            h1 {
                font-size: 25px;
            }
        }
    </style>
</head>

<body>

    <div class="container">

        <div class="sala-box">

            <h1>Salas Cadastradas</h1>

            @if(session('success'))
                <div class="mensagem-sucesso">
                    {{ session('success') }}
                </div>
            @endif

            <div class="topo">

                <a href="/principal" class="btn-voltar">
                    ← Voltar
                </a>

                <a href="/salas/create" class="btn btn-cadastrar">
                    + Nova Sala
                </a>

            </div>

            <div class="tabela-container">

                <table>

                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Número da Sala</th>
                            <th>Bloco</th>
                            <th>Empresa</th>
                            <th>Ações</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($salas as $sala)

                            <tr>
                                <td>{{ $sala->id }}</td>

                                <td>{{ $sala->num_sala }}</td>

                                <td>{{ $sala->bloco }}</td>

                                <td>
                                    {{ $sala->empresa ? $sala->empresa->nome : 'Sem empresa' }}
                                </td>

                                <td>
                                    <div class="acoes">

                                        <a
                                            href="/salas/{{ $sala->id }}/edit"
                                            class="btn btn-editar"
                                        >
                                            Editar
                                        </a>

                                        <form
                                            action="/salas/{{ $sala->id }}"
                                            method="POST"
                                        >
                                            @csrf
                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="btn btn-excluir"
                                                onclick="return confirm('Deseja excluir esta sala?')"
                                            >
                                                Excluir
                                            </button>
                                        </form>

                                    </div>
                                </td>
                            </tr>

                        @empty

                            <tr>
                                <td colspan="5" class="vazio">
                                    Nenhuma sala cadastrada.
                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</body>

</html>