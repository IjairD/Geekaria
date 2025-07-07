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
        if (isset($_GET['status'])) {
        $mensagem = "";

        switch ($_GET['status']) {
            case 'sucesso':
                $mensagem = "Produto excluído com sucesso!";
                break;
            case 'erro_delete':
                $mensagem = "Erro ao excluir o produto.";
                break;
            case 'erro_conexao':
                $mensagem = "Erro de conexão com o banco de dados.";
                break;
            case 'incluido':
                $mensagem = "Produto adicionado com sucesso!";
                break;
            case 'erro_inclusao':
                $mensagem = "Erro ao adicionar o produto.";
                break;
            case 'atualizado':
                $mensagem = "Produto atualizado com sucesso!";
                break;
            case 'erro_atualizacao':
                $mensagem = "Erro ao atualizar o produto.";
                break;    
        }

        if ($mensagem !== "") {
            echo "<script>alert('$mensagem');</script>";
        }
        }
    ?>

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