CREATE DATABASE biblioteca_pessoal;
USE biblioteca_pessoal;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(100) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL
);

CREATE TABLE autores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL
);

CREATE TABLE livros (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(150) NOT NULL,
    genero VARCHAR(50),
    autor_id INT,
    CONSTRAINT fk_livro_autor FOREIGN KEY (autor_id) REFERENCES autores(id)
);

INSERT INTO usuarios (email, senha) VALUES 
('admin@teste.com', '$2y$10$Bib/w/O0iL.v7.4X9b9Dmu.t.3/W.7.7.7.7.7.7.7.7.7.7');

INSERT INTO autores (nome) VALUES ('J.K. Rowling'), ('J.R.R. Tolkien');
INSERT INTO livros (titulo, genero, autor_id) VALUES 
('Harry Potter e a Pedra Filosofal', 'Fantasia', 1),
('O Senhor dos Anéis', 'Fantasia', 2);