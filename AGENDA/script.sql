create database if not exists agenda ;

CREATE TABLE pessoa (
codigo integer not null primary key auto_increment,
nome varchar(50),
endereco varchar(60),
cidade varchar(40),
telefone varchar(15)
);

INSERT INTO pessoa(nome,endereco,cidade,telefone)
VALUES('Camila','R. das Flores,99','Ocauçu','4125-6624');

INSERT INTO pessoa(nome,endereco,cidade,telefone)
VALUES('Larissa','Rua 14 de Outubro,12','Marília','3322-1256');

INSERT INTO pessoa(nome,endereco,cidade,telefone)
VALUES('Rafael','R. 7 Setembro,55','Bauru','3351-8132');

INSERT INTO pessoa(nome,endereco,cidade,telefone)
VALUES('Vinicius','R. das Flores,99','Assis','3526-6622');

INSERT INTO pessoa(nome,endereco,cidade,telefone)
VALUES('Ana','Av.Saudade,275','Ourinhos','3532-1467');

