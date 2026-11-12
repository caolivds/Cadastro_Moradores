
CREATE DATABASE IF NOT EXISTS cadastro_moradores CHARACTER SET utf8mb4;


USE cadastro_moradores;


DROP TABLE IF EXISTS moradores;


CREATE TABLE moradores (
    id INT AUTO_INCREMENT PRIMARY KEY,  
    nome VARCHAR(100) NOT NULL,        
    endereco VARCHAR(150) NOT NULL,     
    email VARCHAR(100) NOT NULL,        
    telefone VARCHAR(20) NOT NULL,      
    placa VARCHAR(10) NULL              
);
