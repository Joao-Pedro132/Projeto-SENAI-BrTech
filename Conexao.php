<?php

class Conexao{
    private string $servidor = "localhost";
    private string $banco = "controle_acesso";
    private string $usuario = "root";
    private string $senha = "";

    
    public function conectar(){
        $dns = "mysql:host=$this->servidor;dbname=$this->banco;charset=utf8mb4";

        $conexao = new PDO($dns, $this->usuario, $this->senha, [ PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ]);

        return $conexao;
    }
}

?>