    CREATE DATABASE QRAYATHON;

    CREATE TABLE USER (
        id INT AUTO_INCREMENT PRIMARY KEY,
        first_name VARCHAR(50) NOT NULL,
        last_name VARCHAR(50) NOT NULL,
        user_name VARCHAR(50) NOT NULL UNIQUE,
        email VARCHAR(50) NOT NULL UNIQUE,
        password VARCHAR(50) NOT NULL UNIQUE,
        role
    );

    CREATE TABLE LIVRE (
        id INT AUTO_INCREMENT PRIMARY KEY,
        tilte VARCHAR(50) NOT NULL UNIQUE,
        auteur VARCHAR(50) NOT NULL,
        dispo 
    );

