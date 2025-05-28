<?php
include('conectadb.php');


$sql = "SELECT * FROM usuarios";
$enviaquery = mysqli_query($link, $sql);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LISTA</title>
</head>
<body>
    <table class="lista">
        <tr>
            <th>ID</th>
            <th>LOGIN</th>
            <th>ALTERAR</th>
            <td><a href="alterar.php"<?php=id><button></a></td>
        </tr>      
        
<?php
while ($tbl = mysqli_fetch_array($enviaquery)) {
?>
    <tr>
        <td><?= $tbl[0]?></td>
        <td><?= $tbl[1]?></td>
    </tr>
<?php
}
?> 
    </table>
</body>
</html>