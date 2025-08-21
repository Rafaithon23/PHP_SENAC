<?php
include("../utils/conectadb.php");
// FAZER O INCLUDE DO VALIDACLIENTE
include("../utils/validacliente.php");





$sql = "SELECT * FROM catalogo WHERE CAT_ATIVO = 1";
$enviaquery = mysqli_query($link, $sql);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/globalcliente.css">
    <title>CATÁLOGO SALLONCINA</title>
</head>
<body>
    <div class="global">

        <!-- FAZER O ESQUEMA DE ANÁLISE DE LOGIN -->
        <div class="topo">

            <!-- AQUI VAI TRAZER O NOME DO USUARIO LOGADO -->
            <h1>BEM VINDO <?php echo strtoupper($nomecliente)?> </h1>

        <div class="acoes">
        <a href="perfil.php"><img src="../icons/user2.png" width="40" height="40" alt="Perfil"></a>
        <a href="logincliente.php"><img src="../icons/exit.png" width="40" height="40" alt="Sair"></a>
    </div>
</div>

        <!-- CONTAINER DOS CARDS -->
        <div class='menus'>
            <?php while($retorno = mysqli_fetch_array($enviaquery)) { ?>
                <div class="menu2">
    <img src="data:image/jpeg;base64,<?= $retorno[6] ?>" alt="Imagem do serviço">
    <h1><?= $retorno[1] ?></h1>
    <p><?= $retorno[2] ?></p>
    <p><?= $retorno[4] <= 59 ? $retorno[4] . " Minutos" : ($retorno[4] / 60) . " Horas" ?></p>
    <h3>R$ <?= $retorno[3] ?></h3>
    <a href="verservico.php?id=<?= $retorno[0] ?>">
    <button>
        <img src="../icons/zoom3.png" alt="Ver">
    </button>
</a>
</div>
            <?php } ?>
        </div>

    </div>

        <script src='../scripts/sound.js'></script>

</body>
</html>
