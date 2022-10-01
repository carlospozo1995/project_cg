-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 29-09-2022 a las 15:10:08
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
  `datecreate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `categoria_father_id` bigint(20) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`idcategoria`, `nombre`, `imgcategoria`, `datecreate`, `categoria_father_id`, `status`) VALUES
(1, 'Electrodomesticos', 'img_8d5b66386bdd9d79be7435427de81fc9.jpg', '2022-09-10 03:25:00', NULL, 1),
(2, 'Climatización', NULL, '2022-09-10 03:25:33', 1, 1),
(3, 'Aire acondicionados', NULL, '2022-09-10 03:26:12', 2, 1),
(4, 'Ventiladores', NULL, '2022-09-10 03:26:28', 2, 1),
(5, 'Cocinas', NULL, '2022-09-10 03:29:51', 1, 1),
(6, 'Cocinas a gas', NULL, '2022-09-10 03:30:12', 5, 1),
(7, 'Hornos', NULL, '2022-09-10 03:30:33', 5, 1),
(8, 'Audio y video', 'img_6fa97208c60433ff1950e439f7db30c5.jpg', '2022-09-10 03:32:33', NULL, 1),
(9, 'Audio y sonido', NULL, '2022-09-10 03:33:33', 8, 1),
(10, 'Equipos de sonido', NULL, '2022-09-10 03:34:28', 9, 1),
(11, 'Barras de sonido', NULL, '2022-09-10 03:35:14', 9, 1),
(12, 'TV y video', NULL, '2022-09-10 03:36:44', 8, 1),
(13, 'Televisores', NULL, '2022-09-10 03:37:54', 12, 1),
(14, 'Antenas prepago', NULL, '2022-09-10 03:38:16', 12, 1),
(15, 'Tecnología', 'img_132e9fc5b9334216330d97f15ab17134.jpg', '2022-09-10 07:57:22', NULL, 1),
(16, 'Computadoras', NULL, '2022-09-10 07:59:07', 15, 1),
(17, 'Laptos', NULL, '2022-09-10 08:00:23', 16, 1),
(18, 'Computadoras de escritorio', NULL, '2022-09-10 08:00:42', 16, 1),
(19, 'Teléfonos', NULL, '2022-09-10 08:02:33', 15, 1),
(20, 'Smartphones', NULL, '2022-09-10 08:03:06', 19, 1),
(21, 'Accesorios', NULL, '2022-09-10 08:03:22', 19, 1),
(22, 'Movilidad', 'img_ba98a55e9dedc2824e02fcfef989b5cf.jpg', '2022-09-14 09:46:54', NULL, 1),
(23, 'Motos', NULL, '2022-09-14 09:48:14', 22, 1),
(24, 'Bicicletas', NULL, '2022-09-14 09:48:46', 22, 1),
(25, 'Mascotas', 'img_d0f2d36afa3bbfbf463ed64399bb6114.jpg', '2022-09-14 09:50:19', NULL, 1),
(26, 'Accesorios', NULL, '2022-09-18 13:58:50', 25, 1),
(27, 'Accesorios', NULL, '2022-09-18 16:00:30', 23, 1),
(28, 'Accesorios', NULL, '2022-09-18 16:00:47', 24, 1),
(29, 'Combustión', NULL, '2022-09-18 16:14:49', 23, 1),
(30, 'Electricas', NULL, '2022-09-18 16:15:03', 23, 1),
(31, 'BMX', NULL, '2022-09-18 16:15:25', 24, 1),
(32, 'Montaña', NULL, '2022-09-18 16:16:02', 24, 1),
(33, 'Hogar', 'imgCategoria.png', '2022-09-18 16:21:44', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imgproductos`
--

CREATE TABLE `imgproductos` (
  `idimgprod` bigint(20) NOT NULL,
  `productoid` bigint(20) NOT NULL,
  `imagen` varchar(100) COLLATE utf8mb4_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `imgproductos`
--

INSERT INTO `imgproductos` (`idimgprod`, `productoid`, `imagen`) VALUES
(1, 1, 'prod_8e06ed0e0ce181079df60e932a2ee284.jpg'),
(2, 1, 'prod_763c15fc70acce185e3bc28ddaf0f3df.jpg'),
(3, 2, 'prod_2cf6096db3b483a838ad6a1c6e8a4196.jpg'),
(4, 3, 'prod_bd123917707e12a0199e80c6ccde1e3b.jpg'),
(5, 4, 'prod_26a41521f5152ee606304a3b2537d4df.jpg');

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
(5, 'Categorias', 'Pagina - Categorias', 1);

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
(1022, 1, 1, 1, 0, 0, 0),
(1023, 1, 2, 1, 1, 1, 1),
(1024, 1, 3, 1, 1, 1, 1),
(1025, 1, 4, 1, 1, 1, 1),
(1026, 1, 5, 1, 1, 1, 1),
(1027, 2, 1, 1, 0, 0, 0),
(1028, 2, 2, 1, 1, 1, 1),
(1029, 2, 3, 1, 0, 0, 0),
(1030, 2, 4, 1, 1, 1, 1),
(1031, 2, 5, 1, 1, 1, 1),
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
(1042, 5, 1, 1, 0, 0, 0),
(1043, 5, 2, 1, 1, 0, 0),
(1044, 5, 3, 1, 0, 0, 0),
(1045, 5, 4, 0, 0, 0, 0),
(1046, 5, 5, 0, 0, 0, 0);

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

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`idproducto`, `categoriaid`, `codproducto`, `nombre`, `descprincipal`, `descgeneral`, `marca`, `precio`, `stock`, `imagen`, `datacreate`, `status`) VALUES
(1, 18, 534654, 'producto 1', 'nuevo producto 1', '<p>producto1</p> <ul> <li>uno</li> <li>dos</li> <li>tres</li> </ul>', 'nuevo 1', '54.00', 54, NULL, '2022-09-27 08:43:50', 2),
(2, 6, 546546, 'producto 2', 'nuevo producto 2', NULL, 'nuevo 2', '547.00', 45, NULL, '2022-09-27 08:47:28', 1),
(3, 33, 654654, 'producto 3', 'nuevo producto 3', '<p>producto&nbsp; 3</p>', 'nuevo 3', '78.00', 1, NULL, '2022-09-27 09:02:32', 1),
(4, 14, 6456564, 'producto 4', 'nuevo p 4', NULL, 'nuevo 4', '963.00', 23, NULL, '2022-09-27 09:04:46', 2),
(5, 3, 3216541, 'producto 5', 'nuevo producto 5', '<ul> <li>uno</li> <li>dos</li> <li>tres</li> </ul>', 'nuevo 5', '54.00', 54, NULL, '2022-09-28 09:48:48', 1),
(6, 21, 32546, 'producto 6', 'nuevo producto 6', '<p>producto 6 nuevo</p>', 'nuevo 6', '54512.23', 87, NULL, '2022-09-28 09:50:46', 1),
(7, 21, 3574, 'producto seis', 'nuevo p 6', NULL, 'nuevo 6', '62.00', 54, NULL, '2022-09-28 09:59:12', 1),
(8, 3, 354335, 'producto 8', 'nuevo p 8', '<p>producto 8</p> <table style=\"border-collapse: collapse; width: 100%;\" border=\"1\"> <tbody> <tr> <td style=\"width: 31.1205%;\">uno</td> <td style=\"width: 31.1205%;\">1</td> <td style=\"width: 31.1205%;\">1</td> </tr> <tr> <td style=\"width: 31.1205%;\">dos</td> <td style=\"width: 31.1205%;\">2</td> <td style=\"width: 31.1205%;\">2</td> </tr> <tr> <td style=\"width: 31.1205%;\">tres</td> <td style=\"width: 31.1205%;\">3</td> <td style=\"width: 31.1205%;\">3</td> </tr> <tr> <td style=\"width: 31.1205%;\">&nbsp;</td> <td style=\"width: 31.1205%;\">&nbsp;</td> <td style=\"width: 31.1205%;\">&nbsp;</td> </tr> </tbody> </table>', 'nuevo 8', '9612.00', 5, NULL, '2022-09-28 10:03:11', 1),
(9, 26, 4399, 'producto 9', 'nuevo p 9', '<ol> <li>uno</li> <li>dos</li> <li>tres</li> </ol>', 'nuevo 9', '234.00', 23, NULL, '2022-09-28 12:54:30', 1),
(10, 3, 9606, 'producto 10', 'nuevo p10', NULL, 'nuevo 10', '12.00', 3, NULL, '2022-09-29 08:45:35', 1),
(11, 28, 4533, 'producto 11', 'nuevo p 11', NULL, 'nuevo11', '12.00', 2, NULL, '2022-09-29 08:46:51', 1),
(12, 14, 12312, 'PRODUCTO 12', 'nuevo p 12', NULL, 'nuevo 12', '78.00', 65, NULL, '2022-09-29 08:47:34', 1);

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
(2, '070671565-3', 'Andres', 'Ramirez', 994603678, 'carlos.pfloger@yahoo.com', 'ac9c2c34c9f7ad52528c3422af40a66e2e24aaf2a727831255413c9470158984', NULL, 1, '2022-08-06 18:58:01', 1),
(3, '789', 'Freddy', 'Magallanes', 994603678, 'carlos.pflogger@hotmail.com', 'ac9c2c34c9f7ad52528c3422af40a66e2e24aaf2a727831255413c9470158984', NULL, 3, '2022-08-12 20:41:37', 1),
(4, '1000', 'Isabelle', 'Anibalcar', 12345678, 'isa@isa.com', 'ac9c2c34c9f7ad52528c3422af40a66e2e24aaf2a727831255413c9470158984', NULL, 4, '2022-08-31 01:27:30', 1),
(5, '1100', 'Pedro', 'Jimenez', 12345678, 'pedro@pedro.com', 'ac9c2c34c9f7ad52528c3422af40a66e2e24aaf2a727831255413c9470158984', NULL, 4, '2022-08-31 01:28:13', 1),
(6, '1300', 'Camilo', 'Perez', 1231231231, 'camilo@camilo.com', 'ac9c2c34c9f7ad52528c3422af40a66e2e24aaf2a727831255413c9470158984', NULL, 4, '2022-09-02 17:46:02', 1);

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
  MODIFY `idcategoria` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `imgproductos`
--
ALTER TABLE `imgproductos`
  MODIFY `idimgprod` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `modulos`
--
ALTER TABLE `modulos`
  MODIFY `idmodulo` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `idpermiso` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1047;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `idproducto` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `idrol` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD CONSTRAINT `categorias_ibfk_1` FOREIGN KEY (`categoria_father_id`) REFERENCES `categorias` (`idcategoria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `imgproductos`
--
ALTER TABLE `imgproductos`
  ADD CONSTRAINT `imgproductos_ibfk_1` FOREIGN KEY (`productoid`) REFERENCES `productos` (`idproducto`) ON DELETE CASCADE ON UPDATE CASCADE;

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
