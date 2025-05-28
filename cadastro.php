<?php 
include('conectadb.php');



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['login'];
    $senha = $_POST['senha'];
    $sql = "SELECT COUNT(usu_id) FROM usuarios
    WHERE usu_login = '$nome'";

    $enviaquery = mysqli_query($link, $sql);
    $retorno = mysqli_fetch_array($enviaquery) [0];

    if($retorno == 0){

        $sql = "INSERT INTO usuarios (usu_login, usu_senha) VALUES ('$nome', '$senha')";


        $enviaquery = mysqli_query($link, $sql);

        echo "<script>alert('Usuario cadastro ');</script>";
        echo "<script>window.location.href='login.php';</script>";
    }
    else {
        echo "<script>alert('Usuário já cadastrado');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <title>LOGIN</title>
</head>
<body>
    <div class="global">
        <div class="formulario">
            <form id="cadastro" action="cadastro.php" method="post">
                <label>LOGIN</label>
                <br>
                <input type="text" name="login" placeholder="Digite seu login" required>
                <br>
                <label>SENHA</label>
                <br>
                <input type="password" name="senha" placeholder="Digite sua senha" required>
                <br>
                <input type="submit" value="Cadastrar">

            </form>
        <a href="login.php">JÁ TEM CONTA? CLIQUE AQUI</a>


        </div>
    </div>
</body>
</html>