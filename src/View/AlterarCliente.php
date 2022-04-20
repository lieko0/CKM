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
        <a class="active" href="Home.php">Início</a>
        <a href="..\View\Cliente.php">Voltar</a>
    </div>

    <h1>SISTEMA DE GERENCIMENTO</h1>
    <h2>Alterar Cliente</h2>

    <form id="formulario" action="..\Controller\AlterarCliente.php" method="post" autocomplete="off">

        <label for="ccpf">CPF:</label><br>
        <input type="text" required  id="ccpf" name="ccpf" 
        minlength="11" maxlength="11" placeholder="Apenas números" pattern="\d{3}\.?\d{3}\.?\d{3}-?\d{2}"><br><br>

        <input type="submit" value="PROCURAR">
        <input type="reset" value="LIMPAR">


    </form>

</body>

</html>