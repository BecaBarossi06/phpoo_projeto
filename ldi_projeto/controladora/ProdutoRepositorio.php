<?php
class ProdutoRepositorio
{
    private $conn; // Sua conexão com o banco de dados
    public function __construct($conn)
    {
        $this->conn = $conn;
    }
    public function cadastrar(Produto $produto)
    {
        $sql = "INSERT INTO produtos ( 
    id, nome, descricao, imagem, preco) VALUES (?,?,?,?,?,?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sssssd", $produto->getId(), $produto->getNome(), 
        $produto->getDescricao(), $produto->getImagem(), $produto->getPreco());
        $stmt->execute();
        $stmt->close();
    }
    

    public function listarDonuts()
    {
        $sql = "SELECT * FROM produtos where nome = 'Donuts' ORDER BY preco";
        $result = $this->conn->query($sql);

        $produtos = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $produto = new Produto(
                    $row['id'],
                    $row['nome'],
                    $row['descricao'],
                    $row['imagem'],
                    $row['preco']
                );
                $produtos[] = $produto;
            }
        }

        return $produtos;
    }
    
}
