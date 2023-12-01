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

CREATE TABLE tb_regioes(
                           id_regiao bigint NOT NULL AUTO_INCREMENT,
                           nome_regiao varchar(255) DEFAULT NULL,
                           PRIMARY KEY(id_regiao));

INSERT INTO tb_regioes(nome_regiao) VALUES
                                        ('cranio'),('face'),('occipital'),('ombro_dir'),('ombro_esq'),
                                        ('braco_dir'),('braco_esq'),('antebraco_dir'),('antebraco_esq'),
                                        ('punho_dir'),('punho_esq'),('mao_dir'),('mao_esq'),('peitoral'),
                                        ('abdomen'),('escapula'),('cervical'),('torax'),('lombar'),('sacral'),
                                        ('coccigea'),('glutea'),('dorsal'),('quadril'),('coxa_anterior'),('coxa_posterior'),
                                        ('coxa_medial'),('perna_anterior'),('perna_posterior'),('tornozelo_dir'),('tornozelo_esq');


CREATE TABLE tb_procedimento(
                                id_procedimento bigint NOT NULL AUTO_INCREMENT,
                                nome_procedimento varchar(255) DEFAULT NULL,
                                id_regiao bigint,
                                PRIMARY KEY(id_procedimento),
                                FOREIGN KEY(id_regiao) REFERENCES tb_regioes(id_regiao));

INSERT INTO tb_procedimento(nome_procedimento) VALUES
                                                   ('Laboral'),('Shiatsu'),('Tuiná'),('Massagem_Infantil'),('Reflexologia_Podal'),
                                                   ('Yoga_Tai'),('Drenagem_Linfática_Manual'),('Desportiva'),('Abhyanga'),('aplicada_SPA'),
                                                   ('Terapêutica');


CREATE TABLE tb_Agendamento (
                                id_agendamento bigint NOT NULL AUTO_INCREMENT,
                                id_paciente bigint NOT NULL,
                                data_hora_agendamento datetime NOT NULL,
                                id_procedimento bigint,
                                PRIMARY KEY (id_agendamento),
                                FOREIGN KEY (id_paciente) REFERENCES tb_Paciente(id_paciente),
                                FOREIGN KEY (id_procedimento) REFERENCES tb_procedimento(id_procedimento)
);

# Dados de homologação
INSERT INTO tb_Paciente (
    nome_paciente, sexo, email_paciente, telefone_paciente, data_nascimento,
    profissao, setor, funcao, tempo_que_exerce, postura_corporal,
    ja_teve_covid, quando_ano, quando_mes, esta_vacinado,
    doencas_pregressas, doenca_atual, queixas_principais,
    processos_cirurgicos, medicamentos, realiza_atividade_fisica,
    qual_atividade_fisica, qual_frequencia, motivo_procura
)
VALUES
    ('João Silva', 'masculino', 'joao@email.com', '123456789', '1990-05-15',
     'Engenheiro', 'Engenharia', 'Engenheiro Civil', 10, 'sentada',
     'sim', 2021, 'julho', 'sim',
     'Nenhuma', 'Nenhuma', 'Dor nas costas', 'Nenhum', 'Nenhum', 'sim',
     'Corrida', '3 vezes por semana', 'Dor nas costas');

INSERT INTO tb_Paciente (
    nome_paciente, sexo, email_paciente, telefone_paciente, data_nascimento,
    profissao, setor, funcao, tempo_que_exerce, postura_corporal,
    ja_teve_covid, quando_ano, quando_mes, esta_vacinado,
    doencas_pregressas, doenca_atual, queixas_principais,
    processos_cirurgicos, medicamentos, realiza_atividade_fisica,
    qual_atividade_fisica, qual_frequencia, motivo_procura
)
VALUES
    ('Maria Souza', 'feminino', 'maria@email.com', '987654321', '1985-10-22',
     'Enfermeira', 'Saúde', 'Enfermeira Clínica', 8, 'em pé',
     'não', NULL, NULL, 'não',
     'Nenhuma', 'Nenhuma', 'Dor nos ombros', 'Nenhum', 'Nenhum', 'sim',
     'Yoga', '2 vezes por semana', 'Dor nos ombros');

INSERT INTO tb_Paciente (
    nome_paciente, sexo, email_paciente, telefone_paciente, data_nascimento,
    profissao, setor, funcao, tempo_que_exerce, postura_corporal,
    ja_teve_covid, quando_ano, quando_mes, esta_vacinado,
    doencas_pregressas, doenca_atual, queixas_principais,
    processos_cirurgicos, medicamentos, realiza_atividade_fisica,
    qual_atividade_fisica, qual_frequencia, motivo_procura
)
VALUES
    ('Mario Souza', 'masculino', 'mario@email.com', '98764321', '1985-10-22',
     'Enfermeira', 'Saúde', 'Enfermeira Clínica', 8, 'em pé',
     'não', NULL, NULL, 'não',
     'Nenhuma', 'Nenhuma', 'Dor nos ombros', 'Nenhum', 'Nenhum', 'sim',
     'Yoga', '2 vezes por semana', 'Dor nos ombros');

INSERT INTO tb_Agendamento (id_paciente, data_hora_agendamento, id_procedimento)
VALUES
    (3, '2023-12-02 11:45:00', 2);

INSERT INTO tb_Paciente (
    nome_paciente, sexo, email_paciente, telefone_paciente, data_nascimento,
    profissao, setor, funcao, tempo_que_exerce, postura_corporal,
    ja_teve_covid, quando_ano, quando_mes, esta_vacinado,
    doencas_pregressas, doenca_atual, queixas_principais,
    processos_cirurgicos, medicamentos, realiza_atividade_fisica,
    qual_atividade_fisica, qual_frequencia, motivo_procura
)
VALUES
    ('Ana Souza', 'feminino', 'ana@email.com', '987654321', '1990-08-18',
     'Enfermeira', 'Saúde', 'Enfermeira Clínica', 7, 'sentada',
     'não', NULL, NULL, 'não',
     'Nenhuma', 'Nenhuma', 'Dor nas costas', 'Nenhum', 'Nenhum', 'sim',
     'Yoga', '3 vezes por semana', 'Dor nas costas');

INSERT INTO tb_Agendamento (id_paciente, data_hora_agendamento, id_procedimento)
VALUES
    (1,'2023-12-03 15:31:00',1),
    (2,'2023-12-03 15:32:00',2),
    (4, '2023-12-03 15:30:00', 2);