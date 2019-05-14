
-- CREAR BASE DE DATOS
-------------------------->

CREATE DATABASE cms;

use cms;

-- CREAR TABLA PARA LOS USUARIOS
----------------------------------->

CREATE TABLE users(
    id int NOT NULL AUTO_INCREMENT,
    Nombre varchar(100),
    Apellido varchar(100),
    Correo text,
    Pass varchar(100),
    Rol varchar(100),
    primary key(id)
);

-- CREAR TABLA PARA LOS ARCHIVOS
----------------------------------->

CREATE TABLE archivos(
    id int NOT NULL AUTO_INCREMENT,
    Nombre varchar(100),
    Tipo varchar(100),
    Fecha text,
    Ruta Text,
    primary key(id)
);

-- CREAR TABLA PARA El HISTORIAL
----------------------------------->

CREATE TABLE historial(
    id int NOT NULL AUTO_INCREMENT,
    Nombre varchar(100),
    Tipo varchar(100),
    Accion varchar(100),
    Usuario varchar(100),
    Fecha text,
    primary key(id)
);

-- CREAR DATOS DEL ADMINISTRADOR
----------------------------------->

INSERT INTO users (Nombre, Apellido, Correo, Pass, Rol) VALUES (Admin, Admin, Admin@admin.com, Admin123, Admin)




