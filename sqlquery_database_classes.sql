CREATE TABLE CIDADE(
	COD_CIDADE INT NOT NULL,
	NOME_CIDADE VARCHAR(30) NOT NULL,
	FUNDACAO DATE
);

-- Create indepedent tables first

CREATE TABLE ALUNOS(
	MATRICULA INT NOT NULL,
	NOME VARCHAR(100) NOT NULL,
	DATA_NASCIMENTO DATE NOT NULL,
);

CREATE TABLE PROFESSORES(
	MATRICULA INT NOT NULL,
	NOME VARCHAR(100) NOT NULL,
	FORMACAO VARCHAR(100) NOT NULL,
);

CREATE TABLE DISCIPLINAS(
	CODIGO_DISCIPLINA INT NOT NULL,
	NOME_DISCIPLINA VARCHAR(100) NOT NULL,
	CARGA_HORARIA NUMERIC(3),
	EMENTA VARCHAR(4000) NOT NULL,
	CODIGO_DISCIPLINA_DEPENDENCIA INT,
);

CREATE TABLE OFERTAS(
	CODIGO_OFERTA INT NOT NULL,
	HORARIO_INICIAL DATETIME NOT NULL,
	HORARIO_FINAL DATETIME NOT NULL,
	MATRICULA NUMERIC(5) NOT NULL,
	CODIGO_DISCIPLINA NUMERIC NOT NULL,
);

CREATE TABLE ALUNOS_OFERTAS(
	MATRICULA NUMERIC NOT NULL,
	CODIGO_OFERTA NUMERIC NOT NULL,
	LIMITE_ALUNIOS NUMERIC NOT NULL,
	SEMESTRE VARCHAR(6) NOT NULL,
	DATA_INICIAL DATE NOT NULL,
	DATA_FINAL DATE NOT NULL, --TIME IS NOT NECESSARY
);

CREATE TABLE TELEFONES(
	TELEFONE VARCHAR(11) NOT NULL,
	MATRICULA NUMERIC NOT NULL,
);

-- Conta as Tuplas (Rows) de uma Tabela
SELECT count(*) FROM ALUNOS;
SELECT count(1) FROM PROFESSORES;
SELECT count(*) FROM OFERTAS;
SELECT count(*) FROM ALUNOS_OFERTAS;
SELECT count(1) FROM DISCIPLINAS;
SELECT count(*) FROM TELEFONES;


DROP TABLE ALUNOS;
 -- it will return a error: SELECT count(1) FROM ALUNOS;

 DROP TABLE PROFESSORES;
 DROP TABLE OFERTAS;
 DROP TABLE ALUNOS_OFERTAS;
 DROP TABLE DISCIPLINAS;
 DROP TABLE TELEFONES;

