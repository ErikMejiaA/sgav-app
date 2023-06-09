--BASE DE DATOS PARA SER IMPLEMENTADA EN POSTGRES
CREATE DATABASE sgavapp;

-- seleccionamos la base de datos
USE sgavapp;

--creamos la tabla countries
CREATE TABLE countries(
    id_country INT NOT NULL SERIAL,
    name_country VARCHAR(50) NOT NULL UNIQUE,
    CONSTRAINT PK_Country PRIMARY KEY (id_country)
);

--creamos la tabla regions
CREATE TABLE regions(
    id_region INT NOT NULL SERIAL,
    name_region VARCHAR(50) NOT NULL UNIQUE,
    id_country INT(11),
    CONSTRAINT PK_Region PRIMARY KEY (id_region),
    CONSTRAINT FK_CountriesRegion FOREIGN KEY (id_country) REFERENCES countries(id_country)
);

--creamos la tabla cities
CREATE TABLE cities(
    id_city INT NOT NULL SERIAL,
    name_city VARCHAR(50) NOT NULL UNIQUE,
    id_region INT(11),
    CONSTRAINT PK_City PRIMARY KEY (id_city),
    CONSTRAINT FK_RegionsCities FOREIGN KEY (id_region) REFERENCES regions(id_region) 
);

--creamos la tabla de person
CREATE TABLE persons(
    id_person VARCHAR(20) NOT NULL UNIQUE,
    firstname_person VARCHAR(50) NOT NULL,
    lastname_person VARCHAR(50) NOT NULL,
    birthdate_person DATE NOT NULL,
    id_city INT(11),
    CONSTRAINT PK_Person PRIMARY KEY (id_person),
    CONSTRAINT FK_CitiesPersons FOREIGN KEY (id_city) REFERENCES cities(id_city)
);

--creamos la tabla housetype
CREATE TABLE housetype(
    id_housetype INT NOT NULL SERIAL,
    name_housetype VARCHAR(50) NOT NULL UNIQUE,
    CONSTRAINT PK_Housetype PRIMARY KEY (id_housetype)
);

--creamos la tabla living_place
CREATE TABLE living_place(
    id_living INT NOT NULL SERIAL,
    id_person VARCHAR(20),
    id_city INT(11),
    rooms_living INT NOT NULL,
    bathrooms_living INT NOT NULL,
    kitchen_living INT NOT NULL,
    tvroom_living INT NOT NULL,
    patio_living INT NOT NULL,
    pool_living INT NOT NULL,
    barbecue_living INT NOT NULL,
    image_living VARCHAR(60),
    id_housetype INT(11),
    CONSTRAINT PK_Living PRIMARY KEY (id_living),
    CONSTRAINT FK_PersonsLiving FOREIGN KEY (id_person) REFERENCES persons(id_person),
    CONSTRAINT FK_CitiesLiving FOREIGN KEY (id_city) REFERENCES cities(id_city),
    CONSTRAINT FK_HousetypeLiving FOREIGN KEY (id_housetype) REFERENCES housetype(id_housetype)
);