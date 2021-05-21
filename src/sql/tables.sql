CREATE DATABASE IF NOT EXISTS `asistencia`;

CREATE TABLE IF NOT EXISTS `usuarios` (
	`id_usuario` INT NOT NULL AUTO_INCREMENT,
    `correo` VARCHAR(150) NOT NULL,
    `password` VARCHAR(250) NOT NULL,
    `tipo` VARCHAR(50) NOT NULL DEFAULT 'Pendiente'
    PRIMARY KEY (`id_usuario`)
);

CREATE TABLE `carreras` (
`id_carrera` INT NOT NULL AUTO_INCREMENT,
`nombre_carrera` VARCHAR(50) NOT NULL,
`anio_carrera` INT NOT NULL, 
PRIMARY KEY (`id_carrera`)
);

CREATE TABLE `clases` (
`id_clase` INT NOT NULL AUTO_INCREMENT,
`nombre_clase` VARCHAR(50) NOT NULL,
PRIMARY KEY (`id_clase`)
);

CREATE TABLE `estudiante` (
`id_estudiante` INT NOT NULL AUTO_INCREMENT,
`nombre_estudiante` VARCHAR (200) NOT NULL,
PRIMARY KEY (`id_estudiante`)
);

CREATE TABLE `docente` (
`id_docente` INT NOT NULL AUTO_INCREMENT,
`nombre_docente` VARCHAR(200) NOT NULL,
PRIMARY KEY (`id_docente`)
);

CREATE TABLE `grupos` (
`id_grupo` INT NOT NULL AUTO_INCREMENT,
`cod_grupo` VARCHAR(50) NOT NULL,
`id_carrera` INT NOT NULL,
`id_clase` INT NOT NULL,
`id_estudiante` INT NOT NULL,
`id_docente` INT NOT NULL,
`trimestre` INT NOT NULL,
PRIMARY KEY (`id_grupo`),
INDEX `cod_grupo` (`cod_grupo`),
CONSTRAINT FOREIGN KEY (`id_carrera`) REFERENCES `carreras` (`id_carrera`) ON UPDATE CASCADE ON DELETE CASCADE,
CONSTRAINT FOREIGN KEY (`id_clase`) REFERENCES `clases` (`id_clase`) ON UPDATE CASCADE ON DELETE CASCADE,
CONSTRAINT FOREIGN KEY (`id_estudiante`) REFERENCES `estudiante` (`id_estudiante`) ON UPDATE CASCADE ON DELETE CASCADE,
CONSTRAINT FOREIGN KEY (`id_docente`) REFERENCES `docente` (`id_docente`) ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE `asistencias` (
	`id_asistencia` INT NOT NULL AUTO_INCREMENT,
	`id_estudiante` INT NOT NULL,
	`grupo` VARCHAR(50) NOT NULL,
	`presente` TINYINT(4) NOT NULL,
	`creado_el` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY (`id_asistencia`)
	CONSTRAINT FOREIGN KEY (`id_estudiante`) REFERENCES `estudiante` (`id_estudiante`) ON UPDATE CASCADE ON DELETE CASCADE,
	CONSTRAINT FOREIGN KEY (`grupo`) REFERENCES `grupos` (`cod_grupo`) ON UPDATE CASCADE ON DELETE CASCADE
);