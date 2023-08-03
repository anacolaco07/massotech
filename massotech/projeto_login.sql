CREATE DATABASE projeto_login;
USE projeto_login;

CREATE TABLE tb_usuario (
  id bigint NOT NULL AUTO_INCREMENT,
  nome varchar(255) DEFAULT NULL,
  email varchar(100) DEFAULT NULL,
  senha varchar(255) DEFAULT NULL,
  telefone varchar(20) DEFAULT NULL,
  PRIMARY KEY (id),
  CONSTRAINT unico UNIQUE (email)
) ENGINE=InnoDB;

select * from tb_usuario tu;
	


