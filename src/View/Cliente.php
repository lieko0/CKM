<?php

include('protect.php')

?>
<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8" />
        <link rel="stylesheet" href="style.css">
    </head>

    <body>

        <div class="topnav">
            <a class="active" href="Home.php">Início</a>
        </div>
    
        <h1 class="cabecalho">SISTEMA DE GERENCIMENTO</h1>
        <h2>Clientes</h2>

        

        <li><a href="CadastrarCliente.php">Cadastrar Cliente</a></li>
        <li><a href="..\View\ConsultarCliente.php">Consultar Cliente</a></li>
        <li><a href="..\View\AlterarCliente.php">Alterar Cliente</a></li>
        <li><a href="..\View\ExcluirCliente.php">Excluir Cliente</a></li>
        <li><a href="..\Controller\ConsultarTodosClientes.php">Consultar Todos Clientes</a></li>
    </body>

</html>