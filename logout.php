<?php

session_start();

unset($_SESSION ['login']);
unset($_SESSION ['id_usuario']);
unset($_SESSION ['nome_usuario']);
$_SESSION ['nao_autenticado'] = true;
$_SESSION ['mensagem_header'] = "Login";
$_SESSION ['mensagem']        = "Usuário deslogado";
header("location: loginPage.php");
exit();
?>