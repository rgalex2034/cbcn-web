DROP DATABASE IF EXISTS cbcn_web;
CREATE DATABASE cbcn_web CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE cbcn_web;

CREATE TABLE place(
    id INT AUTO_INCREMENT NOT NULL,
    address VARCHAR(100) NOT NULL,
    latitude DOUBLE(7,6),
    longitude DOUBLE(7,6),
    PRIMARY KEY(id)
);

CREATE TABLE `group`(
    id INT AUTO_INCREMENT NOT NULL,
    name VARCHAR(50) NOT NULL,
    place INT,
    description VARCHAR(500),
    url_image VARCHAR(100),
    contact_email VARCHAR(50),
    district VARCHAR(50),
    PRIMARY KEY(id),
    FOREIGN KEY(place) REFERENCES place(id) ON DELETE SET NULL
);

CREATE TABLE event(
    id INT AUTO_INCREMENT NOT NULL,
    name VARCHAR(100) NOT NULL,
    `date` DATETIME,
    place INT,
    url VARCHAR(100),
    contact_email VARCHAR(50),
    `group` INT,
    PRIMARY KEY(id),
    FOREIGN KEY(`group`) REFERENCES `group`(id) ON DELETE SET NULL,
    FOREIGN KEY(place) REFERENCES place(id) ON DELETE SET NULL
);

CREATE TABLE `user`(
    id INT AUTO_INCREMENT NOT NULL,
    device_id VARCHAR(200) NOT NULL,
    PRIMARY KEY(id)
);

CREATE TABLE `admin`(
    id INT AUTO_INCREMENT NOT NULL,
    name VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    PRIMARY KEY(id)
);
