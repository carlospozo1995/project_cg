-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 08-10-2022 a las 17:02:59
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
(5, 1, 'prod_1_d34b8f12d065376550199da2bcb3da40.jpg'),
(6, 1, 'prod_1_f4e564bf1787d6661ed95292ba6ed58e.jpg'),
(7, 1, 'prod_1_d5d93a3f8762dc7b6a19de917e8337d3.jpg'),
(9, 2, 'prod_2_39e9d06cde31a6f93c07d3b06d83725c.jpg'),
(10, 2, 'prod_2_e491ae271bf7391a43d3cb3ff18d4c9b.jpg'),
(11, 3, 'prod_3_eae8eb4e106c3c54a5244fbe7b0d3628.jpg'),
(12, 12, 'prod_12_21a38591610f3c2e71fef9cbc22d1b39.jpg'),
(13, 12, 'prod_12_eb630cb4501f59f47488ef189b02c88d.jpg');

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
(1, 11, 7399, 'producto 1', 'nuevo p 1', NULL, 'nuevo 1', '67.00', 3, NULL, '2022-10-08 07:25:42', 1),
(2, 17, 45352, 'producto 2', 'nuevo p 2', '<table style=\"border-collapse: collapse; width: 100%;\" border=\"1\"> <tbody> <tr> <td style=\"width: 46.5845%;\">uno</td> <td style=\"width: 46.5805%;\">p1</td> </tr> <tr> <td style=\"width: 46.5845%;\">dos</td> <td style=\"width: 46.5805%;\">p1</td> </tr> <tr> <td style=\"width: 46.5845%;\">tres</td> <td style=\"width: 46.5805%;\">p1</td> </tr> </tbody> </table>', 'nuevo 2', '89.99', 42, NULL, '2022-10-08 07:27:28', 1),
(3, 11, 938, 'producto 3', 'nuevo p 3', '<ol> <li><span style=\"background-color: #e03e2d; color: #f1c40f;\">uno</span></li> <li><span style=\"background-color: #e03e2d; color: #f1c40f;\">dos</span></li> <li><span style=\"background-color: #e03e2d; color: #f1c40f;\">tres</span></li> </ol>', 'nuevo 3', '56.00', 3, NULL, '2022-10-08 11:41:00', 1),
(4, 29, 73839, 'producto 3', 'nuevo p 3', NULL, 'nuevo 3', '89.89', 3, NULL, '2022-10-08 11:46:56', 1),
(5, 6, 73838, 'producto 5', 'nuevo p 5', NULL, 'nuevo 5', '32.90', 3, NULL, '2022-10-08 11:47:29', 1),
(6, 10, 3233, 'producto 6', 'nuevo p 6', NULL, 'nuevo 6', '32.00', 3, NULL, '2022-10-08 11:47:58', 1),
(7, 32, 8383, 'producto 7', 'nuevo p 7', '<p>producto 7</p>', 'nuevo 7', '89.56', 32, NULL, '2022-10-08 11:48:30', 1),
(8, 10, 98732, 'producto 8', 'nuevo p 8', NULL, 'nuevo 8', '23.98', 32, NULL, '2022-10-08 11:48:57', 1),
(9, 4, 2343241, 'producto 9', 'nuevo p 9', NULL, 'nuevo 9', '634221.89', 32, NULL, '2022-10-08 11:49:48', 1),
(10, 20, 383771, 'producto 10', 'nuevo p 10', NULL, 'nuevo 10', '87.00', 122, NULL, '2022-10-08 11:50:48', 1),
(11, 21, 37393, 'producto 11', 'nuevo p 11', NULL, 'nuevo 11', '394848383.00', 23, NULL, '2022-10-08 11:51:35', 1),
(12, 31, 78112, 'producto 12', 'nuevo p12', NULL, 'nuevo 12', '9384.90', 23, NULL, '2022-10-08 11:52:39', 1),
(13, 31, 39381, 'producto 13', 'nuevo p 13', NULL, 'nuevo 13', '8974.00', 32, NULL, '2022-10-08 11:53:22', 1);

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
  MODIFY `idimgprod` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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
  MODIFY `idproducto` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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
