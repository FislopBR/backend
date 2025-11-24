<?php
require_once 'Livro.php';
require_once 'Connection.php';

class LivroDAO {
    private $conn;

    public function __construct() {
        $this->conn = Connection::getInstance();

        // Cria a tabela se não existir
        $this->conn->exec("
            CREATE TABLE IF NOT EXISTS Livros (
                id INT AUTO_INCREMENT PRIMARY KEY,
                titulo VARCHAR(200) NOT NULL,
                autor VARCHAR(150) NOT NULL,
                ano INT NOT NULL,
                genero VARCHAR(100),
                qtde INT NOT NULL
            )
        ");
    }
    

    // CREATE
    public function criarLivro(Livro $livro) {
    $stmt = $this->conn->prepare("
        INSERT INTO Livros (titulo, autor, ano, genero, qtde)
        VALUES (:titulo, :autor, :ano, :genero, :qtde)
    ");
    $stmt->execute([
        ':titulo' => $livro->gettitulo(), 
        ':autor' => $livro->getautor(),
        ':ano' => $livro->getano(),
        ':genero' => $livro->getgenero(),
        ':qtde' => $livro->getQtde()
    ]);
}

    // READ
    public function lerlivro() {
        $stmt = $this->conn->query("SELECT * FROM Livros ORDER BY titulo");
        $result = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $result[] = new Livro(
                $row['titulo'],
                $row['autor'],
                $row['ano'],
                $row['genero'],
                $row['qtde']
            );
        }
        return $result;
    }

// UPDATE
    public function atualizarlivros($tituloOriginal, $novotitulo, $autor, $ano, $genero, $qtde) {
        $stmt = $this->conn->prepare("
            UPDATE livros
            SET titulo = :novotitulo, autor = :autor, ano = :ano, genero = :genero, qtde = :qtde
            WHERE titulo = :tituloOriginal
        ");
        $stmt->execute([
            ':novotitulo' => $novotitulo,
            ':autor' => $autor,
            ':ano' => $ano,
            ':genero' => $genero,
            ':qtde' => $qtde,
            ':tituloOriginal' => $tituloOriginal 
        ]);
    }

    // DELETE
    public function excluirlivros($titulo) {
        $stmt = $this->conn->prepare("DELETE FROM Livros WHERE titulo = :titulo");
        $stmt->execute([':titulo' => $titulo]);
    }

    // BUSCAR POR titulo
    public function buscarPortitulo($titulo) {
        $stmt = $this->conn->prepare("SELECT * FROM Livros WHERE titulo = :titulo LIMIT 1");
        $stmt->execute([':titulo' => $titulo]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            return new Livro(
                $row['titulo'],
                $row['autor'],
                $row['ano'],
                $row['genero'],
                $row['qtde']
            );
        }
        return null;
    }
}