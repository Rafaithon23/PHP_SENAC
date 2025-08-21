<?php
session_start();
include("../utils/conectadb.php");
include("../utils/validacliente.php");

$idcliente = $_SESSION['idcliente'];

$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$senha = $_POST['senha'];

if(!empty($senha)){
    $senha = password_hash($senha, PASSWORD_DEFAULT);
    $sql = "UPDATE clientes SET CLI_NOME='$nome', CLI_EMAIL='$email', CLI_TELEFONE='$telefone', CLI_SENHA='$senha' WHERE CLI_ID=$idcliente";
} else {
    $sql = "UPDATE clientes SET CLI_NOME='$nome', CLI_EMAIL='$email', CLI_TELEFONE='$telefone' WHERE CLI_ID=$idcliente";
}

if(mysqli_query($link, $sql)){
    header("Location: perfil.php?msg=sucesso");
} else {
    echo "Erro ao atualizar perfil: " . mysqli_error($link);
}
?>
