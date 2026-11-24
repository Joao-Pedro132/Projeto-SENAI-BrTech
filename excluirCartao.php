<?php

require_once 'Cartao_rfidDAO.php';

$id_cartao = $_GET['id'];
$cartaoDAO = new Cartao_rfidDAO();

$cartaoDAO->excluir($id_cartao);

header("Location: tabelaCartoes.php");
exit;
?>