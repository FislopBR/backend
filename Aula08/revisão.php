<?php
// Crie uma classe chamada Carro com os atributos privados marca e
// modelo.
// o Implemente os métodos setMarca, getMarca, setModelo e getModelo.
// o Crie um objeto da classe e use os setters para atribuir valores
// e os getters para exibir os dados.

class Carro {
    private $marca;
    private $modelo;

    public function __construct($marca, $modelo) {
        $this->marca = $marca;
        $this->modelo = $modelo;
    }

    public function setMarca($marca) {
        $this->marca = $marca;
    }

    public function getMarca() {
        return $this->marca;
    }

    public function setModelo($modelo) {
        $this->modelo = $modelo;
    }

    public function getModelo() {
        return $this->modelo;
    }
}

echo "marca: " . $carro->getMarca() . "modelo: " . $carro->getModelo();
?>
<?php
// Crie uma classe Pessoa com os atributos privados nome, idade e email.
// o Utilize os setters para preencher os dados de uma pessoa.
// o Em seguida, use os getters para exibir as informações dessa
// pessoa em formato de frase, por exemplo:

    class Pessoa {
        private $nome;
        private $idade;
        private $email;

        public function __construct($nome, $idade, $email) {
            $this->nome = $nome;
            $this->idade = $idade;
            $this->email = $email;
        }

        public function setNome($nome) {
            $this->nome = $nome;
        }

        public function getNome() {
            return $this->nome;
        }

        public function setIdade($idade) {
            $this->idade = $idade;
        }

        public function getIdade() {
            return $this->idade;
        }

        public function setEmail($email) {
            $this->email = $email;
        }

        public function getEmail() {
            return $this->email;
        }
    }

    echo "Meu nome é " . $pessoa->getNome() . ", tenho " . $pessoa->getIdade() . " anos e meu email é " . $pessoa->getEmail() . ".";
?>
<?php
// Crie uma classe Aluno com os atributos privados nome e nota.
// o No setNota, garanta que a nota só pode ser entre 0 e 10. Se o
// valor for inválido, armazene 0.
// o Teste criando alunos com notas válidas e inválidas, exibindo os
// resultados com getNota().

class Aluno {
    private $nome;
    private $nota;

    function __construct($nome, $nota) {
        $this->nome = $nome;
        $this->setNota($nota);
    }

    public function setNota($nota) {
        if ($nota >= 0 && $nota <= 10) {
            $this->nota = $nota;
        } else {
            $this->nota = 0;
        }
    }

    public function getNota() {
        return $this->nota;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

}

$aluno1 = new Aluno("João", 8);
$aluno2 = new Aluno("zé", 46);
$aluno3 = new Aluno("Maria", 9.5);

echo $aluno1->getNome() . " tem nota " . $aluno1->getNota()
?>
<?php
// Crie uma classe Produto com os atributos privados nome, preco e
// estoque.
// o Implemente os setters e getters.
// o Faça um objeto da classe e use os setters para definir os
// valores.
// o Exiba com os getters uma frase como:
// O produto X custa R$ Y e possui Z unidades em estoque.
class Produto {
    private $nome;
    private $preco;
    private $estoque;

    public function __construct($nome, $preco, $estoque) {
        $this->nome = $nome;
        $this->preco = $preco;
        $this->estoque = $estoque;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setPreco($preco) {
        $this->preco = $preco;
    }

    public function getPreco() {
        return $this->preco;
    }

    public function setEstoque($estoque) {
        $this->estoque = $estoque;
    }

    public function getEstoque() {
        return $this->estoque;
    }
}
echo "O produto " . $produto->getNome() . " custa R$ " . $produto->getPreco() . " e possui " . $produto->getEstoque() . " unidades em estoque.";
?>
<?php
// Crie uma classe Funcionario com os atributos privados nome e salario.
// o Crie métodos setNome, getNome, setSalario e getSalario.
// o Defina os valores de um funcionário com os setters.
// o Depois, altere o nome e o salário usando novamente os
// setters.
// o Mostre, com os getters, que os valores realmente foram
// modificados.

class Funcionario {
    private $nome;
    private $salario;

    public function __construct($nome, $salario) {
        $this->nome = $nome;
        $this->salario = $salario;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setSalario($salario) {
        $this->salario = $salario;
    }

    public function getSalario() {
        return $this->salario; 
    }
    }

    $funcionario = new Funcionario("Carlos", 2500);

    $funcionario->setNome("Carlos");
    $funcionario->setSalario(2500);

echo "Nome: " . $funcionario->getNome() . ", Salário: R$ " . $funcionario->getSalario();
$funcionario->setNome("Ana");
$funcionario->setSalario(3200);

echo "<br>Após alteração - Nome: " . $funcionario->getNome() . ", Salário: R$ " . $funcionario->getSalario();

echo "<br>Após nova alteração - Nome: " . $funcionario->getNome() . ", Salário: R$ " . $funcionario->getSalario();