<?php
include_once "..\Persistence\Connection.php";
include_once "..\Persistence\ClienteDAO.php";

$cpf = $_POST['ccpf'];

$conexao = new Connection();
$conexao = $conexao->getConnection();

$clienteDao = new ClienteDAO();
$res = $clienteDao->consultarCpf($cpf, $conexao);

if($res->num_rows == 1) {

    $registro = $res->fetch_assoc();

    echo "
    <!DOCTYPE html>
    <html lang='pt-br'>
    
    <head>
        <meta charset='UTF-8' />
        <link rel='stylesheet' href='..\View\style.css'>
    </head>
    
    <body>
        <div class='topnav'>
            <a class='active' href='..\View\Home.php'>Início</a>
            <a href='..\View\Cliente.php'>Voltar</a>
        </div>
    
        <h1>SISTEMA DE GERENCIMENTO</h1>
        <h2>Excluir Cliente</h2>
    
        <form id='formulario' method='post' autocomplete='off'>
    
            <label for='cnome'>Nome:</label><br>
            <input type='text' readonly  id='cnome' name='cnome' maxlength='50' value='".$registro['Nome']."'><br>
    
            <label for='ccpf'>CPF:</label><br>
            <input type='text' readonly id='ccpf' name='ccpf' value='".$registro['Cpf']."'
            minlength='11' maxlength='14' title='Digite o CPF no formato nnn.nnn.nnn-nn ou apenas 11 n's' pattern='\d{3}\.?\d{3}\.?\d{3}-?\d{2}'><br>
    
            <label for='cemail'>Email:</label><br>
            <input type='email' readonly id='cemail' name='cemail' pattern='[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$' value='".$registro['Email']."'><br><br>

    
            <input type='submit' name='Excluir' value='EXCLUIR'>
        </form>
    
    </body>
    </html>";

    if (isset($_POST["Excluir"]))
    {
        $res = $clienteDao->excluir($cpf, $conexao);

        if ($res === TRUE) {
            echo "<script>
            alert('Exclusão bem sucedida');
            location.href ='../View/ExcluirCliente.php';
            </script>";
        } else {
            echo "<script>
            alert('Erro ao excluir.');
            location.href ='../View/ExcluirCliente.php';
            </script>";
        }
    }
}
else {
    echo "<script>
    alert('CPF não encontrado.');
    location.href ='../View/AlterarCliente.php';
    </script>";
}

?>
