<?php

require_once 'Conexao.php';

class Cartao_rfidDAO{
    private $conexao;

    public function __construct(){
        $banco = new Conexao();
        $this->conexao = $banco->conectar();
    }

    public function selectTudo(){
        $sql = "SELECT * FROM cartao_rfid";

        $comandoSelectTudo = $this->conexao->query($sql);

        return $comandoSelectTudo->fetchaAll();
    }

    public function contarCartao(){
        $sql = "SELECT COUNT(*) FROM cartao_rfid";

        $comandoCartao = $this->conexao->query($sql);

        return $comandoCartao->fetchColumn();
    }

    public function mostrarTudo(){
        $sql = "SELECT c.id_cartao, c.codigo_tag_rfid, c.status_cartao, u.nome FROM cartao_rfid as c INNER JOIN usuario as u ON c.fk_id_usuario = u.id_usuario";

        $comando = $this->conexao->query($sql);

        return $comando->fetchAll();
    }

    public function cadastrar($codigo_tag_rfid, $status_cartao, $fk_id_usuario){
        $sql = "INSERT INTO cartao_rfid (codigo_tag_rfid, status_cartao, fk_id_usuario) VALUES (:codigo_tag_rfid, :status_cartao, :fk_id_usuario)";
        
        $comandoInsert = $this->conexao->prepare($sql);

        $comandoInsert->execute(["codigo_tag_rfid" => $codigo_tag_rfid, "status_cartao" => $status_cartao, "fk_id_usuario" => $fk_id_usuario]);
    }

    public function excluir($id_cartao){
        $sql = "DELETE FROM cartao_rfid WHERE id_cartao = :id_cartao";

        $comando = $this->conexao->prepare($sql);

        $comando->execute(["id_cartao" => $id_cartao]);
    }
}

?>