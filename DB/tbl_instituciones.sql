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

/*Table structure for table `tbl_instituciones` */

DROP TABLE IF EXISTS `tbl_instituciones`;

CREATE TABLE `tbl_instituciones` (
  `id_institucion` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_completo` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  `acronimo` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `visible` tinyint(1) DEFAULT 1,
  PRIMARY KEY (`id_institucion`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `tbl_instituciones` */

insert  into `tbl_instituciones`(`id_institucion`,`nombre_completo`,`acronimo`,`visible`) values 
(1,'American Heart Association','AHA',1),
(2,'National Association of Emergency Medical Technicians','NAEMT',1),
(3,'American Academy of Family Physicians','AAFP',1),
(4,'Pacesono','PACESONO',1),
(5,'Emergency Nurses association','ENA',1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
