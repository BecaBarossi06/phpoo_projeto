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
    imagem VARCHAR(80) NOT NULL, 
    preco DECIMAL (5,2) NOT NULL, 
PRIMARY KEY (id));

select * from produtos;


INSERT INTO produtos (nome, imagem, preco) VALUES ('Donuts caramelo', 'donutscaramelo.jpg', '6.00');
INSERT INTO produtos (nome, imagem, preco) VALUES ('Donuts chocolate', 'donutschocolate.jpg', '6.00');
INSERT INTO produtos (nome, imagem, preco) VALUES ('Donuts morango', 'donutsmorango.jpg', '6.50');


select * from produtos;

update produtos set imagem = '../imagemldi/donutscaramelo.jpg' where id = 1;
update produtos set imagem = '../imagemldi/donutschocolate.jpg' where id = 2;
update produtos set imagem = '../imagemldi/donutsmorango.jpg' where id = 3;

select * from produtos;
#delete from produtos where id >33;
update produtos set imagem = concat("../img/",imagem) where id= 33;

select * from usuario;

alter table usuario add perfil varchar(50) default(0);
update usuario set perfil = 'admin' where email = 'abc@ifsp.edu.br';
