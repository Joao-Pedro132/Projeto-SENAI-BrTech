<?php

require_once 'UsuarioDAO.php';

$id_usuario = $_GET['id'];
$usuarioDAO = new UsuarioDAO();

$usuarioDAO->excluir($id_usuario);

header("Location: tabelaUsuarios.php");
exit;

?>