<?php

session_start();

$_SESSION['nome'] = $_POST['nome'];
$_SESSION['senha'] = $_POST['senha'];

if ($_SESSION['nome'] == "admin" && $_SESSION['senha'] == "admin"){
    header('Location: pagina_principal.php');
    exit;
}
else {
    header('Location: index.html?erro=usuario_ou_senha_invalido');
    exit;
}
?>

