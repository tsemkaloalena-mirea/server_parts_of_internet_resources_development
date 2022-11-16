CREATE DATABASE IF NOT EXISTS userDB;
CREATE USER IF NOT EXISTS 'admin'@'%' IDENTIFIED BY 'password';
GRANT SELECT,UPDATE,INSERT ON userDB.* TO 'admin'@'%';
FLUSH PRIVILEGES;

USE userDB;

CREATE TABLE IF NOT EXISTS auth (
    ID int(11) NOT NULL AUTO_INCREMENT,
    username varchar(64) NOT NULL,
    role_id int(11) NOT NULL,
    pass varchar(64) NOT NULL,
    PRIMARY KEY (ID)
);

CREATE TABLE IF NOT EXISTS orders (
    id bigint PRIMARY KEY NOT NULL AUTO_INCREMENT,
    info varchar(64) NOT NULL,
    status varchar(64) NOT NULL,
    duration int NOT NULL,
    cost int NOT NULL,
    master_id bigint REFERENCES masters(id),
    registration_time datetime
);

CREATE TABLE IF NOT EXISTS masters (
    id bigint PRIMARY KEY NOT NULL AUTO_INCREMENT,
    name varchar(64) NOT NULL,
    end_of_work_time datetime
);

CREATE TABLE IF NOT EXISTS uploaded_files (
    id bigint PRIMARY KEY NOT NULL AUTO_INCREMENT,
    name varchar(64) NOT NULL,
    type varchar(64) NOT NULL,
    size int NOT NULL,
    upload_date datetime NOT NULL
);

INSERT INTO orders (id, info, status, duration, cost, master_id, registration_time) VALUES
(1, "q", "NOT_STARTED", 50, 6, 1, STR_TO_DATE("18.10.2022 13:00", "%d.%m.%Y %H:%i")),
(2, "e", "NOT_STARTED", 40, 5, 2, STR_TO_DATE("19.10.2022 13:00", "%d.%m.%Y %H:%i"));

INSERT INTO masters (name, end_of_work_time) VALUES
("master1", STR_TO_DATE("18.10.2022 13:50", "%d.%m.%Y %H:%i")),
("master2", STR_TO_DATE("19.10.2022 13:40", "%d.%m.%Y %H:%i"));

INSERT INTO auth (username, role_id, pass)
SELECT * FROM (SELECT 'adm', 1, '{SHA}nVFlMNunrilurAWZsBbGA48jA5c=') AS tmp
WHERE NOT EXISTS (
    SELECT username FROM auth WHERE username = 'adm'
) LIMIT 1;

INSERT INTO auth (username, role_id, pass)
SELECT * FROM (SELECT 'adm2', 1, '{SHA}nVFlMNunrilurAWZsBbGA48jA5c=') AS tmp
WHERE NOT EXISTS (
    SELECT username FROM auth WHERE username = 'master'
) LIMIT 1;

INSERT INTO auth (username, role_id, pass)
SELECT * FROM (SELECT 'hat', 2, '{SHA}rEvlrGPh6mJkBAn2ObAQuftHnFs=') AS tmp
WHERE NOT EXISTS (
    SELECT username FROM auth WHERE username = 'hat'
) LIMIT 1;
