<?php require 'DB.php'; ?>

<?php
$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    header("Location: ../gerenciarPage.php?status=erro_conexao");
    exit();
}

$id_produto     = $_POST['Id'];
$nome_produto   = $_POST['Nome'];
$valor          = $_POST['Valor'];
$descricao      = $_POST['Descricao'];
$categoria      = $_POST['Categoria'];

if ($_FILES['Imagem']['size'] == 0) {
    $sql = "UPDATE produtos 
            SET nome_produto = '$nome_produto', valor = '$valor', descricao = '$descricao', id_categoria = '$categoria'
            WHERE id = $id_produto";
} else {
    $imagem = addslashes(file_get_contents($_FILES['Imagem']['tmp_name']));
    $sql = "UPDATE produtos 
            SET nome_produto = '$nome_produto', valor = '$valor', descricao = '$descricao', imagem = '$imagem', id_categoria = '$categoria'
            WHERE id = $id_produto";
}

if ($conn->query($sql) === TRUE) {
    header("Location: ../gerenciarPage.php?status=atualizado");
} else {
    header("Location: ../gerenciarPage.php?status=erro_atualizacao");
}

$conn->close();
exit();
?>
