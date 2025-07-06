<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="Images/miniLogo.png" type="png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <title>Gerenciar itens</title>
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
    <?php require 'geral/cabecalho.php'?>

    <div class="gerenciarPage-main-container">
        <h1>Tabela de produtos da loja</h1>
        <div class="table-scroll">
            <?php require 'db/Select_command.php' ?>
        </div>
        <div class="add-container">
            <a href='db/Include_command.php' class='addProducts-button button'>Adicionar produto</a>
        </div>
    </div>

    <?php require 'geral/rodape.php'?>
</body>
</html>