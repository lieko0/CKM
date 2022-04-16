<?php

class ClienteDAO {

    function __construct() {}

    function salvar($cliente, $conn) {
        $sql = "INSERT INTO clientes(Nome, Cpf, Email) VALUES ('".
        $cliente->getNome() ."','".
        $cliente->getCpf()."', '".
        $cliente->getEmail()."')";

        if ($conn->query($sql) == TRUE) {
            echo "Cliente salvo.";
        }
        else {
            echo "Erro no cadastramento: <br>".$conn->error;
        }
    }

    function consultarTodosClientes($conn) {
        $sql = "SELECT Id, Nome, Cpf, Email FROM clientes";
        $res = $conn->query($sql);
        return $res;
    }

    function consultarCpf($cpf, $conn) {
        $sql = "SELECT Id, Nome, Cpf, Email FROM clientes WHERE Cpf='$cpf'";
        $res = $conn->query($sql);
        return $res;
    }

    function excluir($cpf, $conn) {
        $sql = "DELETE FROM clientes WHERE Cpf='$cpf'";
        $res = $conn->query($sql);
        return $res;
    }

    function alterar($cliente, $conn, $antigoCpf) {
        $sql = "UPDATE clientes SET 
        Nome='".$cliente->getNome()."', Cpf ='".$cliente->getCpf()."', Email='".$cliente->getEmail()."'
        WHERE Cpf='$antigoCpf'";

        if ($conn->query($sql) == TRUE) {
            echo "Alteração bem sucedida.";
        }
        else {
            echo "Erro no cadastramento: <br>".$conn->error;
        }
    }

}
