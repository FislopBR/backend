<?php

class AlunoDAO{ // Classe DAO (Data Access Object) para manipulação das funções do CRUD (create, read, update e delete)
    private $alunos = []; // Array $alunos para armazenamento temporário dos objetos a serem manipulados, antes de ser enviado ao banco de dados. Foi criado vazio inicialmente.

    public function criarAlunos(Aluno $aluno){ // método para criar um objeto no array alunos --> Create
        $this->alunos[$aluno->getId()] = $aluno;
    }

    public function lerAlunos(){ // método para ler os dados de um objeto já criado --> Read
        return $this->alunos;
    }
    public function atualizarAlunos($id, $novoNome, $novoCurso){ // método para atualizar os dados de um objeto já criado --> Update
        if(isset($this->alunos[$id])){
            $this->alunos[$id]->setNome($novoNome);
            $this->alunos[$id]->setCurso($novoCurso);
        }
    }
    public function excluirAlunos($id){ // método para excluir um objeto --> delete
        unset($this->alunos[$id]);
    }
}