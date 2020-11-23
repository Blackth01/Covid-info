CREATE SCHEMA site_covid;

USE site_covid;

CREATE TABLE usuario(
	id INT PRIMARY KEY AUTO_INCREMENT,
    admin INT,
    nome VARCHAR(30) NOT NULL,
    senha VARCHAR(64) NOT NULL,
    idade INT(3) NOT NULL,
    email VARCHAR(50) NOT NULL,
    medico INT NOT NULL
);