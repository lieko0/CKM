<?php
include_once "Persistence\Connection.php";
$conexao = new Connection();
$conexao = $conexao->getConnection();

if(isset($_POST['usuario']) || isset($_POST['senha'])) {
    if(strlen($_POST['usuario']) == 0) {
        echo "Preencha seu usuario";
    } else if(strlen($_POST['senha']) == 0) {
        echo "Preencha sua senha";
    } else {
        $usuario = $conexao->real_escape_string($_POST['usuario']);
        $senha = $conexao->real_escape_string($_POST['senha']);

        $sql = "SELECT * FROM usuarios WHERE Usuario = '$usuario' AND  Senha = '$senha'";
        $res = $conexao->query($sql);

        if($res->num_rows == 1) {

            $usuario = $res->fetch_assoc();

            if(!isset($_SESSION)) {
                session_start();
            }

            $_SESSION['user'] = $usuario['Usuario'];

            header("Location: View\Home.php");

        } else {
            echo "Falha ao logar! Usuario ou senha incorretos";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="View\style.css">
</head>

<body>

    

    <form  id="formulario" action="" method="post" autocomplete="off">

        <label for="cusuario">Usuario:</label><br>
        <input type="text" required id="cusuario" name="usuario" maxlength="20"><br>

        <label for="csenha">Senha:</label><br>
        <input type="password" required id="csenha" name="senha" minlength="8"><br><br>

        <input type="submit" value="ENTRAR">
        <input type="reset" value="LIMPAR">


    </form>

</body>

</html>