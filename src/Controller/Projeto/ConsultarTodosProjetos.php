<?php
include_once "..\..\Persistence\Connection.php";
include_once "..\..\Persistence\ProjetoDAO.php";

$conexao = new Connection();
$conexao = $conexao->getConnection();

$projetoDao = new ProjetoDAO();
$res = $projetoDao->consultarTodosProjetos($conexao);

if ($res->num_rows > 0) {

    echo "
    <!DOCTYPE html>
            <html>
            <head>
                <meta charset='UTF-8' />
                <link rel='stylesheet' href='..\..\View\style.css'>
                <style>
            table {
                font-family: arial, sans-serif;
                border-collapse: collapse;
                width: 100%;
            }

            td, th {
                border: 1px solid #dddddd;
                text-align: left;
                padding: 8px;
            }

            tr:nth-child(even) {
                background-color: #dddddd;
            }
            </style>
            </head>
            <body>
            
            <div class='topnav'>
                <a class='active' href='..\..\index.html'>Início</a>
                <a href='..\..\View\Projeto.html'>Voltar</a>
            </div>

            <h2>Projetos</h2><table>
            <tr>
            <th>Id</th>
                <th>Titulo</th>
                <th>Cliente</th>
                <th>Membro</th>
                <th>Abertura</th>
                <th>Fechamento</th>
                <th>Observacao</th>
                <th>Status</th>
            </tr>";

    while ($registro = $res->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $registro['Id'] . "</td>" .
            "<td>" . $registro['Titulo'] . "</td>" . // O campo de registro deve ser igual ao do BD
            "<td>" . $registro['Cliente'] . "</td>" .
            "<td>" . $registro['Membro'] . "</td>" .
            "<td>" . $registro['Abertura'] . "</td>" .
            "<td>" . $registro['Fechamento'] . "</td>" .
            "<td>" . $registro['Observacoes'] . "</td>" .
            "<td>" . $registro['Status'] . "</td>";
        echo "</tr>";
    }
    echo "</table></body></html>";
} else {
    echo "<script>
    alert('Não há projetos cadastrados');
    location.href ='../../View/Projeto.html';
    </script>";
}
