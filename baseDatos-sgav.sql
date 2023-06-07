--creamos la base de datos
CREATE DATABASE sgavapp;

-- seleccionamos la base de datos
USE sgavapp;

--creamos la tabla countries
CREATE TABLE countries(
    id_country INT NOT NULL AUTO_INCREMENT,
    name_country VARCHAR(50) NOT NULL UNIQUE,
    CONSTRAINT PK_Country PRIMARY KEY (id_country)
);

--creamos la tabla regions
CREATE TABLE regions(
    id_region INT NOT NULL AUTO_INCREMENT,
    name_region VARCHAR(50) NOT NULL UNIQUE,
    id_country INT(11),
    CONSTRAINT PK_Region PRIMARY KEY (id_region),
    CONSTRAINT FK_CountriesRegion FOREIGN KEY (id_country) REFERENCES countries(id_country)
);

--creamos la tabla cities
CREATE TABLE cities(
    id_city INT NOT NULL AUTO_INCREMENT,
    name_city VARCHAR(50) NOT NULL UNIQUE,
    id_region INT(11),
    CONSTRAINT PK_City PRIMARY KEY (id_city),
    CONSTRAINT FK_RegionsCities FOREIGN KEY (id_region) REFERENCES regions(id_region) 
);