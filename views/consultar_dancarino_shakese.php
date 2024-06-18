<?php
session_start();
if ($_SESSION['fundacao'] != "shakese") {
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
    <!--INICIO GOOGLE FONTS-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:ital,wght@0,100..700;1,100..700&display=swap"
        rel="stylesheet">
    <!--FINAL GOOGLE FONTS-->
    <!--INICIO BOOTSTRAP-->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <!--FINAL BOOTSTRAP-->
    <link rel="icon" type="image/png" href="../img/logo-colorido.png">
    <title>Consultar Dançarino Amais</title>

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
            background-color: #000;
            height: 100vh;
            margin-top: 3%;
        }

        .header {
            display: flex;
            justify-content: space-between;
            width: 90%;
            margin: auto;
            margin-bottom: 2%;
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
            background-color: #000;
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

        h2 {
            color: #fff;
            text-align: center;
            font-size: 3em;
        }

        table {
            width: 100%;
            table-layout: auto;
        }

        .table-responsive-xl {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 2%;
            text-align: center;
            font-size: 0.7em;
        }

        form {
            margin: 5% 0;
        }

        fieldset label {
            display: inline-block;
            margin-bottom: 5px;
        }

        fieldset legend {
            margin: 5px 0;
        }

        form input,
        select {
            border: 1px solid #747786;
            width: 70%;
            border-radius: 10px;
            padding: 5px 10px;
            outline: none;
        }

        form button {
            background-color: #f0f0f0;
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
    </style>

</head>

<!-- Php consultar todos -->
<?php
include_once "../factory/conexao.php";
if (!empty($_GET['search'])) {
    $dados = $_GET['search'];
    $query = "SELECT * FROM dancarino where nome like '%$dados%'";
    $executar = mysqli_query($conn, $query);
} else {

    $query = "SELECT * FROM dancarino";
    $executar = mysqli_query($conn, $query);
}
?>


<body>
    <div id="myNav" class="overlay">
        <a href="#" class="closebtn" onclick="closeNav()"></a>
        <div class="overlay-content">
            <button class="home">
                <a href="../views/fundacao_shakese.php">
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
    <h2>Consultar Dançarino</h2>
    <!--INICIO CONTAINER BARRA DE PESQUISA-->
    <div class="container mt-5">
        <div class="row mb-3">
            <div class="col-md-6 offset-md-3">
                <div class="input-group">
                    <input type="search" class="form-control" placeholder="Pesquisar..." id="pesquisar">
                    <button onclick="pesquisardados()" class="btn btn-primary" type="button">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
            </div>
        </div>
    </div> <!--FINAL CONTAINER BARRA DE PESQUISA-->

    <?php
    session_start();
    if ($_SESSION['status']) {
        ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Parabéns </strong><?php echo $_SESSION['status']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

        <?php
        unset($_SESSION['status']);
    }
    ?>

    <div class="table-responsive-xl">
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Nascimento</th>
                    <th scope="col">CPF</th>
                    <th scope="col">RG</th>
                    <th scope="col">Genero</th>
                    <th scope="col">Endereço</th>
                    <th scope="col">N°</th>
                    <th scope="col">Cidade</th>
                    <th scope="col">Estado</th>
                    <th scope="col">CEP</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">...</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <?php
                $i = 0;
                while ($linha = mysqli_fetch_array($executar)) {
                    $i++;
                    ?>
                    <tr>
                        <th scope="row"><?php echo $i ?></th>
                        <td><?php echo $linha["nome"] ?></td>
                        <td><?php echo $linha["data_de_nascimento"] ?></td>
                        <td><?php echo $linha["cpf"] ?></td>
                        <td><?php echo $linha["rg"] ?></td>
                        <td><?php echo $linha["genero"] ?></td>
                        <td><?php echo $linha["endereco"] ?></td>
                        <td><?php echo $linha["numero"] ?></td>
                        <td><?php echo $linha["cidade"] ?></td>
                        <td><?php echo $linha["estado"] ?></td>
                        <td><?php echo $linha["cep"] ?></td>
                        <td><?php echo $linha["email"] ?></td>
                        <td><?php echo $linha["telefone"] ?></td>
                        <td>
                            <!--INICIO MODAL-->
                            <div class="d-flex justify-content-center">
                                <!--INICIO BOTÃO ALTERAR-->
                                <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#staticBackdrop-<?php echo $linha["id"] ?>">
                                    <i class="bi bi-pencil-square"></i>
                                </button> <!--INICIO BOTÃO ALTERAR-->
                                <div class="modal fade" id="staticBackdrop-<?php echo $linha["id"] ?>"
                                    data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                    aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Alteração de cadastro
                                                </h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="../scripts/atualizar_dancarino_shakese.php" method="post">
                                                    <fieldset>
                                                        <legend>Dados pessoais</legend>
                                                        <input type="text" value="<?php echo $linha['id'] ?>" name="id"
                                                            hidden>
                                                        <label for="nome">Nome completo:</label> <br>
                                                        <input type="text" name="nome" value="<?php echo $linha["nome"] ?>">
                                                        <br>
                                                        <label for="nascimento">Data de nascimento:</label> <br>
                                                        <input type="text" id="dataNascimento" name="dataNascimento"
                                                            placeholder="dd/mm/yyyy"
                                                            value="<?php echo $linha["data_de_nascimento"] ?>"> <br>
                                                        <label for="cpf">CPF:</label> <br>
                                                        <input type="text" id="cpf" name="cpf" placeholder="000.000.000-00"
                                                            maxlength="14" value="<?php echo $linha["cpf"] ?>"> <br>
                                                        <label for="rg">RG:</label> <br>
                                                        <input type="text" id="rg" name="rg" placeholder="00.000.000-0"
                                                            maxlength="12" value="<?php echo $linha["rg"] ?>"> <br>
                                                        <label for="genero">Gênero:</label> <br>
                                                        <select id="genero" name="genero">
                                                            <option value="" disabled>Selecione o gênero</option>
                                                            <option value="masculino" <?php if ($linha["genero"] == "masculino")
                                                                echo "selected" ?>>Masculino
                                                                </option>
                                                                <option value="feminino" <?php if ($linha["genero"] == "feminino")
                                                                echo "selected" ?>>Feminino
                                                                </option>
                                                                <option value="outro" <?php if ($linha["genero"] == "outro")
                                                                echo "selected" ?>>Outro</option>
                                                                <option value="nao-informar" <?php if ($linha["genero"] == "nao-informar")
                                                                echo "selected" ?>>
                                                                    Prefiro não informar</option>
                                                            </select>
                                                        </fieldset>

                                                        <fieldset>
                                                            <legend>Dados de endereço:</legend>
                                                            <label for="rua">Endereço:</label> <br>
                                                            <input type="text" name="endereco"
                                                                value="<?php echo $linha["endereco"] ?>"><br>
                                                        <label for="num">N°</label> <br>
                                                        <input type="text" name="numero" style="width: 100px;"
                                                            value="<?php echo $linha["numero"] ?>"> <br>
                                                        <label for="cidade">Cidade:</label> <br>
                                                        <input type="text" name="cidade"
                                                            value="<?php echo $linha["cidade"] ?>"> <br>
                                                        <label for="estado">Estado:</label> <br>
                                                        <input type="text" name="estado"
                                                            value="<?php echo $linha["estado"] ?>"> <br>
                                                        <label for="cep">CEP:</label> <br>
                                                        <input type="text" name="cep" value="<?php echo $linha["cep"] ?>">
                                                    </fieldset>

                                                    <fieldset>
                                                        <legend>Dados para contato:</legend>
                                                        <label for="email">E-mail:</label> <br>
                                                        <input type="email" name="email" placeholder="exemplo@exemplo.com"
                                                            value="<?php echo $linha["email"] ?>">
                                                        <br>
                                                        <label for="tel">Telefone:</label> <br>
                                                        <input type="tel" name="telefone" placeholder="(11) 99999-9999"
                                                            value="<?php echo $linha["telefone"] ?>">
                                                    </fieldset>
                                                    <button type="submit">Alterar</button>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Voltar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- BOTÃO DO MODAL -->
                                <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">
                                    <i class="bi bi-trash"></i>
                                </button>


                                <!-- MODAL -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Deletar dançarino</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Tem certeza que deseja deletar ?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Voltar</button>
                                                <a
                                                    href="../scripts/deletar_dancarino_shakese.php?id=<?php echo $linha['id'] ?>">
                                                    <button type="button" class="btn btn-danger">Sim, tenho certeza</button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!--FINAL MODAL-->
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </div>

    <script src="../js/script_menuHamburguer.js"></script>
    <script src="../js/script_pesquisarNome.js"></script>

</body>

</html>