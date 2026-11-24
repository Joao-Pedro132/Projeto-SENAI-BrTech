<?php

require_once 'Conexao.php';

class UsuarioDAO{
    private $conexao;

    public function __construct(){
        $banco = new Conexao();
        $this->conexao = $banco->conectar();
    }

    public function mostrarTudo(){
        $sql = "SELECT * FROM usuario";

        $comandoSelectTudo = $this->conexao->query($sql);

        return $comandoSelectTudo->fetchAll();
    }

    public function listar(){
        $sql = "SELECT id_usuario, nome, tipo_usuario  FROM usuario";

        $comando = $this->conexao->query($sql);

        return $comando->fetchAll();
    }

    public function listarSemCartao(){
    $sql = "SELECT usuario.id_usuario, usuario.nome, usuario.tipo_usuario FROM usuario LEFT JOIN cartao_rfid ON usuario.id_usuario = cartao_rfid.fk_id_usuario WHERE cartao_rfid.id_cartao IS NULL";

    $comando = $this->conexao->query($sql);

    return $comando->fetchAll();
    }

    public function contarUsuarios(){
    $sql = "SELECT COUNT(*) FROM usuario";

    $comandoUsuarios = $this->conexao->query($sql);

    return $comandoUsuarios->fetchColumn();
    }

    public function cadastrar($nome, $cpf, $tipo_usuario, $senha){
        $sql = "INSERT INTO usuario (nome, cpf, tipo_usuario, senha) VALUES (:nome, :cpf, :tipo_usuario, :senha)";
        
        $comandoInsert = $this->conexao->prepare($sql);

        $comandoInsert->execute(["nome" => $nome, "cpf" => $cpf, "tipo_usuario" => $tipo_usuario, "senha" => $senha]);
    }

    public function excluir($id_usuario){
        $sql = "DELETE FROM usuario WHERE id_usuario = :id_usuario";

        $comando = $this->conexao->prepare($sql);

        $comando->execute(["id_usuario" => $id_usuario]);
    }

}


?>