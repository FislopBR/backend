-- criação do banco de dados
create database Plataforma_CursosOnline;

-- usando o banco de dados
use Plataforma_CursosOnline;

-- criando a tabela Alunos
CREATE TABLE Alunos (
    id INT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE, 
    data_nascimento DATE
);

-- criando a tabela Cursos
CREATE TABLE Cursos (
    id INT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    descricao TEXT,
    carga_horaria INT,
    status VARCHAR(50) CHECK (status IN ('ativo', 'inativo'))
);

-- criando a tabela Inscrições
CREATE TABLE Inscricoes (
    id INT PRIMARY KEY,
    aluno_id INT NOT NULL,
    curso_id INT NOT NULL,
    data_inscricao DATE NOT NULL,
    FOREIGN KEY (aluno_id) REFERENCES Alunos(id),
    FOREIGN KEY (curso_id) REFERENCES Cursos(id),
    UNIQUE (aluno_id, curso_id)
);

-- criando a tabela avaliações 
CREATE TABLE Avaliacoes (
    id INT PRIMARY KEY,
    inscricao_id INT UNIQUE NOT NULL,
    nota DECIMAL(3, 1) CHECK (nota >= 0.0 AND nota <= 10.0),
    comentario TEXT,
    FOREIGN KEY (inscricao_id) REFERENCES Inscricoes(id)
);

-- inserindo as informações nas tabelas
-- eu usei o select para ter certeza q o comando funcionou
insert into Alunos value (1, 'Marcio', 'marcio@gmail.com', '1998-3-22');
insert into Alunos value (2, 'Gercio', 'gercio@gmail.com', '1974-7-19');
insert into Alunos value (3, 'Rodrigo', 'Rodrigo@gmail.com', '2002-2-02');
insert into Alunos value (4, 'Leticia', 'Leticia@gmail.com', '1991-1-09');
insert into Alunos value (5, 'Sophia', 'Sopgia@gmail.com', '2011-4-29');
select * from Alunos;

insert into Cursos values (101, 'Introdução ao SQL', 'Fundamentos de Bancos de Dados.', 40, 'ativo');
insert into Cursos values (102, 'Desenvolvimento Web', 'Criação de aplicações web.', 120, 'ativo');
insert into Cursos values (103, 'Design Gráfico', 'Uso de ferramentas de design.', 60, 'inativo');
insert into Cursos values (104, 'Análise de Dados', 'Curso focado em estatística de dados.', 80, 'ativo');
insert into Cursos values (105, 'Segurança Cibernética', 'Conceitos de segurança.', 30, 'ativo');
select * from Cursos;

insert into Inscricoes value(1, 1, 101, '2023-08-10'); 
insert into Inscricoes value(2, 2, 102, '2023-08-15'); 
insert into Inscricoes value(3, 3, 104, '2023-09-01');
insert into Inscricoes value(4, 1, 105, '2023-09-10'); 
insert into Inscricoes value(5, 2, 101, '2023-09-20');
select * from Inscricoes;

insert into Avaliacoes value (1, 1, 9.5, 'avaliação com tempo maximo de 2h');
insert into Avaliacoes value (2, 2, 7.8, 'avaliação com tempo aximo de 1h');
insert into Avaliacoes value (3, 3, 10.0, 'avaliação com tempo maximo de 1:30h');
select * from Avaliacoes;

-- atualizando as tabelas usando oupdate
update Alunos set email = 'Letícia@gmail.com' where id = 4;
update Cursos set carga_horaria = '110' where id = 102;
update Alunos set nome = 'Letícia' where id = 4;
update Cursos set status = 'inativo' where id = 105;
update Avaliacoes set nota = '8.5'where id = 3;

-- deletando tabelas usando o omando delete
delete from Inscricoes
where id = 3;
delete from Cursos
where id = 103;
delete from Avaliacoes
where id = 1;
delete from Alunos
where id = 3;
delete from Inscricoes
where curso_id = 105;

-- exibindo tabelas usando o comando select
select * from Alunos;
select nome, email from Alunos;
select * from Cursos where carga_horaria > 30;
select * from Cursos where status = 'inativo';
select * from Alunos where data_nascimento < 1999-1-01;
select * from Avaliacoes where nota > 8;
select count(*) from Cursos;
select * from Cursos order by carga_horaria desc limit 3;
