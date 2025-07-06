<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../style.css">
    <link rel="shortcut icon" href="../Images/miniLogo.png" type="png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
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
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $optionsEspec[] = $row;
        }
    } else {
        echo "Erro executando SELECT: " . $conn->connect_error;
    }

    $id    = $_GET['id'];
    $sql = "SELECT id, nome_produto, valor, descricao, imagem, id_categoria FROM produtos WHERE id = $id";
    if ($result = $conn->query($sql)) {   // Consulta ao BD ok
        if ($result->num_rows == 1) {     // Retorna 1 registro que será atualizado  
            $row = $result->fetch_assoc();
            $id_produto     = $row['id'];
            $nome_produto   = $row['nome_produto'];
            $valor          = $row['valor'];
            $descricao      = $row['descricao'];
            $categoria      = $row['id_categoria'];
            $imagem         = $row['imagem'];
        } else {
        echo "Erro na quantidade de registros " . $conn->connect_error;
        }
    } else {
        echo "Erro executando SELECT: " . $conn->connect_error;
    }
    ?>
    <div class="form-container">
        <h1 style="text-transform: uppercase;">Dados do produto que será alterado</h1>
        <form action="Update_command_exe.php" method="post" enctype="multipart/form-data">
            <input type="hidden" id="Id" name="Id" value="<?php echo $id_produto; ?>">
            <table class='update-table'>
                <tr>
                    <td>
                        <div class="input-update-container">
                            <label for="Nome" class="name"><b>Nome*:</b></label>
                            <input name="Nome" id="Nome" type="text" spellcheck="false" pattern="[a-zA-Z\u00C0-\u00FF ]{5,100}$" title="Nome do Produto" value="<?php echo $nome_produto ?>" required>

                            <label for="Valor"><b>Valor*:</b></label>
                            <input name="Valor" id="Valor" type="number" step="0.01" placeholder="0.00" title="Preço" pattern="^\d+(\.\d{1,2})?$" value="<?php echo $valor ?>" required>

                            <label for="Descricao"><b>Descrição:</b></label>
                            <input name="Descricao" id="Descricao" type="text" spellcheck="false" placeholder="descrição" title="descrição" value="<?php echo $descricao ?>"</p>
                            
                            <label for="Categoria"><b>Categoria*:</b></label>
                            <select name="Categoria" id="Categoria" required>
                                <option value=""></option>
                                <?php
                                foreach ($optionsEspec as $opt) {
                                    $selected = ($opt['id_categoria'] == $categoria) ? 'selected' : '';
                                    echo "<option value=\"{$opt['id_categoria']}\" $selected>{$opt['nome_categoria']}</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </td>
                    <td>
                        <label for="imagemSelecionada"><b>Imagem do Produto: </b></label>
                        <?php if ($row['imagem']) { ?>
                            <p style="text-align:center"><img id="imagemSelecionada" src="data:image/png;base64,<?= base64_encode($row['imagem']) ?>" /></p>
                        <?php } else { ?>
                            <p style="text-align:center"><img id="imagemSelecionada" src="imagens/padrao.jpg" /></p>
                            <?php } ?>
                        <label for="Imagem">Escolha uma imagem</label><br>
                        <input type="hidden" name="MAX_FILE_SIZE" value="16777215" />
                        <input type="file" id="Imagem" name="Imagem" value= "Null" accept="imagem/*" onchange="validaImagem(this);"></label>
                    </td>
                </tr>
            </table>
            <div class="button-container">
                <input type="button" value="Cancelar" class="button" onclick="window.location.href='../gerenciarPage.php'">
                <input type="submit" value="Alterar" class="button">
            </div>
        </form>
    </div>
    <?php require '../geral/rodape.php'?>
    <script src="../JS/script.js"></script>
</body>
</html>