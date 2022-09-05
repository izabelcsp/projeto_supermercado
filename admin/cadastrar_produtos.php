<?php 
// include do controle de sessão 
include'../backend/controle_sessao.php';

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Cadastro supermercado</title>
</head>

<body>
    <div id="container">
        <h2>Cadastro de produtos</h2>

        <hr>
        <button><a href="../listar_produtos.php">Listar produtos</a></button>
        <button><a href="gerenciar_produtos.php">Gerenciar</a></button>
        <button><a href="../backend/logout.php">Sair</a></button>
        <hr>

        <form class="form-header" action="../backend/_cadastrar_produtos.php" method="post" enctype="multipart/form-data">
            <fieldset class="caixa">
                <div>
                    <label for="produto">Produto</label>
                    <input type="text" name="produto" id="produto" required>
                </div>

                <div>
                    <label for="marca">Marca</label>
                    <input type="text" name="marca" id="marca" required>
                </div>

                <div>
                    <label for="categoria">Categoria</label>
                    <input type="text" name="categoria" id="categoria" required>
                </div>

                <div>
                    <label for="validade">Validade</label>
                    <input type="date" name="validade" id="validade" required>
                </div>

                <div>
                    <label for="valor">Valor</label>
                    <input type="text" name="valor" id="valor" required>
                </div>
                <div>
                    <label for="imagem">Imagem</label>
                    <input type="file" name="imagem" id="imagem">
                </div>

                <input type="submit" value="Cadastrar">
            </fieldset>

        </form>
    </div>
</body>

</html>