create database oficina_mecanica;
use oficina_mecanica;

create table cliente (
    id_cliente int auto_increment primary key,
    nome_cli varchar (100) not null,
    cpf varchar(100) not null, 
    ende_cli varchar(200)not null,
    cell_cli varchar(15)not null
);

create table funcionario (
    id_func int auto_increment primary key,
    nome_func varchar(100) not null,
    cpf varchar(14) not null,
    cargo varchar(50),
    cell_func varchar(15)
);

create table peca (
    id_peca int auto_increment primary key,
    nome_peca varchar(100) not null,
    desc_peca varchar(255) not null,
    num_peca varchar(50) not null,
    valor_unitario decimal(10, 2) not null,
    qtde_estoque int not null default 0
);

create table carro (
    id_carro int auto_increment primary key,
    id_cliente int not null,
    placa varchar(8) not null,
    marca varchar(50) not null,
    modelo varchar(50) not null,
    num_chassi varchar(17) not null,
    
    foreign key (id_cliente) references cliente(id_cliente)
);

create table ordem_de_servico (
    id_os int auto_increment primary key,
    id_cliente int not null,
    id_carro int not null,    
    desc_problema varchar(250) not null,
    status_os varchar(120) not null default 'Aberto',
    prazo date,
    valor_total decimal(10, 2) default 0.00,
    
    foreign key (id_cliente) references cliente(id_cliente),
    foreign key (id_carro) references carro(id_carro)
);