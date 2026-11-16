
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Nova Sala</title>

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
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 25px;
            color: #16324f;
        }

        .container {
            width: 100%;
            max-width: 550px;
        }

        .form-box {
            background: #ffffff;
            padding: 40px;
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

        .campo {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #163f68;
            font-weight: bold;
            font-size: 14px;
        }

        input,
        select {
            width: 100%;
            padding: 13px;
            border: 1px solid #c5d0da;
            border-radius: 8px;
            font-size: 14px;
            color: #16324f;
            background: white;
            outline: none;
            transition: 0.3s;
        }

        input:focus,
        select:focus {
            border-color: #1b4773;
            box-shadow: 0 0 0 3px rgba(27, 71, 115, 0.12);
        }

        input::placeholder {
            color: #9aaab8;
        }

        .btn-cadastrar {
            width: 100%;
            padding: 14px;
            border: none;
            border-radius: 8px;
            background: #1b4773;
            color: white;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
            margin-top: 10px;
        }

        .btn-cadastrar:hover {
            background: #143858;
        }

        .btn-voltar {
            display: block;
            text-align: center;
            margin-top: 22px;
            color: #1b4773;
            text-decoration: none;
            font-size: 14px;
            font-weight: bold;
        }

        .btn-voltar:hover {
            text-decoration: underline;
        }

        @media (max-width: 480px) {
            .form-box {
                padding: 28px 22px;
            }

            h1 {
                font-size: 25px;
            }
        }
    </style>
</head>

<body>

    <div class="container">

        <div class="form-box">

            <h1>Nova Sala</h1>

            <form action="/salas" method="POST">

                @csrf

                <div class="campo">
                    <label for="num_sala">Número da Sala:</label>

                    <input
                        type="text"
                        id="num_sala"
                        name="num_sala"
                        placeholder="Digite o número da sala"
                        value="{{ old('num_sala') }}"
                        required
                    >
                </div>

                <div class="campo">
                    <label for="bloco">Bloco:</label>

                    <input
                        type="text"
                        id="bloco"
                        name="bloco"
                        placeholder="Digite o bloco"
                        value="{{ old('bloco') }}"
                        required
                    >
                </div>

                <div class="campo">
                    <label for="empresa_id">Empresa:</label>

                    <select
                        id="empresa_id"
                        name="empresa_id"
                        required
                    >
                        <option value="">
                            Selecione uma empresa
                        </option>

                        @foreach($empresas as $empresa)

                            <option
                                value="{{ $empresa->id }}"
                                {{ old('empresa_id') == $empresa->id ? 'selected' : '' }}
                            >
                                {{ $empresa->nome }}
                            </option>

                        @endforeach

                    </select>
                </div>

                <button type="submit" class="btn-cadastrar">
                    Cadastrar Sala
                </button>

            </form>

            <a href="/salas/listar" class="btn-voltar">
                ← Voltar para Salas
            </a>

        </div>

    </div>

</body>

</html>