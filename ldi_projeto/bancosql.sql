CREATE DATABASE donutslupore;

use donutslupore;

create table usuario (
nome varchar(255),
email varchar(255) primary key,
senha varchar(255));
select * from usuario;

CREATE TABLE produtos (
    id INT NOT NULL AUTO_INCREMENT, 
    nome VARCHAR(45) NOT NULL, 
    descricao VARCHAR(90) NOT NULL, 
    imagem VARCHAR(80) NOT NULL, 
    preco DECIMAL (5,2) NOT NULL, 
PRIMARY KEY (id));
