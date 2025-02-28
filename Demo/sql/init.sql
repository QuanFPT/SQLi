CREATE DATABASE IF NOT EXISTS sqli_demo;

USE sqli_demo;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    price VARCHAR(255),
    visible boolean NOT NULL  
);

INSERT INTO users (username, password) VALUES
('admin', 'admin123'),
('user1', 'password1'),
('user2', 'password2');

INSERT INTO products (name, price,visible) VALUES
('Product A','2$',1),
('Product B','4$',1),
('Product C','2.6$',1),
('Product D','34$',1),
('Product E','67$',1),
('Product F','43$',1),
('Product G','256$',1),
('Product H','2$',1),
('Product I','3$',1),
('Product K','999$',1),
('Flag', 'CyberESS{D3m0_Un10n_B4sed}',0);