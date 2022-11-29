-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 29-11-2022 a las 05:08:04
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
  `icono` varchar(100) COLLATE utf8mb4_swedish_ci DEFAULT NULL,
  `sliderDesktop` varchar(100) COLLATE utf8mb4_swedish_ci DEFAULT NULL,
  `sliderMobile` varchar(100) COLLATE utf8mb4_swedish_ci DEFAULT NULL,
  `sliderDscOne` varchar(150) COLLATE utf8mb4_swedish_ci DEFAULT NULL,
  `sliderDscTwo` varchar(150) COLLATE utf8mb4_swedish_ci DEFAULT NULL,
  `datecreate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `categoria_father_id` bigint(20) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`idcategoria`, `nombre`, `imgcategoria`, `icono`, `sliderDesktop`, `sliderMobile`, `sliderDscOne`, `sliderDscTwo`, `datecreate`, `categoria_father_id`, `status`) VALUES
(1, 'ELECTRODOMÉSTICOS', 'img_ELECTRODOMÉSTICOS_06dbd39d67bf3570efcfb33e351387cd.jpg', 'icono_ELECTRODOMÉSTICOS_06dbd39d67bf3570efcfb33e351387cd.jpg', 'sliderDesktop_ELECTRODOMÉSTICOS_c5755c2303fe6a57d1ffe14225c7584e.jpg', 'sliderMobile_ELECTRODOMÉSTICOS_74ec90bda56c3d238fffb8431cc76d31.jpg', 'LO MEJOR EN LINEA BLANCA', NULL, '2022-11-13 15:44:22', NULL, 1),
(2, 'Climatización', NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-13 16:03:14', 1, 1),
(3, 'Ventiladores', NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-13 16:03:58', 2, 1),
(4, 'Aires acondicionados', NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-13 16:04:18', 2, 1),
(5, 'Cocinas', NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-13 16:06:42', 1, 1),
(6, 'Cocinas a gas', NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-14 23:50:41', 5, 1),
(7, 'Hornos', NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-14 23:50:58', 5, 1),
(8, 'Cocinas de inducción', NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-14 23:51:52', 5, 1),
(9, 'Lavado y secado', NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-15 18:25:57', 1, 1),
(10, 'Lavadoras', NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-15 18:26:32', 9, 1),
(11, 'Secadoras', NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-15 18:26:46', 9, 1),
(12, 'Refrigeración', NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-15 18:27:21', 1, 1),
(13, 'Refrigeradoras', NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-15 18:27:39', 12, 1),
(14, 'Congeladores', NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-15 18:27:53', 12, 1),
(15, 'AUDIO & VIDEO', 'img_AUDIO-&-VIDEO_ba3709d0a15686f8b41d49f85a29b138.jpg', 'icono_AUDIO-&-VIDEO_ba3709d0a15686f8b41d49f85a29b138.jpg', 'sliderDesktop_AUDIO-&-VIDEO_ba3709d0a15686f8b41d49f85a29b138.jpg', 'sliderMobile_AUDIO-&-VIDEO_ba3709d0a15686f8b41d49f85a29b138.jpg', NULL, NULL, '2022-11-15 18:29:53', NULL, 1),
(16, 'Audio & sonido', NULL, NULL, 'sliderDesktop_Audio-&-sonido_2e51b6db3c357039f9cd98bb185a4b7c.jpg', 'sliderMobile_Audio-&-sonido_76214c081b7b5d7f8d69d875016a130c.jpg', 'descripcion slider audio y sonido', NULL, '2022-11-15 21:03:11', 15, 1),
(17, 'Equipos de sonido', NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-22 19:06:40', 16, 1),
(18, 'Parlantes portátiles', NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-22 19:07:10', 16, 1),
(19, 'Barras de sonido', NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-22 19:07:44', 16, 1),
(20, 'Audífonos', NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-22 19:08:42', 16, 1),
(21, 'Micrófonos', NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-22 19:08:59', 16, 1),
(22, 'Tv & video', NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-22 19:10:21', 15, 1),
(23, 'Televisores', NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-22 19:11:07', 22, 1),
(24, 'Soporte de pared', NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-22 19:11:32', 22, 1),
(25, 'Antenas prepagos', NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-22 19:11:48', 22, 1),
(26, 'TECNOLOGÍA', 'img_TECNOLOGÍA_494d258f0be451486b7940f17cd8136b.jpg', 'icono_TECNOLOGÍA_494d258f0be451486b7940f17cd8136b.jpg', 'sliderDesktop_TECNOLOGÍA_4aa75c43ea0a335b175aaae78e7aaf0e.jpg', 'sliderMobile_TECNOLOGÍA_6ce1a6b48997cdecf67ea3ba12813ec2.jpg', 'LO MEJOR EN TECNOLOGIA', 'Todo para tu setup gaming', '2022-11-22 19:18:26', NULL, 1),
(27, 'Computadoras', NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-22 19:24:00', 26, 1),
(28, 'Laptos', NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-22 19:24:15', 27, 1),
(29, 'De escritorios', NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-22 19:25:13', 27, 1),
(30, 'Monitores', NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-22 19:25:51', 27, 1),
(31, 'Impresoras', NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-22 19:26:24', 27, 1),
(32, 'Smartphones', NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-22 19:27:54', 26, 1),
(33, 'Celulares', NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-22 19:42:04', 32, 1),
(34, 'Tablets', NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-22 19:42:27', 32, 1),
(35, 'Proyectores', NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-22 19:42:59', 26, 1),
(36, 'ELECTROMENORES', 'img_ELECTROMENORES_29edecad52d4d7211dad5435fa89ceaf.jpg', 'icono_ELECTROMENORES_29edecad52d4d7211dad5435fa89ceaf.jpg', NULL, NULL, NULL, NULL, '2022-11-22 19:43:41', NULL, 1);

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
(6, 'Clientes', 'Pagina - Clientes', 1),
(7, 'AddSlider', 'Pagina - AddSlider', 1);

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
(1147, 2, 1, 1, 0, 0, 0),
(1148, 2, 2, 1, 1, 1, 1),
(1149, 2, 3, 1, 0, 0, 0),
(1150, 2, 4, 1, 1, 1, 0),
(1151, 2, 5, 1, 1, 1, 0),
(1152, 2, 6, 1, 1, 1, 0),
(1153, 2, 7, 0, 0, 0, 0),
(1154, 3, 1, 1, 0, 0, 0),
(1155, 3, 2, 1, 1, 0, 0),
(1156, 3, 3, 1, 0, 0, 0),
(1157, 3, 4, 1, 1, 1, 0),
(1158, 3, 5, 1, 0, 0, 0),
(1159, 3, 6, 0, 0, 0, 0),
(1160, 3, 7, 0, 0, 0, 0),
(1161, 4, 1, 1, 0, 0, 0),
(1162, 4, 2, 1, 1, 0, 0),
(1163, 4, 3, 1, 0, 0, 0),
(1164, 4, 4, 1, 0, 0, 0),
(1165, 4, 5, 1, 0, 0, 0),
(1166, 4, 6, 0, 0, 0, 0),
(1167, 4, 7, 0, 0, 0, 0),
(1168, 5, 1, 1, 0, 0, 0),
(1169, 5, 2, 0, 0, 0, 0),
(1170, 5, 3, 0, 0, 0, 0),
(1171, 5, 4, 0, 0, 0, 0),
(1172, 5, 5, 0, 0, 0, 0),
(1173, 5, 6, 0, 0, 0, 0),
(1174, 5, 7, 0, 0, 0, 0),
(1175, 1, 1, 1, 0, 0, 0),
(1176, 1, 2, 1, 1, 1, 1),
(1177, 1, 3, 1, 1, 1, 1),
(1178, 1, 4, 1, 1, 1, 1),
(1179, 1, 5, 1, 1, 1, 1),
(1180, 1, 6, 1, 1, 1, 1),
(1181, 1, 7, 1, 1, 1, 1);

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
  `sliderDesktop` varchar(150) COLLATE utf8mb4_swedish_ci DEFAULT NULL,
  `sliderMobile` varchar(150) COLLATE utf8mb4_swedish_ci DEFAULT NULL,
  `sliderDsc` varchar(150) COLLATE utf8mb4_swedish_ci DEFAULT NULL,
  `marca` varchar(100) COLLATE utf8mb4_swedish_ci NOT NULL,
  `precio` decimal(11,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `datacreate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`idproducto`, `categoriaid`, `codproducto`, `nombre`, `descprincipal`, `descgeneral`, `sliderDesktop`, `sliderMobile`, `sliderDsc`, `marca`, `precio`, `stock`, `datacreate`, `status`) VALUES
(1, 4, 12345678, 'Producto 1 prueba', 'Nuevo producto prueba con cable', '<p style=\"line-height: 1;\">Espacio:</p> <ul> <li style=\"line-height: 1;\">Mucho espcacio</li> <li>Menos espacio</li> </ul>', 'sliderDesktop_Producto-1-prueba_10b1e4eb3ae30403b37227fa17f24595.jpg', 'sliderMobile_Producto-1-prueba_10b1e4eb3ae30403b37227fa17f24595.jpg', 'SLIDER DESCRIPCION', 'Nuevo 1', '145.90', 2, '2022-11-16 12:57:18', 1),
(2, 13, 64837398, 'Refrigeradora Indurama CR Avant Plus', 'Refrigeradora Indurama RI-375 CR Avant Plus 256 Litros.', '<p style=\"line-height: 1;\">Dimensiones :</p> <ul> <li style=\"line-height: 1;\">Alto: 158 cm. Ancho: 62 cm. Prof.: 67 cm.</li> </ul> <p style=\"line-height: 1;\">Informacion general :</p> <ul> <li style=\"line-height: 1;\">256 Litros</li> <li>Eficiencia energ&eacute;tica A</li> <li>Disponible en croma</li> <li>Sistema No Frost</li> <li>Refrigerante R600a</li> </ul> <p style=\"line-height: 1;\">Zona exterior :</p> <ul> <li style=\"line-height: 1;\">Puertas en l&aacute;mina lisa</li> </ul> <p style=\"line-height: 1;\">Congelador :</p> <ul> <li style=\"line-height: 1;\">Balcones transparentes de gran capacidad y durabilidad</li> <li>Bandeja de vidrio templado</li> <li>Hielo f&aacute;cil</li> </ul> <p style=\"line-height: 1;\">Refrigerador :</p> <ul> <li style=\"line-height: 1;\">Iluminaci&oacute;n LED</li> <li>Legumbrera transparente</li> <li>Bandejas regulables de vidrio templado</li> <li>Balcones transparentes de gran capacidad y durabilidad</li> </ul> <p style=\"line-height: 1;\">Accesorios :</p> <ul> <li style=\"line-height: 1;\">Porta huevos</li> </ul>', 'sliderDesktop_Refrigeradora-Indurama-CR-Avant-Plus_c1703a44e713fd3adb40a04f777335e8.jpg', 'sliderMobile_Refrigeradora-Indurama-CR-Avant-Plus_1faf6397b5c0321e8fd55971e023181b.jpg', 'CONGELADOR  CHALLENGERD', 'Indurama', '489.00', 5, '2022-11-16 13:04:48', 1);

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
  MODIFY `idcategoria` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

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
  MODIFY `idmodulo` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `idpedido` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `idpermiso` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1182;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `idproducto` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
