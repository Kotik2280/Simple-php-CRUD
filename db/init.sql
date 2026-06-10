CREATE DATABASE IF NOT EXISTS users_db;
USE users_db;

CREATE TABLE IF NOT EXISTS users (
    id INT PRIMARY KEY auto_increment,
    Name VARCHAR(50),
    Age INT
);