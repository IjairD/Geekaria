<?php require 'db/DB.php'; ?>
<?php

session_start();

$conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("<strong> Falha de conexão: </strong>" . $conn->connect_error);
    }

 $nome    = $conn->real_escape_string($_POST['name']); 
 $login   = $conn->real_escape_string($_POST['user']); 
 $celular = $conn->real_escape_string($_POST['celular']); 
 $senha   = $conn->real_escape_string($_POST['password2']); 
    
$sql = "INSERT INTO usuarios (nome_usuario, celular, login, senha) 
        VALUES ('$nome','$celular','$login',md5('$senha'))";

    if ($result = $conn->query($sql)) {
        $msg = "Registro cadastrado com sucesso! Você já pode realizar login.";
        $_SESSION ['nao_autenticado'] = true;
        $_SESSION ['mensagem_header'] = "Cadastro";
        $_SESSION ['mensagem']        = $msg;
        $conn->close(); 
        header('location: loginPage.php');
        exit();
    } else {
        $msg = "Erro executando INSERT: " . $conn->connect_error . 
               " Tente novo cadastro.";
        $_SESSION ['nao_autenticado'] = true;
        $_SESSION ['mensagem_header'] = "Cadastro";
        $_SESSION ['mensagem']        = $msg;
        $conn->close(); 
        header('location: loginPage.php');
        exit();
        }        
?>