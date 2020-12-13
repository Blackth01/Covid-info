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

CREATE TABLE gostei (
  id     INT PRIMARY KEY AUTO_INCREMENT,
  id_usuario INT NOT NULL,
  id_artigo INT NOT NULL,
  FOREIGN KEY(id_usuario) REFERENCES usuario(id),
  FOREIGN KEY(id_artigo) REFERENCES artigo(id)
);

CREATE TABLE comentario(
	id INT PRIMARY KEY AUTO_INCREMENT,
	texto VARCHAR(200) NOT NULL,
	id_usuario INT NOT NULL,
    id_artigo INT NOT NULL,
    data_postagem DATETIME NOT NULL,
    ativo INT DEFAULT 1,
	FOREIGN KEY (id_usuario) REFERENCES usuario(id),
    FOREIGN KEY (id_artigo) REFERENCES artigo(id)
);