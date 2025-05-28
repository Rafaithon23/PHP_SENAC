<?php 
include('conectadb.php');

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['login'];
    $senha = $_POST['senha'];
    $sql = "SELECT COUNT(usu_id) FROM usuarios
    WHERE usu_login = '$nome' AND usu_senha = '$senha'";

    $enviaquery = mysqli_query($link, $sql);
    $retorno = mysqli_fetch_array($enviaquery) [0];

    if($retorno == 1){
        $_SESSION['login'] = $nome;

       header("Location: home.php");

    }
    else {
        echo "<script>alert('Login ou senha incorretos!');</script>";
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
            <form id="login" action="login.php" method="post">
                <label>LOGIN</label>
                <br>
                <input type="text" name="login" placeholder="Digite seu login" required>
                <br>
                <label>SENHA</label>
                <br>
                <input type="password" name="senha" placeholder="Digite sua senha" required>
                <br>
                <input type="submit" value="Entrar">

            </form>
        <a href="cadastro.php">NÃO TEM CONTA? CLIQUE AQUI</a>


        </div>
    </div>
</body>
</html>