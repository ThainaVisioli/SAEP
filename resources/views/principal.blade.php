
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Portal de Cadastro</title>



<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: Arial, sans-serif;
    }

    body {
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;

        background: #eef2f6;
        padding: 20px;
    }

    .container {
        width: 100%;
        max-width: 560px;
    }

    .portal-box {
        background: #ffffff;
        padding: 42px 40px;
        border-radius: 16px;

        border: 1px solid #dce3ea;
        box-shadow: 0 8px 25px rgba(15, 35, 55, 0.10);
    }

    h1 {
        text-align: center;
        color: #16324f;
        font-size: 30px;
        font-weight: 700;
        margin-bottom: 15px;
    }

    h2 {
        text-align: center;
        color: #496b8c;
        font-size: 18px;
        font-weight: normal;
        margin-bottom: 32px;
    }

    hr {
        border: none;
        border-top: 1px solid #e0e6eb;
        margin-bottom: 28px;
    }

    h3 {
        text-align: center;
        color: #263b50;
        font-size: 18px;
        font-weight: 600;
        margin-bottom: 22px;
    }

    .menu {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    .menu a {
        text-decoration: none;
    }

    .menu button,
    .btn-sair {
        width: 100%;
        padding: 14px;

        background: #1b4773;
        color: #ffffff;

        border: none;
        border-radius: 8px;

        font-size: 15px;
        font-weight: 600;
        cursor: pointer;

        transition: 0.25s;
    }

    .menu button:hover {
        background: #143858;
        transform: translateY(-1px);
    }

    .btn-sair {
        background: #b94a48;
        margin-top: 25px;
    }

    .btn-sair:hover {
        background: #963b39;
        transform: translateY(-1px);
    }

    .rodape {
        text-align: center;
        margin-top: 28px;

        color: #78909c;
        font-size: 12px;
    }

    @media (max-width: 480px) {
        .portal-box {
            padding: 32px 25px;
        }

        h1 {
            font-size: 25px;
        }

        h2 {
            font-size: 17px;
        }
    }
</style>
</head>
<body>

    <div class="container">

        <div class="portal-box">

            <h2>Bem-Vindo ao Portal de cadastro</h2>

            <h2>
                Acessado por, {{ session('usuario_nome') }}!
            </h2>

            <hr>

            <h3>Menu</h3>

            <div class="menu">

                <a href="/empresas/listar">
                    <button type="button">
                         Empresas
                    </button>
                </a>

                <a href="/salas/listar">
                    <button type="button">
                         Salas
                    </button>
                </a>

                <a href="/agendamentos/listar">
                    <button type="button">
                         Agendamentos
                    </button>
                </a>

            </div>

            <form action="/logout" method="POST">

                @csrf

                <button type="submit" class="btn-sair">
                     Sair
                </button>

            </form>

            <p class="rodape">
                Sistema de Cadastro • Laravel
            </p>

        </div>

    </div>

</body>

</html>