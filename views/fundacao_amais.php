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
    <!--INICIO FOOGLE FONTS-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:ital,wght@0,100..700;1,100..700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!--INICIO FOOGLE FONTS-->
    <link rel="icon" type="image/png" href="../img/logo-colorido.png">
    <title>AMAIS</title>
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
            background-color: #000;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .header {
            display: flex;
            justify-content: space-between;
            width: 90%;
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

        .container-geral {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .container-geral img {
            width: 25rem;
        }

        .container-geral h2 {
            color: #fff;
            text-transform: uppercase;
            margin-bottom: 20px;
        }

        .container-geral button {
            width: 23rem;
            margin: 7px 0;
            padding: 15px 0;
            border-radius: 15px;
            font-size: 1.2rem;
            cursor: pointer;
            transition: 0.3s;
        }

        .button {
            display: flex;
            flex-direction: column;
        }

        .container-geral button:hover {
            background-color: #afafaf;
        }

        .navbar.navbar-dark.custom-navbar {
            margin-left: 85%;
            margin-top: -2%;
        }
    </style>
</head>

<?php
if (isset($_SESSION['statusruim'])) {
    ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?php echo $_SESSION['statusruim']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php
    unset($_SESSION['statusruim']);
}
?>

<body>
    <div id="myNav" class="overlay">
        <a href="#" class="closebtn" onclick="closeNav()"></a>
        <div class="overlay-content">
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

    <div class="container-geral">
        <img src="../img/logo-branco.png" alt="Logo AMAIS">
        <h2>O que deseja fazer?</h2>
        <div class="button">
            <a href="cadastrar_artista&cliente_amais.php"><button>Cadastrar Cliente | Artista</button></a>
            <a href="consultar_cliente_amais.php"><button>Consultar Cliente</button></a>
            <a href="consultar_artista_amais.php"><button>Consultar Artista</button></a>
        </div>
    </div>

    <script src="../js/script_menuHamburguer.js"></script>

</body>

</html>