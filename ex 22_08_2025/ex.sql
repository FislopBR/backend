create database esquema_relacional;
use esquema_relacional;

create table fornecedor(
Fcodigo int not null,
fnome varchar (100) not null,
St4tus varchar (8) default 'ativo' not null,
Cidade varchar (100) not null
);

create table peca (
Pcodigo int not null,
Pnome varchar (100) not null,
Cor varchar (255) not null,
Peso varchar (5) not null,
Cidade varchar (100) not null
);

create table instituicao(
Icodigo int not null,
Inome varchar (100)
);

create table Projeto(
PRcod int not null,
PRnome varchar (100) not null,
Cidade varchar(100) not null
#icod
);

create table fronecimento(
#Fcod
#Pcod
#PRcod
quantidade varchar (12)
);

-- alterações

create table cidade(
Ccod int not null,
Cnome varchar (100) not null,
uf varchar (2) not null
);

alter table peca
change Pcodigo Pcod int not null;

drop table instituicao;

alter table projeto
drop column Cidade
