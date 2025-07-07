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
    // Obtém as Especialidades Médicas na Base de Dados para um combo box
    $sqlG = "SELECT id_categoria, nome_categoria FROM categoria";
    $result = $conn->query($sqlG);
    $optionsEspec = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            array_push($optionsEspec, "\t\t\t<option value='" . $row["id_categoria"] . "'>" . $row["nome_categoria"] . "</option>\n");
        }
    } else {
        echo "Erro executando SELECT: " . $conn->connect_error;
    }
    $conn->close();
    ?>
    <div class="form-container">
        <h1 style="text-transform: uppercase;">Informe os dados do novo do produto</h1>
        <form action="Include_command_exe.php" method="post" enctype="multipart/form-data">
            <table class='add-table'>
                <tr>
                    <td>
                        <div class="input-update-container">
                            <label for="Nome" class="name"><b>Nome*:</b></label>
                            <input name="Nome" id="Nome" type="text" placeholder="Nome do produto" pattern="[a-zA-Z0-9\u00C0-\u00FF .\-]{5,100}$" title="Nome do Produto" required>
                    
                            <label for="Valor"><b>Valor*:</b></label>
                            <input name="Valor" id="Valor" type="number" step="0.01" placeholder="0.00" title="Preço" pattern="^\d+(\.\d{1,2})?$" required>
                        
                            <label for="Descricao"><b>Descrição:</b></label>
                            <input name="Descricao" id="Descricao" type="text" placeholder="Descrição" title="descrição">
                        
                            <label for="Categoria"><b>Categoria*:</b></label>
                            <select name="Categoria" id="Categoria" required>
                                <option value=""></option>
                                <?php
                                foreach ($optionsEspec as $key => $value) {
                                    echo $value;
                                }
                                ?>
                            </select>
                        </div>
                    </td>
                    <td>
                        <label for="imagemSelecionada"><b>Imagem do Produto:</b></label>
                        <p style="text-align:center"></p><img id="imagemSelecionada" src="imagens/padrao.jpg"><br>
                        <label for="Imagem">Escolha uma imagem</label><br>
                        <input type="hidden" name="MAX_FILE_SIZE" value="16777215" />
                        <input type="file" id="Imagem" name="Imagem" accept="imagem/*" onchange="validaImagem(this);"></label><br>
                    </td>
                </tr>
            </table>

            <div class="button-container">
                <input type="button" value="Cancelar" class="button" onclick="window.location.href='../gerenciarPage.php'">
                <input type="submit" value="Salvar" class="button">
            </div>
        </form>
        <br>
    </div>
    <?php require '../geral/rodape.php'?>
    <script src="../JS/script.js" ></script>
</body>
</html>
