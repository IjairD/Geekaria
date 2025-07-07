<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../style.css">
    <link rel="shortcut icon" href="../Images/miniLogo.png" type="png">
    <title>Gerenciar itens</title>
</head>
<body>
    <header>
        <div class="nav-title">
            <img src="../Images/logoGeekaria.png" alt="Logo da Geekaria">
        </div>
    </header>
    <?php require 'DB.php'; ?>
    <?php
    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("<strong> Falha de conexão: </strong>" . $conn->connect_error);
    }

    $sqlG = "SELECT id_categoria, nome_categoria FROM categoria";
    $result = $conn->query($sqlG);
    $optionsEspec = array();

    $id    = $_GET['id'];
    $sql = "SELECT id, nome_produto, valor, descricao, imagem, nome_categoria FROM produtos AS P INNER JOIN categoria AS C ON (P.id_categoria = C.id_categoria) WHERE id = $id";
    if ($result = $conn->query($sql)) {   // Consulta ao BD ok
        if ($result->num_rows == 1) {     // Retorna 1 registro que será atualizado  
            $row = $result->fetch_assoc();
            $id_produto     = $row['id'];
            $nome_produto   = $row['nome_produto'];
            $valor          = $row['valor'];
            $descricao      = $row['descricao'];
            $categoria      = $row['nome_categoria'];
            $imagem         = $row['imagem'];
        } else {
        echo "Erro na quantidade de registros " . $conn->connect_error;
        }
    } else {
        echo "Erro executando SELECT: " . $conn->connect_error;
    }
    $conn->close();
    ?>
    <div class="form-container">
        <h1 style="text-transform: uppercase;">Dados do produto que será excluído</h1>
        <form action="Delete_command_exe.php" method="post" class="delete-form">
            <input type="hidden" id="Id" name="Id" value="<?php echo $id_produto; ?>">
            <table class="delete-table">
                <tr>
                    <th>Nome</th>
                    <th>Valor</th>
                    <th>Descrição</th>
                    <th>Categoria</th>
                    <th>Imagem</th>
                </tr>
                <tr>
                    <td><?php echo $nome_produto; ?></td>
                    <td><?php echo $valor; ?></td>
                    <td class="td-description"><?php echo $descricao; ?></td>
                    <td><?php echo $categoria; ?></td>
                    <?php if ($row['imagem']) { ?>
                    <td> <img id="imagemSelecionada" src="data:image/png;base64,<?= base64_encode($row['imagem']) ?>" /> </td>
                    <?php } else { ?>
                    <td> <img id="imagemSelecionada" src="imagens/padrao.jpg" /> </td>
                    <?php } ?>
                </tr>
            </table>
            <div class="button-container">
                <input type="button" value="Cancelar" class="button" onclick="window.location.href='../gerenciarPage.php'">
                <input type="submit" value="Confirmar exclusão" class="button">
            </div>
        </form>
    </div>
    <?php require '../geral/rodape.php'?>
</body>
</html>