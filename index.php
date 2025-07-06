<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="Images/miniLogo.png" type="png">
    <title>Geekaria</title>
</head>
    
<body>
    <?php
    session_start();
    if(!isset($_SESSION ['login'])){
        unset($_SESSION ['nao_autenticado']);
        unset($_SESSION ['mensagem_header'] ); 
        unset($_SESSION ['mensagem'] ); 
        header('location: loginPage.php');
        exit();                                         
    }
    ?>
    <?php require 'db/DB.php' ?>
    <?php 
    $conn = new mysqli($servername, $username, $password, $database);

            if ($conn->connect_error) {
                die("<strong> Falha de conexão: </strong>" . $conn->connect_error);
            }
       ?>
    <?php require 'geral/cabecalho.php'; ?>
    <main>
        <div class="carousel-container">
        <button class="arrow left" onclick="scrollCarousel(-1)">&#10094;</button>
        
        <div class="carousel">
            <?php 
                $sql = "SELECT id, descricao, imagem FROM produtos ORDER BY id";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<div class="card">'; 
                        if ($row['imagem']) { ?>
                            <img src="data:image/png;base64,<?= base64_encode($row["imagem"]) ?>" >
                        <?php
                        } else {
                            ?>  
                                <div class="img-null">
                                    <p>Sem imagem</p>
                                </div>
                            <?php
                        }
                        echo "<p class='description'>" . $row["descricao"] . "</p>";
                        echo '<a href="#">Adicionar ao carrinho</a>';
                        echo '</div>';
                    }
                }
            ?>

        <button class="arrow right" onclick="scrollCarousel(1)">&#10095;</button>
    </div>
    </main>
    <?php require 'geral/rodape.php'; ?>

    <script src="JS/script.js"></script>
</body>

</html>