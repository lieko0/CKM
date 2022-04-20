<?php

class ClienteDAO {

    function __construct() {}

    function salvar($cliente, $conn) {
        $sql = "INSERT INTO clientes(Nome, Cpf, Email) VALUES ('".
        $cliente->getNome() ."','".
        $cliente->getCpf()."', '".
        $cliente->getEmail()."')";

        try {
            $conn->query($sql);
            echo "<script>
            alert('Cliente cadastrado com sucesso.');
            location.href ='../View/CadastrarCliente.php';
            </script>";
        } catch (mysqli_sql_exception $e) {
            if ($e->getCode() == 1062) {
                echo "<script>
                alert('Erro: CPF digitado já existe.');
                location.href ='../View/CadastrarCliente.php';
                </script>";
            } else {
                echo "<script>
                alert('Erro no cadastramento: .$conn->error');
                location.href ='../View/CadastrarCliente.php';
                </script>";
            }
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

        try {
            $conn->query($sql);
            echo "<script>
            alert('Alteração bem sucedida');
            location.href ='../View/AlterarCliente.php';
            </script>";
        } catch (mysqli_sql_exception $e) {
            if ($e->getCode() == 1062) {
                echo "<script>
                alert('Erro: CPF digitado já existe.');
                location.href ='../View/AlterarCliente.php';
                </script>";
            } else {
                echo "<script>
                alert('Erro na alteraçõa: .$conn->error');
                location.href ='../View/AlterarCliente.php';
                </script>";
            }
        }
    }

}
