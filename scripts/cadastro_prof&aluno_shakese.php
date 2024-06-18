<?php
ini_set('display_errors', 0);
error_reporting(E_ERROR | E_WARNING | E_PARSE);
?>
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

if ($tipo_usuario == "aluno") {
    $rg_igual = mysqli_query($conn, "select * from  dancarino where rg = '$rg'");
    $rg_igual_linha = mysqli_fetch_array($rg_igual);

    if ($rg_igual_linha['rg']) {
        $_SESSION['statusruim'] = "Este dançarino já está cadastrado!";
        header("location:../views/cadastrar_prof&aluno_shakese.php");
    } else {
        $sql = "insert into dancarino(nome, data_de_nascimento, cpf, rg, genero, endereco, numero, cidade, estado, cep, email, telefone)
            values('$nome', '$data_de_nascimento', '$cpf', '$rg', '$genero', '$endereco', '$numero', '$cidade', '$estado', '$cep', '$email', '$telefone')";
        $query = mysqli_query($conn, $sql);
        $_SESSION['statusbom'] = "Cadastro realizado com sucesso!";
        header("location:../views/cadastrar_prof&aluno_shakese.php");
    }
} elseif ($tipo_usuario == "professor") {
    $rg_igual2 = mysqli_query($conn, "select * from professor where rg = '$rg'");
    $rg_igual_linha2 = mysqli_fetch_array($rg_igual2);

    if ($rg_igual_linha2["rg"]) {
        $_SESSION['statusruim'] = "Este professor já está cadastrado!";
        header("location:../views/cadastrar_prof&aluno_shakese.php");
    } else {
        $sql = "insert into professor(nome, data_de_nascimento, cpf, rg, genero, endereco, numero, cidade, estado, cep, email, telefone)
            values('$nome', '$data_de_nascimento', '$cpf', '$rg', '$genero', '$endereco', '$numero', '$cidade', '$estado', '$cep', '$email', '$telefone')";
        $query = mysqli_query($conn, $sql);
        $_SESSION['statusbom'] = "Cadastro realizado com sucesso!";
        header("location:../views/cadastrar_prof&aluno_shakese.php");
    }
}

?>