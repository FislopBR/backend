<?php
class animal{
    private $especie;
    private $habitate;
    private $sexo;
    private $alimentacao;

    public function __construct($especie, $habitate, $sexo, $alimentacao){
        $this->setEspecie($especie);
        $this->setHabitate($habitate);
        $this->setSexo($sexo);
        $this->setAlimentacao($alimentacao);
    }

    public function getEspecie(){
        return $this->especie;
    }

    public function setEspecie($especie){
        $this->especie = $especie;
    }
    public function getHabitate(){
        return $this->habitate;
    }
    public function setHabitate($habitate){
        $this->habitate = $habitate;
    }
    public function getSexo(){
        return $this->sexo;
    }
    public function setSexo($sexo){
        $this->sexo = $sexo;
    }
    public function getAlimentacao(){
        return $this->alimentacao;
    }
    public function setAlimentacao($alimentacao){
        $this->alimentacao = $alimentacao;
    }
}
class cachorro extends animal{
    private $raca;

    public function __construct($especie, $habitate, $sexo, $alimentacao, $raca) {
        parent::__construct($especie, $habitate, $sexo, $alimentacao);
        $this->setRaca($raca);
    }

    public function getRaca() {
        return $this->raca;
    }

    public function setRaca($raca) {
        $this->raca = $raca;
    }
}
class pangolim extends animal{
    private $n_escamas; 

    public function __construct($especie, $habitate, $sexo, $alimentacao, $n_escamas) {
        parent::__construct($especie, $habitate, $sexo, $alimentacao);
        $this->setn_escamas($n_escamas);
    }

    public function getn_escamas() {
        return $this->n_escamas;
    }

    public function setn_escamas($n_escamas) {
        $this->n_escamas = $n_escamas;
    }
}

class macaco extends animal{
    private $polegar;

    public function __construct($especie, $habitate, $sexo, $alimentacao, $polegar) {
        parent::__construct($especie, $habitate, $sexo, $alimentacao);
        $this->setPolegar($polegar);
    }

    public function getPolegar() {
        return $this->polegar;
    }

    public function setPolegar($polegar) {
        $this->polegar = $polegar;
    }
}
class gato extends animal{
    private $tipo_ronronamento;

    public function __construct($especie, $habitate, $sexo, $alimentacao, $tipo_ronronamento) {
        parent::__construct($especie, $habitate, $sexo, $alimentacao);
        $this->setTipo_ronronamento($tipo_ronronamento);
    }

    public function getTipo_ronronamento() {
        return $this->tipo_ronronamento;
    }

    public function setTipo_ronronamento($tipo_ronronamento) {
        $this->tipo_ronronamento = $tipo_ronronamento;
    }
}
?>
