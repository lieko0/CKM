<?php

class ProjetoDAO
{

    function __construct()
    {
    }

    function salvar($projeto, $conn)
    {
        $sql = "INSERT INTO projetos(Titulo, Cliente, Membro,Abertura, Fechamento, Observacoes, Status) VALUES ('" .
            $projeto->getTitulo() . "','" .
            $projeto->getCliente() . "', '" .
            $projeto->getMembro() . "', '" .
            $projeto->getAbertura() . "', '" .
            $projeto->getFechamento() . "', '" .
            $projeto->getObservacao() . "', '" .
            $projeto->getStatus() . "')";

        try {
            $conn->query($sql);
            echo "<script>
            alert('Projeto cadastrado com sucesso.');
            location.href ='../../View/Projeto/CadastrarProjetoView.php';
            </script>";
        } catch (mysqli_sql_exception $e) {

            if ($e->getCode() == 1062) {
                echo "<script>
                alert('Erro: Título digitado já existe.');
                location.href ='../../View/Projeto/CadastrarProjetoView.php';
                </script>";
            } else {
                echo "<script>
                alert('Erro no cadastramento: .$conn->error');
                location.href ='../../View/Projeto/CadastrarProjetoView.php';
                </script>";
            }
        }
    }

    function consultarTodosProjetos($conn)
    {
        $sql = "SELECT Id, Titulo, Cliente, Membro, Abertura, Fechamento, Observacoes, Status FROM projetos";
        $res = $conn->query($sql);
        return $res;
    }
}
