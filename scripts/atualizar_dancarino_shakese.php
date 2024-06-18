<?php
ini_set('display_errors', 0);
error_reporting(E_ERROR | E_WARNING | E_PARSE);
?>
<?php
include_once "../factory/conexao.php";

session_start();

$id = $_POST['id'];
$nome = $_POST['nome'];
$datanascimento = $_POST['dataNascimento'];
$cpf = $_POST['cpf'];
$rg = $_POST['rg'];
$genero = $_POST['genero'];
$endereco = $_POST['endereco'];
$numero = $_POST['numero'];
$cidade = $_POST['cidade'];
$estado = $_POST['estado'];
$cep = $_POST['cep'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];

$query = "update dancarino set nome='$nome',data_de_nascimento='$datanascimento',cpf='$cpf',rg='$rg',genero='$genero',endereco='$endereco'
,numero='$numero',cidade='$cidade',estado='$estado',cep='$cep',email='$email',telefone='$telefone' where id='$id'";

$executar = mysqli_query($conn, $query);

if ($executar) {
    $_SESSION['status'] = "dancarino/professor atualizado com sucesso!";
    header("location:../views/consultar_dancarino_shakese.php");
}

