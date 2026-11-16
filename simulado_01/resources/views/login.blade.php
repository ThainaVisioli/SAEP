
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login</title>


<style>
    /* RESET */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: Arial, sans-serif;
    }

    /* FUNDO */
    body {
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;

        background: #eef2f6;
        padding: 20px;
    }

    /* CONTAINER */
    .container {
        width: 100%;
        max-width: 440px;
        padding: 20px;
    }

    /* CARD DE LOGIN */
    .login-box {
        background: #ffffff;
        padding: 42px 38px;
        border-radius: 16px;

        border: 1px solid #dce3ea;
        box-shadow: 0 8px 25px rgba(15, 35, 55, 0.10);
    }

    /* TÍTULO */
    .login-box h1 {
        text-align: center;
        color: #16324f;
        margin-bottom: 10px;
        font-size: 30px;
        font-weight: 700;
    }

    /* SUBTÍTULO */
    .subtitulo {
        text-align: center;
        color: #64748b;
        margin-bottom: 32px;
        font-size: 14px;
    }

    /* CAMPOS */
    .form-group {
        margin-bottom: 20px;
    }

    label {
        display: block;
        margin-bottom: 8px;

        color: #263b50;
        font-weight: 600;
        font-size: 14px;
    }

    input {
        width: 100%;
        padding: 14px 15px;

        border: 1px solid #cbd5df;
        border-radius: 8px;

        background: #ffffff;
        color: #263b50;

        outline: none;
        font-size: 14px;

        transition: 0.25s;
    }

    input::placeholder {
        color: #94a3b8;
    }

    input:focus {
        border-color: #2563a6;
        box-shadow: 0 0 0 3px rgba(37, 99, 166, 0.12);
    }

    /* BOTÃO LOGIN */
    .btn-login {
        width: 100%;
        padding: 14px;

        background: #163f68;
        color: #ffffff;

        border: none;
        border-radius: 8px;

        font-size: 15px;
        font-weight: 600;
        cursor: pointer;

        transition: 0.25s;
    }

    .btn-login:hover {
        background: #0f2f50;
        transform: translateY(-1px);
    }

    .btn-login:active {
        transform: translateY(0);
    }

    /* MENSAGEM DE ERRO */
    .mensagem-erro {
        background: #fff1f2;
        color: #b42318;

        border: 1px solid #fecdd3;
        padding: 12px;

        border-radius: 8px;
        text-align: center;

        margin-bottom: 20px;
        font-size: 14px;
    }

    /* RODAPÉ */
    .rodape {
        text-align: center;
        margin-top: 26px;

        color: #8493a3;
        font-size: 12px;
    }

    /* RESPONSIVIDADE */
    @media (max-width: 480px) {
        .container {
            padding: 10px;
        }

        .login-box {
            padding: 32px 25px;
        }

        .login-box h1 {
            font-size: 26px;
        }
    }
</style>
</head>

<body>

    <div class="container">

        <div class="login-box">

            <h1>Bem-vindo!</h1>

            <p class="subtitulo">
                Entre na sua conta para continuar
            </p>

            @if(session('erro'))
                <p class="mensagem-erro">
                    {{ session('erro') }}
                </p>
            @endif

            <form action="/login" method="POST">

                @csrf

                <div class="form-group">
                    <label>E-mail:</label>
                    <input
                        type="email"
                        name="email"
                        placeholder="Digite seu e-mail"
                        required
                    >
                </div>

                <div class="form-group">
                    <label>Senha:</label>
                    <input
                        type="password"
                        name="senha"
                        placeholder="Digite sua senha"
                        required
                    >
                </div>

                <button type="submit" class="btn-login">
                    Entrar
                </button>

            </form>

            <p class="rodape">
                Sistema de Login • Laravel
            </p>

        </div>

    </div>

</body>
</html>