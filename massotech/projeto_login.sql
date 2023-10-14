CREATE DATABASE projeto_login;
USE projeto_login;

CREATE TABLE tb_usuario (
  id bigint NOT NULL AUTO_INCREMENT,
  nome varchar(255)  DEFAULT NULL,
  email varchar(100) DEFAULT NULL,
  senha varchar(255) DEFAULT NULL,
  telefone varchar(20) DEFAULT NULL,
  PRIMARY KEY (id),
  CONSTRAINT unico UNIQUE (email)
) ENGINE=InnoDB;

CREATE TABLE tb_Paciente(
id_paciente bigint NOT NULL AUTO_INCREMENT,
nome_paciente varchar(255) DEFAULT NULL,
sexo enum("feminino","masculino","outro"),
idade int NOT NULL,
email_paciente varchar(100) DEFAULT NULL,
telefone_paciente varchar(20) DEFAULT NULL,
data_nascimento date DEFAULT NULL,
profissao varchar(255)  DEFAULT NULL,
setor varchar(255) DEFAULT NULL,
funcao varchar(255)  DEFAULT NULL,
tempo_que_exerce int ,
postura_corporal enum("sentada","em pé", "mista"),
ja_teve_covid enum("sim","não") ,
quando_ano int DEFAULT NULL,
quando_mes enum ("janeiro", "fevereiro", "março", "abril","maio", "junho", "julho","agosto","setembro", "outubro","novembro","dezembro"),
esta_vacinado enum("sim","não") ,
doencas_pregressas varchar(255) ,
doenca_atual varchar(255) DEFAULT NULL,
queixas_principais varchar(255) DEFAULT NULL,
processos_cirurgicos varchar(255) DEFAULT NULL,
medicamentos varchar(255) DEFAULT NULL,
realiza_atividade_fisica enum("sim","não"),
qual_atividade_fisica varchar(255) DEFAULT NULL,
qual_frequencia varchar(255) DEFAULT NULL,
motivo_procura varchar(255) DEFAULT NULL,
PRIMARY KEY (id_paciente)
);

CREATE TABLE tb_Agendamento (
  id_agendamento bigint NOT NULL AUTO_INCREMENT,
  id_paciente bigint NOT NULL,
  data_hora_agendamento datetime NOT NULL,
  procedimento varchar(50) NOT NULL,
  PRIMARY KEY (id_agendamento),
  FOREIGN KEY (id_paciente) REFERENCES tb_Paciente(id_paciente),
  UNIQUE KEY unique_data_hora (data_hora_agendamento)
);