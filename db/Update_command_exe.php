<?php require 'DB.php'; ?>
<?php
$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("<strong>Falha de conexão: </strong>" . $conn->connect_error);
}

$id_produto     = $_POST['Id'];
$nome_produto   = $_POST['Nome'];
$valor          = $_POST['Valor'];
$descricao      = $_POST['Descricao'];
$categoria      = $_POST['Categoria'];

if ($_FILES['Imagem']['size'] == 0) { // Não recebeu uma imagem binária
    $sql = "UPDATE produtos SET nome_produto = '$nome_produto', valor = '$valor', descricao = '$descricao', id_categoria = '$categoria'
        WHERE id = $id_produto";
} else { // Prepara imagem para ser salva em BD
    $imagem = addslashes(file_get_contents($_FILES['Imagem']['tmp_name']));  
    $sql = "UPDATE produtos SET nome_produto = '$nome_produto', valor = '$valor', descricao = '$descricao', imagem = '$imagem', id_categoria = '$categoria'
        WHERE id = $id_produto";   
}
if ($result = $conn->query($sql)) {
    echo " Registro alterado com sucesso! ";
    echo "<a href='../gerenciarPage.php'>Voltar</a>";
} else {
    echo "Erro executando UPDATE: " . 
        $conn->connect_error . "";
        echo "<a href='../gerenciarPage.php'>Voltar</a>";
}
?>