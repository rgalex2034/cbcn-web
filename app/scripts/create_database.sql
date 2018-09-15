DROP DATABASE IF EXISTS cbcn_web;
CREATE DATABASE cbcn_web CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE cbcn_web;

CREATE TABLE place(
    id INT AUTO_INCREMENT NOT NULL,
    address VARCHAR(100) NOT NULL,
    short_address VARCHAR(100),
    latitude DECIMAL(9,5),
    longitude DECIMAL(9,5),
    PRIMARY KEY(id)
);

CREATE TABLE `group`(
    id INT AUTO_INCREMENT NOT NULL,
    name VARCHAR(50) NOT NULL,
    place INT,
    description VARCHAR(500),
    url_info VARCHAR(100),
    url_image VARCHAR(100),
    responsible VARCHAR(50),
    contact_email VARCHAR(100),
    contact_phone VARCHAR(100),
    district VARCHAR(50),
    PRIMARY KEY(id),
    FOREIGN KEY(place) REFERENCES place(id) ON DELETE SET NULL
);

CREATE TABLE event(
    id INT AUTO_INCREMENT NOT NULL,
    name VARCHAR(100) NOT NULL,
    subtitle VARCHAR(200),
    description VARCHAR(500),
    `date` DATETIME,
    date_end DATETIME,
    place INT,
    price DECIMAL(6,2),
    url VARCHAR(100),
    rec_age INT,
    image_full VARCHAR(100),
    image_low VARCHAR(100),
    organizer VARCHAR(100),
    contact_email VARCHAR(100),
    contact_phone VARCHAR(100),
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
