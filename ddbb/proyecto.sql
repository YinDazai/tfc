CREATE DATABASE proyecto;
USE proyecto;

CREATE TABLE usuarios(
id_usuario		INT AUTO_INCREMENT,
nombre			VARCHAR(20),
apellido		VARCHAR(20),
nombre_usuario	VARCHAR(20),
email			VARCHAR(50),
contra			VARCHAR(20),
PRIMARY KEY (id_usuario)
);

CREATE TABLE favoritos(
id				INT AUTO_INCREMENT,
nombreUsuario	VARCHAR(20),
nombre			VARCHAR(100),
PRIMARY KEY (id)
);