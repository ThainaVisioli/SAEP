
<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Agendamentos</title>

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: #f0f4f8;
            min-height: 100vh;
            padding: 30px;
        }

        .container {
            max-width: 1200px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.10);
        }

        .topo {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            flex-wrap: wrap;
            margin-bottom: 25px;
        }

        h1 {
            color: #1f4e5f;
            font-size: 28px;
        }

        .btn {
            display: inline-block;
            padding: 11px 18px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
            border: none;
            cursor: pointer;
            font-size: 14px;
            transition: 0.3s;
        }

        .btn-novo {
            background: #1f4e5f;
            color: white;
        }

        .btn-novo:hover {
            background: #163b48;
        }

        .btn-voltar {
            background: #78909c;
            color: white;
        }

        .btn-voltar:hover {
            background: #546e7a;
        }

        .tabela-container {
            overflow-x: auto;
            width: 100%;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            min-width: 750px;
        }

        thead {
            background: #1f4e5f;
            color: white;
        }

        th {
            padding: 15px 12px;
            text-align: left;
            font-size: 14px;
        }

        td {
            padding: 13px 12px;
            border-bottom: 1px solid #e0e6eb;
            color: #37474f;
            font-size: 14px;
        }

        tbody tr:hover {
            background: #f5f8fa;
        }

        .acoes {
            display: flex;
            align-items: center;
            gap: 8px;
            white-space: nowrap;
        }

        .btn-editar {
            background: #e8f0f3;
            color: #1f4e5f;
        }

        .btn-editar:hover {
            background: #d0e0e6;
        }

        .btn-excluir {
            background: #d9534f;
            color: white;
        }

        .btn-excluir:hover {
            background: #b52b27;
        }

        .form-excluir {
            display: inline;
        }

        .mensagem {
            background: #e8f5e9;
            color: #2e7d32;
            padding: 12px 15px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .vazio {
            text-align: center;
            padding: 30px;
            color: #78909c;
        }

        @media (max-width: 600px) {

            body {
                padding: 15px;
            }

            .container {
                padding: 20px;
            }

            h1 {
                font-size: 24px;
            }

            .topo {
                align-items: stretch;
                flex-direction: column;
            }

            .btn {
                text-align: center;
            }

        }

    </style>

</head>

<body>

    <div class="container">

        <div class="topo">

            <h1>Agendamentos</h1>

            <div>

                <a href="/principal" class="btn btn-voltar">
                    Voltar
                </a>

                <a href="/agendamentos/create" class="btn btn-novo">
                    + Novo Agendamento
                </a>

            </div>

        </div>

        @if(session('success'))

            <div class="mensagem">
                {{ session('success') }}
            </div>

        @endif

        <div class="tabela-container">

            <table>

                <thead>

                    <tr>

                        <th>ID</th>
                        <th>Data</th>
                        <th>Hora</th>
                        <th>Empresa</th>
                        <th>Sala</th>
                        <th>Descrição</th>
                        <th>Ações</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($agendamentos as $agendamento)

                        <tr>

                            <td>
                                {{ $agendamento->id }}
                            </td>

                            <td>
                                {{ date('d/m/Y', strtotime($agendamento->data)) }}
                            </td>

                            <td>
                                {{ $agendamento->hora }}
                            </td>

                            <td>
                                {{ $agendamento->sala?->empresa?->nome ?? 'Não informado' }}
                            </td>

                            <td>
                                {{ $agendamento->sala?->num_sala ?? 'Não informado' }}
                            </td>

                            <td>
                                {{ $agendamento->descricao ?? 'Sem descrição' }}
                            </td>

                            <td>

                                <div class="acoes">

                                    <a
                                        href="/agendamentos/{{ $agendamento->id }}/edit"
                                        class="btn btn-editar"
                                    >
                                        Editar
                                    </a>

                                    <form
                                        action="/agendamentos/{{ $agendamento->id }}"
                                        method="POST"
                                        class="form-excluir"
                                        onsubmit="return confirm('Deseja realmente excluir este agendamento?')"
                                    >

                                        @csrf

                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="btn btn-excluir"
                                        >
                                            Excluir
                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="7" class="vazio">

                                Nenhum agendamento cadastrado.

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</body>

</html>