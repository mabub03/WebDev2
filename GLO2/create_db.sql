DROP DATABASE IF EXISTS bub_glo2;
CREATE DATABASE bub_glo2;

USE bub_glo2;

CREATE TABLE users (
    usrID       int(11)         NOT NULL       AUTO_INCREMENT, 
    username    varchar(100)    NOT NULL, 
    email       varchar(100)    NOT NULL, 
    passwrd    varchar(50)     NOT NULL,
    PRIMARY KEY (usrID)
);

