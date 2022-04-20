<?php
include_once "..\..\Persistence\Connection.php";
include_once "..\..\Persistence\ProjetoDAO.php";

$id = $_POST['pid'];

$conexao = new Connection();
$conexao = $conexao->getConnection();

$projetoDao = new ProjetoDAO();
$res = $projetoDao->consultarId($id, $conexao);


if ($res->num_rows == 1) {

    $registro = $res->fetch_assoc();
    echo "<!DOCTYPE html>
    <html lang='pt-br'>
    
    <head>
        <meta charset='UTF-8' />
        <link rel='stylesheet' href='style.css'>
    </head>
    
    <body>
        <div class='topnav'>
            <a class='active' href='..\..\index.html'>Início</a>
            <a href='..\..\View\Projeto.html'>Voltar</a>
        </div>
    
        <h1>SISTEMA DE GERENCIMENTO</h1>
        <h2>Excluir Projeto</h2>
    
        <form id='formulario' method='post' autocomplete='off'>
            <label for='ptitulo'>Titulo:</label><br>
            <input readonly type='text' required id='ptitulo' name='ptitulo' maxlength='50' value='" . $registro['Titulo'] . "'><br>
            
    
            <label>Cliente:</label>
            <input readonly type='number' id='pcliente' name='pcliente' maxlength='11' value='" . $registro['Cliente'] . "'><br>

            <br>
            <label>Membro:</label>
            <input type='text' id='pmembro' name='pmembro' maxlength='11' value='" . $registro['Membro'] . "'><br>
            <br>
            <label  for='pabertura'>Abertura:</label><br>
            <input readonly type='date' id='pabertura' name='pabertura' value='" . $registro['Abertura'] . "'><br>
            <label for='pfechamento'>Fechamento:</label><br>
            <input readonly type='date' required id='pfechamento' name='pfechamento'><br>
    
            <label for='pstatus'>Status:</label><br>
            <input readonly type='text' required id='pstatus' name='pstatus' maxlength='10' value='" . $registro['Status'] . "'><br>
    
            <input type='submit' name='Excluir' value='EXCLUIR'>
        </form>
    </body>
    
    </html>";

    if (isset($_POST['Excluir'])) {
        $res = $projetoDao->excluir($id, $conexao);

        if ($res === TRUE) {
            echo "<script>
            alert('Exclusão bem sucedida');
            location.href ='../../View/Projeto/ExcluirProjeto.html';
            </script>";
        } else {
            echo "<script>
            alert('Erro ao excluir.');
            location.href ='../../View/Projeto/ExcluirProjeto.html';
            </script>";
        }
    }
} else {
    echo "<script>
    alert('Id não encontrado.');
    location.href ='../../View/Projeto/ExcluirProjeto.html';
    </script>";
}
