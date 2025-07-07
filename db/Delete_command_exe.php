<?php
require 'DB.php';

$id = $_POST['Id'];
$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    header("Location: ../gerenciarPage.php?status=erro_conexao");
    exit();
}

$sql = "DELETE FROM produtos WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    header("Location: ../gerenciarPage.php?status=sucesso");
} else {
    header("Location: ../gerenciarPage.php?status=erro_delete");
}

$conn->close();
exit();
?>