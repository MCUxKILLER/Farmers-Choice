CREATE DATABASE IF NOT EXISTS farmerschoice;

USE farmerschoice;

CREATE TABLE IF NOT EXISTS users (
    name VARCHAR(50),
    email VARCHAR(60),
    phone BIGINT
);

CREATE TABLE IF NOT EXISTS private (
    `SNo.` INT(11) AUTO_INCREMENT,
    Crop_Name VARCHAR(40),
    Price INT(11),
    Company_Name VARCHAR(50),
    PRIMARY KEY (`SNo.`)
);

CREATE TABLE IF NOT EXISTS government (
    `SNo.` INT(11) AUTO_INCREMENT,
    Crop_Name VARCHAR(30),
    Price INT(11),
    State VARCHAR(50),
    PRIMARY KEY (`SNo.`)
);

CREATE TABLE IF NOT EXISTS price (
    useremail VARCHAR(60),
    userphone BIGINT,
    totalAmount INT
);

INSERT INTO government (Crop_Name, Price, State)
VALUES
    ('Potato', 12, 'Uttar Pradesh'),
    ('Rice', 25, 'Uttar Pradesh'),
    ('Wheat', 12, 'Uttar Pradesh'),
    ('Bajra', 20, 'Uttar Pradesh'),
    ('Rice', 16, 'Madhya Pradesh'),
    ('Potato', 22, 'Madhya Pradesh'),
    ('Bajra', 19, 'Madhya Pradesh'),
    ('Wheat', 25, 'Madhya Pradesh'),
    ('Bajra', 14, 'Haryana'),
    ('Wheat', 15, 'Haryana'),
    ('Rice', 30, 'Haryana'),
    ('Potato', 20, 'Haryana');

INSERT INTO private (Crop_Name, Price, Company_Name)
VALUES
    ('Rice', 12, 'TATA'),
    ('Wheat', 15, 'TATA'),
    ('Barley', 20, 'TATA'),
    ('Bajra', 35, 'TATA'),
    ('Barley', 15, 'ITC'),
    ('Wheat', 20, 'ITC'),
    ('Bajra', 25, 'ITC'),
    ('Rice', 40, 'ITC'),
    ('Barley', 20, 'Nestle'),
    ('Wheat', 22, 'Nestle'),
    ('Bajra', 24, 'Nestle'),
    ('Rice', 30, 'Nestle'),
    ('Barley', 25, 'Kissan'),
    ('Wheat', 30, 'Kissan'),
    ('Bajra', 23, 'Kissan'),
    ('Rice', 35, 'Kissan');
