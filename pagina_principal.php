<?php
require_once 'UsuarioDAO.php';
require_once 'Cartao_rfidDAO.php';
require_once 'Registro_acessoDAO.php';
session_start();

if ($_SESSION['nome'] != "admin" && $_SESSION['senha'] != "admin"){
    header('Location: index.html?erro=usuario_ou_senha_invalido');
    exit;
}

$usuarioDAO = new UsuarioDAO();
$totalUsuarios = $usuarioDAO->contarUsuarios();

$cartaoDAO = new Cartao_rfidDAO();
$totalCartoes = $cartaoDAO->contarCartao();

$acessoDAO = new Registro_acessoDAO();
$totalAcesso = $acessoDAO->contarAcessos();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Principal</title>
    <link rel="stylesheet" href="css/style_pagina_principal.css">
    <link rel="icon" type="image/png" href="imagens/logo.png">
</head>
<body>
    <header>
        <nav>
            <div class="cabecalho_nav">
                <div class="texto">BrTech</div>
                <div class="texto">Instituto Tecnológico InovaTech</div>
                <div class="texto"><a href="index.html"><img class="logo" src="imagens/logo.png" ></a></div>
            </div>
        </nav>
    </header>
    <main>
    <div class="inicio">
        <div class="textoinicio">Início</div>
    </div>
    <div class="divpai">
        <div class="div1">
            <div class="botoes">
                <div class="imagem">
                    <img src="imagens/logo.png">
                </div>
                <div class="escolhas">
                    <a href="pagina_principal.php">Início</a>
                </div>
                <div class="escolhas">
                    <a href="pagina_cadastro.php">Cadastro de Usuários</a>
                </div>
                <div class="escolhas">
                    <a href="pagina_cadastro_rfid.php">Cadastro de Cartões RFID</a>
                </div>
                <div class="escolhas">
                    <a href="pagina_logs.php">Registro de Acessos</a>
                </div>
            </div>
        </div>
        <div class="div2">
            <div class="dashboard">
                <div class="dashboard1">
                    <div class="dash01">
                        <p>Usuários Cadastrados</p>
                        <h1><?=$totalUsuarios?></h1>
                    </div>
                    <div class="dash02">
                        <p>Acessos</p>
                        <h1><?=$totalAcesso?></h1>
                    </div>
                </div>
                <div class="dashboard2">
                    <div class="dash03">
                        <p>Alertas</p>
                        <h1>5</h1>
                    </div>
                    <div class="dash04">
                        <p>Cartões Cadastrados</p>
                        <h1><?=$totalCartoes?></h1>
                    </div>
                </div>
                <div class="dahsboardtabelas">
                    <div class="tabelausuarios">
                        <a href="tabelaUsuarios.php">Visualizar Usuários</a>
                    </div>
                    <div class="tabelacartoes">
                        <a href="tabelaCartoes.php">Visualizar Cartões RFID</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </main>
</body>
</html>