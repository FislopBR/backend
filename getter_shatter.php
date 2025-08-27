<?php
class pessoa {
    private $nome;
    private $cpf;
    private $telefone;
    private $idade;
    private $email;

    public function __construct($nome, $cpf, $telefone, $idade, $email) {
        $this->setnome($nome);
        $this->setcpf($cpf);
        $this->settelefone($telefone);
        $this->setidade($idade);
        $this->email = $email;
    }

public function setnome($nome) {
  $this->nome = ucwords(strtolower($nome));
}
public function getnome () {
  return $this->nome;
}
public function setcpf($cpf) {
  $this->cpf = preg_replace('/\D/', '', $cpf);
}
public function getcpf () {
  return $this->cpf;
}
public function settelefone($telefone) {
  $this->telefone = preg_replace('/\D/', '', $telefone);
}
public function gettelefone () {
  return $this->telefone;
}
public function setidade($idade) {
  $this->idade = (int)$idade;
}
public function getidade () {
  return $this->idade;
}
}

$aluno1 = new pessoa("fILiPpO BraNDt bIdO dEllOsSo", "123.456.789-00", "(11) 91234-5678", 25, "filippo@example.com");

echo $aluno1->getnome();
?>