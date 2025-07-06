<?php require 'DB.php'; ?>
<?php
$nome    = $_POST['Nome'];
$Valor     = $_POST['Valor'];
$Descricao  = $_POST['Descricao'];
$Categoria   = $_POST['Categoria'];

$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
	die("<strong>Falha de conexão: </strong>" . $conn->connect_error);
}

if ($_FILES['Imagem']['size'] == 0) {
	$sql = "INSERT INTO Produtos (nome_produto, valor, descricao, id_categoria, imagem) VALUES ('$nome', '$Valor', '$Descricao', '$Categoria', NULL)";
} else {                              // Recebeu uma imagem binária
	$imagem = addslashes(file_get_contents($_FILES['Imagem']['tmp_name'])); // Prepara para salvar em BD
	$sql = "INSERT INTO Produtos (nome_produto, valor, descricao, id_categoria, imagem) VALUES ('$nome', '$Valor', '$Descricao', '$Categoria', '$imagem')";
}
?>

<h2>Inclusão de Produto novo</h2>

<?php
if ($result = $conn->query($sql)) {
	echo "<p>&nbsp;Inclusão realizada com sucesso! </p>";
} else {
	echo "<p style='text-align:center'>Erro executando INSERT: " . $conn->connect_error . "</p>";
}
echo "</div>";
$conn->close();  //Encerra conexao com o BD

?>
			
<a href="../gerenciarPage.php">Voltar</a>