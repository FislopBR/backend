create database REMOTERC;
use REMOTERC;

create table Produtos(
CProd int not null not null,
Descrição varchar (200) not null,
Peso varchar (10) not null,
ValorUnit decimal not null
);

create table Vendedor( 
Cvend int not null,
Nome varchar (100) not null,
salario decimal not null,
Fsalario decimal not null
);

create table Cliente(
Ccli int not null,
Nome varchar (100) not null,
endereço varchar (100) not null,
Cidede varchar (100) not null,
uf varchar (2) default 'SP'
);

drop table
Produtos;

insert into Produtos value (CProd, Descrição, Peso, ValorUnit);

insert into Produtos value (1, 'teclado', 'kg', 35.00);
insert into Produtos value (2, 'mouse' , 'kg', 25.00);
insert into Produtos value (3, 'hd', 'kg', 350.00);

insert into Vendedor value (Cvend, Nome, Salario, Fsalario);

insert into Vendedor value (1 ,'Ronaldo',3512.00, 1);
insert into Vendedor value (2 ,'Robertson',3225.00, 2);
insert into Vendedor value (3 ,'Clodoaldo',4350.00, 3);

insert into Cliente value(Ccli, Nome, endereço, Cidede, uf);

insert into Cliente value(11, 'Bruno', 'Rua 1 456', 'Rio Claro', 'SP');
insert into Cliente value(12, 'Cláudio', 'Rua quadrada 234', 'Campnas', 'SP');
insert into Cliente value(13,'Cremilda', 'Rua das flores 777', 'São Paulo', 'SP');
