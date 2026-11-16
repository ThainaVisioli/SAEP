<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Oficina Mecânica')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * { box-sizing: border-box; }
        body {
            margin: 0;
            background: #f1f4f8;
            color: #263445;
            font-family: 'Poppins', 'Segoe UI', sans-serif;
            font-size: 14px;
        }
        .nav {
            background: #173b5e;
            color: #fff;
            padding: 16px 5%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            flex-wrap: wrap;
        }
        .nav a { color: #fff; text-decoration: none; margin-right: 15px; }
        .wrap { max-width: 1180px; margin: 32px auto; padding: 0 16px; }
        .panel {
            background: #fff;
            padding: 26px;
            border-radius: 12px;
            box-shadow: 0 4px 18px #102a4314;
        }
        .top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            flex-wrap: wrap;
            margin-bottom: 22px;
        }
        h1, h2 { color: #173b5e; }
        h1 { margin: 0 0 18px; font-size: 25px; }
        h2 { font-size: 19px; }
        .btn {
            display: inline-block;
            border: 0;
            border-radius: 7px;
            padding: 10px 15px;
            background: #1d5d8f;
            color: #fff;
            text-decoration: none;
            cursor: pointer;
            font: inherit;
            font-weight: 500;
        }
        .btn.gray { background: #718096; }
        .btn.red { background: #b83232; }
        .btn.green { background: #237a52; }
        input, select, textarea {
            width: 100%;
            padding: 11px;
            border: 1px solid #cbd5df;
            border-radius: 7px;
            margin: 6px 0 15px;
            font: inherit;
        }
        label { font-weight: 600; font-size: 13px; }
        table { width: 100%; border-collapse: collapse; min-width: 700px; }
        th, td { text-align: left; padding: 12px; border-bottom: 1px solid #e5eaf0; }
        th { background: #eaf0f6; color: #173b5e; font-weight: 600; }
        .table-wrap { overflow-x: auto; }
        .alert, .error { padding: 12px; border-radius: 7px; margin: 12px 0; }
        .alert { background: #e7f6ed; color: #17633a; }
        .error { background: #fff0f0; color: #a32222; }
        .grid { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 0 18px; }
        .actions { display: flex; gap: 7px; align-items: center; flex-wrap: wrap; }
        .menu { display: grid; grid-template-columns: repeat(auto-fit, minmax(210px, 1fr)); gap: 16px; }
        .tile {
            padding: 24px;
            background: #f4f7fa;
            border: 1px solid #e0e7ef;
            border-radius: 10px;
            text-decoration: none;
            color: #173b5e;
            font-weight: 600;
        }
        .tile:hover { background: #e7eff7; }
        @media (max-width: 650px) {
            .grid { grid-template-columns: 1fr; }
            .panel { padding: 18px; }
            .nav { padding: 14px; }
        }
    </style>
</head>
<body>
    <div class="nav">
        <strong>Oficina Mecânica</strong>
        <div>
            @if(session('usuario_nome'))
                <span>Olá, {{ session('usuario_nome') }}</span>
                &nbsp;
                <a href="{{ route('principal') }}">Início</a>
                <form action="{{ route('logout') }}" method="POST" style="display:inline">
                    @csrf
                    <button class="btn red" type="submit">Sair</button>
                </form>
            @endif
        </div>
    </div>

    <div class="wrap">
        @if(session('success'))
            <div class="alert">{{ session('success') }}</div>
        @endif

        @if($errors->any())
            <div class="error">
                <ul>
                    @foreach($errors->all() as $erro)
                        <li>{{ $erro }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')
    </div>
</body>
</html>
