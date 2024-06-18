<?php
ini_set('display_errors', 0);
error_reporting(E_ERROR | E_WARNING | E_PARSE);
?>
<?php

session_start();
include_once "../factory/conexao.php";
$id = $_GET['id'];

$query = "delete from dancarino where id = '$id'";
$executar = mysqli_query($conn, $query);

if ($executar) {
    $_SESSION['status'] = "aluno/professor apagado com sucesso!";
    header("location:../views/consultar_dancarino_shakese.php");
}
