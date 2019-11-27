/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 10.3.14-MariaDB : Database - pace-system
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

/*Table structure for table `tbl_sesiones` */

DROP TABLE IF EXISTS `tbl_sesiones`;

CREATE TABLE `tbl_sesiones` (
  `id_sesion` int(11) NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `timestamp` int(10) DEFAULT NULL,
  `data` blob DEFAULT NULL,
  PRIMARY KEY (`id_sesion`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `tbl_sesiones` */

/*Table structure for table `tbl_tipousuarios` */

DROP TABLE IF EXISTS `tbl_tipousuarios`;

CREATE TABLE `tbl_tipousuarios` (
  `id_tipoUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_usuario` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `visible` tinyint(1) DEFAULT 1,
  PRIMARY KEY (`id_tipoUsuario`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

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
  `telefono` int(15) DEFAULT NULL,
  `usuario` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `contrasenia` varbinary(150) NOT NULL,
  `id_tipoUsuario` int(11) DEFAULT NULL,
  `visible` tinyint(1) DEFAULT 1,
  `date_creado` datetime DEFAULT NULL,
  `date_actualizacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_usuario_creo` int(11) NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `tbl_usuarios` */

insert  into `tbl_usuarios`(`id_usuario`,`nombre`,`primerApellido`,`segundoApellido`,`correo`,`telefono`,`usuario`,`contrasenia`,`id_tipoUsuario`,`visible`,`date_creado`,`date_actualizacion`,`id_usuario_creo`) values 
(1,'OMAR','MARTINEZ','TORRES','omarumtz@gmail.com',NULL,'omaru','0f1ec93f99be6c866b5200c578be1d71',1,1,NULL,'2019-11-27 00:42:12',1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
