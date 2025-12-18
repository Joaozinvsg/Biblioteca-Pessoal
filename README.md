# 📚 Sistema de Biblioteca Pessoal

Um sistema web completo para gerenciamento de livros e autores, desenvolvido com foco em **Backend**, **Banco de Dados Relacional** e **Segurança**.

Este projeto implementa um **CRUD** (Create, Read, Update, Delete) completo, autenticação de usuários e relacionamentos entre tabelas (Livros e Autores).

![Status do Projeto](https://img.shields.io/badge/Status-Finalizado-green)
![PHP](https://img.shields.io/badge/Backend-PHP-blue)
![MySQL](https://img.shields.io/badge/Database-MySQL-orange)
![Bootstrap](https://img.shields.io/badge/Frontend-Bootstrap_5-purple)

## 🚀 Funcionalidades

- **Autenticação Segura:**
  - Sistema de Login com proteção de rotas (Sessões PHP).
  - Senhas criptografadas no banco de dados (Hash `password_verify`).
  
- **Gerenciamento de Livros (CRUD):**
  - Listagem de livros com `INNER JOIN` para exibir nomes dos autores.
  - Cadastro com dropdown dinâmico de autores.
  - Edição de registros carregando dados existentes.
  - Exclusão com confirmação de segurança (JavaScript).

- **Gerenciamento de Autores:**
  - Cadastro rápido de autores integrado ao fluxo de criação de livros.
  - Relacionamento 1:N (Um autor pode ter vários livros).

- **Interface:**
  - Design responsivo e amigável utilizando **Bootstrap 5**.

## 🛠️ Tecnologias Utilizadas

- **Linguagem:** PHP 8+ (PDO para conexão segura).
- **Banco de Dados:** MySQL.
- **Frontend:** HTML5, CSS3, Bootstrap 5.3.
- **Servidor Local:** WAMP/XAMPP/Laragon.

## 📦 Como rodar o projeto

### 1. Clone o repositório
```bash
git clone [https://github.com/Joaozinvsg/biblioteca-pessoal.git](https://github.com/Joaozinvsg/biblioteca-pessoal.git)
2. Configure o Banco de Dados
Crie um banco de dados chamado biblioteca_pessoal e execute o seguinte script SQL para criar as tabelas e o usuário administrador padrão:

SQL

CREATE DATABASE biblioteca_pessoal;
USE biblioteca_pessoal;

-- Tabela de Usuários (Admin)
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(100) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL
);

-- Tabela de Autores
CREATE TABLE autores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL
);

-- Tabela de Livros (com Chave Estrangeira)
CREATE TABLE livros (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(150) NOT NULL,
    genero VARCHAR(50),
    autor_id INT,
    CONSTRAINT fk_livro_autor FOREIGN KEY (autor_id) REFERENCES autores(id)
);

-- Criar usuário Admin (Senha: 123456)
INSERT INTO usuarios (email, senha) VALUES 
('admin@teste.com', '$2y$10$Bib/w/O0iL.v7.4X9b9Dmu.t.3/W.7.7.7.7.7.7.7.7.7.7');

-- Dados iniciais de teste
INSERT INTO autores (nome) VALUES ('J.K. Rowling'), ('J.R.R. Tolkien');
INSERT INTO livros (titulo, genero, autor_id) VALUES 
('Harry Potter e a Pedra Filosofal', 'Fantasia', 1),
('O Senhor dos Anéis', 'Fantasia', 2);
3. Configuração de Conexão
Certifique-se de que as credenciais do banco de dados nos arquivos .php correspondem ao seu servidor local (geralmente root e senha vazia no WAMP/XAMPP).

PHP

$host = 'localhost';
$user = 'root';
$pass = ''; // Coloque sua senha do MySQL aqui se houver
4. Acesso
Abra o navegador e acesse: http://localhost/biblioteca-pessoal/login.php

Credenciais de Acesso:

Email: admin@teste.com

Senha: 123456

👨‍💻 Autor
Desenvolvido por João Vitor Simão Gonçalves (Joaozinvsg).

Projeto criado para fins de estudo em desenvolvimento Backend e Banco de Dados.
