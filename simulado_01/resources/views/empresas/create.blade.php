
<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Nova Empresa</title>

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

        input {
            width: 100%;
            padding: 13px;
            border: 1px solid #c5d0da;
            border-radius: 8px;
            font-size: 14px;
            color: #16324f;
            outline: none;
            transition: 0.3s;
        }

        input:focus {
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

            <h1>Nova Empresa</h1>

            <form action="/empresas" method="POST">

                @csrf

                <div class="campo">

                    <label for="nome">Nome da Empresa:</label>

                    <input
                        type="text"
                        id="nome"
                        name="nome"
                        placeholder="Digite o nome da empresa"
                        value="{{ old('nome') }}"
                        required
                    >

                </div>

                <div class="campo">

                    <label for="cnpj">CNPJ:</label>

                    <input
                        type="text"
                        id="cnpj"
                        name="cnpj"
                        placeholder="00.000.000/0000-00"
                        value="{{ old('cnpj') }}"
                        maxlength="18"
                        inputmode="numeric"
                        required
                    >

                </div>

                <div class="campo">

                    <label for="telefone">Telefone:</label>

                    <input
                        type="text"
                        id="telefone"
                        name="telefone"
                        placeholder="(00) 00000-0000"
                        value="{{ old('telefone') }}"
                        maxlength="15"
                        inputmode="tel"
                        required
                    >

                </div>

                <div class="campo">

                    <label for="email">E-mail:</label>

                    <input
                        type="email"
                        id="email"
                        name="email"
                        placeholder="Digite o e-mail"
                        value="{{ old('email') }}"
                        autocomplete="email"
                        required
                    >

                </div>

                <button type="submit" class="btn-cadastrar">

                    Cadastrar Empresa

                </button>

            </form>

            <a href="/empresas/listar" class="btn-voltar">

                ← Voltar para Empresas

            </a>

        </div>

    </div>


    <script>

        // MÁSCARA CNPJ

        const cnpj = document.getElementById('cnpj');

        cnpj.addEventListener('input', function (e) {

            let valor = e.target.value.replace(/\D/g, '');

            valor = valor.substring(0, 14);

            valor = valor.replace(/^(\d{2})(\d)/, '$1.$2');

            valor = valor.replace(/^(\d{2})\.(\d{3})(\d)/, '$1.$2.$3');

            valor = valor.replace(/\.(\d{3})(\d)/, '.$1/$2');

            valor = valor.replace(/(\d{4})(\d)/, '$1-$2');

            e.target.value = valor;

        });


        // MÁSCARA TELEFONE

        const telefone = document.getElementById('telefone');

        telefone.addEventListener('input', function (e) {

            let valor = e.target.value.replace(/\D/g, '');

            valor = valor.substring(0, 11);

            valor = valor.replace(/^(\d{2})(\d)/g, '($1) $2');

            valor = valor.replace(/(\d{5})(\d)/, '$1-$2');

            e.target.value = valor;

        });


        // E-MAIL: LETRAS MINÚSCULAS

        const email = document.getElementById('email');

        email.addEventListener('input', function (e) {

            e.target.value = e.target.value.toLowerCase();

        });

    </script>

</body>

</html>