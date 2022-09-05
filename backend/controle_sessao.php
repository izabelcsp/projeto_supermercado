<?php

    // Arquivo que protege as paginas administrativas do site caso o usuario não esteja logado, irá ser redirecionado a tela de login 

    // inicia a sessão
    session_start();

    // cria a variavel $usuario que irá receber o valor da variavel de sessão $_SESSION['usuario']
    $usuario = $_SESSION['usuario'];

    // se o usuario não estiver logado, redirecionado para a tela de login
    if($usuario == null){
        header('location: index.php');
        exit;
    }
?>