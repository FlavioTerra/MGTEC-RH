create database mgtec_rh collate utf8_unicode_ci;

use mgtec_rh;

CREATE TABLE IF NOT EXISTS tb_estado(
	id_estado INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(30) NOT NULL
);

CREATE TABLE IF NOT EXISTS tb_cidade(
	id_cidade INT AUTO_INCREMENT PRIMARY KEY,
	id_estado INT,
    nome VARCHAR(30) NOT NULL 
);

CREATE TABLE IF NOT EXISTS tb_usuario(
	id_user INT AUTO_INCREMENT PRIMARY KEY,
    email_user VARCHAR(50) NOT NULL,
    login_user VARCHAR(15) NOT NULL,
    senha_user VARCHAR(32) NOT NULL,
    situacao_user TINYINT,
    tipo_user TINYINT,
    nome VARCHAR(50) NOT NULL
);

CREATE TABLE IF NOT EXISTS tb_entrevista(
	id_entrevista INT AUTO_INCREMENT PRIMARY KEY,
    id_user INT, 
    FOREIGN KEY (id_user) REFERENCES tb_usuario (id_user),
    -- tem q ver esse respons�vel depois (ele nao aceita duas foreign keys da mesma tabela)
    status_entrevista varchar(30),
    responsavel INT NOT NULL, 
    data_entrevista datetime,
	titulo_entrevista varchar(40),
    hora_entrevista char(5) NOT NULL,
    descricao VARCHAR(50) NOT NULL
);

create table tb_processo_seletivo(
    id_proc int not null primary key auto_increment,
	id_responsavel int,
	foreign key(id_responsavel) references tb_usuario(id_user),
    titulo_proc varchar(100) not null,
    status_proc varchar(30) not null,
    data_inicio datetime default current_timestamp,
    data_termino datetime,
    regra_class int,
    descricao varchar(250)
);

CREATE TABLE IF NOT EXISTS tb_candidato(
	id_candidato INT AUTO_INCREMENT PRIMARY KEY,
    id_proc INT, 
    FOREIGN KEY (id_proc) REFERENCES tb_processo_seletivo (id_proc),
    id_cidade INT,
    FOREIGN KEY (id_cidade) REFERENCES tb_cidade (id_cidade),
    nome VARCHAR(50),
    email VARCHAR(50),
    foto BLOB,
    cpf VARCHAR(50),
    cnpf VARCHAR(50),
    data_nasc DATE,
    sexo INT, 
    id_perfil INT, 
    bairro VARCHAR(50),
    cep VARCHAR(8),
    num_casa TINYINT,
    rua VARCHAR(50),
    cadastro_pessoa VARCHAR(30),
    disponibilidade VARCHAR(30),
    telefone VARCHAR(30),
    celular VARCHAR(30),
    sobre VARCHAR(50),
    tipo_pessoa INT,
    curriculo BLOB,
    c_status VARCHAR(30)
);

CREATE TABLE IF NOT EXISTS tb_entrevista_candidato(
    id_entrevista INT, 
    FOREIGN KEY (id_entrevista) REFERENCES tb_entrevista (id_entrevista),
    id_candidato INT, 
    FOREIGN KEY (id_candidato) REFERENCES tb_candidato (id_candidato), 
    est_comp VARCHAR(50) NOT NULL,
    pontos_pos VARCHAR(50) NOT NULL,
    pontos_neg VARCHAR(50) NOT NULL
);

CREATE TABLE IF NOT EXISTS tb_formacao_c(
	id_formacao INT AUTO_INCREMENT PRIMARY KEY,
    tipo TINYINT NOT NULL,
    grau TINYINT NOT NULL,
    c_status TINYINT NOT NULL, 
    curso TINYINT NOT NULL,
    instituicao VARCHAR(50) NOT NULL,
    data_inicio DATE NOT NULL,
    data_final DATE NOT NULL,
    total_horas TINYINT NOT NULL
);

CREATE TABLE IF NOT EXISTS tb_competencia_c(
	id_competencia INT AUTO_INCREMENT PRIMARY KEY,
    grau TINYINT NOT NULL,
    nome TINYINT NOT NULL,
    c_status TINYINT NOT NULL 
);

CREATE TABLE IF NOT EXISTS tb_experiencia_c(
	id_experiencia INT AUTO_INCREMENT PRIMARY KEY,
    nome TINYINT,
    c_status TINYINT, 
    anos_xp TINYINT, 
    empresa VARCHAR(50),
    descricao VARCHAR(50),
    data_inicio DATE,
    data_final DATE
);

CREATE TABLE IF NOT EXISTS tb_candidato_formacao(
    id_candidato INT, 
    FOREIGN KEY (id_candidato) REFERENCES tb_candidato (id_candidato),
    id_formacao INT primary key
);

CREATE TABLE IF NOT EXISTS tb_candidato_competencia(
    id_candidato INT, 
    FOREIGN KEY (id_candidato) REFERENCES tb_candidato (id_candidato),
    id_competencia INT primary key
);

CREATE TABLE IF NOT EXISTS tb_candidato_experiencia(
    id_candidato INT, 
    FOREIGN KEY (id_candidato) REFERENCES tb_candidato (id_candidato),
    id_experiencia INT primary key
);

create table tb_teste(
    id_teste int not null primary key auto_increment,
	id_proc int,
    foreign key(id_proc) references tb_processo_seletivo(id_proc),
    tipo_teste varchar(100) not null,
    status_teste varchar(50),
    descricao varchar(250)
);

INSERT INTO tb_teste (id_teste, id_proc, tipo_teste, descricao, status_teste) VALUES (1, NULL, 1, '', 'Nao');

create table tb_participa  (
    id_participa int not null primary key auto_increment,
	id_teste int,
    foreign key(id_teste) references tb_teste(id_teste),
	id_candidato int,
    foreign key(id_candidato) references tb_candidato(id_candidato),
    resultado float(10, 2),
    data datetime default current_timestamp
);

create table tb_pergunta(
    id_pergunta int not null primary key auto_increment,
	id_teste int,
    foreign key(id_teste) references tb_teste(id_teste),
    peso float(3, 2), 
    Pergunta text not null,
    resposta_certa varchar(150),
    resposta_er1 varchar(150),
    resposta_er2 varchar(150),
    resposta_er3 varchar(150)
);

create table tb_resposta_candidato (
    id_resposta int not null primary key auto_increment,
	id_pergunta int,
    foreign key(id_pergunta) references tb_pergunta(id_pergunta),
	id_participa int,
    foreign key(id_participa) references tb_participa(id_participa),
    resp_escolhida varchar(150)
);

create table tb_departamento(
	id_departamento int not null primary key auto_increment,
	nome_departamento varchar(40),
	descricao varchar(150)
);

create table tb_cargo(
    id_cargo int not null primary key auto_increment,
	id_departamento int,
	foreign key(id_departamento) references tb_departamento(id_departamento),
    nome_cargo varchar(100) not null,
    descricao varchar(250)
);

create table tb_vaga(
    id_vaga int not null primary key auto_increment,
	id_proc int,
    foreign key(id_proc) references tb_processo_seletivo(id_proc),
	id_cargo int,
    foreign key(id_cargo) references tb_cargo(id_cargo),
	id_solicitante int,
	foreign key(id_solicitante) references tb_usuario(id_user),
	titulo_vaga varchar(40),
    comentario varchar(150),
    status_vaga varchar(30),
    num_vagas int not null,
    vinculo_emp int,
    data_solic datetime default current_timestamp,
    salario float(6, 2),
	funcao varchar(150),
	hora_inicio char(5),
	hora_fim char(5)
);

create table tb_formacao_r(
    id_formacao int not null primary key auto_increment,
    tipo int,
    grau int,
    r_status int,
    curso int
);

create table tb_competencia_r(
    id_competencia int not null primary key auto_increment,
    grau int,
    nome int,
    r_status int
);

create table tb_experiencia_r(
    id_experiencia int not null primary key auto_increment,
    anos_xp int,
    nome int,
    r_status int
);

create table tb_vaga_formacao(
	id_vaga int,
    foreign key(id_vaga) references tb_vaga(id_vaga),
	id_formacao int primary key
);

create table tb_vaga_competencia(
	id_vaga int,
    foreign key(id_vaga) references tb_vaga(id_vaga),
	id_competencia int primary key
);

create table tb_vaga_experiencia(
	id_vaga int,
    foreign key(id_vaga) references tb_vaga(id_vaga),
	id_experiencia int primary key
);

insert into tb_departamento (id_departamento, nome_departamento, descricao)
values(null, 'Engenharia Elétrica', 'Desenvolver, projetar e implementar nos ramos elétricos/eletrônicos.');

insert into tb_departamento (id_departamento, nome_departamento, descricao)
values(null, 'Contabilidade', 'Contas a pagar e receber, Folha de pagamento e Controle de estoque.');

insert into tb_departamento (id_departamento, nome_departamento, descricao)
values(null, 'Logística', 'Planejar e executar a movimentação de cargas, inclusive para importação e exportação.');

insert into tb_departamento (id_departamento, nome_departamento, descricao)
values(null, 'RH - Recrutamento e Seleção', 'Atrair e escolher as pessoas mais indicadas para trabalhar em uma determinada vaga da empresa.');

insert into tb_cargo(id_cargo, id_departamento, nome_cargo, descricao)
    values(null, 1, 'Engenheiro Eletrônico', 'Encarregado de projetar e desenvolver componentes, equipamentos e sistemas eletroeletrônicos empregados em automação industrial, sistemas de geração, transmissão e distribuição de eletricidade');

insert into tb_cargo(id_cargo, id_departamento, nome_cargo, descricao)
    values(null, 1, 'Técnico de Manutenção Elétrica', 'Realiza manutenção elétrica, corretiva e preventiva em máquinas e equipamentos, analisa e avalia as necessidades de troca, ajuste e reparo de peças e faz testes de funcionamento.');
 
insert into tb_cargo(id_cargo, id_departamento, nome_cargo, descricao)
    values(null, 1, 'Gestor de Projetos Eletroeletrônicos', 'Coordenar equipes, liderar, desenvolver e prinseojetar esquemas elétricos/eletrônicos');

insert into tb_cargo(id_cargo, id_departamento, nome_cargo, descricao)
    values(null, 2, 'Analista Contábil', 'Responsável por analisar e classificar o setor financeiro da empresa, com o objetivo de promover a demanda de pagamentos e recebimentos.');

insert into tb_cargo(id_cargo, id_departamento, nome_cargo, descricao)
    values(null, 2, 'Auxiliar Contábil', 'O Auxiliar Contábil classifica e realiza conciliações contábeis, registra lançamentos e auxilia na apuração de impostos.');

insert into tb_cargo(id_cargo, id_departamento, nome_cargo, descricao)
    values(null, 3, 'Controller Logístico', 'Elaborar, planejar e analisar os custos e realizar tudo o que diz respeito à administração financeira da empresa.');

insert into tb_cargo(id_cargo, id_departamento, nome_cargo, descricao)
    values(null, 3, 'Analista de supply chain', 'Analisa os processos de compras, armazenagem e movimentação de materiais. Participa na criação de métodos e processos e no controle da área de Suprimentos, definindo ações para redução de custos.');

insert into tb_cargo(id_cargo, id_departamento, nome_cargo, descricao)
    values(null, 4, 'Analista de recrutamento e seleção', 'Analisa padrões para aproveitamento de candidatos, seleciona fontes de recrutamento. Analisa juntamente com cargos e salários, níveis adequados de remuneração para contratação.');

insert into tb_cargo(id_cargo, id_departamento, nome_cargo, descricao)
    values(null, 4, 'Assistente de recrutamento e seleção', 'Divulga vagas, faz triagem de currículos, auxilia na realização de dinâmica de grupo, entrevistas e aplicação de testes. Elabora e atualiza relatórios, organiza cadastros e arquivo de documentos.');


insert into tb_usuario values(null, 'usario@candidato.com', 'candidato', 'candidato123', 1, 1, 'Candidato');

insert into tb_usuario values(null, 'usario@funcionario.com', 'funcionario', 'funcionario123', 1, 2, 'Funcionario');

insert into tb_usuario values(null, 'usario@gestor.com', 'gestor', 'gestor123', 1, 3, 'Gestor');

insert into tb_usuario values(null, 'usario@chefe.com', 'chefe', 'chefe123', 1, 4, 'Chefe');

insert into tb_usuario values(null, 'usario@adm.com', 'adm', 'adm123', 1, 5, 'Adm');
