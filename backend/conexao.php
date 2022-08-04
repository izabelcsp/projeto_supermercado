<?php

try{
    // Dados da conexão com o BD
    define('SERVIDOR','localhost');
    define('USUARIO','root');
    define('SENHA','');
    define('BASEDEDADOS','db_supermercado');

    $con = new PDO("mysql:host=".SERVIDOR.";dbname=".BASEDEDADOS, USUARIO, SENHA);

    // defina o modo de erro PDO para exceção
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   



}catch(PDOException $erro){
     echo $erro->getMessage();
}

?>