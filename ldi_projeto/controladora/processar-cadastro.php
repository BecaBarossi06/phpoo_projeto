<?php
include 'conexao.php';
include '../modelo/Usuario.php';
include 'UsuarioRepositorio.php';

if (($_SERVER["REQUEST_METHOD"] == "POST")) {
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $confirmarsenha = $_POST["confirmarsenha"];

    if ($senha === $confirmarsenha) {
        //conexão com o banco de dados;
        $usuario = new Usuario(
            $nome,
            $email,
            $senha
        );
    
        $UsuarioRepositorio = new UsuarioRepositorio($conn);
        $UsuarioRepositorio->cadastrar($usuario);
        header("Location: ../visao/cadastrar-usuario-sucesso.php");
    }else{
        header("Location: ../visao/cadastrar-usuario.php?erro=1");
    } 
}

