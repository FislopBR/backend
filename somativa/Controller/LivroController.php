<?php
require_once __DIR__ . '/../Model/LivroDAO.php';
require_once __DIR__ . '/../Model/Livro.php';

class LivroController {
    private $dao;

    // Construtor: cria o objeto DAO (responsável por salvar/carregar)
    public function __construct() {
        $this->dao = new LivroDAO();
    }

    // Lista todas as bebidas
    public function criar($titulo, $autor, $ano, $genero, $qtde) {

        // // Gera ID automaticamente com base no timestamp (exemplo simples)
        // $id = time(); // Função caso o objeto tenha um atributo de ID

        $livro = new livro( $titulo, $autor, $ano, $genero, $qtde);
        $this->dao->criarlivro($livro);
    } 
    
    public function ler() {
        return $this->dao->lerlivro();
    }
  
public function atualizar($tituloOriginal, $novotitulo, $autor, $ano, $genero, $qtde) {
    $this->dao->atualizarlivros($tituloOriginal, $novotitulo, $autor, $ano, $genero, $qtde);
}

public function buscarPortitulo($nome) {
    return $this->dao->buscarPortitulo($nome);
}
    // Exclui bebida
    public function deletar($nome) {
        $this->dao->excluirlivros($nome);
    }
}