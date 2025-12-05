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

CREATE TABLE os_funcionario (
    id_os_func INT AUTO_INCREMENT PRIMARY KEY,
    id_os INT NOT NULL,
    id_func INT NOT NULL,
    FOREIGN KEY (id_os) REFERENCES ordem_de_servico(id_os),
    FOREIGN KEY (id_func) REFERENCES funcionario(id_func)
);

CREATE TABLE os_peca (
    id_os_peca INT AUTO_INCREMENT PRIMARY KEY,
    id_os INT NOT NULL,
    id_peca INT NOT NULL,
    quantidade_usada INT NOT NULL,
    FOREIGN KEY (id_os) REFERENCES ordem_de_servico(id_os),
    FOREIGN KEY (id_peca) REFERENCES peca(id_peca)
);

-- Adicionando a tabela de 'servico'
CREATE TABLE servico (
    id_servico INT AUTO_INCREMENT PRIMARY KEY,
    nome_servico VARCHAR(100) NOT NULL,
    valor_servico DECIMAL(10, 2)
);

-- Adicionando a tabela de relacionamento entre Ordem de Serviço e Serviço
CREATE TABLE os_servico (
    id_os_servico INT AUTO_INCREMENT PRIMARY KEY,
    id_os INT NOT NULL,
    id_servico INT NOT NULL,
    FOREIGN KEY (id_os) REFERENCES ordem_de_servico(id_os),
    FOREIGN KEY (id_servico) REFERENCES servico(id_servico)
);

-- ////////////////////inserts//////////////////// --

-- 1. Inserts para a tabela 'cliente'
INSERT INTO cliente (nome_cli, cpf, ende_cli, cell_cli) VALUES
('João da Silva', '111.111.111-11', 'Rua A, 100, Bairro Centro', '(11) 98765-4321'),
('Maria Oliveira', '222.222.222-22', 'Av. Principal, 50, Bairro Jardim', '(11) 91234-5678'),
('Pedro Souza', '333.333.333-33', 'Rua B, 25, Bairro Industrial', '(19) 99887-7665'),
('Ana Costa', '444.444.444-44', 'Alameda dos Anjos, 300, Bairro Vila Nova', '(19) 97766-5544'),
('Carlos Pereira', '555.555.555-55', 'Estrada Velha, 10, Zona Rural', '(15) 96655-4433');

-- 2. Inserts para a tabela 'funcionario'
INSERT INTO funcionario (nome_func, cpf, cargo, cell_func) VALUES
('Roberto Santos', '123.456.789-00', 'Mecânico Chefe', '(11) 98765-1111'),
('Fernanda Lima', '098.765.432-11', 'Auxiliar Administrativo', '(11) 91234-2222'),
('Gustavo Rocha', '102.030.405-22', 'Mecânico Eletricista', '(19) 99887-3333'),
('Patrícia Gomes', '112.233.445-33', 'Atendente', '(19) 97766-4444'),
('Ricardo Alves', '998.877.665-44', 'Mecânico Geral', '(15) 96655-5555');

-- 3. Inserts para a tabela 'peca'
INSERT INTO peca (nome_peca, desc_peca, num_peca, valor_unitario, qtde_estoque) VALUES
('Filtro de Óleo', 'Filtro para motor 1.0/1.4', 'FO-12345', 25.50, 50),
('Pastilha de Freio', 'Jogo de pastilhas dianteiras', 'PF-67890', 89.90, 30),
('Vela de Ignição', 'Vela de ignição padrão', 'VI-11223', 15.00, 100),
('Correia Dentada', 'Correia dentada 107 dentes', 'CD-44556', 150.75, 20),
('Pneu Aro 15', 'Pneu 185/65 R15', 'PN-78901', 350.00, 10);

-- 4. Inserts para a tabela 'carro' (Nota: id_cliente deve existir na tabela cliente)
INSERT INTO carro (id_cliente, placa, marca, modelo, num_chassi) VALUES
(1, 'ABC-1234', 'Fiat', 'Palio', '9BD12345678901234'),
(2, 'DEF-5678', 'VW', 'Gol', '9BW98765432109876'),
(3, 'GHI-9012', 'Ford', 'Ka', '9BF24680135790246'),
(1, 'JKL-3456', 'GM', 'Onix', '9BG13579246801357'),
(4, 'MNO-7890', 'Hyundai', 'HB20', '9BH02468135792468');

-- 5. Inserts para a tabela 'ordem_de_servico' (Nota: id_cliente e id_carro devem existir)
INSERT INTO ordem_de_servico (id_cliente, id_carro, desc_problema, status_os, prazo, valor_total) VALUES
(1, 1, 'Troca de óleo e filtros. Suspeita de barulho na suspensão.', 'Em Andamento', '2025-12-10', 0.00),
(2, 2, 'O carro está falhando e não pega de primeira. Necessário revisão elétrica.', 'Aguardando Peças', '2025-12-15', 0.00),
(3, 3, 'Vazamento de água no motor. Necessário verificar mangueiras.', 'Aberto', '2025-12-08', 0.00),
(1, 4, 'Revisão geral de 30.000 km.', 'Concluído', '2025-11-20', 450.00),
(4, 5, 'Freio fazendo barulho. Troca de pastilhas e verificação de discos.', 'Em Andamento', '2025-12-12', 0.00);

INSERT INTO os_funcionario (id_os, id_func) VALUES
(1, 1), -- OS 1 executada por id_func 1 (Mecânico Chefe)
(3, 3), -- OS 3 executada por id_func 3 (Mecânico Eletricista)
(4, 1), -- OS 4 executada por id_func 1
(5, 3), -- OS 5 executada por id_func 3
(6, 1); -- OS 6 executada por id_func 1 (nova OS)

INSERT INTO ordem_de_servico (id_cliente, id_carro, desc_problema, status_os, prazo, data_abertura) VALUES
(2, 2, 'Troca de pneus e balanceamento.', 'Concluído', '2025-11-25', '2025-11-20');

INSERT INTO ordem_de_servico (id_os, id_cliente, id_carro, desc_problema, status_os, data_abertura) VALUES
(105, 1, 1, 'Revisão completa.', 'Em Execução', DATE_SUB(CURRENT_DATE(), INTERVAL 10 DAY));

INSERT INTO ordem_de_servico (id_cliente, id_carro, desc_problema, status_os, data_abertura) VALUES
(2, 2, 'Verificar vazamento de óleo no câmbio.', 'Em Execução', DATE_SUB(CURRENT_DATE(), INTERVAL 45 DAY));

-- Insere uma OS com ID 50 e ID 75 
INSERT INTO ordem_de_servico (id_os, id_cliente, id_carro, desc_problema, status_os, data_abertura) VALUES
(50, 1, 1, 'Troca de óleo urgente.', 'Em Execução', '2025-11-28'),
(75, 2, 2, 'Reparo no motor.', 'Aberto', '2025-11-25')
ON DUPLICATE KEY UPDATE desc_problema = VALUES(desc_problema);

-- Inserts para a tabela os_peca (Simulando peças usadas na OS de ID 50)
INSERT INTO os_peca (id_os, id_peca, quantidade_usada) VALUES
(50, 1, 1), -- 1 Filtro de Óleo
(50, 3, 4); -- 4 Velas de Ignição

-- Inserts para a tabela os_funcionario (Simulando mecânicos que trabalharam na OS de ID 75)
-- Assumindo id_func 1 (Roberto Santos) e 5 (Ricardo Alves)
INSERT INTO os_funcionario (id_os, id_func) VALUES
(75, 1),
(75, 5);

-- Insere um novo serviço
INSERT INTO servico (nome_servico, valor_servico) VALUES
('Troca de Óleo', 80.00),
('Alinhamento e Balanceamento', 120.00),
('Diagnóstico Motor', 150.00),
('Revisão Freios', 100.00),
('Funilaria Leve', 500.00);

-- Insere um relacionamento na os_servico (simulando serviços executados)
INSERT INTO os_servico (id_os, id_servico) VALUES
(1, 1), -- OS 1 teve Troca de Óleo
(1, 4), -- OS 1 teve Revisão Freios
(5, 4); -- OS 5 teve Revisão Freios

-- Insere um mecânico que ainda não trabalhou em nenhuma OS (para testar o INNER JOIN)
INSERT INTO funcionario (nome_func, cpf, cargo, cell_func) VALUES
('Helena Dias', '888.888.888-88', 'Aprendiz', '(11) 95555-5555');

-- Insere uma nova OS com ID 100
INSERT INTO ordem_de_servico (id_os, id_cliente, id_carro, desc_problema, status_os, data_abertura, data_conclusao) VALUES
(100, 1, 1, 'Manutenção preventiva e troca de embreagem.', 'Concluída', '2025-11-15', '2025-11-18')
ON DUPLICATE KEY UPDATE desc_problema = VALUES(desc_problema);

-- Simulação de Serviços para OS 100: (id_servico 1: Troca de Óleo, id_servico 3: Diagnóstico Motor)
INSERT INTO os_servico (id_os, id_servico, preco_cobrado) VALUES
(100, 1, 90.00),  -- Mão de obra Troca de Óleo
(100, 3, 160.00); -- Mão de obra Diagnóstico Motor

-- Simulação de Peças para OS 100: (id_peca 1: Filtro de Óleo, id_peca 2: Pastilha de Freio)
INSERT INTO os_peca (id_os, id_peca, quantidade_usada, preco_unitario_cobrado) VALUES
(100, 1, 1, 55.00), -- 1 Filtro de Óleo a R$ 55,00
(100, 2, 2, 95.00); -- 2 Pastilhas de Freio a R$ 95,00 cada

-- ////////////////////select//////////////////// --
-- 1. Selecione todos os veículos cadastrados que são da marca "Ford".
SELECT placa, modelo, num_chassi
FROM carro
WHERE marca = 'Ford';

-- 2. Liste todos os clientes que abriram uma Ordem de Serviço (OS) nos últimos 6 meses.
SELECT DISTINCT c.nome_cli, c.cpf, os.data_abertura
FROM cliente c
JOIN ordem_de_servico os ON c.id_cliente = os.id_cliente
WHERE os.data_abertura >= DATE_SUB(CURRENT_DATE(), INTERVAL 6 MONTH)
ORDER BY os.data_abertura DESC;

ALTER TABLE ordem_de_servico ADD COLUMN data_abertura DATE NOT NULL DEFAULT (CURRENT_DATE());

-- 3. Mostre os mecânicos que possuem a especialidade "Mecânico Eletricista".
SELECT nome_func, cargo, cell_func
FROM funcionario
WHERE cargo = 'Mecânico Eletricista';

-- 4. Exiba todas as Ordens de Serviço (OS) que estão com o status "Aguardando Peças".
SELECT id_os, desc_problema, status_os, prazo
FROM ordem_de_servico
WHERE status_os = 'Aguardando Peças';

-- 5. Liste as peças (tabela Pecas) cujo estoque (qtde_estoque) está abaixo de 5 unidades.
SELECT nome_peca, num_peca, qtde_estoque
FROM peca
WHERE qtde_estoque < 5;

	-- 6. Escreva uma consulta para encontrar os veículos que já tiveram mais de uma Ordem de Serviço (retornaram à oficina) --
SELECT c.placa, c.marca, c.modelo
FROM carro c
WHERE (
    SELECT COUNT(os.id_os)
    FROM ordem_de_servico os
    WHERE os.id_carro = c.id_carro
) > 1;

-- 7. Identifique as Ordens de Serviço que foram executadas por um mecânico específico (ex: id_func = 3). --
SELECT os.id_os, os.desc_problema, os.status_os, f.nome_func AS Mecanico
FROM ordem_de_servico os
JOIN os_funcionario osf ON os.id_os = osf.id_os
JOIN funcionario f ON osf.id_func = f.id_func
WHERE f.id_func = 3; -- Filtra pelo id_func (Gustavo Rocha)

-- (Desafio) Liste o nome e o preco_venda de todas as peças cujo preco_custo é superior a R$ 200,00.
SELECT nome_peca, valor_unitario AS preco_venda
FROM peca
WHERE preco_custo > 200.00;
-- ////////////////////alter table//////////////////// --

ALTER TABLE peca ADD COLUMN preco_custo DECIMAL(10, 2);

-- Adicionando colunas necessárias na tabela 'peca'
ALTER TABLE peca ADD COLUMN fabricante VARCHAR(100);

-- Adicionando colunas necessárias na tabela 'ordem_de_servico'
ALTER TABLE ordem_de_servico ADD COLUMN data_abertura DATE NOT NULL DEFAULT (CURRENT_DATE());
ALTER TABLE ordem_de_servico ADD COLUMN data_conclusao DATE;

-- Adicione uma nova coluna email (tipo VARCHAR(100)) à tabela Clientes.
ALTER TABLE cliente
ADD COLUMN email VARCHAR(100);

-- Modifique o tipo de dados da coluna cargo (que será usada como especialidade)
ALTER TABLE funcionario
MODIFY COLUMN cargo VARCHAR(150);

-- Remova uma coluna da tabela Ordens_de_Servico.
ALTER TABLE ordem_de_servico
DROP COLUMN diagnostico_entrada;

-- Adicionando 'preco_cobrado' na tabela os_servico
ALTER TABLE os_servico ADD COLUMN preco_cobrado DECIMAL(10, 2) NOT NULL DEFAULT 0.00;

-- Adicionando 'preco_unitario_cobrado' na tabela os_peca (que usaremos no cálculo)
-- A coluna 'quantidade_usada' já existe.
ALTER TABLE os_peca ADD COLUMN preco_unitario_cobrado DECIMAL(10, 2) NOT NULL DEFAULT 0.00;

-- ////////////////////update//////////////////// -- 
UPDATE ordem_de_servico SET data_abertura = DATE_SUB(CURRENT_DATE(), INTERVAL 2 MONTH) WHERE id_os = 1; -- 2 meses atrás
UPDATE ordem_de_servico SET data_abertura = DATE_SUB(CURRENT_DATE(), INTERVAL 7 MONTH) WHERE id_os = 2; -- 7 meses atrás (não deve aparecer)
UPDATE ordem_de_servico SET data_abertura = DATE_SUB(CURRENT_DATE(), INTERVAL 1 MONTH) WHERE id_os = 3; -- 1 mês atrás
UPDATE ordem_de_servico SET data_abertura = DATE_SUB(CURRENT_DATE(), INTERVAL 3 MONTH) WHERE id_os = 4; -- 3 meses atrás
UPDATE ordem_de_servico SET data_abertura = DATE_SUB(CURRENT_DATE(), INTERVAL 5 MONTH) WHERE id_os = 5; -- 5 meses atrás

UPDATE peca SET qtde_estoque = 3 WHERE id_peca = 3; -- Vela de Ignição agora com 3 em estoque

UPDATE peca SET preco_custo = 15.00 WHERE id_peca = 1; -- Filtro de Óleo
UPDATE peca SET preco_custo = 60.00 WHERE id_peca = 2; -- Pastilha de Freio
UPDATE peca SET preco_custo = 5.00 WHERE id_peca = 3; -- Vela de Ignição
UPDATE peca SET preco_custo = 210.00 WHERE id_peca = 4; -- Correia Dentada (custo > R$ 200,00)
UPDATE peca SET preco_custo = 280.00 WHERE id_peca = 5; -- Pneu Aro 15 (custo > R$ 200,00)

-- Atualiza algumas peças com o fabricante "Bosch" e outros, e ajusta o valor unitário (preço de venda)
UPDATE peca SET fabricante = 'Bosch', valor_unitario = 50.00 WHERE id_peca = 1;  -- Filtro de Óleo (Bosch)
UPDATE peca SET fabricante = 'Frasle', valor_unitario = 89.90 WHERE id_peca = 2; -- Pastilha de Freio (Frasle)
UPDATE peca SET fabricante = 'Bosch', valor_unitario = 15.00 WHERE id_peca = 3;  -- Vela de Ignição (Bosch)
UPDATE peca SET fabricante = 'Continental', valor_unitario = 150.75 WHERE id_peca = 4;
UPDATE peca SET fabricante = 'Pirelli', valor_unitario = 350.00 WHERE id_peca = 5;

-- Atualize o preco_venda (valor_unitario) de todas as peças do fabricante "Bosch", aplicando um aumento de 5%.
UPDATE peca
SET valor_unitario = valor_unitario * 1.05
WHERE fabricante = 'Bosch';

-- Modifique o status da Ordem de Serviço de ID 105 de "Em Execução" para "Concluída".
UPDATE ordem_de_servico
SET status_os = 'Concluída',
    data_conclusao = CURRENT_DATE()
WHERE id_os = 105
AND status_os = 'Em Execução';

-- Atualize a data_conclusao de todas as Ordens de Serviço que ainda estão "Em Execução"
UPDATE ordem_de_servico
SET data_conclusao = CURRENT_DATE(),
    status_os = 'Concluída' 
WHERE status_os = 'Em Execução'
AND data_abertura < DATE_SUB(CURRENT_DATE(), INTERVAL 30 DAY);

-- (Desafio) Dobre a quantidade em estoque (qtde_estoque) da peça com id_peca = 20.
UPDATE peca
SET qtde_estoque = qtde_estoque * 2
WHERE id_peca = 20;

-- Atualiza carros de um cliente para a marca "VW" (Volkswagen)
UPDATE carro SET marca = 'Volkswagen' WHERE id_carro = 2;

-- Atualiza OSs concluídas para simular o tempo de abertura
UPDATE ordem_de_servico SET data_conclusao = data_abertura + INTERVAL 5 DAY WHERE id_os = 4; -- 5 dias
UPDATE ordem_de_servico SET data_conclusao = data_abertura + INTERVAL 3 DAY WHERE id_os = 5; -- 3 dias
UPDATE ordem_de_servico SET data_conclusao = data_abertura + INTERVAL 8 DAY WHERE id_os = 105; -- 8 dias

-- ////////////////////joins//////////////////// --

-- Liste todas as Ordens de Serviço, incluindo o nome do cliente, a placa do veículo e a data de abertura da OS.
SELECT
    os.id_os,
    c.nome_cli AS Cliente,
    cr.placa AS Placa_Veiculo,
    os.data_abertura
FROM ordem_de_servico os
JOIN cliente c ON os.id_cliente = c.id_cliente
JOIN carro cr ON os.id_carro = cr.id_carro
ORDER BY os.data_abertura DESC;

-- Mostre todas as peças usadas na OS de ID 50, incluindo o nome da peça (da tabela peca) e a quantidade_usada (da tabela os_peca).
SELECT
    os.id_os AS OS_ID,
    p.nome_peca AS Nome_da_Peca,
    osp.quantidade_usada AS Quantidade_Usada
FROM ordem_de_servico os
JOIN os_peca osp ON os.id_os = osp.id_os
JOIN peca p ON osp.id_peca = p.id_peca
WHERE os.id_os = 50;

-- Exiba os nomes dos mecânicos que trabalharam na OS de ID 75 (consultando funcionario e os_funcionario).
SELECT
    os.id_os AS OS_ID,
    f.nome_func AS Nome_do_Mecanico,
    f.cargo
FROM ordem_de_servico os
JOIN os_funcionario osf ON os.id_os = osf.id_os
JOIN funcionario f ON osf.id_func = f.id_func
WHERE os.id_os = 75;

-- (Desafio) Liste todos os veículos (placa e modelo) cadastrados e o nome do seu respectivo proprietário (cliente).
SELECT
    cr.placa AS Placa,
    cr.modelo AS Modelo,
    c.nome_cli AS Proprietario
FROM carro cr
JOIN cliente c ON cr.id_cliente = c.id_cliente
ORDER BY c.nome_cli, cr.placa;

-- ////////////////////inner joins//////////////////// --

-- Liste a placa e o modelo dos veículos que estão atualmente com uma OS "Em Execução".
SELECT
    c.placa,
    c.modelo
FROM carro c
INNER JOIN ordem_de_servico os ON c.id_carro = os.id_carro
WHERE os.status_os = 'Em Execução';

-- Mostre o nome dos clientes que possuem veículos da marca “Volkswagen".
SELECT DISTINCT
    cli.nome_cli
FROM cliente cli
INNER JOIN carro c ON cli.id_cliente = c.id_cliente
WHERE c.marca = 'Volkswagen';

-- Exiba os nomes dos mecânicos que já trabalharam em pelo menos uma Ordem de Serviço (ou seja, que aparecem na tabela os_funcionario).
-- O INNER JOIN garante que apenas funcionários com correspondência na tabela de relacionamento sejam listados.
SELECT DISTINCT
    f.nome_func,
    f.cargo
FROM funcionario f
INNER JOIN os_funcionario osf ON f.id_func = osf.id_func
ORDER BY f.nome_func;

-- (Desafio) Liste apenas os nomes dos serviços (da tabela servico) que já foram executados (ou seja, que aparecem na tabela os_servico).
SELECT DISTINCT
    s.nome_servico
FROM servico s
INNER JOIN os_servico oss ON s.id_servico = oss.id_servico
ORDER BY s.nome_servico;

-- ////////////////////left joins//////////////////// --

-- Liste todos os clientes cadastrados e, para aqueles que já tiveram OS, mostre os IDs das ordens.
SELECT
    c.nome_cli AS Cliente,
    os.id_os AS ID_Ordem_Servico,
    os.status_os
FROM cliente c
LEFT JOIN ordem_de_servico os ON c.id_cliente = os.id_cliente
ORDER BY c.nome_cli, os.id_os;

-- Mostre todos os mecânicos e a quantidade de Ordens de Serviço em que cada um trabalhou.
-- Mecânicos que nunca trabalharam em uma OS (novatos) devem aparecer com contagem 0.
SELECT
    f.nome_func AS Mecanico,
    f.cargo,
    COUNT(osf.id_os) AS Total_OS_Trabalhadas
FROM funcionario f
-- LEFT JOIN com a tabela de relacionamento OS_Funcionário
LEFT JOIN os_funcionario osf ON f.id_func = osf.id_func
-- Filtrando para incluir apenas quem tem cargo de mecânico/eletricista (opcional, mas recomendado)
WHERE f.cargo LIKE '%Mecânico%' OR f.cargo LIKE '%Eletricista%' OR f.cargo = 'Aprendiz'
GROUP BY f.id_func, f.nome_func, f.cargo
ORDER BY Total_OS_Trabalhadas DESC, f.nome_func;

-- Exiba todas as peças cadastradas e, se houver, a quantidade total vendida de cada uma (somando de os_peca).
-- Peças que nunca foram vendidas devem aparecer (com a soma como NULL/0).
SELECT
    p.nome_peca AS Peca,
    p.num_peca AS Codigo,
    p.qtde_estoque AS Estoque_Atual,
    -- COALESCE substitui NULL por 0 se a peça nunca foi vendida.
    COALESCE(SUM(osp.quantidade_usada), 0) AS Quantidade_Total_Vendida
FROM peca p
-- LEFT JOIN com a tabela de relacionamento OS_Peça
LEFT JOIN os_peca osp ON p.id_peca = osp.id_peca
GROUP BY p.id_peca, p.nome_peca, p.num_peca, p.qtde_estoque
ORDER BY Quantidade_Total_Vendida DESC, p.nome_peca;

-- (Desafio) Liste todos os veículos e a data da última OS aberta para cada um.
-- Veículos que nunca tiveram uma OS devem aparecer com a data nula.
SELECT
    cr.placa AS Placa,
    cr.modelo AS Modelo,
    c.nome_cli AS Proprietario,
    -- MAX(data_abertura) retorna a data mais recente.
    MAX(os.data_abertura) AS Data_Ultima_OS
FROM carro cr
LEFT JOIN ordem_de_servico os ON cr.id_carro = os.id_carro
LEFT JOIN cliente c ON cr.id_cliente = c.id_cliente
GROUP BY cr.id_carro, cr.placa, cr.modelo, c.nome_cli
ORDER BY cr.placa;

-- ////////////////////right joins//////////////////// --

-- Liste todas as Ordens de Serviço e o nome do cliente correspondente.
-- O RIGHT JOIN garante que todas as OSs (tabela da direita) apareçam.
SELECT
    os.id_os AS ID_Ordem_Servico,
    os.data_abertura,
    c.nome_cli AS Cliente,
    os.status_os
FROM cliente c
RIGHT JOIN ordem_de_servico os ON c.id_cliente = os.id_cliente
ORDER BY os.id_os;

-- Mostre todos os serviços e os IDs das OS onde eles foram usados.
SELECT
    s.nome_servico AS Servico,
    oss.id_os AS ID_Ordem_Servico
FROM os_servico oss
RIGHT JOIN servico s ON oss.id_servico = s.id_servico
ORDER BY s.nome_servico, oss.id_os;

-- Exiba todos os itens da tabela os_funcionario e traga o nome completo do mecânico da tabela funcionario.
SELECT
    osf.id_os AS ID_Ordem_Servico,
    f.nome_func AS Nome_do_Mecanico,
    f.cargo
FROM os_funcionario osf
RIGHT JOIN funcionario f ON osf.id_func = f.id_func
WHERE osf.id_os IS NOT NULL
ORDER BY f.nome_func;

-- (Desafio) Liste todos os veículos (carro, direita) e as OS associadas (ordem_de_servico, esquerda).
SELECT
    c.placa AS Placa,
    c.modelo AS Modelo,
    os.id_os AS ID_Ordem_Servico,
    os.status_os
FROM ordem_de_servico os
RIGHT JOIN carro c ON os.id_carro = c.id_carro
ORDER BY c.placa, os.id_os;

-- ////////////////////subqueries//////////////////// --

-- Escreva uma consulta para encontrar os clientes que já abriram mais de 3 Ordens de Serviço.
SELECT
    c.nome_cli,
    c.cpf
FROM cliente c
WHERE c.id_cliente IN (
    -- Subconsulta: Encontra os IDs dos clientes que têm mais de 3 OS
    SELECT
        id_cliente
    FROM ordem_de_servico
    GROUP BY id_cliente
    HAVING COUNT(id_os) > 3
);

-- Identifique as peças (nome da peça) que foram utilizadas na mesma Ordem de Serviço do mecânico com ID 4.
-- Nota: Como o ID 4 é de "Ana Costa" (cliente) ou "Patrícia Gomes" (atendente) nas inserções anteriores,
-- vou usar o ID 1 ("Roberto Santos" - Mecânico Chefe) para simular um mecânico.

SELECT
    p.nome_peca
FROM peca p
WHERE p.id_peca IN (
    SELECT
        osp.id_peca
    FROM os_peca osp
    WHERE osp.id_os IN (
        SELECT
            osf.id_os
        FROM os_funcionario osf
        WHERE osf.id_func = 1
    )
);

-- Liste os veículos (placa e modelo) que nunca tiveram uma Ordem de Serviço (use NOT IN).
SELECT
    cr.placa,
    cr.modelo
FROM carro cr
WHERE cr.id_carro NOT IN (
    SELECT DISTINCT
        id_carro
    FROM ordem_de_servico
);

-- Usando NOT EXISTS (Alternativa mais performática em muitos SGBDs)
SELECT
    cr.placa,
    cr.modelo
FROM carro cr
WHERE NOT EXISTS (
    SELECT 1
    FROM ordem_de_servico os
    WHERE os.id_carro = cr.id_carro
);

-- (Desafio) Encontre os serviços cujo preco_mao_obra (valor_servico) é maior que o preço médio de todos os serviços.

SELECT
    s.nome_servico,
    s.valor_servico AS Preco_Mao_Obra
FROM servico s
WHERE s.valor_servico > (
    SELECT
        AVG(valor_servico)
    FROM servico
)
ORDER BY s.valor_servico DESC;

-- ////////////////////agregação//////////////////// --

-- Calcule o faturamento total (serviços + peças) de uma OS específica (ex: ID 100).
SELECT
    (
        -- Total de Serviços
        SELECT COALESCE(SUM(preco_cobrado), 0)
        FROM os_servico
        WHERE id_os = 100
    )
    +
    (
        -- Total de Peças (Valor Unitário Cobrado * Quantidade Usada)
        SELECT COALESCE(SUM(preco_unitario_cobrado * quantidade_usada), 0)
        FROM os_peca
        WHERE id_os = 100
    ) AS Faturamento_Total_OS_100;
    
    -- Determine o tempo médio (em dias) que as Ordens de Serviço ficam abertas.
SELECT
    AVG(DATEDIFF(data_conclusao, data_abertura)) AS Tempo_Medio_Abertura_Dias
FROM ordem_de_servico
WHERE data_conclusao IS NOT NULL
AND status_os = 'Concluída';

-- ////////////////////agregação simples//////////////////// --

-- Calcule o número total de veículos cadastrados na oficina.
SELECT
    COUNT(id_carro) AS Total_Veiculos_Cadastrados
FROM carro;

-- Determine o valor total do inventário (estoque) (soma de qtde_estoque * preco_custo de todas as peças).
SELECT
    -- COALESCE garante que, se o resultado da multiplicação for NULL por algum motivo, ele seja tratado como 0.
    COALESCE(SUM(qtde_estoque * preco_custo), 0.00) AS Valor_Total_Inventario
FROM peca;

-- Encontre o preço médio da mão de obra de todos os serviços (tabela Servicos, coluna valor_servico).
SELECT
    AVG(valor_servico) AS Preco_Medio_Mao_Obra
FROM servico;

-- ////////////////////agregação com agrupamento//////////////////// --

-- Agrupe os veículos por marca e conte quantos veículos de cada marca a oficina atende.
SELECT
    marca AS Marca_Veiculo,
    COUNT(id_carro) AS Total_Veiculos
FROM carro
GROUP BY marca
ORDER BY Total_Veiculos DESC, Marca_Veiculo;

-- Determine o número de Ordens de Serviço abertas por mês (agrupando por MONTH(data_abertura)).
SELECT
    -- MONTHNAME() pode ser usado para exibir o nome do mês (depende da configuração do SGBD)
    YEAR(data_abertura) AS Ano,
    MONTH(data_abertura) AS Mes_Numero,
    COUNT(id_os) AS Total_OS_Abertas
FROM ordem_de_servico
GROUP BY Ano, Mes_Numero
ORDER BY Ano DESC, Mes_Numero DESC;

-- Conte quantas OS cada status possui atualmente (agrupando por status).
SELECT
    status_os AS Status_Atual,
    COUNT(id_os) AS Quantidade_OS
FROM ordem_de_servico
GROUP BY status_os
ORDER BY Quantidade_OS DESC, Status_Atual;

-- ////////////////////agregação com filtros//////////////////// --

-- Calcule o número total de OS que estão com o status "Concluído".
SELECT
    COUNT(id_os) AS Total_OS_Concluidas
FROM ordem_de_servico
WHERE status_os = 'Concluído';

-- Determine o faturamento total (peças + serviços) apenas dos veículos da marca "Fiat" no último ano.
SELECT
    COALESCE(SUM(OSpeca.preco_unitario_cobrado * OSpeca.quantidade_usada), 0) +
    COALESCE(SUM(OServico.preco_cobrado), 0) AS Faturamento_Total_Fiat
FROM ordem_de_servico OS
JOIN carro C ON OS.id_carro = C.id_carro
LEFT JOIN os_peca OSpeca ON OS.id_os = OSpeca.id_os
LEFT JOIN os_servico OServico ON OS.id_os = OServico.id_os
WHERE
    C.marca = 'Fiat'
    AND OS.data_abertura >= DATE_SUB(CURRENT_DATE(), INTERVAL 1 YEAR);
    
    -- Encontre o preço médio da mão de obra apenas dos serviços na especialidade "Motor".
SELECT
    AVG(valor_servico) AS Preco_Medio_Mao_Obra_Motor
FROM servico
WHERE
    nome_servico LIKE '%Motor%';
    
    -- ////////////////////agregação com condições complexas//////////////////// --
    
    -- Encontre os id_cliente dos clientes que já gastaram (soma total em OS) mais de R$ 5.000,00 na oficina.
SELECT
    id_cliente,
    SUM(valor_total) AS Total_Gasto
FROM ordem_de_servico
GROUP BY id_cliente
HAVING SUM(valor_total) > 5000.00;

-- Liste as id_peca das peças que foram vendidas (em os_peca) mais de 100 vezes no total (somando quantidade_usada).
SELECT
    id_peca,
    SUM(quantidade_usada) AS Quantidade_Total_Vendida
FROM os_peca
GROUP BY id_peca
HAVING SUM(quantidade_usada) > 100;

-- Encontre as especialidades dos mecânicos que (agrupadas por especialidade) trabalharam em mais de 20 Ordens de Serviço no total.
SELECT
    f.cargo AS Especialidade,
    COUNT(osf.id_os) AS Total_OS
FROM funcionario f
JOIN os_funcionario osf ON f.id_func = osf.id_func
-- Opcional: Filtra cargos que não são de mecânicos antes do agrupamento
WHERE f.cargo NOT IN ('Atendente', 'Auxiliar Administrativo')
GROUP BY f.cargo
HAVING COUNT(osf.id_os) > 20
ORDER BY Total_OS DESC;

-- (Desafio) Encontre o nome do mecânico que mais trabalhou em Ordens de Serviço (maior COUNT).
SELECT
    f.nome_func AS Mecanico,
    COUNT(osf.id_os) AS Total_OS_Trabalhadas
FROM funcionario f
JOIN os_funcionario osf ON f.id_func = osf.id_func
GROUP BY f.id_func, f.nome_func -- Agrupa por ID e Nome para contar corretamente
ORDER BY Total_OS_Trabalhadas DESC -- Ordena do maior para o menor
LIMIT 1; -- Seleciona apenas o primeiro resultado (o maior)

-- ////////////////////indexação//////////////////// --

-- Na tabela carro, a coluna placa é frequentemente usada em consultas WHERE. Crie o índice na tabela.
CREATE INDEX idx_carro_placa
ON carro (placa);

-- Faça a indexação da chave estrangeira (id_carro) na tabela ordem_de_servico.
CREATE INDEX idx_os_id_carro
ON ordem_de_servico (id_carro);

-- Criação de um índice composto para otimizar buscas por OS e Peça simultaneamente
CREATE INDEX idx_os_peca_composto
ON os_peca (id_os, id_peca);