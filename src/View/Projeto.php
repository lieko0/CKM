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
    <h2>Projetos</h2>



    <li><a href="..\View\Projeto\CadastrarProjetoView.php">Cadastrar Projeto</a></li>
    <li><a href="..\Controller\Projeto\ConsultarTodosProjetos.php">Consultar Todos Projetos</a></li>
</body>

</html>