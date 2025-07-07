<?php
require 'DB.php';

$nome      = $_POST['Nome'];
$valor     = $_POST['Valor'];
$descricao = $_POST['Descricao'];
$categoria = $_POST['Categoria'];

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    header("Location: ../gerenciarPage.php?status=erro_conexao");
    exit();
}

if ($_FILES['Imagem']['size'] == 0) {
    $sql = "INSERT INTO Produtos (nome_produto, valor, descricao, id_categoria, imagem) 
            VALUES ('$nome', '$valor', '$descricao', '$categoria', NULL)";
} else {
    $imagem = addslashes(file_get_contents($_FILES['Imagem']['tmp_name']));
    $sql = "INSERT INTO Produtos (nome_produto, valor, descricao, id_categoria, imagem) 
            VALUES ('$nome', '$valor', '$descricao', '$categoria', '$imagem')";
}

if ($conn->query($sql) === TRUE) {
    header("Location: ../gerenciarPage.php?status=incluido");
} else {
    header("Location: ../gerenciarPage.php?status=erro_inclusao");
}

$conn->close();
exit();
?>
