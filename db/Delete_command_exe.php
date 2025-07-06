<?php require 'DB.php'; ?>
<?php
$id = $_POST['Id'];
$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
	die("<strong>Falha de conexão: </strong>" . $conn->connect_error);
}
$sql = "DELETE FROM produtos WHERE id = $id";
?>

<h2>Exclusão de Produto novo</h2>

<?php
if ($result = mysqli_query($conn, $sql)) {
	echo " Registro excluído com sucesso! ";
	echo "<a href='../gerenciarPage.php'>Voltar</a>";
} else {
	echo " Erro executando DELETE: " . mysqli_error($conn);
	echo "<a href='../gerenciarPage.php'>Voltar</a>";
}
?>
