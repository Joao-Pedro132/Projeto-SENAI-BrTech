<?php

require_once 'Conexao.php';

class Registro_acessoDAO{
    private $conexao;

    public function __construct(){
        $banco = new Conexao();
        $this->conexao = $banco->conectar();
    }

    public function listarRegistros(){
    $sql = "SELECT r.data_hora, u.nome, c.codigo_tag_rfid, c.status_cartao, r.resultado, r.observacao FROM registro_acesso as r INNER JOIN cartao_rfid as c ON r.fk_id_cartao = c.id_cartao INNER JOIN usuario as u ON c.fk_id_usuario = u.id_usuario ORDER BY r.data_hora ASC";

    $comando = $this->conexao->query($sql);

    return $comando->fetchAll();
    }

    public function contarAcessos(){
        $sql = "SELECT COUNT(*) FROM registro_acesso";

        $comandoAcesso = $this->conexao->query($sql);

        return $comandoAcesso->fetchColumn();
    }
}

?>