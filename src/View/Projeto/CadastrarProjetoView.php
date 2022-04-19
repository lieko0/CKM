<?php
include_once "..\..\Persistence\Connection.php";
include_once "..\..\Persistence\ClienteDAO.php";
include_once "..\..\Persistence\MembroDAO.php";
$conexao = new Connection();
$conexao = $conexao->getConnection();
// mysqli_connect("servername","username","password","database_name")

// Get all the categories from category table
$clienteDao = new ClienteDAO();
$todos_clientes = $clienteDao->consultarTodosClientes($conexao);
$membroDao = new MembroDAO();
$todos_membros = $membroDao->consultarTodosMembros($conexao);
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="topnav">
        <a class="active" href="..\..\index.html">Início</a>
        <a href="..\Projeto.html">Voltar</a>
    </div>

    <h1>SISTEMA DE GERENCIMENTO</h1>
    <h2 class="modulo">MÓDULO DE CADASTROS</h2>
    <h2 id="Cadastro">Cadastro de Clientes</h2>

    <form id="formulario" action="..\..\Controller\Projeto\CadastrarProjeto.php" method="post" autocomplete="off">
        <label for="ptitulo">Titulo:</label><br>
        <input type="text" required id="ptitulo" name="ptitulo" maxlength="50"><br>


        <label>Cliente:</label>
        <select name="pcliente">
            <option value=""></option>
            <?php
            // use a while loop to fetch data 
            // from the $all_categories variable 
            // and individually display as an option
            while ($cliente = mysqli_fetch_array(
                $todos_clientes,
                MYSQLI_ASSOC
            )) :;
            ?>
                <option value="<?php echo $cliente["Id"];
                                // The value we usually set is the primary key
                                ?>">
                    <?php echo $cliente["Nome"] . ' ' . $cliente["Cpf"];
                    // To show the category name to the user
                    ?>
                </option>
            <?php
            endwhile;
            // While loop must be terminated
            ?>
        </select>
        <br>
        <label>Membro:</label>
        <select name="pmembro">
            <option value=""></option>
            <?php
            // use a while loop to fetch data 
            // from the $all_categories variable 
            // and individually display as an option
            while ($membro = mysqli_fetch_array(
                $todos_membros,
                MYSQLI_ASSOC
            )) :;
            ?>
                <option value="<?php echo $membro["Id"];
                                // The value we usually set is the primary key
                                ?>">
                    <?php echo $membro["Nome"] . ' ' . $membro["Cpf"];
                    // To show the category name to the user
                    ?>
                </option>
            <?php
            endwhile;
            // While loop must be terminated
            ?>
        </select>


        <br>
        <label for="pabertura">Abertura:</label><br>
        <input type="date" id="pabertura" name="pabertura"><br>
        <label for="pfechamento">Fechamento:</label><br>
        <input type="date" required id="pfechamento" name="pfechamento"><br>


        <label for="pobservacao">Observacao:</label><br>
        <input type="text" required id="pobservacao" name="pobservacao" maxlength="100"><br>
        <label for="pstatus">Status:</label><br>
        <input type="text" required id="pstatus" name="pstatus" maxlength="10"><br>








        <input type="submit" value="CADASTRAR">
        <input type="reset" value="LIMPAR">
    </form>
</body>

</html>