-- Criando o banco de dados, se ainda não existir
CREATE DATABASE IF NOT EXISTS Nandayeyoh;
USE Nandayeyoh;

CREATE TABLE IF NOT EXISTS Usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    senha VARCHAR(100) NOT NULL,
    papel ENUM('medico', 'enfermeiro', 'administrador') NOT NULL,
    data_criacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


-- Criando a tabela Pacientes
CREATE TABLE IF NOT EXISTS Pacientes (
    id_Pacientes INT PRIMARY KEY AUTO_INCREMENT,
    Nome VARCHAR(100) NOT NULL,
    Sexo CHAR(1) NOT NULL, -- Alterado para CHAR(1) para representar o sexo (M/F)
    Data_Nascimento DATE NOT NULL,
    Endereco VARCHAR(225) NOT NULL,
    Telefone VARCHAR(15) NOT NULL,
    Email VARCHAR(100) NOT NULL,
    cpf CHAR(11) NOT NULL -- Alterado para CHAR(11) para representar o CPF
);

-- Inserindo dados na tabela Pacientes
INSERT INTO Pacientes (Nome, Sexo, Data_Nascimento, Endereco, Telefone, Email, cpf)
VALUES 
   ('Carla', 'F', '1983-04-23', 'Machava', '856867893', 'carla@gmail.com', '12345678901'),
   ('Maria', 'F', '1985-08-20', 'Liberdade', '876767458', 'maria@email.com', '98765432109'),
   ('Carlos', 'M', '1990-02-10', 'Trevo', '828287845', 'carlos@email.com', '45678912345');

-- Criando a tabela Medicos
CREATE TABLE IF NOT EXISTS Medicos (
    id_Medicos INT PRIMARY KEY AUTO_INCREMENT,
    Nome VARCHAR(100),
    Especialidade VARCHAR(100),
    Endereco VARCHAR(100),
    Email VARCHAR(100),
    cpf CHAR(11) -- Alterado para CHAR(11) para representar o CPF
);

-- Inserindo dados na tabela Medicos
INSERT INTO Medicos (Nome, Especialidade, Endereco, Email, cpf) 
VALUES 
   ('Mateus', 'Neurocirurgião', 'Hospital JM, Sala 101', 'mateus@gamail.com', '12345678901'),
   ('Bianca', 'Pediatra', 'Hospital Polana Canico, Sala 202', 'anca@gmail.com', '98765432109'),
   ('Marta', 'Dentista', 'HCM, Sala 303', 'marta@gamail.com', '45678912345');

-- Criando a tabela Especialidades
CREATE TABLE IF NOT EXISTS Especialidades (
    id_Especialidade INT PRIMARY KEY AUTO_INCREMENT,
    Nome VARCHAR(100)
);

-- Inserindo dados na tabela Especialidades
INSERT INTO Especialidades(id_Especialidade, Nome)
VALUES 
   (1, 'Ortopedia'),
   (2, 'Clinica Geral'),
   (3, 'Cardiologia');

-- Criando a tabela Quartos
CREATE TABLE IF NOT EXISTS Quartos (
    id_Quartos INT PRIMARY KEY AUTO_INCREMENT,
    Numero INT,
    Tipo VARCHAR(20), -- Alterado para VARCHAR(20) para armazenar os tipos de quarto
    Valor_Diario DECIMAL(10, 2)
);

-- Inserindo dados na tabela Quartos
INSERT INTO Quartos (Numero, Tipo, Valor_Diario)
VALUES 
   (101, 'Apartamento', 200.00),
   (102, 'Quarto Duplo', 100.00),
   (103, 'Enfermaria', 70.00);

-- Criando a tabela Internacoes
CREATE TABLE IF NOT EXISTS Internacoes (
    id_Internacoes INT PRIMARY KEY AUTO_INCREMENT,
    Data_Entrada DATE,
    Data_Prevista_Alta DATE,
    Data_Efetiva_Alta DATE,
    Descricao_Procedimentos VARCHAR(225),
    id_Pacientes INT,
    id_Medicos INT,
    id_Quartos INT,
    FOREIGN KEY (id_Pacientes) REFERENCES Pacientes(id_Pacientes),
    FOREIGN KEY (id_Medicos) REFERENCES Medicos(id_Medicos),
    FOREIGN KEY (id_Quartos) REFERENCES Quartos(id_Quartos)
);

-- Inserindo dados na tabela Internacoes
INSERT INTO Internacoes(id_Internacoes, Data_Entrada, Data_Prevista_Alta, Data_Efetiva_Alta, Descricao_Procedimentos, id_Pacientes, id_Medicos, id_Quartos )
VALUES 
   (1, '2024-01-22', '2024-01-24', '2024-01-25', 'Fratura no braço', 2, 1, 1),
   (2, '2024-01-25', '2024-01-25', '2024-01-26', 'Cirurgia de emergência', 1, 2, 2),
   (3, '2024-01-30', '2024-02-01', '2024-02-03', 'Tratamento de pneumonia', 1, 1, 1);

-- Criando a tabela Enfermeiros
CREATE TABLE IF NOT EXISTS Enfermeiros (
    id_Enfermeiros INT PRIMARY KEY AUTO_INCREMENT,
    Nome VARCHAR(100),
    CPF CHAR(11) -- Alterado para CHAR(11) para representar o CPF
);

-- Inserindo dados na tabela Enfermeiros
INSERT INTO Enfermeiros (Nome, CPF)
VALUES 
   ('Fernanda Mojane', '12345678901'),
   ('Carlos Gulele', '98765432109'),
   ('Patrícia Tembane', '45678912345');

-- Criando a tabela Internacao_Enfermeiros
CREATE TABLE IF NOT EXISTS Internacao_Enfermeiros (
    id_Internacoes INT,
    id_Enfermeiros INT,
    FOREIGN KEY (id_Internacoes) REFERENCES Internacoes(id_Internacoes),
    FOREIGN KEY (id_Enfermeiros) REFERENCES Enfermeiros(id_Enfermeiros)
);

-- Criando a tabela Medico_Especialidades
CREATE TABLE IF NOT EXISTS Medico_Especialidades (
    id_Medicos INT,
    id_Especialidades INT,
    FOREIGN KEY (id_Medicos) REFERENCES Medicos(id_Medicos),
    FOREIGN KEY (id_Especialidades) REFERENCES Especialidades(id_Especialidade)
);

-- Inserindo dados na tabela Medico_Especialidades
INSERT INTO Medico_Especialidades (id_Medicos, id_Especialidades)
VALUES 
   (1, 1),
   (2, 2),
   (3, 3);

-- Criando a tabela Transferencias
CREATE TABLE IF NOT EXISTS Transferencias (
    ID_Transferencia INT PRIMARY KEY AUTO_INCREMENT,
    id_Pacientes INT,
    Data_Transferencia DATE,
    id_Hospital_Origem INT,
    id_Hospital_Destino INT,
    FOREIGN KEY (id_Pacientes) REFERENCES Pacientes(id_Pacientes)
);

-- Inserindo dados na tabela Transferencias
INSERT INTO Transferencias (ID_Transferencia, id_Pacientes, Data_Transferencia, id_Hospital_Origem, id_Hospital_Destino)
VALUES 
   (1, 1, '2024-03-10', 1, 2),
   (2, 2, '2024-03-15', 2, 3),
   (3, 3, '2024-03-20', 3, 1);

-- Criando a tabela Hospital
CREATE TABLE IF NOT EXISTS Hospital (
    id_Hospital INT PRIMARY KEY AUTO_INCREMENT,
    Nome VARCHAR(100),
    Endereco VARCHAR(100),
    Cidade VARCHAR(100)
);

-- Inserindo dados na tabela Hospital
INSERT INTO Hospital (Nome, Endereco, Cidade)
VALUES 
   ('Hospital A', 'Rua Da Amizade', 'Cidade Matola'),
   ('Hospital B', 'Avenida Olof Palmer, 345', 'Cidade Maputo'),
   ('Hospital C', 'Rua Das Palmeiras, 123', 'Cidade Matola');

-- Criando a tabela Leitos
CREATE TABLE IF NOT EXISTS Leitos (
    id_leito VARCHAR(100) PRIMARY KEY,
    tipo_leito VARCHAR(20), -- Alterado para VARCHAR(20) para representar os tipos de leito
    estado VARCHAR(20), -- Alterado para VARCHAR(20) para representar os estados dos leitos
    id_Hospital INT,
    FOREIGN KEY (id_Hospital) REFERENCES Hospital(id_Hospital)
);

-- Inserindo dados na tabela Leitos
INSERT INTO Leitos (id_leito, tipo_leito, estado, id_Hospital)
VALUES 
   ('A101', 'internacao', 'disponível', 1),
   ('B102', 'cirurgia', 'ocupado', 2),
   ('C103', 'UTI', 'disponível', 3);

-- Criando a tabela Higienizacao
CREATE TABLE IF NOT EXISTS Higienizacao (
    id_higienizacao VARCHAR(100) PRIMARY KEY,
    data_higienizacao DATE,
    observacoes VARCHAR(1000),
    id_leito VARCHAR(100),
    FOREIGN KEY (id_leito) REFERENCES Leitos(id_leito)
);

-- Inserindo dados na tabela Higienizacao
INSERT INTO Higienizacao (id_higienizacao, data_higienizacao, observacoes, id_leito)
VALUES 
   ('H1', '2024-03-12', 'Limpeza completa realizada', 'A101'),
   ('H2', '2024-03-15', 'Higienização realizada após cirurgia', 'B102'),
   ('H3', '2024-03-20', 'Leito desinfectado', 'C103');

-- Consultas
-- Consulta para selecionar todos os pacientes.
SELECT * FROM Pacientes;

-- Selecionar os médicos e suas especialidades.
SELECT m.Nome AS Nome_Medicos, m.Especialidade, e.Nome AS Nome_Especialidade
FROM Medicos m
JOIN Medico_Especialidades me ON m.id_Medicos = me.id_Medicos
JOIN Especialidades e ON me.id_Especialidades = e.id_Especialidade;

-- Selecionar as internações, os detalhes do paciente, médico e quarto.
SELECT i.id_Internacoes, p.Nome AS Nome_Paciente, m.Nome AS Nome_Medico, q.Numero AS Numero_Quarto
FROM Internacoes i
JOIN Pacientes p ON i.id_Pacientes = p.id_Pacientes
JOIN Medicos m ON i.id_Medicos = m.id_Medicos
JOIN Quartos q ON i.id_Quartos = q.id_Quartos;

-- Selecionar os leitos e estado de ocupação
SELECT id_leito, tipo_leito, estado
FROM Leitos;

