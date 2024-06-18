<?php
ini_set('display_errors', 0);
error_reporting(E_ERROR | E_WARNING | E_PARSE);
?>
<?php
include_once "../factory/conexao.php";

session_start();

$email = $_POST['email'];
$senha = $_POST['password'];
$fundacao = $_POST['fundacao'];

//verificar se possui conta com esse mail
$query1 = "select * from administrador where email = '$email' and fundacao='$fundacao' ";
$a = mysqli_query($conn, $query1);
$emailexiste = mysqli_fetch_array($a);

if ($emailexiste['email'] != $email) {
    $_SESSION['statusruim'] = "Não foi possivel localizar uma conta com este email !";
    header("location:../index.php");
} else {
    //verificar se a senha está correta
    if ($emailexiste['senha'] != $senha) {
        $_SESSION['statusruim'] = "Senha invalida";
        header("location:../index.php");
    } else {
        $_SESSION['id'] = $emailexiste['id'];
        $_SESSION["fundacao"] = $emailexiste['fundacao'];

        if ($emailexiste['fundacao'] == "amais") {
            header("location:../views/fundacao_amais.php");
        } else {
            header("location:../views/fundacao_shakese.php");
        }
    }
}
