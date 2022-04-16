<?php
include_once "..\Persistence\Connection.php";
include_once "..\Model\Cliente.php";
include_once "..\Persistence\ClienteDAO.php";

$nome = $_POST['cnome'];
$cpf = $_POST['ccpf'];
$email = $_POST['cemail'];

$conexao = new Connection();
$conexao = $conexao->getConnection();

$cliente = new Cliente($nome,$cpf,$email);

$clienteDao = new ClienteDAO();
$clienteDao->salvar($cliente, $conexao);

?>
