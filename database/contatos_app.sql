DROP DATABASE contatos_app;
CREATE DATABASE contatos_app;
USE contatos_app;

CREATE TABLE grupos (
    id INT NOT null AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    PRIMARY KEY(id)
);

INSERT INTO grupos VALUES (null, 'Amigos'), (null, 'Trabalho'), (null, 'Família');

CREATE TABLE contatos (
    id INT NOT NULL AUTO_INCREMENT,
    grupo_id INT NULL,
    nome VARCHAR(150) NOT NULL,
    email VARCHAR(150) NOT NULL,
    fone VARCHAR(20) NOT NULL,
    PRIMARY KEY(id),
    FOREIGN KEY(grupo_id) REFERENCES grupos(id)
);

CREATE TABLE usuarios (
  id INT NOT NULL AUTO_INCREMENT,
  nome VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL,
  login VARCHAR(100) NOT NULL,
  senha VARCHAR(100) NOT NULL,
  PRIMARY KEY(id)
);

INSERT INTO usuarios VALUES (null, 'João', 'joao@spacedevapp.com', 'joao', SHA2('ads_web_v_12345', '256'));

SELECT * FROM grupos;
SELECT * FROM contatos;

INSERT INTO contatos (id, nome, email, fone) VALUES (1, 'Kylie', 'kwhales0@samsung.com', '711-373-9188');
INSERT INTO contatos (id, nome, email, fone) VALUES (2, 'Arden', 'aliddiard1@wordpress.org', '246-761-8311');
INSERT INTO contatos (id, nome, email, fone) VALUES (3, 'Cris', 'cgeorgot2@webnode.com', '634-609-6179');
INSERT INTO contatos (id, nome, email, fone) VALUES (4, 'Samaria', 'smacandie3@goodreads.com', '426-796-6083');
INSERT INTO contatos (id, nome, email, fone) VALUES (5, 'Arlyne', 'agolagley4@about.com', '666-775-4760');
INSERT INTO contatos (id, nome, email, fone) VALUES (6, 'Hildagard', 'hartis5@samsung.com', '796-736-9931');
INSERT INTO contatos (id, nome, email, fone) VALUES (7, 'Wilden', 'wvedyashkin6@springer.com', '994-219-4458');
INSERT INTO contatos (id, nome, email, fone) VALUES (8, 'Lula', 'lsheffield7@cdbaby.com', '264-947-7596');
INSERT INTO contatos (id, nome, email, fone) VALUES (9, 'Goober', 'gduggon8@is.gd', '825-180-6366');
INSERT INTO contatos (id, nome, email, fone) VALUES (10, 'Arielle', 'apriddis9@stumbleupon.com', '880-668-4997');
