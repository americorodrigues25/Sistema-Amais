<?php

ini_set('display_errors', 0);
error_reporting(E_ERROR | E_WARNING | E_PARSE);
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--INICIO GOOGLE FONTS-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:ital,wght@0,100..700;1,100..700&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!--FINAL GOOGLE FONTS-->
    <link rel="icon" type="image/png" href="../img/logo-colorido.png">
    <title>Cadastro</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            border: 0;
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
            height: 100vh;
            background-color: #000;
            margin-top: 3%;
        }

        .form-cadastro {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            color: #fff;
        }

        .form-cadastro h2 {
            letter-spacing: 3px;
            font-size: 1.8em;
        }

        .form-cadastro img {
            width: 20rem;
        }

        form {
            display: flex;
            flex-direction: column;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 3%
        }

        input,
        select {
            margin-top: 3%;
            padding: 10px;
            border-radius: 30px;
            width: 325px;
            outline: none;
        }

        form button {
            margin-top: 15%;
            width: 200px;
            padding: 10px;
            border-radius: 30px;
            text-transform: uppercase;
            transition: 0.3s;
            cursor: pointer;
        }

        form button:hover {
            background-color: #afafaf;
        }

        #bars {
            display: none;
            margin: 8px 0;
            flex: 1 1 auto;
            display: flex;
            align-items: center;
            gap: 8px;
            height: 6px;
            border-radius: 3px;
            background: rgb(255 255 255 / 6%);
        }

        #bars div {
            display: none;
            height: 6px;
            border-radius: 3px;
            transition: 0.4s;
            width: 0%;
        }

        #bars.fraca {
            background: #d0424f;
            width: 33.33%;
        }

        #bars.média {
            background: #e58448;
            width: 66.66%;
        }

        #bars.forte {
            background: #1eb965;
            width: 100%;
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
            width: 240px;
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
            text-decoration: none;
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
    </style>
</head>

<body>
    <div id="myNav" class="overlay">
        <a href="#" class="closebtn" onclick="closeNav()"></a>
        <div class="overlay-content">
            <button class="logout">
                <a href="../index.php">
                    <i class="bi bi-box-arrow-in-left"></i> Voltar para loguin
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
    <div class="form-cadastro">
        <img src="../img/logo-branco.png" alt="Logotipo da empresa">
        <h2>Cadastro</h2>
        <?php
        if (isset($_SESSION['statusruim'])) {
            if ($_SESSION['statusruim']) {
                ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?php echo $_SESSION['statusruim']; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php
                unset($_SESSION['statusruim']);
                session_destroy();
            }
        }
        ?>
        <form action="../scripts/cadastro_geral.php" method="post">
            <label for=""></label>
            <input type="text" name="nome" placeholder="NOME" required>
            <input type="text" name="sobrenome" placeholder="SOBRENOME" required>
            <input type="email" name="email" placeholder="E-MAIL" required>
            <select name="opcao" id="opcao" required>
                <option value="" disabled selected>Selecione uma fundação</option>
                <option value="amais">AMAIS</option>
                <option value="shakese">SHAKESE</option>
            </select>
            <input type="password" name="password" placeholder="SENHA" autocomplete="off" required readonly
                onfocus="this.removeAttribute('readonly');" id="password" oninput="handlechange()">
            <input type="password" name="password2" placeholder="DIGITE A SENHA NOVAMENTE" autocomplete="off" required
                readonly onfocus="this.removeAttribute('readonly');">
            <div class="strength" id="strength"></div>
            <div id="bars">
                <div></div>
            </div>
            <button type="submit">Cadastrar</button>
        </form>
    </div>
</body>

<script src="../js/script_validacaoSenha.js"></script>
<script src="../js/script_menuHamburguer.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>

</html>