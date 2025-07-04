<body>

    <?php require 'bd/DB.php'; ?>
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
    <div class="">
        <div class="">
            <h2>Informe os dados do novo do Médico</h2>
        </div>
        <form class="" action="Include_command_exe.php" method="post" enctype="multipart/form-data">
            <table class=''>
                <tr>
                    <td style="width:50%;">
                        <p>
                            <label class=""><b>Nome</b>*</label>
                            <input class="" name="Nome" type="text" pattern="[a-zA-Z\u00C0-\u00FF ]{5,100}$" title="Nome do Produto" required>
                        </p>
                        <p>
                            <label class=""><b>Valor</b>*</label>
                            <input class="" name="Valor" id="Valor" type="number" step="0.01" placeholder="0.00" title="Preço" pattern="^\d+(\.\d{1,2})?$" required>
                        </p>
                        <p>
                            <label class=""><b>Descrição</b></label>
                            <input class="" name="Descricao" type="text" placeholder="descrição" title="descrição" </p>
                        <p>
                        <p><label class=""><b>Categoria</b>*</label>
                            <select name="Categoria" id="Categoria" class="" required>
                                <option value=""></option>
                                <?php
                                foreach ($optionsEspec as $key => $value) {
                                    echo $value;
                                }
                                ?>
                            </select>
                        </p>
                    </td>
                    <td>
                        <p style="text-align:center"><label class="w3-text-IE"><b>Imagem do Produto: </b></label></p>
                        <p style="text-align:center"><img id="imagemSelecionada" src="imagens/padrao.jpg" /></p>
                        <p style="text-align:center"><label class="w3-btn w3-theme">Escolha uma imagem
                                <input type="hidden" name="MAX_FILE_SIZE" value="16777215" />
                                <input type="file" id="Imagem" name="Imagem" accept="imagem/*" onchange="validaImagem(this);"></label>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align:center">
                        <p>
                            <input type="submit" value="Salvar" class="">
                            <input type="button" value="Cancelar" class="" onclick="window.location.href='index.php'">
                        </p>
                    </td>
                </tr>
            </table>
        </form>
        <br>
    </div>
</body>