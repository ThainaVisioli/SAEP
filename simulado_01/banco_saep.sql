CREATE DATABASE saep_db;

USE saep_db;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    senha VARCHAR(255) NOT NULL,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
);

CREATE TABLE empresas(
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    cnpj VARCHAR(255) NOT NULL,
    telefone VARCHAR(20),
    email VARCHAR(100),
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
);

CREATE TABLE salas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    bloco INT(100) NOT NULL,
    num_sala VARCHAR(50) NOT NULL,
    empresa_id INT NOT NULL,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL,

    FOREIGN KEY (empresa_id) REFERENCES empresas(id)
);

CREATE TABLE agendamentos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    data DATE NOT NULL,
    hora TIME NOT NULL,
    descricao VARCHAR(255),
    sala_id INT NOT NULL,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL,
    

    FOREIGN KEY (sala_id) REFERENCES salas(id)
);

use saep_db;

INSERT INTO usuarios 
(nome, email, senha, created_at, updated_at)
VALUES
('Administrador', 'admin@saep.com', SHA2('123456', 256), NOW(), NOW());


INSERT INTO empresas
(nome, cnpj, telefone, email, created_at, updated_at)
VALUES
('João da Silva', '12345678901234', '(16) 99999-1111', 'joao@email.com', NOW(), NOW()),
('Maria Oliveira','98765432100123', '(16) 98888-2222', 'maria@email.com', NOW(), NOW()),
('Carlos Santos', '11122233348884', '(16) 97777-3333', 'carlos@email.com', NOW(), NOW()),
('Ana Souza', '55566677333788', '(16) 96666-4444', 'ana@email.com', NOW(), NOW());

INSERT INTO salas
(bloco, num_sala, empresa_id, created_at, updated_at)
VALUES
('A', '101', 1, NOW(), NOW()),
('A', '102', 1, NOW(), NOW()),
('B', '201', 1, NOW(), NOW());

INSERT INTO agendamentos
(data, hora, descricao, sala_id, created_at, updated_at)
VALUES
('2026-09-21', '08:00:00', 'Troca de óleo e filtro', 1, NOW(), NOW()),
('2026-09-22', '10:30:00', 'Alinhamento e balanceamento', 2, NOW(), NOW()),
('2026-09-23', '14:00:00', 'Revisão dos freios', 3, NOW(), NOW()),
('2026-09-24', '09:00:00', 'Revisão geral do veículo', 4, NOW(), NOW()),
('2026-09-25', '15:30:00', 'Troca de pneus', 5, NOW(), NOW()),
('2026-09-26', '11:00:00', 'Manutenção preventiva', 1, NOW(), NOW());

INSERT INTO salas
(bloco, num_sala, empresa_id, created_at, updated_at)
VALUES
(1, '101', 2, NOW(), NOW()),
(1, '102', 2, NOW(), NOW()),
(2, '201', 2, NOW(), NOW()),
(2, '202', 2, NOW(), NOW()),
(3, '301', 2, NOW(), NOW());