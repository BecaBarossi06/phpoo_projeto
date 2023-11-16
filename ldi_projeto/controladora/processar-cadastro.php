<?php
include 'conexao.php';
include '../modelo/Usuario.php';
include '../Repositorio/UsuarioRepositorio.php';

if (($_SERVER["REQUEST_METHOD"] == "POST")) {
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $confirmarsenha = $_POST["confirmarsenha"];

    if ($senha === $confirmarsenha) {
        $senhaHash = password_hash($senha, PASSWORD_DEFAULT);
        //conexão com o banco de dados;
        $usuario = new Usuario(
            $nome,
            $email,
            $senhaHash
        );
    
        $UsuarioRepositorio = new UsuarioRepositorio($conn);
        $UsuarioRepositorio->cadastrar($usuario);
        header("Location: ../visao/cadastrar-usuario-sucesso.php");
    }else{
        header("Location: ../visao/cadastrar-usuario.php?erro=1");
    } 
}

