<?php

class Connection {
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $bd = "gerenciamento";
    private $conn=null;

    function __construct(){}

    function getConnection() {
        if ($this->conn == null) {
            $this->conn = mysqli_connect($this->servername, $this->username, $this->password, $this->bd);
            // Checa a conexão
            if ($this->conn->connect_error) {
                die("Conexão com o banco de dados falhou: " . $this->conn->connect_error);
            }
        }
        return $this->conn;
    }
}

?>