<?php

include('protect.php')

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="style.css">
</head>

    <body>

        <div class="topnav">
            <a href="logout.php">Sair</a>
        </div>


        <h1 class="cabecalho">SISTEMA DE GERENCIMENTO</h1>
        <h3>Bem Vindo, <?php echo $_SESSION['user']; ?>.</h3>
        <li><a type="sumbit" href="Cliente.php">Clientes</a></li>
        <li><a type="sumbit" href="Membro.php">Membros</a></li>
        <li><a type="sumbit" href="Projeto.php">Projetos</a></li>
    </body>
    
</html>