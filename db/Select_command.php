<main>
        <?php
            $conn = new mysqli($servername, $username, $password, $database);

            if ($conn->connect_error) {
                die("<strong> Falha de conexão: </strong>" . $conn->connect_error);
            }

            $sql = "SELECT id, nome_produto, valor, descricao, imagem, nome_categoria FROM produtos AS P INNER JOIN categoria AS C ON (P.id_categoria = C.id_categoria) ORDER BY C.id_categoria";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<table class='table-products'>";
                echo "	<tr>";
                echo "	  <th width='7%'>Código</th>";
                echo "	  <th width='14%'>Produto</th>";
                echo "	  <th width='14%'>Valor</th>";
                echo "	  <th width='26%'>Descrição</th>";
                echo "	  <th width='15%'>Imagem</th>";
                echo "	  <th width='10%'>Categoria</th>";
                echo "	  <th width='7%'> </th>";
                echo "	  <th width='7%'> </th>";
                echo "	</tr>";
                // Apresenta cada linha da tabela
                while ($row = $result->fetch_assoc()) {
                    echo '<img src="data:image/png;base64,' . base64_encode($row['imagem']) . '" alt="Imagem Teste" />';
                    echo "<tr>";
                    echo "<td>";
                    echo $row["id"];
                    echo "</td><td>";
                    echo $row["nome_produto"];
                    echo "</td><td>";
                    echo $row["valor"];
                    echo "</td><td>";
                    echo $row["descricao"]; 
                    if ($row['imagem']) { ?>
                        <td>
                            <img src="data:image/png;base64,<?= base64_encode($row["imagem"]) ?>" />
                        </td>
                        <td>
                        <?php
                    } else {
                        ?>
                        <td>
                            <img src="../Images/miniLogo.png" alt="Mini logo" />
                        </td>
                        <td>
                        <?php
                    }
                    echo $row["nome_categoria"];
                    echo "</td>";
                    //Atualizar e Excluir registro de médicos
                        ?>
                        <td>
                            <a href='medAtualizar.php?id=<?php echo $cod; ?>'><i class="bi bi-pencil-square"></i></a>
                        </td>
                        <td>
                            <a href='medExcluir.php?id=<?php echo $cod; ?>'><i class="bi bi-trash-fill"></i></a>
                        </td>
                        </tr>
                <?php
                }
                echo "</table>";
                echo "</div>";
            } else {
                echo "<p style='text-align:center'>Erro executando SELECT: " . $conn->connect_error . "</p>";
            }
            $conn->close();
        ?>
    </main>