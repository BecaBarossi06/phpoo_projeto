<?php
require "conexao.php";
require "Modelo\Produto.php";
require "Repositorio\ProdutoRepositorio.php";

//if (isset($_POST['cadastro'])){ ou
if ($_SERVER["REQUEST_METHOD"]=="POST"){
    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $descricao = $_POST["descricao"];
    $preco = $_POST["preco"];
    $imagem = $_POST["imagem"];
    $produto = new Autenticacao($conn);
    $usuario = $produto->verificarProduto($id);
    

    $produtoRepositorio = new ProdutoRepositorio($conn);
    $produtoRepositorio->cadastrar($produto);
    header("Location: cadastrar-produtos-sucesso.php");
}

?>