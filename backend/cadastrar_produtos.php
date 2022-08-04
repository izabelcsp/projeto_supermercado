<?php

// conexão 
include 'conexao.php';

try{

    $produto = $_POST['produto'];
    $marca = $_POST['marca'];
    $categoria = $_POST['produto'];
    $validade = $_POST['validade'];
    $valor = $_POST['valor'];

    // variavel que recebe a query SQL que será executada na BD
    $sql = " INSERT INTO  tb_produtos (produto,marca,categoria,validade,`valor`) VALUES ('$produto','$marca','$categoria','$validade','$valor')";

    $comando = $con->prepare($sql);

// 
$comando->execute();

// 
echo "cadastrado com sucesso!";



}catch (PDOException $erro){
    echo $erro->getMessage();

}

?>