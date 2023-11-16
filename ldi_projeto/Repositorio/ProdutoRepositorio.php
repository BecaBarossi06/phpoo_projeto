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

        $sql = "INSERT INTO produtos (tipo, 
    nome, descricao, imagem, preco) VALUES (?,?,?,?,?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param(
            "ssssd",
            $produto->getTipo(),
            $produto->getNome(),
            $produto->getDescricao(),
            $produto->getImagem(),
            $produto->getPreco()
        );
        $stmt->execute();
        $stmt->close();
    }

    public function listarAlmocos()
    {
        $sql = "SELECT * FROM produtos where tipo = 'Almoço' ORDER BY preco";
        $result = $this->conn->query($sql);

        $produtos = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $produto = new Produto(
                    $row['id'],
                    $row['tipo'],
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
    public function atualizarProduto(Produto $produto)
    {
        if (empty($produto->getImagem())) {
            // Prepara a declaração SQL
            $sql = "UPDATE produtos SET tipo = ?, nome = ?,
            descricao = ?,  preco = ? WHERE id = ?";
            $stmt = $this->conn->prepare($sql);

            // Extrai os atributos do objeto Produto
            $tipo = $produto->getTipo();
            $nome = $produto->getNome();
            $descricao = $produto->getDescricao();

            $preco = $produto->getPreco();
            $id = $produto->getId();

            // Vincula os parâmetros
            $stmt->bind_param(
                'sssdi',
                $tipo,
                $nome,
                $descricao,

                $preco,
                $id
            );
            // Executa a declaração preparada
            $resultado = $stmt->execute();

            // Fecha a declaração
            $stmt->close();

            return $resultado;
        } else {
            // Prepara a declaração SQL
            $sql = "UPDATE produtos SET tipo = ?, nome = ?,
            descricao = ?, imagem = ?, preco = ? WHERE id = ?";

            $stmt = $this->conn->prepare($sql);
            // Extrai os atributos do objeto Produto
            $tipo = $produto->getTipo();
            $nome = $produto->getNome();
            $descricao = $produto->getDescricao();
            $imagem = $produto->getImagem();
            $preco = $produto->getPreco();
            $id = $produto->getId();

            // Vincula os parâmetros
            $stmt->bind_param(
                'ssssdi',
                $tipo,
                $nome,
                $descricao,
                $imagem,
                $preco,
                $id
            );
            // Executa a declaração preparada
            $resultado = $stmt->execute();

            // Fecha a declaração
            $stmt->close();

            return $resultado;
        }
    }

    public function listarAlmocoPorId($id)
    {
        $sql = "SELECT * FROM produtos WHERE tipo = 'Almoço' AND id = ? ORDER BY preco LIMIT 1";

        // Prepara a declaração SQL
        $stmt = $this->conn->prepare($sql);

        // Vincula o parâmetro
        $stmt->bind_param('i', $id);

        // Executa a consulta preparada
        $stmt->execute();

        // Obtém os resultados
        $result = $stmt->get_result();

        $produto = null;

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            $produto = new Produto(
                $row['id'],
                $row['tipo'],
                $row['nome'],
                $row['descricao'],
                $row['imagem'],
                $row['preco']
            );
        }

        // Fecha a declaração
        $stmt->close();

        return $produto;
    }



    public function listarCafes()
    {
        $sql = "SELECT * FROM produtos where tipo = 'Café' ORDER BY preco";
        $result = $this->conn->query($sql);

        $produtos = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $produto = new Produto(
                    $row['id'],
                    $row['tipo'],
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

    public function buscarTodos()
    {
        $sql = "SELECT * FROM produtos ORDER BY tipo, preco asc";
        $result = $this->conn->query($sql);

        $produtos = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $produto = new Produto(
                    $row['id'],
                    $row['tipo'],
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
