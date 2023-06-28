CREATE DATABASE prueba;
USE prueba;
CREATE TABLE Persona(
    id INT(11) NOT NULL PRIMARY KEY,
    Nombre VARCHAR(80) NOT NULL,
    Apellido1 VARCHAR(100) NOT NULL,
    Apellido2 VARCHAR(100) NOT NULL,
    DNI VARCHAR(10) NOT NULL
);

CREATE TABLE Coche(
    Matricula VARCHAR(7) NOT NULL PRIMARY KEY,
    Marca VARCHAR(45) NOT NULL,
    Modelo VARCHAR(45) NULL,
    Caballos INT(11) NOT NULL
);

CREATE TABLE Coche_VS_Persona(
    Coche_Matricula VARCHAR(7) NOT NULL,
    Persona_id INT(11) NOT NULL
);

ALTER TABLE Coche_VS_Persona ADD CONSTRAINT FK_Coche_VS_Persona_Coche FOREIGN KEY (Coche_Matricula) REFERENCES Coche (Matricula);

ALTER TABLE Coche_VS_Persona ADD CONSTRAINT FK_Coche_VS_Persona_Persona FOREIGN KEY (Persona_id) REFERENCES Persona (id);