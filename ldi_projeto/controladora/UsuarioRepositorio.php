<?php
class UsuarioRepositorio
{
    private $conn; // Sua conexão com o banco de dados
    public function __construct($conn)
    {
        $this->conn = $conn;
    }
    public function cadastrar(Usuario $usuario)
    {
        $sql = "INSERT INTO usuario ( 
    nome, email, senha) VALUES (?,?,?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sss", $usuario->get_nome(), 
        $usuario->get_email(), $usuario->get_senha());
        $stmt->execute();
        $stmt->close();
    }
    

    public function listarUsuario()
    {
        $sql = "SELECT * FROM usuario";
        $result = $this->conn->query($sql);

        $usuarios = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $usuario = new Usuario(
                    $row['nome'],
                    $row['email'],
                    $row['senha']
                );
                $usuario[] = $usuario;
            }
        }

        return $usuarios;
    }
    
}