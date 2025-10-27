<?php

require_once "CRUD.php";
require_once "AlunoDAO.php";

$dao = new AlunoDAO(); // Objeto da classe Aluno DAO para testar métodos CRUD

// CREATE
$dao -> criarAlunos(new Aluno(1, "Josias", "Panificação"));

$dao -> criarAlunos(new Aluno(2, "Victor Hugo", "Manicure"));

$dao -> criarAlunos(new Aluno(3,"Beatriz", "Eletricista"));

$dao -> criarAlunos( new Aluno(4, "Aurora", "Arquitetura") );

$dao -> criarAlunos( new Aluno(5,"Oliver","Gestão") );

$dao -> criarAlunos( new Aluno(6,"Amanda","Luta") );

$dao -> criarAlunos( new Aluno(7,"Geysa","Engenharia") );

$dao -> criarAlunos( new Aluno(8, "Joab", "Eletrica") );

$dao -> criarAlunos( new Aluno(9, "Miguel", "Streamer") );

// READ
echo "\nListagem inicial:\n";
foreach ($dao->lerAlunos() as $aluno){
    echo "{$aluno->getId()} - {$aluno->getNome()} - {$aluno->getCurso()}\n";
}

// UPDATE
$dao->atualizarAlunos(1, "Jozias", "Técnico em Borracharia");

$dao -> atualizarAlunos(4,"clotilde","Arquitetura");

$dao -> atualizarAlunos(8, "Joana", "Eletrica");

$dao -> atualizarAlunos(9,"Miguel","Desinger");

$dao -> atualizarAlunos(6,"Amanda","Logistica");

$dao -> atualizarAlunos(5,"Oliver","Eletrica");

echo "\n Após atualização:\n";
foreach ($dao->lerAlunos() as $aluno){
    echo "{$aluno->getId()} - {$aluno->getNome()} - {$aluno->getCurso()}\n";
}

// DELETE
$dao->excluirAlunos(1); // Excluindo objeto $aluno2 --> id=1
$dao -> excluirAlunos(4);

echo "\n Após exclusão:\n ";
foreach ($dao->lerAlunos() as $aluno){
    echo "{$aluno->getId()} - {$aluno->getNome()} - {$aluno->getCurso()}\n";
}



