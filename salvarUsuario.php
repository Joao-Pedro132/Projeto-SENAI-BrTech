<?php

require_once 'UsuarioDAO.php';

$nome = $_POST["nome"];
$cpf = $_POST["cpf"];
$tipo_usuario = $_POST["tipousuario"];
$senha = $_POST["senha"];


$usuarioDAO = new UsuarioDAO();

$usuarioDAO->cadastrar($nome, $cpf, $tipo_usuario, $senha);

header("location: pagina_cadastro_rfid.php");

?>