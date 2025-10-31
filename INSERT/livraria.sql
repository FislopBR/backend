create database livraria;
use livraria;
create table usuarios (
id_usuario int primary key auto_increment,
nome varchar (100) not null,
email varchar (100) not null
);