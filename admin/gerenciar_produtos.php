<?php
    // include do controle de sessão
    include'../backend/controle_sessao.php';

    // include conexão 
    include'../backend/conexao.php';

    try{
        $sql = "SELECT * FROM tb_produtos";

        $comando = $con->prepare($sql);

        $comando->execute();

        $dados = $comando->fetchAll(PDO::FETCH_ASSOC);


    }catch(PDOException $erro){

    };
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Gerenciar produtos</title>
</head>

<body>
    <div id="container">
        <h3>Gerenciar Produtos</h3>

        <hr>
        <button><a href="cadastrar_produtos.php">Cadastrar produtos</a></button>
        <button><a href="../backend/logout.php">Sair</a></button>
        <hr>


        <div id="tabela">
            <table border="1">
                <tr>
                    <th>ID</th>
                    <th>produto</th>
                    <th>marca</th>
                    <th>categoria</th>
                    <th>validade</th>
                    <th>valor</th>
                </tr>

                <?php
                foreach ($dados as $produto) :
                ?>

                    <tr>
                        <td><?php echo $produto['id'] ?></td>
                        <td><?php echo $produto['produto'] ?></td>
                        <td><?php echo $produto['marca'] ?></td>
                        <td><?php echo $produto['categoria'] ?></td>
                        <td><?php echo $produto['validade'] ?></td>
                        <td>R$<?php echo $produto['valor'] ?></td>
                        <td>
                            <a href="alterar_produtos?id=<?php echo $produto['id'] ?>">Alterar</a>
                        </td>
                        <td>
                            <a href="../backend/deletar_produtos.php?id=<?php echo $produto['id'] ?>">Deletar</a>
                        </td>
                    </tr>

                <?php
                endforeach
                ?>

            </table>
        </div>
    </div>

</body>

</html>