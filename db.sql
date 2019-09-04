use `web-2019-2`;

CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100),
    login VARCHAR(64),
    password VARCHAR(64)
);

CREATE TABLE clients (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100),
    cep VARCHAR(10),
    num VARCHAR(10),
    compl VARCHAR(100)
);

CREATE TABLE services (
    id INT PRIMARY KEY AUTO_INCREMENT,

    client_id INT,

    equip VARCHAR(255),
    problem TEXT,

    solution TEXT,

    is_open BOOLEAN,

    FOREIGN KEY (client_id) REFERENCES clients(id) ON DELETE CASCADE
);

INSERT INTO users (name, login, password)
VALUES  ('ranieri', 'ranieri', '64834d1949af5eefa6d24a6156d39cab5c57839c'), -- senha: ranieri
        ('o cara da loja', 'cara', '2e6f9b0d5885b6010f9167787445617f553a735f'); -- senha: teste

INSERT INTO clients (name, cep, num, compl)
VALUES  ('ranieri', '53415000', '000', ''),
        ('tony', '55000000', '123', 'localizacao secreta');