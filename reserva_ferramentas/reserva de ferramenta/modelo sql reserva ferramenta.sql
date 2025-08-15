create database reserva_ferramentas;

create table deposito (
cod_deposito int auto_increment not null,
cod_ferramentas int auto_increment not null,
loc varchar (100) not null,
qtde varchar (1000)not null
);

create table ferramentas (
cod_ferramentas int auto_increment not null,
qtde varchar (1000) not null,
data_estoque datetime not null,
estado_ferrameta varchar (15) not null
);

create table funcionarios (
cod_funcionario int auto_increment not null,
nome_funcionario varchar (100) not null,
cpf_funcionario varchar (14) not null,
salario decimal (3,2) not null
);