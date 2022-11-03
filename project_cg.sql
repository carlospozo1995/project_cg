-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 03-11-2022 a las 04:21:51
-- Versión del servidor: 5.7.33
-- Versión de PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `project_cg`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `idcategoria` bigint(20) NOT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_swedish_ci NOT NULL,
  `imgcategoria` varchar(100) COLLATE utf8mb4_swedish_ci DEFAULT NULL,
  `icon_category_father` varchar(100) COLLATE utf8mb4_swedish_ci DEFAULT NULL,
  `datecreate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `categoria_father_id` bigint(20) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`idcategoria`, `nombre`, `imgcategoria`, `icon_category_father`, `datecreate`, `categoria_father_id`, `status`) VALUES
(1, 'ELECTRODOMÉSTICOS', 'img_ELECTRODOMÉSTICOS_766a3c5ace117afcfccb599b2375f264.jpg', 'icono_ELECTRODOMESTICOS_a4c5378a1c3ade90a0374d451316d066.jpg', '2022-10-19 17:12:57', NULL, 1),
(2, 'Climatización', NULL, NULL, '2022-10-19 17:14:18', 1, 1),
(3, 'Ventiladores', NULL, NULL, '2022-10-19 17:14:36', 2, 1),
(4, 'Aires acondicionados', NULL, NULL, '2022-10-19 17:15:10', 2, 1),
(5, 'Cocinas', NULL, NULL, '2022-10-19 17:15:33', 1, 1),
(6, 'Cocinas a gas', NULL, NULL, '2022-10-19 17:16:06', 5, 1),
(7, 'Hornos', NULL, NULL, '2022-10-19 17:16:37', 5, 1),
(8, 'Cocinas de inducción', NULL, NULL, '2022-10-19 17:18:41', 5, 1),
(9, 'Lavado y secado', NULL, NULL, '2022-10-21 15:28:05', 1, 1),
(10, 'Lavadoras', NULL, NULL, '2022-10-21 15:28:23', 9, 1),
(11, 'Secadoras', NULL, NULL, '2022-10-21 15:28:38', 9, 1),
(12, 'Refrigeración', NULL, NULL, '2022-10-21 15:29:07', 1, 1),
(13, 'Refrigeradoras', NULL, NULL, '2022-10-21 15:29:24', 12, 1),
(14, 'Congeladores', NULL, NULL, '2022-10-21 15:29:39', 12, 1),
(15, 'AUDIO & VIDEO', 'img_AUDIO & VIDEO_8b6328f0438e35cc14e3bb0e8bd4d50b.jpg', 'icono_AUDIO & VIDEO_84295d7a28171cb4dfc6ea0a7e75c76e.jpg', '2022-10-21 15:33:08', NULL, 1),
(16, 'Audio & sonido', NULL, NULL, '2022-10-21 15:33:55', 15, 1),
(17, 'Equipos de sonido', NULL, NULL, '2022-10-21 15:34:16', 16, 1),
(18, 'Parlantes portátiles', NULL, NULL, '2022-10-21 15:34:32', 16, 1),
(19, 'Barras de sonido', NULL, NULL, '2022-10-21 15:35:40', 16, 1),
(20, 'Audífonos', NULL, NULL, '2022-10-21 15:36:21', 16, 1),
(21, 'Micrófonos', NULL, NULL, '2022-10-21 15:36:37', 16, 1),
(22, 'Tv & video', NULL, NULL, '2022-10-21 15:40:20', 15, 1),
(23, 'Televisores', NULL, NULL, '2022-10-21 15:40:36', 22, 1),
(24, 'Soporte de pared', NULL, NULL, '2022-10-21 15:41:09', 22, 1),
(25, 'Antenas prepago', NULL, NULL, '2022-10-21 15:41:27', 22, 1),
(26, 'TECNOLOGÍA', 'img_TECNOLOGÍA_365bd04097159050f4afaeac99f7b6dc.jpg', 'icono_TECNOLOGÍA_087c43184b2f687cc19e7475eb151624.jpg', '2022-10-21 15:44:12', NULL, 1),
(27, 'Computadoras', NULL, NULL, '2022-10-21 15:46:51', 26, 1),
(28, 'De escritorio', NULL, NULL, '2022-10-21 15:47:13', 27, 1),
(29, 'Laptos', NULL, NULL, '2022-10-21 15:47:25', 27, 1),
(30, 'Monitores', NULL, NULL, '2022-10-21 15:48:19', 27, 1),
(31, 'Impresoras', NULL, NULL, '2022-10-21 15:48:33', 27, 1),
(32, 'Smartphones', NULL, NULL, '2022-10-21 15:48:55', 26, 1),
(33, 'Celulares', NULL, NULL, '2022-10-21 15:49:17', 32, 1),
(34, 'Tablets', NULL, NULL, '2022-10-21 15:49:30', 32, 1),
(35, 'Proyectores', NULL, NULL, '2022-10-21 15:50:02', 26, 1),
(36, 'ELECTROMENORES', 'img_ELECTROMENORES_9fe1143a51158b4d46dbcb3b800cb9e4.jpg', 'icono_ELECTROMENORES_43c60dfbff4414ec61cc9688b9bfebd9.jpg', '2022-10-21 16:00:26', NULL, 1),
(37, 'Ayudantes del hogar', NULL, NULL, '2022-10-21 16:00:50', 36, 1),
(38, 'Arroceras', NULL, NULL, '2022-10-21 16:01:33', 37, 1),
(39, 'Ollas eléctricas', NULL, NULL, '2022-10-21 16:01:50', 37, 1),
(40, 'Exprimidores', NULL, NULL, '2022-10-21 16:02:20', 37, 1),
(41, 'Planchas de ropa', NULL, NULL, '2022-10-21 16:02:39', 37, 1),
(42, 'Licuadoras', NULL, NULL, '2022-10-21 16:03:38', 37, 1),
(43, 'Dispensadores', NULL, NULL, '2022-10-21 16:04:05', 37, 1),
(44, 'Air fryer', NULL, NULL, '2022-10-21 16:04:37', 37, 1),
(45, 'Batidoras', NULL, NULL, '2022-10-21 16:04:53', 37, 1),
(46, 'Cafeteras', NULL, NULL, '2022-10-21 16:05:21', 37, 1),
(47, 'Sanducheras y wafleras', NULL, NULL, '2022-10-21 16:05:55', 37, 1),
(48, 'HOGAR', 'img_HOGAR_93d2cce3553cd8cf3d3f78cc11ef4206.jpg', 'icono_HOGAR_ef6fe3bfbea8a099386b929606024c46.jpg', '2022-10-21 16:06:54', NULL, 1),
(49, 'Cocina', NULL, NULL, '2022-10-21 16:07:32', 48, 1),
(50, 'Ollas y sartenes', NULL, NULL, '2022-10-21 16:08:18', 49, 1),
(51, 'Utensilios', NULL, NULL, '2022-10-21 16:08:57', 49, 1),
(52, 'Dormitorio', NULL, NULL, '2022-10-21 16:10:13', 48, 1),
(53, 'Colchones', NULL, NULL, '2022-10-21 16:10:43', 52, 1),
(54, 'Base de colchones', NULL, NULL, '2022-10-21 16:11:04', 52, 1),
(55, 'Almohadas', NULL, NULL, '2022-10-21 16:11:31', 52, 1),
(56, 'Camas y sofacamas', NULL, NULL, '2022-10-21 16:11:48', 52, 1),
(57, 'Aspirado y limpieza', NULL, NULL, '2022-10-21 16:14:44', 48, 1),
(58, 'Aspiradoras', NULL, NULL, '2022-10-21 16:15:29', 57, 1),
(59, 'Hidrolavadoras', NULL, NULL, '2022-10-21 16:15:48', 57, 1),
(60, 'Muebles', NULL, NULL, '2022-10-21 16:16:14', 48, 1),
(61, 'Muebles de dormitorio', NULL, NULL, '2022-10-21 16:16:41', 60, 1),
(62, 'Muebles de sala', NULL, NULL, '2022-10-21 16:16:56', 60, 1),
(63, 'Muebles de cocina', NULL, NULL, '2022-10-21 16:17:44', 60, 1),
(64, 'MOVILIDAD', 'img_MOVILIDAD_3f147833943dde215593215717bf4e71.jpg', 'icono_Movilidad_250ae9069d0512af7da8fa858bf95d58.jpg', '2022-10-21 16:18:29', NULL, 1),
(65, 'Motos', NULL, NULL, '2022-10-21 16:20:17', 64, 1),
(66, 'Motos eléctricas', NULL, NULL, '2022-10-21 16:20:45', 65, 1),
(67, 'Motos de combustión', NULL, NULL, '2022-10-21 16:22:01', 65, 1),
(68, 'Bicicletas', NULL, NULL, '2022-10-21 17:07:46', 64, 1),
(69, 'BMX', NULL, NULL, '2022-10-21 17:08:23', 68, 1),
(70, 'Montaña', NULL, NULL, '2022-10-21 17:08:43', 68, 1),
(71, 'Infantiles', NULL, NULL, '2022-10-21 17:09:07', 68, 1),
(72, 'Accesorios', NULL, NULL, '2022-10-21 17:09:22', 64, 1),
(73, 'Cascos', NULL, NULL, '2022-10-21 17:09:36', 72, 1),
(74, 'CUIDADO PERSONAL', 'img_CUIDADO PERSONAL_3f147833943dde215593215717bf4e71.jpg', 'icono_CUIDADO PERSONAL_b99396b1d2483219e4b35a1c1b89c047.jpg', '2022-10-21 17:11:04', NULL, 1),
(75, 'Belleza', NULL, NULL, '2022-10-21 17:18:03', 74, 1),
(76, 'Rizadores y planchas', NULL, NULL, '2022-10-21 17:18:47', 75, 1),
(77, 'Afeitadoras y cortadoras de pelo', NULL, NULL, '2022-10-21 17:19:29', 75, 1),
(78, 'Secadoras de pelo', NULL, NULL, '2022-10-21 17:19:44', 75, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_pedido`
--

CREATE TABLE `detalle_pedido` (
  `id` bigint(20) NOT NULL,
  `pedidoid` bigint(20) NOT NULL,
  `productoid` bigint(20) NOT NULL,
  `precio` decimal(11,2) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_temp`
--

CREATE TABLE `detalle_temp` (
  `id` bigint(20) NOT NULL,
  `productoid` bigint(20) NOT NULL,
  `precio` decimal(11,2) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `token` varchar(100) COLLATE utf8mb4_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imgproductos`
--

CREATE TABLE `imgproductos` (
  `idimgprod` bigint(20) NOT NULL,
  `productoid` bigint(20) NOT NULL,
  `imagen` varchar(100) COLLATE utf8mb4_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulos`
--

CREATE TABLE `modulos` (
  `idmodulo` bigint(20) NOT NULL,
  `titulo` varchar(80) COLLATE utf8mb4_swedish_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_swedish_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `modulos`
--

INSERT INTO `modulos` (`idmodulo`, `titulo`, `descripcion`, `status`) VALUES
(1, 'Sistema', 'Página principal - Sistema', 1),
(2, 'Usuarios', 'Pagina - Usuarios', 1),
(3, 'Roles', 'Pagina - Roles', 1),
(4, 'Productos', 'Pagina - Productos', 1),
(5, 'Categorias', 'Pagina - Categorias', 1),
(6, 'Clientes', 'Pagina - Clientes', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `idpedido` bigint(20) NOT NULL,
  `usuarioid` bigint(20) NOT NULL,
  `fecha` datetime NOT NULL,
  `monto` decimal(11,2) NOT NULL,
  `tipopagoid` bigint(20) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `idpermiso` bigint(20) NOT NULL,
  `rolid` bigint(20) NOT NULL,
  `moduloid` bigint(20) NOT NULL,
  `ver` int(11) NOT NULL DEFAULT '0',
  `crear` int(11) NOT NULL DEFAULT '0',
  `actualizar` int(11) NOT NULL DEFAULT '0',
  `eliminar` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`idpermiso`, `rolid`, `moduloid`, `ver`, `crear`, `actualizar`, `eliminar`) VALUES
(1032, 3, 1, 1, 0, 0, 0),
(1033, 3, 2, 1, 1, 0, 0),
(1034, 3, 3, 1, 0, 0, 0),
(1035, 3, 4, 1, 1, 1, 0),
(1036, 3, 5, 1, 0, 0, 0),
(1037, 4, 1, 1, 0, 0, 0),
(1038, 4, 2, 1, 1, 0, 0),
(1039, 4, 3, 1, 0, 0, 0),
(1040, 4, 4, 1, 0, 0, 0),
(1041, 4, 5, 1, 0, 0, 0),
(1047, 1, 1, 1, 0, 0, 0),
(1048, 1, 2, 1, 1, 1, 1),
(1049, 1, 3, 1, 1, 1, 1),
(1050, 1, 4, 1, 1, 1, 1),
(1051, 1, 5, 1, 1, 1, 1),
(1052, 1, 6, 1, 1, 1, 1),
(1059, 5, 1, 1, 0, 0, 0),
(1060, 5, 2, 0, 0, 0, 0),
(1061, 5, 3, 0, 0, 0, 0),
(1062, 5, 4, 0, 0, 0, 0),
(1063, 5, 5, 0, 0, 0, 0),
(1064, 5, 6, 0, 0, 0, 0),
(1071, 2, 1, 1, 0, 0, 0),
(1072, 2, 2, 1, 1, 1, 1),
(1073, 2, 3, 1, 0, 0, 0),
(1074, 2, 4, 1, 1, 1, 0),
(1075, 2, 5, 1, 1, 1, 0),
(1076, 2, 6, 1, 1, 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `idproducto` bigint(20) NOT NULL,
  `categoriaid` bigint(20) NOT NULL,
  `codproducto` bigint(20) NOT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_swedish_ci NOT NULL,
  `descprincipal` text COLLATE utf8mb4_swedish_ci NOT NULL,
  `descgeneral` text COLLATE utf8mb4_swedish_ci,
  `marca` varchar(100) COLLATE utf8mb4_swedish_ci NOT NULL,
  `precio` decimal(11,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `imagen` varchar(100) COLLATE utf8mb4_swedish_ci DEFAULT NULL,
  `datacreate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `idrol` bigint(20) NOT NULL,
  `nombrerol` varchar(80) COLLATE utf8mb4_swedish_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_swedish_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`idrol`, `nombrerol`, `descripcion`, `status`) VALUES
(1, 'Administrador', 'Todos los permisos', 1),
(2, 'Supervisor', 'Solo ciertos permisos', 1),
(3, 'Suplente', 'Suplente  Permisos restringidos', 1),
(4, 'Vendedor', 'Vendedor - No tiene permisos', 1),
(5, 'Cliente', 'Cliente No hay permisos', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` bigint(20) NOT NULL,
  `identificacion` varchar(30) COLLATE utf8mb4_swedish_ci NOT NULL,
  `nombres` varchar(80) COLLATE utf8mb4_swedish_ci NOT NULL,
  `apellidos` varchar(100) COLLATE utf8mb4_swedish_ci NOT NULL,
  `telefono` bigint(20) NOT NULL,
  `email_user` varchar(100) COLLATE utf8mb4_swedish_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_swedish_ci NOT NULL,
  `toke` varchar(100) COLLATE utf8mb4_swedish_ci DEFAULT NULL,
  `rolid` bigint(20) NOT NULL,
  `datecreate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `identificacion`, `nombres`, `apellidos`, `telefono`, `email_user`, `password`, `toke`, `rolid`, `datecreate`, `status`) VALUES
(1, '123', 'Carlos', 'Pozo', 6545498454, 'carlospozo95@gmail.com', 'ac9c2c34c9f7ad52528c3422af40a66e2e24aaf2a727831255413c9470158984', NULL, 1, '2022-07-23 18:54:53', 1),
(2, '070671565-3', 'Andres', 'Ramirez', 994603678, 'carlos.pfloger@yahoo.com', 'ac9c2c34c9f7ad52528c3422af40a66e2e24aaf2a727831255413c9470158984', NULL, 2, '2022-08-06 18:58:01', 1),
(3, '789', 'Freddy', 'Magallanes', 994603678, 'carlos.pflogger@hotmail.com', 'ac9c2c34c9f7ad52528c3422af40a66e2e24aaf2a727831255413c9470158984', NULL, 3, '2022-08-12 20:41:37', 1),
(4, '1000', 'Isabelle', 'Anibalcar', 12345678, 'isa@isa.com', 'ac9c2c34c9f7ad52528c3422af40a66e2e24aaf2a727831255413c9470158984', NULL, 4, '2022-08-31 01:27:30', 1),
(5, '1100', 'Pedro', 'Jimenez', 12345678, 'pedro@pedro.com', 'ac9c2c34c9f7ad52528c3422af40a66e2e24aaf2a727831255413c9470158984', NULL, 4, '2022-08-31 01:28:13', 1),
(6, '1300', 'Camilo', 'Perez', 1231231231, 'camilo@camilo.com', 'ac9c2c34c9f7ad52528c3422af40a66e2e24aaf2a727831255413c9470158984', NULL, 4, '2022-09-02 17:46:02', 1),
(7, '86238479', 'Alfonsoo', 'Guevara', 98123821, 'alfo@alfo.com', 'ac9c2c34c9f7ad52528c3422af40a66e2e24aaf2a727831255413c9470158984', NULL, 5, '2022-10-15 08:21:53', 1),
(8, '987234987', 'Manuel', 'Carilllo', 89727983, 'man@man.com', 'ac9c2c34c9f7ad52528c3422af40a66e2e24aaf2a727831255413c9470158984', NULL, 5, '2022-10-15 08:23:55', 1),
(9, '8732482634', 'Jessica', 'Ramirez', 3289428376, 'je@je.com', 'ac9c2c34c9f7ad52528c3422af40a66e2e24aaf2a727831255413c9470158984', NULL, 5, '2022-10-15 08:26:07', 1),
(10, '9837498', 'Prueba', 'Abeurb', 982771276, 'pru@pru.com', 'ac9c2c34c9f7ad52528c3422af40a66e2e24aaf2a727831255413c9470158984', NULL, 4, '2022-10-15 14:00:16', 1),
(11, '8732638613', 'Jose', 'Mero', 29386, 'jo@jo.com', 'ac9c2c34c9f7ad52528c3422af40a66e2e24aaf2a727831255413c9470158984', NULL, 5, '2022-10-15 16:47:30', 1),
(12, '5365377', 'Juan', 'Mariscal', 12163178, 'ju@ju.com', 'ac9c2c34c9f7ad52528c3422af40a66e2e24aaf2a727831255413c9470158984', NULL, 5, '2022-10-15 16:58:47', 1),
(13, '9874988', 'Marlon', 'Astudillo', 98237489, 'mar@mar.com', 'ac9c2c34c9f7ad52528c3422af40a66e2e24aaf2a727831255413c9470158984', NULL, 5, '2022-10-15 17:12:56', 1),
(14, '3123123', 'Jeniiferr', 'Zambranoo', 2342342, 'jen@jen.com', 'ac9c2c34c9f7ad52528c3422af40a66e2e24aaf2a727831255413c9470158984', NULL, 5, '2022-10-16 17:37:31', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`idcategoria`),
  ADD KEY `categoria_father_id` (`categoria_father_id`);

--
-- Indices de la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pedidoid` (`pedidoid`),
  ADD KEY `productoid` (`productoid`);

--
-- Indices de la tabla `detalle_temp`
--
ALTER TABLE `detalle_temp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productoid` (`productoid`);

--
-- Indices de la tabla `imgproductos`
--
ALTER TABLE `imgproductos`
  ADD PRIMARY KEY (`idimgprod`),
  ADD KEY `productoid` (`productoid`);

--
-- Indices de la tabla `modulos`
--
ALTER TABLE `modulos`
  ADD PRIMARY KEY (`idmodulo`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`idpedido`),
  ADD KEY `usuarioid` (`usuarioid`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`idpermiso`),
  ADD KEY `rolid` (`rolid`),
  ADD KEY `moduloid` (`moduloid`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`idproducto`),
  ADD KEY `categoriaid` (`categoriaid`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`idrol`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`),
  ADD KEY `rolid` (`rolid`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `idcategoria` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT de la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalle_temp`
--
ALTER TABLE `detalle_temp`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `imgproductos`
--
ALTER TABLE `imgproductos`
  MODIFY `idimgprod` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `modulos`
--
ALTER TABLE `modulos`
  MODIFY `idmodulo` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `idpedido` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `idpermiso` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1077;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `idproducto` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `idrol` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD CONSTRAINT `categorias_ibfk_1` FOREIGN KEY (`categoria_father_id`) REFERENCES `categorias` (`idcategoria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  ADD CONSTRAINT `detalle_pedido_ibfk_1` FOREIGN KEY (`pedidoid`) REFERENCES `pedido` (`idpedido`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detalle_pedido_ibfk_2` FOREIGN KEY (`productoid`) REFERENCES `productos` (`idproducto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalle_temp`
--
ALTER TABLE `detalle_temp`
  ADD CONSTRAINT `detalle_temp_ibfk_1` FOREIGN KEY (`productoid`) REFERENCES `productos` (`idproducto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `imgproductos`
--
ALTER TABLE `imgproductos`
  ADD CONSTRAINT `imgproductos_ibfk_1` FOREIGN KEY (`productoid`) REFERENCES `productos` (`idproducto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`usuarioid`) REFERENCES `usuario` (`idusuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD CONSTRAINT `permisos_ibfk_1` FOREIGN KEY (`rolid`) REFERENCES `roles` (`idrol`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permisos_ibfk_2` FOREIGN KEY (`moduloid`) REFERENCES `modulos` (`idmodulo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`categoriaid`) REFERENCES `categorias` (`idcategoria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`rolid`) REFERENCES `roles` (`idrol`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
