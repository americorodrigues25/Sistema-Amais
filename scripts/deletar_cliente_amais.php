<?php
ini_set('display_errors', 0);
error_reporting(E_ERROR | E_WARNING | E_PARSE);
?>
<?php

session_start();
include_once "../factory/conexao.php";
$id = $_GET['id'];

$query = "delete from cliente where id = '$id'";
$executar = mysqli_query($conn, $query);

if ($executar) {
    $_SESSION['status'] = "cliente/artista apagado com sucesso!";
    header("location:../views/consultar_cliente_amais.php");
}
