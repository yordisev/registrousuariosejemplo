-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.11-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para nueva
CREATE DATABASE IF NOT EXISTS `nueva` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `nueva`;

-- Volcando estructura para tabla nueva.db_afiliados
CREATE TABLE IF NOT EXISTS `db_afiliados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `documento` varchar(50) DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `pnombre` varchar(50) DEFAULT NULL,
  `snombre` varchar(50) DEFAULT NULL,
  `papellido` varchar(50) DEFAULT NULL,
  `sapellido` varchar(50) DEFAULT NULL,
  `fechan` varchar(50) DEFAULT NULL,
  `sexo` varchar(50) DEFAULT NULL,
  `tsangre` varchar(50) DEFAULT NULL,
  `estadoc` varchar(50) DEFAULT NULL,
  `telefono` int(11) DEFAULT NULL,
  `correo` varchar(50) DEFAULT NULL,
  `ciudad` varchar(50) DEFAULT NULL,
  `barrio` varchar(50) DEFAULT NULL,
  `direccion` varchar(50) DEFAULT NULL,
  `fechar` date DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `documento_numero` (`documento`,`numero`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- Volcando datos para la tabla nueva.db_afiliados: ~15 rows (aproximadamente)
/*!40000 ALTER TABLE `db_afiliados` DISABLE KEYS */;
INSERT INTO `db_afiliados` (`id`, `documento`, `numero`, `pnombre`, `snombre`, `papellido`, `sapellido`, `fechan`, `sexo`, `tsangre`, `estadoc`, `telefono`, `correo`, `ciudad`, `barrio`, `direccion`, `fechar`, `estado`) VALUES
	(1, 'CC', 2147483647, 'ANDRES', 'DAVID', 'AGUILAR', 'REALES', '2020-05-03', 'FEMENINO', 'O+', 'SOLTERO', 345348543, 'ajdals@aygyu.com', 'BARRANQUILLA', 'VILLA ADELA', '823ysac', '0000-00-00', 'ACTIVO'),
	(2, 'CC', 10283388, 'AVIS', 'RAFAEL', 'BARRIOS', 'RAMOS', '2020-05-03', 'MASCULINO', 'O+', 'CASADO', 345348543, 'ajdals@aygyu.com', 'BARRANQUILLA', 'LA CENTRAL', 'cll 5 # 32-43', '0000-00-00', 'INACTIVO'),
	(3, 'TI', 19249926, 'YORDIS', 'ANDRES', 'ESCORCIA', 'VASQUEZ', '2020-05-03', 'MASCULINO', 'MASCULINO', 'SOLTERO', 64686299, 'yescor@redes.com', 'BARRANQUILLA', 'ciudadela', 'askslak', '0000-00-00', 'ACTIVO'),
	(4, 'CC', 12232454, 'DAYANA', 'DANIELA', 'REALES', 'PEREZ', '1999-02-18', 'FEMENINO', 'FEMENINO', 'CASADO', 2147483647, 'manuela@redes.com', 'CARTAGENA', 'candela', 'calle 45 # 34-65', '0000-00-00', 'INACTIVO'),
	(5, 'CC', 104372662, 'MANUELA2', 'DANIELA2', 'REALES2', 'PEREZ2', '2000-02-18', 'FEMENINO', 'MASCULINO', 'SOLTERO', 93409230, 'manuela2@redes.com', 'BOGOTA', 'salud', 'calle 43 # 34-22', '0000-00-00', 'ACTIVO'),
	(6, 'CC', 105830384, 'DANIELA', 'ANDREA', 'CASSIANI', 'ORTIZ', '1991-04-05', 'FEMENINO', 'FEMENINO', 'UNION LIBRE', 2147483647, 'daniela@redes.com', 'BARRANQUILLA', 'catanga', 'calle 76 # 31-12', '0000-00-00', 'INACTIVO'),
	(7, 'CC', 10342765, 'DANIEL', 'ENRIQUE', 'CARDONA', 'SANCHEZ', '1995-11-02', 'MASCULINO', 'MASCULINO', 'SOLTERO', 2147483647, 'daniel08@redes.com', 'BOGOTA', 'la luz', 'calle 92 # 65-12', '0000-00-00', 'ACTIVO'),
	(8, 'CC', 102834466, 'CARDONA', 'DANIEL', 'SALAZAR', 'OSPINO', '1994-03-17', 'MASCULINO', 'MASCULINO', 'CASADO', 2147483647, 'cardona@redes.com', 'CARTAGENA', 'carrizal', 'calle 32 # 32-1', '0000-00-00', 'INACTIVO'),
	(9, 'TI', 288646753, 'LUIS', 'ANDRES', 'SARA', 'OSPINO', '2000-01-22', 'MASCULINO', 'MASCULINO', 'UNION LIBRE', 2147483647, 'cardona@redes.com', 'BOGOTA', 'VALLE', 'calle 32 # 32-14', '0000-00-00', 'ACTIVO'),
	(11, 'CC', 212121, 'MORELA', 'ISABELL', 'ESCORCIA', 'MARTINES', '1999-09-09', 'FEMENINO', 'MASCULINO', 'SOLTERO', 2147483647, 'morellaa@REDES.COM', 'BOGOTA', 'CANDELARIA', 'CALLE 22-33', '0000-00-00', 'INACTIVO'),
	(44, 'TI', 123456789, 'NENA', 'ANA', 'CASTRO', 'HERNANDEZ', '2000-07-23', 'FEMENINO', 'FEMENINO', 'SOLTERO', 2147483647, 'NENA@REDES.COM', 'BARRANQUILLA', 'LA PAZ', 'CALLE 54-65', '0000-00-00', 'ACTIVO'),
	(50, 'CC', 878787878, 'JOSE', 'LUIS', 'YEPES', 'ROMERO', '1999-09-09', 'MASCULINO', 'FEMENINO', 'SOLTERO', 2147483647, 'jose@redes.com', 'BARRANQUILLA', 'viñate', 'calle 54 con carrera 15', '0000-00-00', 'INACTIVO'),
	(52, 'CC', 1045307221, 'ARNOLITO', 'ANDRES', 'ORTIZ', 'BATISTA', '1992-03-24', 'MASCULINO', 'FEMENINO', 'SOLTERO', 31372552, 'ALRMO@REDES.COM', 'BARRANQUILLA', 'LA PAZ', 'CRA 5 # 24-43', NULL, 'ACTIVO'),
	(53, 'TI', 1028366236, 'morela', 'isabel', 'escorcia', 'vasquez', '1990-01-20', 'FEMENINO', 'FEMENINO', 'CASADO', 2147483647, 'more@redes.com', 'CARTAGENA', 'olaya', 'cra 4 # 24-34', NULL, 'INACTIVO'),
	(55, 'TI', 34343434, 'TEST', 'TEST1', 'TEST2', 'TEST3', '2020-06-10', 'MASCULINO', 'MASCULINO', 'UNION LIBRE', 2147483647, 'REDES@REDES.COM', 'BARRANQUILLA', 'LA LOMA', 'CRA 5B #23-54', NULL, 'ACTIVO');
/*!40000 ALTER TABLE `db_afiliados` ENABLE KEYS */;

-- Volcando estructura para tabla nueva.db_archivos
CREATE TABLE IF NOT EXISTS `db_archivos` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `size` varchar(100) NOT NULL,
  `ruta` varchar(150) DEFAULT NULL,
  `numero` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Volcando datos para la tabla nueva.db_archivos: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `db_archivos` DISABLE KEYS */;
INSERT INTO `db_archivos` (`id`, `name`, `size`, `ruta`, `numero`) VALUES
	(5, 'PF19TBDL.pdf', '104697', 'certificados/', '2147483647'),
	(6, 'R90KMAZ4.pdf', '104697', 'certificados/R90KMAZ4.pdf', '2147483647');
/*!40000 ALTER TABLE `db_archivos` ENABLE KEYS */;

-- Volcando estructura para tabla nueva.db_historial
CREATE TABLE IF NOT EXISTS `db_historial` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `diacita` date DEFAULT NULL,
  `horacita` varchar(50) DEFAULT NULL,
  `especialista` varchar(50) DEFAULT NULL,
  `numero` varchar(50) DEFAULT NULL,
  `pnombre` varchar(50) DEFAULT NULL,
  `papellido` varchar(50) DEFAULT NULL,
  `usuario` varchar(50) DEFAULT NULL,
  `estadocita` varchar(50) DEFAULT NULL,
  `fechacomentario` date DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- Volcando datos para la tabla nueva.db_historial: ~21 rows (aproximadamente)
/*!40000 ALTER TABLE `db_historial` DISABLE KEYS */;
INSERT INTO `db_historial` (`id`, `diacita`, `horacita`, `especialista`, `numero`, `pnombre`, `papellido`, `usuario`, `estadocita`, `fechacomentario`) VALUES
	(2, '2020-06-11', '14:49', 'YORDIS ESCORCIA', '2147483647', 'ANDRES', 'AGUILAR', 'yordis', 'ATENDIDO', '2020-05-29'),
	(3, '2020-06-11', '14:53', 'YORDIS ESCORCIA', '2147483647', 'ANDRES', 'AGUILAR', 'yordis', 'AUSENTE', '2020-05-29'),
	(4, '2020-06-11', '16:50', 'YORDIS ESCORCIA', '10283388', 'AVIS', 'BARRIOS', 'yordis', 'POR ATENDER', '2020-05-29'),
	(5, '2020-06-11', '18:39', 'DAIRO BARRIOS', '105830384', 'DANIELA', 'CASSIANI', 'yordis', 'POR ATENDER', '2020-05-29'),
	(6, '2020-06-11', '17:39', 'DAIRO BARRIOS', '878787878', 'JOSE', 'YEPES', 'yordis', 'POR ATENDER', '2020-05-29'),
	(7, '2020-06-11', '16:16', 'YORDIS ESCORCIA', '12232454', 'DAYANA', 'REALES', 'yordis', 'ATENDIDO', '2020-05-29'),
	(8, '2020-06-11', '13:46', 'DAIRO BARRIOS', '102834466', 'CARDONA', 'SALAZAR', 'yordis.escorcia', 'ATENDIDO', '2020-05-30'),
	(9, '2020-06-11', '15:46', 'DAIRO BARRIOS', '10283388', 'AVIS', 'BARRIOS', 'yordis.escorcia', 'POR ATENDER', '2020-05-30'),
	(10, '2020-06-11', '15:50', 'YORDIS ESCORCIA', '104372662', 'MANUELA2', 'REALES2', 'yordis.escorcia', 'POR ATENDER', '2020-05-30'),
	(11, '2020-06-11', '17:53', 'YORDIS ESCORCIA', '212121', 'MORELA', 'ESCORCIA', 'yordis.escorcia', 'POR ATENDER', '2020-05-30'),
	(12, '2020-06-11', '16:52', 'DAIRO BARRIOS', '123456789', 'NENA', 'CASTRO', 'yordis.escorcia', 'POR ATENDER', '2020-05-30'),
	(13, '2020-06-11', '15:18', 'YORDIS ESCORCIA', '2147483647', 'ANDRES', 'AGUILAR', 'yordis', 'POR ATENDER', '2020-06-03'),
	(16, '2020-06-11', '23:25', 'YORDIS ESCORCIA', '104372662', ' MANUELA2', 'REALES2', 'YORDIS', 'POR ATENDER', '2020-06-09'),
	(17, '2020-06-11', '17:40', 'YORDIS ESCORCIA', '10283388', 'AVIS', 'BARRIOS', 'YORDIS', 'POR ATENDER', '2020-06-10'),
	(19, '2020-06-11', '17:45', 'YORDIS ESCORCIA', '10283388', 'AVIS', 'BARRIOS', 'YORDIS', 'POR ATENDER', '2020-06-10'),
	(20, '2020-06-11', '17:45', 'YORDIS ESCORCIA', '12232454', 'DAYANA', 'REALES', 'YORDIS', 'POR ATENDER', '2020-06-10'),
	(21, '2020-06-11', '19:45', 'YORDIS ESCORCIA', '10283388', 'AVIS', 'BARRIOS', 'YORDIS', 'POR ATENDER', '2020-06-10'),
	(22, '2020-06-11', '19:43', 'YORDIS ESCORCIA', '10342765', 'DANIEL', 'CARDONA', 'YORDIS', 'ATENDIDO', '2020-06-10'),
	(23, '2020-06-11', '22:11', 'YORDIS ESCORCIA', '2147483647', 'ANDRES', 'AGUILAR', 'YORDIS', 'POR ATENDER', '2020-06-10'),
	(24, '2020-06-11', '22:12', 'YORDIS ESCORCIA', '12232454', 'DAYANA', 'REALES', 'YORDIS', 'ATENDIDO', '2020-06-10'),
	(25, '2020-06-11', '14:21', 'DAIRO BARRIOS', '34343434', 'TEST', 'TEST2', 'YORDIS', 'ATENDIDO', '2020-06-10');
/*!40000 ALTER TABLE `db_historial` ENABLE KEYS */;

-- Volcando estructura para tabla nueva.db_usuarios
CREATE TABLE IF NOT EXISTS `db_usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `documento` varchar(50) DEFAULT NULL,
  `numero` varchar(50) DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `fechan` varchar(50) DEFAULT NULL,
  `sexo` varchar(50) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `permisos` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla nueva.db_usuarios: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `db_usuarios` DISABLE KEYS */;
INSERT INTO `db_usuarios` (`id`, `documento`, `numero`, `nombre`, `apellido`, `fechan`, `sexo`, `username`, `password`, `permisos`, `status`) VALUES
	(5, 'CC', '2873273', 'ANDRES', 'REALES', '2020-06-05', 'MASCULINO', 'andres', '231badb19b93e44f47da1bd64a8147f2', 'USER', 'activo'),
	(6, 'CC', '1045307221', 'YORDIS', 'ESCORCIA', '2020-06-05', 'MASCULINO', 'yordis', 'd80e86803fc053d3a21bea1c824554c2', 'USER', 'activo'),
	(7, 'CC', '147547537', 'DAIRO', 'BARRIOS', '2020-06-06', 'MASCULINO', 'dairo', '72ac9051bf804b13209fd78611705a7b', 'ADMIN', 'activo');
/*!40000 ALTER TABLE `db_usuarios` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
