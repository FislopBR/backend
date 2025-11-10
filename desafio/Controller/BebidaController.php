<?php
require_once __DIR__ . '/../Model/BebidaDAO.php';
require_once __DIR__ . '/../Model/Bebida.php';

class BebidaController {
    private $dao;
    public function __construct() {
        $this->dao = new BebidaDAO();
    }
    public function ler() {
        return $this->dao->lerBebidas();
    }
    public function criar($nome, $categoria, $volume, $valor, $qtde) {
        $bebida = new Bebida($nome,  $categoria, $volume, $valor, $qtde);
        $this->dao->criarBebida($bebida);
    }
public function atualizar($nomeAntigo, $novoNome, $novaCategoria, $novoVolume, $novoValor, $novaQtde) {
    $this->dao->atualizarBebida($nomeAntigo, $novoNome, $novaCategoria, $novoVolume, $novoValor, $novaQtde);
}
    public function deletar($nome) {
        $this->dao->excluirBebida($nome);
    }
}
?>