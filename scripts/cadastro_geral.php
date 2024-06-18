<?php
ini_set('display_errors', 0);
error_reporting(E_ERROR | E_WARNING | E_PARSE);
?>
<?php
include_once "../factory/conexao.php";
session_start();
$nome = $_POST["nome"];
$sobrenome = $_POST["sobrenome"];
$fundacao = $_POST["opcao"];
$email = $_POST["email"];
$senha = $_POST["password"];
$senha2 = $_POST["password2"];

if ($fundacao == NULL) {
    $_SESSION['statusruim'] = "especifique o tipo de cadastro!";
    header("location:../views/cadastro.php");
}

if ($senha != $senha2) {
    $_SESSION['statusruim'] = "A senha de confirmação deve ser a mesma";
    header("location:../views/cadastro.php");
} else {
    $email_igual = mysqli_query($conn, "select * from administrador where email = '$email' and fundacao='$fundacao'");
    $email_igual_linha = mysqli_fetch_array($email_igual);

    if ($email_igual_linha["email"] && $email_igual_linha['fundacao']) {
        $_SESSION['statusruim'] = "Já existe uma conta com esse email na fundação $fundacao";
        header("location:../views/cadastro.php");
    } else {
        $sql = "insert into administrador(nome, sobrenome, fundacao, email, senha)
        values('$nome', '$sobrenome', '$fundacao', '$email', '$senha')";
        $query = mysqli_query($conn, $sql);
        $_SESSION['statusbom'] = "Cadastro realizado com sucesso!";
        header("location:../index.php");
    }
}


?>