-- --------------------------------------------------------
-- Host:                         localhost
-- Versión del servidor:         5.7.24 - MySQL Community Server (GPL)
-- SO del servidor:              Win64
-- HeidiSQL Versión:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Volcando estructura para tabla implementos_deportivos.distribuidor
CREATE TABLE IF NOT EXISTS `distribuidor` (
  `dis_id` int(11) NOT NULL AUTO_INCREMENT,
  `tie_id` int(11) NOT NULL,
  `dis_nombre` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `dis_direccion` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `dis_correo` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `dis_telefono` int(11) NOT NULL,
  PRIMARY KEY (`dis_id`),
  KEY `tie_id` (`tie_id`),
  CONSTRAINT `FK_distribuidor_tienda` FOREIGN KEY (`tie_id`) REFERENCES `tienda` (`tie_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla implementos_deportivos.distribuidor: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `distribuidor` DISABLE KEYS */;
INSERT INTO `distribuidor` (`dis_id`, `tie_id`, `dis_nombre`, `dis_direccion`, `dis_correo`, `dis_telefono`) VALUES
	(1, 1, 'JORGUE', 'NORTE QUITO', 'jorgue@gmail.com', 1234567890);
/*!40000 ALTER TABLE `distribuidor` ENABLE KEYS */;

-- Volcando estructura para tabla implementos_deportivos.factura
CREATE TABLE IF NOT EXISTS `factura` (
  `fac_id` int(11) NOT NULL AUTO_INCREMENT,
  `tie_id` int(11) NOT NULL,
  `per_id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `fac_numero_facturas` int(11) NOT NULL,
  `fac_fecha` date NOT NULL,
  `fac_iva` float NOT NULL DEFAULT '0',
  `fac_descuento` float NOT NULL DEFAULT '0',
  PRIMARY KEY (`fac_id`),
  KEY `tie_id` (`tie_id`),
  KEY `per_id` (`per_id`),
  KEY `pro_id` (`pro_id`),
  CONSTRAINT `FK_factura_persona` FOREIGN KEY (`per_id`) REFERENCES `persona` (`per_id`),
  CONSTRAINT `FK_factura_producto` FOREIGN KEY (`pro_id`) REFERENCES `producto` (`pro_id`),
  CONSTRAINT `FK_factura_tienda` FOREIGN KEY (`tie_id`) REFERENCES `tienda` (`tie_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla implementos_deportivos.factura: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `factura` DISABLE KEYS */;
INSERT INTO `factura` (`fac_id`, `tie_id`, `per_id`, `pro_id`, `fac_numero_facturas`, `fac_fecha`, `fac_iva`, `fac_descuento`) VALUES
	(5, 1, 1, 2, 1, '2021-06-10', 1, 0),
	(12, 1, 1, 1, 2, '2021-06-11', 0, 0),
	(17, 1, 1, 1, 6, '2021-06-25', 0, 0),
	(18, 1, 1, 1, 7, '2021-06-25', 0, 0);
/*!40000 ALTER TABLE `factura` ENABLE KEYS */;

-- Volcando estructura para tabla implementos_deportivos.factura_detalle
CREATE TABLE IF NOT EXISTS `factura_detalle` (
  `facd_id` int(11) NOT NULL AUTO_INCREMENT,
  `fac_id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `facd_cant` float NOT NULL,
  `facd_vu` float NOT NULL,
  PRIMARY KEY (`facd_id`),
  KEY `fac_id` (`fac_id`),
  KEY `pro_id` (`pro_id`),
  CONSTRAINT `FK_factura_detalle_factura` FOREIGN KEY (`fac_id`) REFERENCES `factura` (`fac_id`),
  CONSTRAINT `FK_factura_detalle_producto` FOREIGN KEY (`pro_id`) REFERENCES `producto` (`pro_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla implementos_deportivos.factura_detalle: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `factura_detalle` DISABLE KEYS */;
INSERT INTO `factura_detalle` (`facd_id`, `fac_id`, `pro_id`, `facd_cant`, `facd_vu`) VALUES
	(16, 12, 1, 4, 10),
	(17, 5, 2, 4, 7);
/*!40000 ALTER TABLE `factura_detalle` ENABLE KEYS */;

-- Volcando estructura para tabla implementos_deportivos.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla implementos_deportivos.failed_jobs: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Volcando estructura para tabla implementos_deportivos.inventario
CREATE TABLE IF NOT EXISTS `inventario` (
  `inv_id` int(11) NOT NULL AUTO_INCREMENT,
  `pro_id` int(11) NOT NULL,
  `tie_id` int(11) NOT NULL,
  `per_id` int(11) DEFAULT NULL,
  `inv_fecha` date NOT NULL,
  `inv_hora` time NOT NULL,
  `inv_cantidad` int(11) NOT NULL,
  `inv_documento` int(11) NOT NULL,
  `inv_serie` int(11) NOT NULL,
  PRIMARY KEY (`inv_id`),
  KEY `pro_id` (`pro_id`),
  KEY `tie_id` (`tie_id`),
  KEY `per_id` (`per_id`),
  CONSTRAINT `FK_inventario_persona` FOREIGN KEY (`per_id`) REFERENCES `persona` (`per_id`),
  CONSTRAINT `FK_inventario_producto` FOREIGN KEY (`pro_id`) REFERENCES `producto` (`pro_id`),
  CONSTRAINT `FK_inventario_tienda` FOREIGN KEY (`tie_id`) REFERENCES `tienda` (`tie_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla implementos_deportivos.inventario: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `inventario` DISABLE KEYS */;
INSERT INTO `inventario` (`inv_id`, `pro_id`, `tie_id`, `per_id`, `inv_fecha`, `inv_hora`, `inv_cantidad`, `inv_documento`, `inv_serie`) VALUES
	(4, 1, 1, 1, '2021-06-08', '04:20:00', 1, 1, 1);
/*!40000 ALTER TABLE `inventario` ENABLE KEYS */;

-- Volcando estructura para tabla implementos_deportivos.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla implementos_deportivos.migrations: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Volcando estructura para tabla implementos_deportivos.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla implementos_deportivos.password_resets: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Volcando estructura para tabla implementos_deportivos.persona
CREATE TABLE IF NOT EXISTS `persona` (
  `per_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `per_cedula` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `per_apellidos` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `per_nombres` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `per_direccion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `per_telefono` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `per_ciudad` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `per_tipo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `per_sexo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `per_usuario` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `per_estado` int(11) DEFAULT '1',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`per_id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla implementos_deportivos.persona: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `persona` DISABLE KEYS */;
INSERT INTO `persona` (`per_id`, `name`, `per_cedula`, `per_apellidos`, `per_nombres`, `per_direccion`, `per_telefono`, `per_ciudad`, `per_tipo`, `per_sexo`, `per_usuario`, `per_estado`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Kevin Toaquiza', '123456789', 'Toaquiza', 'Kevin', 'Quitumbe', '0987654321', 'Quito', 'A', '', 'kevinrex', 1, 'ktoaquiza17@gmail.com', NULL, '$2y$10$smEjFNAZgA0JRWd.9PCC5.ZDiMLdKpCx98DVy47bOmABjAFSPDUiu', NULL, '2021-05-10 13:19:41', '2021-05-10 13:19:41'),
	(2, 'Vaca Lola', '123456789', 'Cabrera', 'Nicole', 'La Granja', '2123451', 'Guamani', 'C', 'MUJER', 'nicole', 1, 'nicole@gmail.com', NULL, '$2y$10$tOW/geVbOSmXLJpwEApn4ukv8/kd6yrm1JU0kAYFKrMgD5PZJCmIW', NULL, NULL, '2021-06-25 23:04:09'),
	(3, 'Vega Bryan', '123465798', 'Vega', 'Bryan', 'Quitumbe', '123456789', NULL, 'U', 'HOMBRE', 'Bryan', 1, 'bryan123@gmail.com', NULL, '$2y$10$0p448uf1xvGAsQI.OTuKpOeav9yNDuuhe.7IzYijJ8TuMDXliudFW', NULL, '2021-06-22 22:24:16', '2021-06-22 22:24:16'),
	(4, NULL, '12345666', 'Ramos', 'Kevin', 'Guamani', '12345677', NULL, 'C', 'HOMBRE', 'kevin', 1, 'kevin@gmail.com', NULL, '$2y$10$flPkeA7x3VD31SKnxQysT.kc7A5vt.5sWyPymnFkdmEH0Y9BQY5Jy', NULL, '2021-06-23 16:47:12', '2021-06-23 16:47:12'),
	(5, NULL, '132456123', 'Veloz', 'Angel', 'Comercio', '123331231', NULL, 'A', 'HOMBRE', 'angel', 1, 'angel@gmail.com', NULL, '$2y$10$JbYCwGk8Y.mzTeVA9YL1FuLz.WX9XvjXUrfDUNFtAKDcsykRkYkBe', NULL, '2021-06-23 16:48:36', '2021-06-23 16:48:36');
/*!40000 ALTER TABLE `persona` ENABLE KEYS */;

-- Volcando estructura para tabla implementos_deportivos.producto
CREATE TABLE IF NOT EXISTS `producto` (
  `pro_id` int(11) NOT NULL AUTO_INCREMENT,
  `tpro_id` int(11) NOT NULL,
  `pro_codigo` int(11) NOT NULL,
  `pro_descripcion` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `pro_marca` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `pro_modelo` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `pro_material` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `pro_medida` int(11) NOT NULL,
  `pro_capacidad` int(11) DEFAULT NULL,
  `pro_unidad` int(11) NOT NULL,
  `pro_nivel_proteccion` int(11) DEFAULT NULL,
  PRIMARY KEY (`pro_id`),
  KEY `tpro_id` (`tpro_id`),
  CONSTRAINT `FK_producto_tipo_producto` FOREIGN KEY (`tpro_id`) REFERENCES `tipo_producto` (`tpro_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla implementos_deportivos.producto: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
INSERT INTO `producto` (`pro_id`, `tpro_id`, `pro_codigo`, `pro_descripcion`, `pro_marca`, `pro_modelo`, `pro_material`, `pro_medida`, `pro_capacidad`, `pro_unidad`, `pro_nivel_proteccion`) VALUES
	(1, 1, 154, 'Balon del mundial', 'adidas', 'nike', 'cuero', 50, NULL, 1, 5),
	(2, 1, 147, 'Box', 'ADIDAS', 'NIKE JAJA', 'GOMA', 8, 1, 2, 5),
	(3, 2, 1234, 'Guantes Box 8onz', 'Everlast', 'Elite', 'Espuma', 8, 1, 2, 4);
/*!40000 ALTER TABLE `producto` ENABLE KEYS */;

-- Volcando estructura para tabla implementos_deportivos.tienda
CREATE TABLE IF NOT EXISTS `tienda` (
  `tie_id` int(11) NOT NULL AUTO_INCREMENT,
  `tie_razon_social` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `tie_nombre` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `tie_direccion` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `tie_telefono` int(11) NOT NULL,
  `tie_correo` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `tie_pagina_web` int(11) DEFAULT NULL,
  `tie_ruc` int(11) NOT NULL,
  PRIMARY KEY (`tie_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla implementos_deportivos.tienda: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `tienda` DISABLE KEYS */;
INSERT INTO `tienda` (`tie_id`, `tie_razon_social`, `tie_nombre`, `tie_direccion`, `tie_telefono`, `tie_correo`, `tie_pagina_web`, `tie_ruc`) VALUES
	(1, 'EITHAN', 'EITHANS', 'QUITUMBE', 1234567890, 'ktoaquiza17@gmail.com', 1, 123456781),
	(2, 'EITHAN\'S JR', 'EITHAN\'S JR', 'Quito', 123456789, 'eithansjr@gmail.com', 1, 12345678);
/*!40000 ALTER TABLE `tienda` ENABLE KEYS */;

-- Volcando estructura para tabla implementos_deportivos.tipo_producto
CREATE TABLE IF NOT EXISTS `tipo_producto` (
  `tpro_id` int(11) NOT NULL AUTO_INCREMENT,
  `dis_id` int(11) NOT NULL,
  `tpro_descripcion` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `tpro_estado` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`tpro_id`),
  KEY `dis_id` (`dis_id`),
  CONSTRAINT `FK_tipo_producto_distribuidor` FOREIGN KEY (`dis_id`) REFERENCES `distribuidor` (`dis_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla implementos_deportivos.tipo_producto: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `tipo_producto` DISABLE KEYS */;
INSERT INTO `tipo_producto` (`tpro_id`, `dis_id`, `tpro_descripcion`, `tpro_estado`) VALUES
	(1, 1, 'Futbol', 'Nuevo'),
	(2, 1, 'Boxeo', 'Nuevo');
/*!40000 ALTER TABLE `tipo_producto` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
