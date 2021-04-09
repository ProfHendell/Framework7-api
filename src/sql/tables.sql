CREATE DATABASE IF NOT EXISTS `asistencia`;

CREATE TABLE IF NOT EXISTS `usuarios` (
	`id_usuario` INT NOT NULL AUTO_INCREMENT,
    `correo` VARCHAR(150) NOT NULL,
    `password` VARCHAR(250) NOT NULL,
    `tipo` VARCHAR(50) NOT NULL DEFAULT 'Pendiente'
    PRIMARY KEY (`id_usuario`)
);
