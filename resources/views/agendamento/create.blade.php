
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Novo Agendamento</title>

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
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 30px;
        }

        .container {
            background: white;
            width: 100%;
            max-width: 600px;
            padding: 35px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.10);
        }

        h1 {
            text-align: center;
            color: #1f4e5f;
            margin-bottom: 30px;
            font-size: 28px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #263238;
        }

        input,
        select {
            width: 100%;
            padding: 12px;
            border: 1px solid #cfd8dc;
            border-radius: 8px;
            font-size: 15px;
            outline: none;
            transition: 0.3s;
            background: #fff;
        }

        input:focus,
        select:focus {
            border-color: #1f4e5f;
            box-shadow: 0 0 5px rgba(31, 78, 95, 0.25);
        }

        .btn {
            width: 100%;
            padding: 13px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
        }

        .btn-cadastrar {
            background: #1f4e5f;
            color: white;
            margin-top: 10px;
        }

        .btn-cadastrar:hover {
            background: #163b48;
        }

        .btn-voltar {
            display: block;
            text-align: center;
            text-decoration: none;
            background: #78909c;
            color: white;
            padding: 13px;
            border-radius: 8px;
            margin-top: 12px;
            font-weight: bold;
            transition: 0.3s;
        }

        .btn-voltar:hover {
            background: #546e7a;
        }

        .erro {
            color: #d32f2f;
            font-size: 13px;
            margin-top: 5px;
        }

        .sucesso {
            background: #e8f5e9;
            color: #2e7d32;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        @media (max-width: 500px) {

            body {
                padding: 15px;
            }

            .container {
                padding: 25px;
            }

            h1 {
                font-size: 24px;
            }

        }

    </style>

</head>

<body>

    <div class="container">

        <h1>Novo Agendamento</h1>

        @if(session('success'))
            <div class="sucesso">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="erro">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="/agendamentos" method="POST">

            @csrf

            <div class="form-group">

                <label for="data">Data:</label>

                <input
                    type="date"
                    id="data"
                    name="data"
                    value="{{ old('data') }}"
                    required
                >

            </div>

            <div class="form-group">

                <label for="hora">Hora:</label>

                <input
                    type="time"
                    id="hora"
                    name="hora"
                    value="{{ old('hora') }}"
                    required
                >

            </div>

            <div class="form-group">

                <label for="descricao">Descrição:</label>

                <input
                    type="text"
                    id="descricao"
                    name="descricao"
                    placeholder="Ex: Reunião de Viagem"
                    value="{{ old('descricao') }}"
                >

            </div>

            <div class="form-group">

                <label for="sala_id">Sala:</label>

                <select name="sala_id" id="sala_id" required>

                    <option value="">
                        Selecione uma Sala
                    </option>

                    @foreach($salas as $sala)

                        <option
                            value="{{ $sala->id }}"
                            {{ old('sala_id') == $sala->id ? 'selected' : '' }}
                        >
                            Sala {{ $sala->num_sala }} - Bloco {{ $sala->bloco }}
                        </option>

                    @endforeach

                </select>

            </div>

            <button type="submit" class="btn btn-cadastrar">
                Cadastrar Agendamento
            </button>

        </form>

        <a href="/agendamentos/listar" class="btn-voltar">
            Voltar
        </a>

    </div>

</body>

</html>