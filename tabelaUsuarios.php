<?php
require_once 'UsuarioDAO.php';
session_start();

if ($_SESSION['nome'] != "admin" && $_SESSION['senha'] != "admin"){
    header('Location: index.html?erro=usuario_ou_senha_invalido');
    exit;
}

$usuarioDAO = new UsuarioDAO();
$usuarios = $usuarioDAO->mostrarTudo();


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuários</title>
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
            <div class="textoinicio">Usuários</div>
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
                            <th>Nome</th>
                            <th>CPF</th>
                            <th>Tipo de Usuário</th>
                            <th>Senha</th>
                            <th>Excluir Usuário</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($usuarios as $usuario){
                        ?>
                        <tr>
                            <td><?=$usuario["id_usuario"]?></td>
                            <td><?=$usuario["nome"]?></td>
                            <td><?=$usuario["cpf"]?></td>
                            <td><?=$usuario["tipo_usuario"]?></td>
                            <td><?=$usuario["senha"]?></td>
                            <td><a href="excluirUsuario.php?id=<?= $usuario['id_usuario'] ?>">Excluir</a></td>
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