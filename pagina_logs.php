<?php
require_once 'Registro_acessoDAO.php';
session_start();

if ($_SESSION['nome'] != "admin" && $_SESSION['senha'] != "admin"){
    header('Location: index.html?erro=usuario_ou_senha_invalido');
    exit;
}

$registroDAO = new Registro_acessoDAO();
$registros = $registroDAO->listarRegistros();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Acessos</title>
    <link rel="stylesheet" href="css/style_logs.css">
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
    <div class="logs">
        <div class="textologs">Registro de acessos</div>
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
            <div>
                <table border="1">
                    <thead>
                        <tr>
                            <th>Data e Hora</th>
                            <th>Usuário</th>
                            <th>Tag cartão RFID</th>
                            <th>Status</th>
                            <th>Resultado</th>
                            <th>Observação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($registros as $informacoes){
                        ?>
                        <tr>
                            <td><?= $informacoes['data_hora'] ?></td>
                            <td><?= $informacoes['nome'] ?></td>
                            <td><?= $informacoes['codigo_tag_rfid'] ?></td>
                            <td><?= $informacoes['status_cartao'] ?></td>
                            <td><?= $informacoes['resultado'] ?></td>
                            <td><?= $informacoes['observacao'] ?></td>
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