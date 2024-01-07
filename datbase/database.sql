-- Active: 1700650912919@@127.0.0.1@3306
CREATE DATABASE Wiki ;
USE Wiki;
CREATE TABLE Role (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(250)
) ENGINE=InnoDB;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(250),
    lastname VARCHAR(250),
    email VARCHAR(250),
    pasword VARCHAR(255),
    role_id INT,
    FOREIGN KEY (role_id) REFERENCES Role(id)
) ENGINE=InnoDB;
CREATE TABLE Category (
   id INT AUTO_INCREMENT PRIMARY KEY,
   name VARCHAR(250)
)ENGINE=InnoDB;
CREATE TABLE Tags (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(250)
)ENGINE=InnoDB;
CREATE TABLE Wiki (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(250),
    content TEXT,
    creation_date TIMESTAMP,
    id_user INT,
    FOREIGN KEY (id_user) REFERENCES users(id),
    id_category INT,
    FOREIGN KEY (id_category) REFERENCES Category(id),
    id_tags INT,
    FOREIGN KEY (id_tags) REFERENCES Tags(id)
) ENGINE=InnoDB;
CREATE TABLE wikiTags (
    id_Tags INT,
     FOREIGN KEY (id_Tags) REFERENCES Tags(id),
     id_Wiki INT,
      FOREIGN KEY (id_Wiki) REFERENCES Wiki(id)
)ENGINE=InnoDB;
DROP TABLE wikiTags;
CREATE TABLE wikiTags (
    id_Tags INT,
     FOREIGN KEY (id_Tags) REFERENCES Tags(id),
     id_Wiki INT,
      FOREIGN KEY (id_Wiki) REFERENCES Wiki(id)
)ENGINE=InnoDB;
ALTER TABLE Wiki DROP COLUMN id_tags;