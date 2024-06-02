-- Crearea bazei de date
CREATE DATABASE user_database;

-- Utilizarea bazei de date create
USE user_database;

-- Crearea tabelului utilizatorilor
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);