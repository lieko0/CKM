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
        <a class="active" href="..\View\Home.php">Início</a>
        <a href="..\View\Cliente.php">Voltar</a>
    </div>

    <h1>SISTEMA DE GERENCIMENTO</h1>
    <h2 class="modulo">MÓDULO DE CADASTROS</h2>
    <h2 id="Cadastro">Cadastro de Clientes</h2>

    <form id="formulario" action="..\Controller\CadastrarCliente.php" method="post" autocomplete="off">

        <label for="cnome">Nome:</label><br>
        <input type="text" required id="cnome" name="cnome" maxlength="50"><br>

        <label for="ccpf">CPF:</label><br>
        <input type="text" required id="ccpf" name="ccpf" 
        minlength="11" maxlength="11" placeholder="Apenas números" pattern="\d{3}\.?\d{3}\.?\d{3}-?\d{2}"><br>

        <label for="cemail">Email:</label><br>
        <input type="email" required id="cemail" name="cemail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"><br><br>

        <input type="submit" value="CADASTRAR">
        <input type="reset" value="LIMPAR">


    </form>

</body>

</html>