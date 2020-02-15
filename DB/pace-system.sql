/*
SQLyog Ultimate v12.5.1 (64 bit)
MySQL - 10.3.12-MariaDB : Database - pace-system
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`pace-system` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci */;

USE `pace-system`;

/*Table structure for table `tbl_cursos` */

DROP TABLE IF EXISTS `tbl_cursos`;

CREATE TABLE `tbl_cursos` (
  `id_curso` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_curso_disciplina` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `id_institucion` int(11) NOT NULL,
  `precio_iva` decimal(10,2) DEFAULT NULL,
  `visible` tinyint(1) DEFAULT 1,
  PRIMARY KEY (`id_curso`),
  KEY `id_inst_avaladores` (`id_institucion`),
  CONSTRAINT `tbl_cursos_ibfk_1` FOREIGN KEY (`id_institucion`) REFERENCES `tbl_instituciones` (`id_institucion`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `tbl_cursos` */

insert  into `tbl_cursos`(`id_curso`,`nombre_curso_disciplina`,`id_institucion`,`precio_iva`,`visible`) values 
(1,'RCP DEA',1,0.00,1),
(2,'BLS',1,290.00,1),
(3,'ACLS',1,406.00,1),
(4,'PALS',1,406.00,1),
(5,'PEARS',1,406.00,1),
(6,'SALVA CORAZONES',1,175.00,1),
(7,'SALVA CORAZONES RCP DEA',1,203.00,1),
(8,'SALVA CORAZONES PRIMEROS AUXILIOS RCP DEA',1,243.60,1),
(9,'ACLS EP',1,406.00,1),
(10,'PHTLS',2,580.00,1),
(11,'AMLS',2,580.00,1),
(12,'ALSO',3,2610.00,1),
(13,'BLSO',3,1145.00,1),
(14,'BASICO',4,1100.00,1),
(15,'TNCC',5,2088.00,1),
(16,'TEST',3,99.99,1);

/*Table structure for table `tbl_instituciones` */

DROP TABLE IF EXISTS `tbl_instituciones`;

CREATE TABLE `tbl_instituciones` (
  `id_institucion` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_completo` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  `acronimo` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `visible` tinyint(1) DEFAULT 1,
  PRIMARY KEY (`id_institucion`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `tbl_instituciones` */

insert  into `tbl_instituciones`(`id_institucion`,`nombre_completo`,`acronimo`,`visible`) values 
(1,'American Heart Association','AHA',1),
(2,'National Association of Emergency Medical Technicians','NAEMT',1),
(3,'American Academy of Family Physicians','AAFP',1),
(4,'Pacesono','PACESONO',1),
(5,'Emergency Nurses association','ENA',1);

/*Table structure for table `tbl_instructores` */

DROP TABLE IF EXISTS `tbl_instructores`;

CREATE TABLE `tbl_instructores` (
  `id_instructores` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_instructor` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `primer_apellido_instructor` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `segundo_apellido_instructor` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `titulo` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `correo` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `telefono` varchar(15) CHARACTER SET utf8 DEFAULT NULL,
  `id_inst_avaladores` int(11) NOT NULL,
  `visible` tinyint(1) DEFAULT 1,
  PRIMARY KEY (`id_instructores`),
  KEY `id_inst_avaladores` (`id_inst_avaladores`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `tbl_instructores` */

/*Table structure for table `tbl_sesiones` */

DROP TABLE IF EXISTS `tbl_sesiones`;

CREATE TABLE `tbl_sesiones` (
  `id_sesion` int(11) NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `timestamp` int(10) DEFAULT NULL,
  `data` blob DEFAULT NULL,
  PRIMARY KEY (`id_sesion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `tbl_sesiones` */

/*Table structure for table `tbl_tipousuarios` */

DROP TABLE IF EXISTS `tbl_tipousuarios`;

CREATE TABLE `tbl_tipousuarios` (
  `id_tipoUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_usuario` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `visible` tinyint(1) DEFAULT 1,
  PRIMARY KEY (`id_tipoUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `tbl_tipousuarios` */

insert  into `tbl_tipousuarios`(`id_tipoUsuario`,`tipo_usuario`,`visible`) values 
(1,'SuperAdministrador',1),
(2,'Administrador',1),
(3,'Supervisor',1),
(4,'Usuario',1),
(5,'Cliente',1),
(6,'Invitado',0);

/*Table structure for table `tbl_usuarios` */

DROP TABLE IF EXISTS `tbl_usuarios`;

CREATE TABLE `tbl_usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `primerApellido` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `segundoApellido` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `correo` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(15) COLLATE utf8_spanish_ci DEFAULT NULL,
  `usuario` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `contrasenia` varbinary(150) NOT NULL,
  `id_tipoUsuario` int(11) DEFAULT NULL,
  `visible` tinyint(1) DEFAULT 1,
  `date_creado` datetime DEFAULT NULL,
  `date_actualizacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_usuario_creo` int(11) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `id_tipoUsuario` (`id_tipoUsuario`),
  KEY `id_usuario_creo` (`id_usuario_creo`),
  CONSTRAINT `tbl_usuarios_ibfk_1` FOREIGN KEY (`id_tipoUsuario`) REFERENCES `tbl_tipousuarios` (`id_tipoUsuario`),
  CONSTRAINT `tbl_usuarios_ibfk_2` FOREIGN KEY (`id_usuario_creo`) REFERENCES `tbl_usuarios` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `tbl_usuarios` */

insert  into `tbl_usuarios`(`id_usuario`,`nombre`,`primerApellido`,`segundoApellido`,`correo`,`telefono`,`usuario`,`contrasenia`,`id_tipoUsuario`,`visible`,`date_creado`,`date_actualizacion`,`id_usuario_creo`) values 
(1,'OMAR','MARTINEZ','TORRES','omarumtz@gmail.com',NULL,'omaru','0f1ec93f99be6c866b5200c578be1d71',1,1,NULL,'2019-11-27 00:42:12',1),
(67,'ADRIANA','RAMIREZ','MARES','ads@gmail.com','4735976229','adis','56af1302e6e440e4dbcfa3cf0af4887f',2,1,NULL,'2020-01-29 01:38:48',1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
