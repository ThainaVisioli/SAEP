-- saep_db.sql | Sistema de Agendamento - Oficina Mecânica
DROP DATABASE IF EXISTS saep_db;
CREATE DATABASE saep_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE saep_db;

CREATE TABLE usuarios (
 id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
 nome VARCHAR(150) NOT NULL,
 email VARCHAR(150) NOT NULL UNIQUE,
 senha VARCHAR(255) NOT NULL,
 created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
 updated_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB;

CREATE TABLE clientes (
 id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
 nome VARCHAR(150) NOT NULL,
 cpf TEXT NOT NULL COMMENT 'CPF criptografado pela aplicação Laravel Crypt',
 telefone VARCHAR(20) NOT NULL,
 email VARCHAR(150) NULL,
 endereco VARCHAR(255) NULL,
 created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
 updated_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB;

CREATE TABLE veiculos (
 id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
 cliente_id BIGINT UNSIGNED NOT NULL,
 marca VARCHAR(80) NOT NULL,
 modelo VARCHAR(100) NOT NULL,
 ano SMALLINT UNSIGNED NOT NULL,
 placa VARCHAR(10) NOT NULL UNIQUE,
 cor VARCHAR(40) NULL,
 created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
 updated_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
 CONSTRAINT fk_veiculos_cliente FOREIGN KEY (cliente_id) REFERENCES clientes(id)
 ON UPDATE CASCADE ON DELETE RESTRICT
) ENGINE=InnoDB;

CREATE TABLE agendamentos (
 id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
 cliente_id BIGINT UNSIGNED NOT NULL,
 veiculo_id BIGINT UNSIGNED NOT NULL,
 data_agendamento DATE NOT NULL,
 hora TIME NOT NULL,
 servico VARCHAR(150) NOT NULL,
 observacoes TEXT NULL,
 status ENUM('Agendado','Concluído','Cancelado') NOT NULL DEFAULT 'Agendado',
 created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
 updated_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
 CONSTRAINT fk_agendamentos_cliente FOREIGN KEY (cliente_id) REFERENCES clientes(id)
 ON UPDATE CASCADE ON DELETE RESTRICT,
 CONSTRAINT fk_agendamentos_veiculo FOREIGN KEY (veiculo_id) REFERENCES veiculos(id)
 ON UPDATE CASCADE ON DELETE RESTRICT
) ENGINE=InnoDB;

-- Usuário de acesso para demonstração: admin@oficina.com / 123456
INSERT INTO usuarios (id,nome,email,senha) VALUES
(1,'Administrador','admin@oficina.com','$2y$12$t0vfRpIEHMj1oT9quHf04ebLb7q8gFwpvX6BxZEDouYturPDzL4n2'),
(2,'Mariana Souza','mariana@oficina.com','$2y$12$t0vfRpIEHMj1oT9quHf04ebLb7q8gFwpvX6BxZEDouYturPDzL4n2'),
(3,'Carlos Lima','carlos@oficina.com','$2y$12$t0vfRpIEHMj1oT9quHf04ebLb7q8gFwpvX6BxZEDouYturPDzL4n2');

-- CPFs abaixo já estão criptografados com a APP_KEY presente no .env deste projeto.
INSERT INTO clientes (id,nome,cpf,telefone,email,endereco) VALUES
(1,'João da Silva','eyJpdiI6IlJLbU50Vk5SQzJJcWNFdkxvcGo1WHc9PSIsInZhbHVlIjoiRmRpWGYvVDVPb3VSQlNPdVlzRzczdz09IiwibWFjIjoiZDQ1YmNhMDI5ZTBkMWUyNmUwMTA2NDg0YWUxOGE0OTZmN2Y2ZTk1MjFmZjMyNTE3Y2M4MzdhM2NmZmVlZDVjNyIsInRhZyI6IiJ9','11988887777','joao@email.com','Rua das Flores, 100'),
(2,'Maria Oliveira','eyJpdiI6Ik1JbVE1enRXWUZJTUdFcWxNVWVTTXc9PSIsInZhbHVlIjoiQ3haem8veEpuT2xvSHRJSlFibklidz09IiwibWFjIjoiN2MxZTQ0ODRiZTI3ODc2MDkxYzc4MWM3YTgwZjNlNDlmNTUyNzhlOTBjZDMxYzBmNDU3OGFjNmExYzI0YWMyZiIsInRhZyI6IiJ9','11977776666','maria@email.com','Av. Central, 250'),
(3,'Pedro Santos','eyJpdiI6IjFuS2JUeGZLQXJrMnR2eGxWWjl6cXc9PSIsInZhbHVlIjoicEZBMnFnWHdUSEdkQkNlQnVQem8wdz09IiwibWFjIjoiMTg4NzQ1NGZlOTdmMzk3ZTgzMzBmYWEzMjUwYzI2OTQ1YmRkNDllMGI3NTZlODVlM2Q3NjE2YTJhYTAyODNhMSIsInRhZyI6IiJ9','11966665555','pedro@email.com','Rua do Comércio, 45');

INSERT INTO veiculos (id,cliente_id,marca,modelo,ano,placa,cor) VALUES
(1,1,'Fiat','Argo',2021,'ABC1D23','Branco'),
(2,2,'Chevrolet','Onix',2022,'DEF4G56','Prata'),
(3,3,'Volkswagen','Gol',2019,'GHI7J89','Preto');

INSERT INTO agendamentos (id,cliente_id,veiculo_id,data_agendamento,hora,servico,observacoes,status) VALUES
(1,1,1,'2026-12-02','08:00:00','Troca de óleo','Verificar filtros','Agendado'),
(2,2,2,'2026-12-03','10:30:00','Revisão preventiva','Revisão de 30 mil km','Agendado'),
(3,3,3,'2026-12-04','14:00:00','Alinhamento e balanceamento',NULL,'Agendado');
