<?php

// conexão 
include 'conexao.php';

try{

    $produto = $_POST['produto'];
    $marca = $_POST['marca'];
    $categoria = $_POST['categoria'];
    $validade = $_POST['validade'];
    $valor = $_POST['valor'];

    // /////////////////////////////////////////////

    // inicio do opload!!!!
    // upload da imagem
    // armasena o nome original da imagem
    $nome_original_imagem = $_FILES['imagem']['name'];

    // descobrir a extenxão da imagem 
    // formatos válidos: JPG/JPEG/PNG
    $extensao = pathinfo($nome_original_imagem,PATHINFO_EXTENSION);

    // verificação de extensão da imagem, se for diferente dos formatos válido, irá retornar erro ao usuário
    if($extensao != 'jpg' && $extensao != 'jpeg' && $extensao != 'png'){
        echo 'formato de imagem inválido';
        exit;
    }

    // Gera um nome aleatorio para imagem(hash)
    // a função uniqid gera um hash aleatorio baseado nontempo em microsegundos, mas ela não é confiavel 
    // utilizamos o nome temporario da imagem gerado pelo php mais o uniqd para incrementar o codigo gerado
    // utilizamos o md5 para gerar outro hash baseado no uniqid(nome temp + uniqid)
    $hash = md5(uniqid($_FILES['imagem']['tmp_name'],true));

    // juntamos o hash mais a extensão para ter o nome final da imagem.
    $nome_final_imagem = $hash.'.'.$extensao;


    // onde será colocada a img
    $pasta = '../img/upload/';

    // // define o novo nome da imagem para upload
    // $nome_img = 'img.jpg';

    move_uploaded_file($_FILES['imagem']['tmp_name'],$pasta.$nome_final_imagem);
    // final do upload

    // variavel que recebe a query SQL que será executada na BD
    $sql = " INSERT INTO  tb_produtos (produto,marca,categoria,validade,`valor`,`imagem`) VALUES ('$produto','$marca','$categoria','$validade','$valor','$nome_final_imagem')";

    // prepara a execução da query SQL acima
    $comando = $con->prepare($sql);

    // executa o comando com a query no banco de dados
    $comando->execute();

    // 
    echo "cadastrado com sucesso!";

    // fechar e conexão 
    $con = null; 

}catch (PDOException $erro){
    echo $erro->getMessage();

}
?>