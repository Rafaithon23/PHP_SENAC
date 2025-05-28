<?php
session_start();    

if (isset($_SESSION['login'])){
    $login = $_SESSION['login'];
}
else {
    echo "<script>alert('Você não está logado!');</script>";
    echo "<script>window.location.href='login.php';</script>";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME PAGE</title>
</head>
<body>
    <h1>BEM VINDO <?php echo $_SESSION['login']?></h1>
    <h2>Você está logado!</h2>
   

    <form action="logout.php">
    <input type="submit" value="Sair">
    </form>
</body>
</html>