<?php
session_start();

if ($_SESSION['nome'] != "admin" && $_SESSION['senha'] != "admin"){
    header('Location: index.html?erro=usuario_ou_senha_invalido');
    exit;
}

require_once 'UsuarioDAO.php';

$usuarioDAO = new UsuarioDAO();
$usuarios = $usuarioDAO->listarSemCartao();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Cartão RFID</title>
    <link rel="stylesheet" href="css/style_cadastro_rfid.css">
    <link rel="icon" type="image/png" href="imagens/logo.png">
</head>
<body>
    <header>
        <nav>
            <div class="cabecalho_nav">
                <div class="texto">BrTech</div>
                <div class="texto">Instituto Tecnológico InovaTech</div>
                <div class="texto"><a href="index.html"><img class="logo" src="imagens/logo.png"></a></div>
            </div>
        </nav>
    </header>
    <main>
    <div class="cadastrorfid">
        <div class="textocadastro">Cadastro de Cartões RFID</div>
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
                <form class="formulario" action="salvarCartao.php" method="POST">
                    <div class="primeira">
                        <div class="label">
                            <label for="codigo">Código do Cartão</label>
                        </div>
                        <div class="input">
                            <input type="text" id="codigo" name="codigo" maxlength="50" placeholder="....." required>
                        </div>
                        <div class="label">
                            <label for="status">Status do Cartão</label>
                        </div>
                        <div class="input">
                           <select name="status" id="status" required>
                                <option value="" selected disabled>.....</option>
                                <option value="Ativo">Ativo</option>
                                <option value="Bloqueado">Bloqueado</option>
                            </select>
                        </div>
                        <div class="label">
                            <label for="fkusuario">ID do Usuário</label>
                        </div>
                        <div class="input">
                            <input type="number" id="fkusuario" name="fkusuario" maxlength="10" placeholder="....." required>
                        </div>
                        <div class="botoesform">
                            <button type="submit">Cadastrar Cartão</button>
                            <button type="reset">Limpar</butto>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="div3">
            <div>
                <table border="1">
                    <thead>
                        <tr>
                            <th>ID do Usuário</th>
                            <th>Nome do Usuário</th>
                            <th>Tipo de Usuário</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($usuarios as $usuario) { 
                            ?>
                            <tr>
                                <td><?= $usuario['id_usuario'] ?></td>
                                <td><?= $usuario['nome'] ?></td>
                                <td><?= $usuario['tipo_usuario'] ?></td>
                            </tr>
                        <?php 
                        } 
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </main>
</body>
</html>