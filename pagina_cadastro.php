<?php
session_start();

if ($_SESSION['nome'] != "admin" && $_SESSION['senha'] != "admin"){
    header('Location: index.html?erro=usuario_ou_senha_invalido');
    exit;
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Cadastros</title>
    <link rel="stylesheet" href="css/style_cadastro.css">
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
    <div class="cadastro">
        <div class="textocadastro">Cadastro de Usuários</div>
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
                <form class="formulario" action="salvarUsuario.php" method="POST">
                    <div class="primeira">
                        <div class="label">
                            <label for="nome">Nome</label>
                        </div>
                        <div class="input">
                            <input type="text" id="nome" name="nome" maxlength="255" placeholder="....." required>
                        </div>
                        <div class="label">
                            <label for="cpf">CPF</label>
                        </div>
                        <div class="input">
                            <input type="text" id="cpf" name="cpf" maxlength="14" placeholder="....." required>
                        </div>
                        <div class="botoesform">
                            <button type="submit">Cadastrar Usuário</button>
                        </div>
                    </div>
                    <div class="segunda">
                        <div class="label">
                            <label for="senha">Senha</label>
                        </div>
                        <div class="input">
                            <input type="text" id="senha" name="senha" maxlength="50" placeholder="....." required>
                        </div>
                        <div class="label">
                            <label for="tipousuario">Tipo Usuário</label>
                        </div>
                        <div class="input">
                            <select name="tipousuario" id="tipousuario" required>
                                <option value="" selected disabled>.....</option>
                                <option value="Aluno">Aluno</option>
                                <option value="Professor">Professor</option>
                                <option value="Administrador">Administrador</option>
                                <option value="Tecnico">Técnico</option>
                            </select>
                        </div>
                        <div class="botoesform">
                            <button type="reset">Limpar</button>
                        </div>
                    </div>    
                </form>
            </div>
        </div>
    </div>
    </main>
</body>
</html>