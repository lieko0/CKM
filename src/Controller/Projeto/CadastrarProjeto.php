<?php
include_once "..\..\Persistence\Connection.php";
include_once "..\..\Model\Projeto.php";
include_once "..\..\Persistence\ProjetoDAO.php";

$titulo = $_POST['ptitulo'];
$cliente = $_POST['pcliente'];
$membro = $_POST['pmembro'];
$abertura = $_POST['pabertura'];
$fechamento = $_POST['pfechamento'];
$observacao = $_POST['pobservacao'];
$status = $_POST['pstatus'];

$conexao = new Connection();
$conexao = $conexao->getConnection();

$projeto = new Projeto(
    $titulo,
    $cliente,
    $membro,
    $abertura,
    $fechamento,
    $observacao,
    $status
);

$projetoDao = new ProjetoDAO();
$projetoDao->salvar($projeto, $conexao);
