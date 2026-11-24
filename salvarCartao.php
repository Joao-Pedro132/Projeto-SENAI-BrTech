<?php

require_once 'Cartao_rfidDAO.php';

$codigo_tag_rfid = $_POST["codigo"];
$status_cartao = $_POST["status"];
$fk_id_usuario = $_POST["fkusuario"];


$cartao_rfidDAO = new Cartao_rfidDAO();

$cartao_rfidDAO->cadastrar($codigo_tag_rfid, $status_cartao, $fk_id_usuario);

header("location: pagina_principal.php?Cadastrado_com_sucesso");

?>