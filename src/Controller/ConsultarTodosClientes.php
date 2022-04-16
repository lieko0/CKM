<?php
include_once "..\Persistence\Connection.php";
include_once "..\Persistence\ClienteDAO.php";

$conexao = new Connection();
$conexao = $conexao->getConnection();

$clienteDao = new ClienteDAO();
$res = $clienteDao->consultarTodosClientes($conexao);

if($res->num_rows > 0) {

    echo "
    <!DOCTYPE html>
            <html>
            <head>
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
                <a class='active' href='..\index.html'>Início</a>
                <a href='..\View\Cliente.html'>Voltar</a>
            </div>

            <h2>Clientes</h2><table>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>CPF</th>
                <th>Email</th>
            </tr>";

    while ($registro = $res->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$registro['Id']."</td>".
             "<td>".$registro['Nome']."</td>". // O campo de registro deve ser igual ao do BD
             "<td>".$registro['Cpf']."</td>".
             "<td>".$registro['Email']."</td>";
        echo "</tr>";

    }
    echo "</table></body></html>";
} else {
    echo "<script>
    alert('Não há clientes cadastrados');
    location.href ='../View/Cliente.html';
    </script>";
}

?>
