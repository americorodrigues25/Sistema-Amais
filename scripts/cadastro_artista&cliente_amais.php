<?php
include_once "../factory/conexao.php";
session_start();

$tipo_usuario = $_POST["tipo_usuario"];
$nome = $_POST["nome"];
$data_de_nascimento = $_POST["dataNascimento"];
$cpf = $_POST["cpf"];
$rg = $_POST["rg"];
$genero = $_POST["genero"];
$endereco = $_POST["endereco"];
$numero = $_POST["numero"];
$cidade = $_POST["cidade"];
$estado = $_POST["estado"];
$cep = $_POST["cep"];
$email = $_POST["email"];
$telefone = $_POST["telefone"];

if ($tipo_usuario == NULL) {
    $_SESSION['statusruim'] = "Especifique o tipo de cadastro!";
    header("location:../views/fundacao_amais.php");
    exit();
}

if ($tipo_usuario == "cliente") {
    $rg_igual = mysqli_query($conn, "SELECT * FROM cliente WHERE rg = '$rg'");
    $rg_igual_linha = mysqli_fetch_array($rg_igual);

    if ($rg_igual_linha["rg"]) {
        $_SESSION["statusruim"] = "Este cliente já está cadastrado";
        header("location:../views/cadastrar_artista&cliente_amais.php");
        exit();
    } else {
        $sql = "INSERT INTO cliente(nome, data_de_nascimento, cpf, rg, genero, endereco, numero, cidade, estado, cep, email, telefone)
                VALUES('$nome', '$data_de_nascimento', '$cpf', '$rg', '$genero', '$endereco', '$numero', '$cidade', '$estado', '$cep', '$email', '$telefone')";
        $query = mysqli_query($conn, $sql);
        $_SESSION['statusbom'] = "Cadastro realizado com sucesso!";
        header("location:../views/cadastrar_artista&cliente_amais.php");
        exit();
    }
} elseif ($tipo_usuario == "artista") {
    $rg_igual2 = mysqli_query($conn, "SELECT * FROM artista WHERE rg = '$rg'");
    $rg_igual_linha2 = mysqli_fetch_array($rg_igual2);

    if ($rg_igual_linha2["rg"]) {
        $_SESSION["statusruim"] = "Este artista já está cadastrado";
        header("location:../views/cadastrar_artista&cliente_amais.php");
        exit();
    } else {
        $sql = "INSERT INTO artista(nome, data_de_nascimento, cpf, rg, genero, endereco, numero, cidade, estado, cep, email, telefone)
                VALUES('$nome', '$data_de_nascimento', '$cpf', '$rg', '$genero', '$endereco', '$numero', '$cidade', '$estado', '$cep', '$email', '$telefone')";
        $query = mysqli_query($conn, $sql);
        $_SESSION['statusbom'] = "Cadastro realizado com sucesso!";
        header("location:../views/cadastrar_artista&cliente_amais.php");
        exit();
    }
}
?>
