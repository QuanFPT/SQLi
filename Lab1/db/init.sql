CREATE DATABASE IF NOT EXISTS sqli_lab;
USE sqli_lab;

CREATE TABLE IF NOT EXISTS prob_cobolt (
    id VARCHAR(50),
    pw VARCHAR(255)
);

INSERT INTO prob_cobolt (id, pw) VALUES 
('admin', MD5('adminpass')),
('user', MD5('userpass'));
