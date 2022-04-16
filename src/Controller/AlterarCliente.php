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
    
        <h1>SISTEMA DE GERENCIMENTO</h1>
        <h2>Alterar Cliente</h2>
    
        <form id='formulario' action='..\Controller\AlterarClienteDefinitivo.php' method='post' autocomplete='off'>
    
            <label for='cnome'>Nome:</label><br>
            <input type='text' required  id='cnome' name='cnome' maxlength='50' value='".$registro['Nome']."'><br>
    
            <label for='ccpf'>CPF:</label><br>
            <input type='text' required id='ccpf' name='ccpf' placeholder='XXXXXXXXX-XX' value='".$registro['Cpf']."'><br>
    
            <label for='cemail'>Email:</label><br>
            <input type='email' required id='cemail' name='cemail' pattern='[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$' value='".$registro['Email']."'><br>

            <input type='hidden' type=text id='antigocpf' name='antigocpf' maxlength='50' value='".$cpf."'>
    
            <input type='submit' value='ALTERAR'>
            <input type='reset' value='LIMPAR'>    
        </form>
    
    </body>
    </html>";
}
else {
    echo "<script>alert('Cliente não encontrado.')</script>";
}

?>
