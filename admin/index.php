<?php
// inicia a sessão 
session_start();

// o isset verifica se a variavel de sessão existe 
if(isset($_SESSION['usuario'])){
    header('location: gerenciar_produtos.php');
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/login.css">
    <title>tela login</title>
</head>

<body>
    <form action="../backend/_validar_login.php" method="post">
    <div class="form_login">
        <h1>Login</h1>
        <div>
            <input type="text" name="usuario" placeholder="email">
            <br>
            <br>
            <input type="password" name="senha" id="senha" placeholder="senha">
            <br>
            <br>
            
            <input class="btn-login" type="submit" value="Entrar">
        </div>
    </div>
    </form>
</body>

</html>