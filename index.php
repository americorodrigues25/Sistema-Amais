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
    <!--FINAL GOOGLE FONTS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="icon" type="image/png" href="img/logo-colorido.png">
    <title>Login</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            border: 0;
            text-decoration: none;
            font-family: "Roboto Mono", monospace;
        }

        body {
            height: 100vh;
            background-color: #000;
        }

        .form-login {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            color: #fff;
        }

        .form-login h2 {
            letter-spacing: 3px;
            font-size: 1.8em;
        }

        .form-login img {
            width: 20rem;
        }

        form {
            display: flex;
            flex-direction: column;
            display: flex;
            align-items: center;
            justify-content: center;
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

        form a {
            color: #fff;
            margin-top: 3%;
            text-decoration: none;
            transition: .3s;
        }

        form a:hover {
            color: #afafaf;
        }
    </style>
</head>

<body>
    <div class="form-login">
        <img src="img/logo-branco.png" alt="Logotipo da empresa">
        <h2>Login</h2>
        <?php
        if (isset($_SESSION['statusruim'])) {
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?php echo $_SESSION['statusruim']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
            unset($_SESSION['statusruim']);
            session_destroy();
        }
        if (isset($_SESSION['statusbom'])) {
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php echo $_SESSION['statusbom']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
            unset($_SESSION['statusbom']);
            session_destroy();
        }
        ?>
        <form action="scripts/login.php" method="post">
            <input type="email" name="email" placeholder="E-MAIL" required>
            <input type="password" name="password" placeholder="SENHA" autocomplete="off" required readonly
                onfocus="this.removeAttribute('readonly');">
            <select name="fundacao" id="" required>
                <option value="" disabled selected>Selecione a fundação</option>
                <option value="amais">AMAIS</option>
                <option value="shakese">SHAKESE</option>
            </select>
            <a href="views/cadastro.php">Não tem acesso? Realizar cadastro agora</a>
            <button type="submit">Acessar</button>
        </form>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>

</html>