<?php

require_once "Conexao.php";

$conexao = new Conexao();
$conexao->conectar();

var_dump($conexao);
?>