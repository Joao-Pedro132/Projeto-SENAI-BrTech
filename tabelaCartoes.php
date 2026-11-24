<?php
require_once 'Cartao_rfidDAO.php';
session_start();

if ($_SESSION['nome'] != "admin" && $_SESSION['senha'] != "admin"){
    header('Location: index.html?erro=usuario_ou_senha_invalido');
    exit;
}

$cartaoDAO = new Cartao_rfidDAO();
$cartoes = $cartaoDAO->mostrarTudo();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cartões RFID</title>
    <link rel="stylesheet" href="css/style_usuarios_cartoes.css">
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
            <div class="textoinicio">Cartões RFID</div>
        </div>
        <div class="divpai">
            <div class="div1">
                <div class="botoes">
                    <div class="imagem">
                        <img src="imagens/logo.png">
                    </div>
                    <div class="escolhas">
                        <a href="pagina_principal.php">Voltar</a>
                    </div>
                </div>
            </div>
            <div class="div2">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Código</th>
                            <th>Status</th>
                            <th>Nome do Usuário</th>
                            <th>Excluir Cartão</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($cartoes as $cartao){
                        ?>
                        <tr>
                            <td><?= $cartao['id_cartao'] ?></td>
                            <td><?= $cartao['codigo_tag_rfid'] ?></td>
                            <td><?= $cartao['status_cartao'] ?></td>
                            <td><?= $cartao['nome'] ?></td>
                            <td><a href="excluirCartao.php?id=<?= $cartao['id_cartao'] ?>">Excluir</a></td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</body>
</html>