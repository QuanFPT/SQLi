CREATE DATABASE IF NOT EXISTS demo;

USE demo;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

INSERT INTO users (username, password) VALUES ('admin', 'admin123');
INSERT INTO users (username, password) VALUES ('hecker', 'lord123');
INSERT INTO users (username, password) VALUES ('levi', 'lastdance');
INSERT INTO users (username, password) VALUES ('faker', 'whatwasthat');

