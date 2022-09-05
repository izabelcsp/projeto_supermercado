<?php

include 'conexao.php';

try{
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM tb_login WHERE usuario='$usuario' AND BINARY senha='$senha' AND ativo = 1 ";
    // binary, diferencia caracteres

    $comando = $con->prepare($sql);
    $comando->execute();
    $dados = $comando->fetchAll(PDO::FETCH_ASSOC);

    // var_dump($dados);

    // verifica se existem registros dentro da variavel dados

    // if($dados == null) verificar se dados é nulo
    if($dados != null){ 

        // Inicia a sessão 
        session_start();
        // para ver o id da cessão var_dump(session_id());

        // Cria uma variável de sessão e adiciona o usuario digitado 
        $_SESSION['usuario'] = $usuario;

        // exibe o valor adicionado na variavel de sessão usuario
        // var_dump($_SESSION['usuario']);
        // exit;

        // verificar se dados é diferente de nulo
        header('location:../admin/gerenciar_produtos.php');
}else{
    // se o usuario ou senha sao invalidos, irá entrar nesse bloco de código
    echo "Usuário ou senha invalidos";
    // header('location: ../admin/index.html');
}

}catch(PDOException $erro){
    echo $erro->getMessage();

}