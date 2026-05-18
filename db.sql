create database db;
create user 'utente'@'localhost' identified by 'utente';
grant all on db.* to 'utente'@'localhost';
flush privileges;

use db;

CREATE TABLE utenti (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100)
);

INSERT INTO utenti (nome) VALUES
('Mario Rossi'),
('Luigi Bianchi');
