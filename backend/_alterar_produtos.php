<?php


// include da conexão
include "conexao.php";

try{
    // var_dump($_POST);
    // exit;
    // var recebidas via $post
    $id     = $_POST['id'];
    $produto = $_POST['produto'];
    $marca  = $_POST['marca'];
    $categoria  = $_POST['categoria'];
    $validade   = $_POST['validade'];
    $valor = $_POST['valor'];
    
    $nome_original_imagem = $_FILES['imagem']['name'];
    
  if ($nome_original_imagem = $_FILES['imagem']['name']){

   
    // ----------------------------------------------------------
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


    move_uploaded_file($_FILES['imagem']['tmp_name'],$pasta.$nome_final_imagem);

    // ----------------------------------------------------------------------

    $sql = "UPDATE  tb_produtos 
    SET 
    `produto`  = '$produto',
    `marca` = '$marca',
    `categoria` = '$categoria',
    `validade`  = '$validade',
    `valor` = '$valor',
    `imagem` = '$nome_final_imagem'
    WHERE 
        id = $id;
    ";


  }else{
    $sql = "UPDATE  tb_produtos 
    SET 
    `produto`  = '$produto',
    `marca` = '$marca',
    `categoria` = '$categoria',
    `validade`  = '$validade',
    `valor` = '$valor'
    
    WHERE 
        id = $id;
    ";


  }

     $comando = $con->prepare($sql);

     $comando -> execute();
 
     header('Location: ../admin/alterar_produtos.php?id='.$id);
    


}catch(PDOException $erro){
    echo $erro->getMessage();

}

?>