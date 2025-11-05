<?php
require_once 'Bebida.php';

class BebidaDAO {
    private $bebidasArray = [];
    private $arquivoJson = 'bebidas.json';

    public function __construct(){
        if(file_exists($this->arquivoJson)){
            $conteudoArquivo = file_get_contents($this->arquivoJson);

            $dadosArquivoEmArray = json_decode($conteudoArquivo, true);

            if ($dadosArquivoEmArray === null) {
                $dadosArquivoEmArray = [];
            }

            foreach ($dadosArquivoEmArray as $nome => $info){
                $this->bebidasArray[$nome] = new Bebida(
                    $info['nome'],
                    $info['categoria'],
                    $info['volume'],
                    $info['valor'],
                    $info['qtde']
                );
            }
        }
    }
        private function salvarArquivo(){
            $dadosParaSalvar=[];

            foreach ($this->bebidasArray as $nome => $bebida){
                $dadosParaSalvar[$nome]=[
                    'nome'=>$bebida->getNome(),
                    'categoria'=>$bebida->getCategoria(),
                    'volume'=>$bebida->getVolume(),
                    'valor'=>$bebida->getValor(),
                    'qtde'=>$bebida->getQtde()
                ];
            }

            // Adicionando log para verificar o conteúdo antes de salvar
            error_log("Dados para salvar: " . print_r($dadosParaSalvar, true));

            // Verificando se o arquivo é gravável
            if (is_writable($this->arquivoJson) || !file_exists($this->arquivoJson)) {
                file_put_contents($this->arquivoJson, json_encode($dadosParaSalvar, JSON_PRETTY_PRINT));
            } else {
                error_log("Erro: O arquivo JSON não é gravável.");
            }
        }
        public function criarBebida(Bebida $bebida){
            $this->bebidasArray[$bebida->getNome()] = $bebida;
            $this->salvarArquivo();
        }
        public function lerBebidas(){
            return $this->bebidasArray;
        }
        public function atualizarBebida($nome, $novoValor, $novaQtde){
            if(isset($this->bebidasArray[$nome])){
                $this->bebidasArray[$nome]->setValor($novoValor);
                $this->bebidasArray[$nome]->setQtde($novaQtde);
            }
            $this->salvarArquivo();
        }
        public function excluirBebida($nome){
            unset($this->bebidasArray[$nome]);
            $this->salvarArquivo();
        }
    
}