<?php 

// include do controle de sessão 
include'../backend/controle_sessao.php';

// include da coneção
include'../backend/conexao.php';

// capitura a variavel global id recebida via GET
$id = $_GET['id'];

try{
    // comando SQL que irá selecionar os produtos por id 
    $sql = "SELECT * FROM tb_produtos WHERE id = $id";

    $comando = $con->prepare($sql);

    $comando -> execute();

    $dados = $comando->fetchAll(PDO::FETCH_ASSOC);




}catch(PDOException $erro){
    echo $erro->getMessage();

}


?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Alterar Produtos</title>
</head>

<body>
    <div id="container">
        <h3>Alterar produtos</h3>
        <form action="../backend/_alterar_viagens.php" method="post" enctype="multipart/form-data">

            <div id="grid_alterar">
                <div>
                    <label for="">ID</label>
                    <input type="text" name="id" id="id" value="<?php echo $dados[0]['id'];?>" readonly>
                </div>
                <div>
                    <label for="">Produto</label>
                    <input type="text" name="produto" id="produto" value="<?php echo $dados[0]['produto'];?>">
                </div>
                <div>
                    <label for="local">Marca</label>
                    <input type="text" name="marca" id="marca" value="<?php echo $dados[0]['marca'];?>">
                </div>
                <div>
                    <label for="valor">Categoria</label>
                    <input type="text" name="categoria" id="categoria" value="<?php echo $dados[0]['categoria'];?>">
                </div>
                <div>
                    <label for="valor">Validade</label>
                    <input type="text" name="validade" id="validade" value="<?php echo $dados[0]['validade'];?>">
                </div>
                <div>
                    <label for="valor">Valor</label>
                    <input type="text" name="valor" id="valor" value="<?php echo $dados[0]['valor'];?>">
                </div>
                <div>
                    <label for="imagem">Alterar Imagem</label>
                    <input type="file" name="imagem" id="imagem" Value="">
                </div>
                <img class="img_alterar" src="../img/upload/<?php echo $dados[0]['imagem']; ?>" alt="">
                
                <input type="submit" value="Salvar">
            </div>

        </form>

    </div>
</body>

</html>