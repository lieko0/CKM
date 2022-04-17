<?php

class MembroDAO {

    function __construct() {}

    function consultarTodosMembros($conn) {
        $sql = "SELECT Id, Nome, Cpf, Email FROM membros";
        $res = $conn->query($sql);
        return $res;
    }
}
