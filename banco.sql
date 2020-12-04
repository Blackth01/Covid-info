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

CREATE TABLE artigo (
  id     INT PRIMARY KEY AUTO_INCREMENT,
  data_cadastro DATETIME NOT NULL,
  titulo VARCHAR(100) NOT NULL,
  endereco_imagem VARCHAR(100) NOT NULL,
  conteudo   TEXT NOT NULL,
  ativo INT NOT NULL,
  id_autor INTEGER NOT NULL,
  FOREIGN KEY(id_autor) REFERENCES usuario(id)
);