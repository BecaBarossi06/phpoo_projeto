<?php
require "conexao.php";
require "Autenticacao.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    $login = new Autenticacao($conn);
    $usuario = $login->verificarUsuario($email, $senha);

    if ($usuario) {
        session_start();
        $_SESSION["usuario"] = $usuario;
        header("Location: ../visao/index.php");
        exit; 
    } else {
        header("Location: ../visao/login.php?erro=1");
        exit;
    }
}
?>