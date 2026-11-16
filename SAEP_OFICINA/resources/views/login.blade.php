<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Oficina Mecânica</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * { box-sizing: border-box; }
        body {
            display: grid;
            min-height: 100vh;
            margin: 0;
            place-items: center;
            background: #edf2f7;
            font-family: 'Poppins', 'Segoe UI', sans-serif;
        }
        .box {
            width: min(420px, 92%);
            padding: 38px;
            border-radius: 14px;
            background: #fff;
            box-shadow: 0 8px 30px #173b5e20;
        }
        h1 { color: #173b5e; text-align: center; }
        label { font-weight: bold; }
        input {
            width: 100%;
            margin: 8px 0 18px;
            padding: 13px;
            border: 1px solid #ccd5df;
            border-radius: 7px;
        }
        .btn {
            width: 100%;
            padding: 13px;
            border: 0;
            border-radius: 7px;
            background: #173b5e;
            color: #fff;
            font-weight: bold;
            cursor: pointer;
        }
        .err {
            padding: 10px;
            border-radius: 6px;
            background: #fff0f0;
            color: #a22;
        }
    </style>
</head>
<body>
    <main class="box">
        <h1>Oficina Mecânica</h1>
        <p style="text-align: center; color: #667;">Acesse sua conta</p>

        @if (session('erro'))
            <p class="err">{{ session('erro') }}</p>
        @endif

        @if ($errors->any())
            <p class="err">Verifique os dados informados.</p>
        @endif

        <form method="POST" action="{{ url('/login') }}">
            @csrf

            <label for="email">E-mail</label>
            <input
                id="email"
                type="email"
                name="email"
                value="{{ old('email') }}"
                autocomplete="username"
                required
            >

            <label for="senha">Senha</label>
            <input
                id="senha"
                type="password"
                name="senha"
                autocomplete="current-password"
                required
            >

            <button class="btn" type="submit">Entrar</button>
        </form>
    </main>
</body>
</html>
