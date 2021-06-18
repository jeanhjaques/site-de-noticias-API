CREATE DATABASE noticias;

SET search_path TO noticiasschema;

ALTER ROLE postgres SET search_path TO noticiasschema; /*substitua postgres pelo seu nome de usuário*/

create table Categoria (
	idCategoria serial PRIMARY KEY,
	nome varchar(45) NOT NULL
);

create table SubCategoria (
	idSubCategoria serial PRIMARY KEY,
	nomeSubcategoria varchar(45) NOT NULL,
	idCategoria integer NOT NULL,
	CONSTRAINT subCategoriaCategoriaFK FOREIGN KEY(idCategoria) REFERENCES Categoria(idCategoria)
	ON DELETE cascade ON UPDATE cascade
);

create table Cargo (
	idCargo serial PRIMARY KEY,
	nome varchar(45) NOT NULL,
	nivelAcesso integer NOT NULL
);

create table Editor (
	idEditor serial PRIMARY KEY,
	nome varchar(45) NOT NULL,
	login varchar(45) NOT NULL,
	senha varchar(500) NOT NULL,
	idCargo integer NOT NULL,
	CONSTRAINT EditorCargoFK FOREIGN KEY(idCargo) REFERENCES Cargo(idCargo)
	ON DELETE cascade ON UPDATE cascade
);

create table Noticia (
	idNoticia serial PRIMARY KEY,
	titulo varchar(500) NOT NULL,
	subtitulo varchar(1000),
	data timestamp NOT NULL,
	conteudo varchar(3000) NOT NULL,
	dataUltimaAtualizacao timestamp NOT NULL,
	idEditor integer NOT NULL,
	CONSTRAINT NoticiaEditorFK FOREIGN KEY(idEditor) REFERENCES Editor(idEditor)
	ON DELETE set null ON UPDATE cascade
);

create table SubCategoriaNoticia(
	idNoticia integer,
	idSubCategoria integer,
	CONSTRAINT SubCategoriaNoticiaSubCategoria FOREIGN KEY(idSubCategoria) REFERENCES SubCategoria(idSubCategoria)
	ON DELETE set null ON UPDATE cascade,
	CONSTRAINT SubCategoriaNoticiaNoticia FOREIGN KEY(idNoticia) REFERENCES Noticia(idNoticia)
	ON DELETE cascade ON UPDATE cascade,
	PRIMARY KEY(idNoticia, idSubcategoria)
);