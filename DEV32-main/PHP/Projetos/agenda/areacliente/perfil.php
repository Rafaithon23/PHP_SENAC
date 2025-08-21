<?php
include("../utils/conectadb.php");
include("../utils/validacliente.php"); // garante que só entra logado

// PEGAR ID DO CLIENTE DA SESSÃO
$idcliente = $_SESSION['idcliente'];

$sql = "SELECT CLI_NOME, CLI_CPF, CLI_TEL, CLI_DATANASC, CLI_SENHA 
        FROM clientes 
        WHERE CLI_ID = $idcliente";

$resultado = mysqli_query($link, $sql);
$row = mysqli_fetch_assoc($resultado);

// TRATAR UPDATE SE O FORM FOR ENVIADO
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $datanasc = $_POST['datanasc'];
    $senha = $_POST['senha'];

    // Se senha vier preenchida, atualiza com hash
    if (!empty($senha)) {
        $senha = sha1($senha);
        $sqlupdate = "UPDATE clientes 
                      SET CLI_NOME='$nome', CLI_TEL='$telefone', CLI_DATANASC='$datanasc', CLI_SENHA='$senha' 
                      WHERE CLI_ID = $idcliente";
    } else {
        $sqlupdate = "UPDATE clientes 
                      SET CLI_NOME='$nome', CLI_TEL='$telefone', CLI_DATANASC='$datanasc'
                      WHERE CLI_ID = $idcliente";
    }

    mysqli_query($link, $sqlupdate);

    echo "<script>alert('Dados atualizados com sucesso!');</script>";
    echo "<script>window.location.href='perfil.php';</script>";

}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/globalcliente.css">
    <link rel="stylesheet" href="../css/perfil.css">
    <title>MEU PERFIL</title>
</head>
<body>
    <div class="topo">
        <h1>MEU PERFIL</h1>
        <div class="acoes">
            <a href="catalogo.php"><img src="../icons/arrow47.png" width="40"></a>
            <a href="logincliente.php"><img src="../icons/exit.png" width="40"></a>
        </div>
    </div>

    <div class="perfil-container">
        <form method="post" action="perfil.php">
    <label>Nome</label>
<input type="text" name="nome" value="<?php echo $row['CLI_NOME']; ?>">

    <label>CPF (não alterável)</label>
<input type="text" value="<?php echo $row['CLI_CPF']; ?>" readonly>

    <label>Telefone</label>
<input type="text" name="telefone" value="<?php echo $row['CLI_TEL']; ?>">

    <label>Data de Nascimento</label>
<input type="date" name="datanasc" value="<?php echo $row['CLI_DATANASC']; ?>">

    <label>Senha</label>
    <input type="password" name="senha" value="" placeholder="Digite nova senha se quiser alterar">

    <input type="submit" name="salvar" value="Salvar Alterações">
</form>

    </div>
</body>
</html>
