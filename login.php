<?php

session_start();

if (isset($_SESSION ['login'])) {
    header("location: index.php");
    exit();
  }
?>

<?php require 'db/DB.php'; ?>
<?php

$conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("<strong> Falha de conexão: </strong>" . $conn->connect_error);
    }

$usuario = $conn->real_escape_string($_POST['user']); 
$senha   = $conn->real_escape_string($_POST['password']);  
    
$sql = "SELECT id_usuario, nome_usuario FROM usuarios 
         WHERE login = '$usuario' AND senha = md5('$senha')";
    if ($result = $conn->query($sql)) { 
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();  
            $_SESSION ['login']         = $usuario;
            $_SESSION ['id_usuario']    = $row['id_usuario'];
            $_SESSION ['nome_usuario']  = $row['nome_usuario'];
            unset($_SESSION['nao_autenticado']);
            unset($_SESSION ['mensagem_header'] ); 
            unset($_SESSION ['mensagem'] ); 
            header('location: index.php');
            exit();
            
        } else {
            $_SESSION ['nao_autenticado'] = true;
            $_SESSION ['mensagem_header'] = "Login";
            $_SESSION ['mensagem']        = "ERRO: Login ou Senha inválidos.";

            header('location: loginPage.php');
            exit();
        }
    }
    else {
        echo "Erro ao acessar o BD: " . mysqli_error($conn);
    }