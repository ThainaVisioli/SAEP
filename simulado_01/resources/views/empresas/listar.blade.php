
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Empresas</title>

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
            max-width: 1100px;
            margin: 0 auto;
        }

        .empresa-box {
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
            margin-bottom: 25px;
        }

        h2 {
            color: #163f68;
            margin: 25px 0 15px;
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
        }

        .btn-cadastrar {
            background: #1b4773;
            color: white;
        }

        .btn-cadastrar:hover {
            background: #143858;
        }

        .btn-voltar {
            color: #1b4773;
            text-decoration: none;
            font-weight: bold;
        }

        .busca {
            display: flex;
            gap: 10px;
            margin-bottom: 25px;
        }

        .busca input {
            flex: 1;
            padding: 12px;
            border: 1px solid #c5d0da;
            border-radius: 8px;
            font-size: 14px;
        }

        .btn-pesquisar {
            background: #78909c;
            color: white;
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
        }

        td {
            padding: 13px;
            border-bottom: 1px solid #dce3ea;
            color: #496b8c;
        }

        tr:hover {
            background: #f5f8fb;
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

        .mensagem-sucesso {
            background: #e8f5e9;
            color: #2e7d32;
            padding: 12px;
            border-radius: 8px;
            text-align: center;
            margin-bottom: 20px;
        }

        .vazio {
            text-align: center;
            color: #78909c;
            padding: 25px;
        }

        .acoes {
            display: flex;
            gap: 8px;
            align-items: center;
        }

        .acoes form {
            display: inline;
        }

        @media (max-width: 650px) {
            .empresa-box {
                padding: 20px;
            }

            .topo {
                flex-direction: column;
                align-items: stretch;
            }

            .busca {
                flex-direction: column;
            }

            .acoes {
                flex-direction: column;
                align-items: stretch;
            }
        }
    </style>
</head>

<body>

    <div class="container">

        <div class="empresa-box">

            <h1>Empresas Cadastradas</h1>

            @if(session('success'))
                <div class="mensagem-sucesso">
                    {{ session('success') }}
                </div>
            @endif

            <div class="topo">

                <a href="/portal" class="btn-voltar">
                    ← Voltar ao Portal
                </a>

                <a href="/empresas/create" class="btn btn-cadastrar">
                    + Cadastrar Empresa
                </a>

            </div>

            <h2>Buscar Empresa</h2>

            <form action="/empresas/listar" method="GET" class="busca">

                <input
                    type="text"
                    name="nome"
                    placeholder="Digite o nome da empresa"
                    value="{{ request('nome') }}"
                >

                <button type="submit" class="btn btn-pesquisar">
                    Pesquisar
                </button>

            </form>

            <div class="tabela-container">

                <table>

                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>CNPJ</th>
                            <th>Telefone</th>
                            <th>E-mail</th>
                            <th>Ações</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($empresas as $empresa)

                            <tr>
                                <td>{{ $empresa->id }}</td>

                                <td>{{ $empresa->nome }}</td>

                                <td>{{ $empresa->cnpj }}</td>

                                <td>{{ $empresa->telefone }}</td>

                                <td>{{ $empresa->email }}</td>

                                <td>
                                    <div class="acoes">

                                        <a
                                            href="/empresas/{{ $empresa->id }}/edit"
                                            class="btn btn-editar"
                                        >
                                            Editar
                                        </a>

                                        <form
                                            action="/empresas/{{ $empresa->id }}"
                                            method="POST"
                                        >
                                            @csrf
                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="btn btn-excluir"
                                                onclick="return confirm('Deseja excluir esta empresa?')"
                                            >
                                                Excluir
                                            </button>
                                        </form>

                                    </div>
                                </td>
                            </tr>

                        @empty

                            <tr>
                                <td colspan="6" class="vazio">
                                    Nenhuma empresa cadastrada.
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