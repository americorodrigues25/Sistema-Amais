<?php
session_start();
if ($_SESSION['fundacao'] != "amais") {
    $_SESSION['statusruim'] = "Não autorizado";
    header("location:../index.php");
}
?>
<?php
ini_set('display_errors', 0);
error_reporting(E_ERROR | E_WARNING | E_PARSE);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:ital,wght@0,100..700;1,100..700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="icon" type="image/png" href="../img/logo-colorido.png">
    <title>Cadastrar Artista | cliente Amais</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            text-decoration: none;
            font-family: "Roboto Mono", monospace;
        }

        html {
            scroll-behavior: smooth;
            scroll-padding-top: 5rem;
            overflow-x: hidden;
        }

        html::-webkit-scrollbar {
            width: 0.7rem;
        }

        html::-webkit-scrollbar-track {
            background-color: #000;
        }

        html::-webkit-scrollbar-thumb {
            background: #747786;
        }

        body {
            color: #fff;
            background-color: #000;
            margin: 3% 0;
        }

        .header {
            display: flex;
            justify-content: space-between;
            width: 90%;
            margin: auto;
        }

        .header i {
            font-size: 2.5em;
            color: #fff;
        }

        .nav-button {
            background: none;
            border: none;
            cursor: pointer;
            z-index: 1000;
        }

        .overlay {
            width: 20%;
            height: 0;
            background-color: transparent;
            position: absolute;
            top: 0;
            right: 0;
            z-index: 1000;
            overflow-y: hidden;
            transition: height .5s;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .overlay .closebtn {
            position: absolute;
            font-size: 2.5em;
            right: 10.7%;
            top: 15%;
            color: #fff;
        }

        .overlay-content button {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 220px;
            padding: 16px 12px;
            position: relative;
            margin: 15px;
            border: none;
            cursor: pointer;
        }


        .overlay-content button.home {
            background-color: #0d6efd;
            border-radius: 5px;
            transition: .3s;
        }

        .overlay-content button.home:hover {
            background-color: #0b5ed7;
        }

        .overlay-content button.home i {
            padding-right: 5px;
        }

        .overlay-content button.home a,
        .logout a {
            color: #fff;
            font-size: 16px;
        }

        .overlay-content button.logout {
            background-color: #dc3545;
            border-radius: 5px;
            transition: .3s;
        }

        .overlay-content button.logout:hover {
            background-color: #b02a37;
        }

        .header h3 {
            color: #fff;
            font-size: 2rem;
        }

        img {
            display: block;
            margin: auto;
            width: 20rem;
        }

        input[type="radio"] {
            display: inline-block;
            width: 20px;
            height: 20px;
            outline: none;
            cursor: pointer;
            margin-right: 5px;
        }

        input[type="radio"]:checked {
            background-color: #333;
        }

        h2 {
            text-align: center;
            margin-bottom: 2rem;
            text-transform: uppercase;
            font-size: 2em;
        }

        form {
            width: 50%;
            margin: auto;
        }

        input {
            margin-bottom: 5px;
        }

        fieldset {
            padding: 20px 55px;
            margin-bottom: 20px;
            border-radius: 10px;
        }

        fieldset label {
            display: inline-block;
            margin-bottom: 5px;
        }

        legend {
            text-transform: uppercase;
            text-align: center;
            font-size: 1.1em;
        }

        input,
        select {
            width: 100%;
            padding: 7px 10px;
            border-radius: 30px;
            outline: none;
            border: none;
        }

        form button {
            display: block;
            margin: 0 auto;
            width: 200px;
            padding: 10px;
            margin-top: 2rem;
            border-radius: 30px;
            text-transform: uppercase;
            transition: 0.3s;
            cursor: pointer;
            border: none;
        }

        form button:hover {
            background-color: #afafaf;
        }

        .alert {
            display: flex;
            width: 420px;
            height: 60px;
            background-color: #d1e7dd;
            text-align: center;
            justify-content: space-between;
            align-items: center;
            margin: auto;
            margin-bottom: 3%;
            padding: 0 20px;
            border-radius: 5px;
            color: #0a3622;
        }

        .alert button {
            border: none;
            background-color: transparent;
        }

        .alert button i {
            color: #0a3622;
            cursor: pointer;
        }

        .alert-ruim {
            display: flex;
            width: 420px;
            height: 60px;
            background-color: #f8d7da;
            text-align: center;
            justify-content: space-between;
            align-items: center;
            margin: auto;
            margin-bottom: 3%;
            padding: 0 20px;
            border-radius: 5px;
            color: #0a3622;
        }

        .alert-ruim button {
            border: none;
            background-color: transparent;
        }

        .alert-ruim button i {
            color: #0a3622;
            cursor: pointer;
        }

        .alert-ruim p strong {
            color: #58151c;
        }
    </style>
</head>


<body>
    <div id="myNav" class="overlay">
        <a href="#" class="closebtn" onclick="closeNav()"></a>
        <div class="overlay-content">
            <button class="home">
                <a href="../views/fundacao_amais.php">
                    <i class="bi bi-house-door"></i>Voltar pra home
                </a>
            </button>
            <button class="logout">
                <a href="../scripts/logout.php">
                    <i class="bi bi-house-x-fill"></i> Deslogar
                </a>
            </button>
        </div>
    </div>

    <div class="header">
        <h3>Sistema A+</h3>
        <button class="nav-button" onclick="toggleNav()">
            <i class="bi bi-list"></i>
        </button>
    </div>

    <img src="../img/logo-branco.png" alt="LOGO AMAIS">
    <h2>Cadastrar Artista | Cliente</h2>
    <?php
    if (isset($_SESSION["statusbom"])) {
        ?>
        <div class="alert" id="statusbom">
            <p><strong><?php echo $_SESSION["statusbom"]; ?></strong></p>
            <div class="icon">
                <button class="close-btn"><i class="bi bi-x-lg"></i></button>
            </div>
        </div>
        <?php
        unset($_SESSION["statusbom"]);
    } elseif (isset($_SESSION["statusruim"])) {
        ?>
        <div class="alert-ruim" id="statusruim">
            <p><strong><?php echo $_SESSION["statusruim"]; ?></strong></p>
            <div class="icon">
                <button class="close-btn"><i class="bi bi-x-lg"></i></button>
            </div>
        </div>
        <?php
        unset($_SESSION["statusruim"]);
    }
    ?>

    <div class="container-form">
        <form action="../scripts/cadastro_artista&cliente_amais.php" method="post">
            <fieldset>
                <legend>Tipo de cadastro</legend>
                <input type="radio" name="tipo_usuario" value="artista" required>
                <label for="artista">Artista</label><br>
                <input type="radio" name="tipo_usuario" value="cliente" required>
                <label for="cliente">Cliente</label><br>
            </fieldset>
            <fieldset>
                <legend>Dados pessoais</legend>
                <label for="nome">Nome completo:</label> <br>
                <input type="text" name="nome" required> <br>
                <label for="nascimento">Data de nascimento:</label> <br>
                <input type="text" id="dataNascimento" name="dataNascimento" placeholder="dd/mm/yyyy" maxlength="10"
                    required> <br>
                <label for="cpf">CPF:</label> <br>
                <input type="text" id="cpf" name="cpf" placeholder="000.000.000-00" maxlength="14" required> <br>
                <label for="rg">RG:</label> <br>
                <input type="text" id="rg" name="rg" placeholder="00.000.000-0" maxlength="12" required> <br>
                <label for="genero">Gênero:</label> <br>
                <select id="genero" name="genero" required>
                    <option value="" disabled selected>Selecione o gênero</option>
                    <option value="masculino">Masculino</option>
                    <option value="feminino">Feminino</option>
                    <option value="outro">Outro</option>
                    <option value="nao-informar">Prefiro não informar</option>
                </select>
            </fieldset>

            <fieldset>
                <legend>Dados de endereço:</legend>
                <label for="rua">Endereço:</label> <br>
                <input type="text" name="endereco" required><br>
                <label for="num">N°</label> <br>
                <input type="text" name="numero" style="width: 100px;" required> <br>
                <label for="cidade">Cidade:</label> <br>
                <input type="text" name="cidade" required> <br>
                <label for="estado">Estado:</label> <br>
                <input type="text" name="estado" required> <br>
                <label for="cep">CEP:</label> <br>
                <input type="text" id="cep" name="cep" placeholder="00000-000" maxlength="9" required>
            </fieldset>

            <fieldset>
                <legend>Dados para contato:</legend>
                <label for="email">E-mail:</label> <br>
                <input type="email" name="email" placeholder="exemplo@exemplo.com" required> <br>
                <label for="tel">Telefone:</label> <br>
                <input type="tel" id="tel" name="telefone" placeholder="(11) 99999-9999" maxlength="15" required>
            </fieldset>
            <button type="submit">Cadastrar</button>
        </form>
    </div>

    <script src="../js/script.js"></script>
    <script src="../js/script_menuHamburguer.js"></script>

    <script>
        document.querySelectorAll('.close-btn').forEach(button => {
            button.addEventListener('click', function () {
                this.closest('.alert, .alert-ruim').style.display = 'none';
            });
        });
    </script>
</body>

</html>