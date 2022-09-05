<?php
// incluindo arquivo de conexão
include 'backend/conexao.php';

try {

    // monta a query sql
    $sql = "SELECT * FROM tb_produtos";

    // prepara a execução da query sql acima
    $comando = $con->prepare($sql);

    // executa o comando com a query no banco de dados
    $comando->execute();

    // cria a var que irá armazenar os dados, e setando o fetch em modo associativo(chave/valor)
    $dados = $comando->fetchAll(PDO::FETCH_ASSOC);

    // sempre fechar o pre
    // echo"<pre>";
    // var_dump($dados); 
    // echo"</pre>";

} catch (PDOException $erro) {
    echo $erro->getMessage();
}

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Lista de produtos</title>
</head>

<body>

    <hr>
    <button><a href="admin/index.php">Sair</a></button>
    <hr>

    <div id="container">
        <h3 class="">Lista de Produtos</h3>
        <div id="grid-produtos">

            <?php
            foreach ($dados as $d) :
            ?>
                <figure class="figure-produtos">
                    <img class="img-produtos" src="img/upload/<?php echo $d['imagem']?>" alt="imagem do produto">
                    
                    <figcaption class="figcaption-produtos">
                        <h4><?php echo $d['produto']; ?></h4>
                        <h5><?php echo $d['marca']; ?></h5>
                        <h5><?php echo $d['categoria']; ?></h5>
                        <h5><?php echo $d['validade']; ?></h5>
                        <h5>R$<?php echo $d['valor']; ?></h5>
                        <button class="btn-comprar">Comprar</button>
                    </figcaption>
                </figure>

            <?php
            endforeach;
            $con = null;
            ?>


        </div>
    </div>

</body>

</html>