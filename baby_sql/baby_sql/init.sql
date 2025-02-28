CREATE TABLE users (
    id SERIAL PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

INSERT INTO users (username, password) VALUES 
('admin', 'admin123'),
('user1', 'password123'),
('test', 'test123');

CREATE TABLE flag (
    id SERIAL PRIMARY KEY,
    flag_value TEXT NOT NULL
);

INSERT INTO flag (flag_value) VALUES ('CTF{time_based_sql_injection_lab}');

-- Grant necessary permissions
ALTER USER postgres WITH SUPERUSER;