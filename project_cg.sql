-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 10-09-2022 a las 23:13:27
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
(21, 'Accesorios', NULL, '2022-09-10 08:03:22', 19, 1);

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
(867, 5, 1, 1, 0, 0, 0),
(868, 5, 2, 1, 1, 0, 0),
(869, 5, 3, 1, 0, 0, 0),
(870, 5, 4, 0, 0, 0, 0),
(871, 5, 5, 0, 0, 0, 0),
(907, 2, 1, 1, 0, 0, 0),
(908, 2, 2, 1, 1, 1, 0),
(909, 2, 3, 1, 0, 0, 0),
(910, 2, 4, 1, 1, 1, 1),
(911, 2, 5, 1, 1, 1, 1),
(912, 3, 1, 1, 0, 0, 0),
(913, 3, 2, 1, 1, 0, 0),
(914, 3, 3, 1, 0, 0, 0),
(915, 3, 4, 1, 1, 1, 0),
(916, 3, 5, 1, 0, 0, 0),
(917, 4, 1, 1, 0, 0, 0),
(918, 4, 2, 1, 1, 0, 0),
(919, 4, 3, 1, 0, 0, 0),
(920, 4, 4, 1, 0, 0, 0),
(921, 4, 5, 1, 0, 0, 0),
(942, 1, 1, 1, 0, 0, 0),
(943, 1, 2, 1, 1, 1, 1),
(944, 1, 3, 1, 1, 1, 1),
(945, 1, 4, 1, 1, 1, 1),
(946, 1, 5, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `idproducto` bigint(20) NOT NULL,
  `categoriaid` bigint(20) NOT NULL,
  `codproducto` bigint(20) NOT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_swedish_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_swedish_ci NOT NULL,
  `precio` decimal(11,2) NOT NULL,
  `imagen` varchar(100) COLLATE utf8mb4_swedish_ci NOT NULL,
  `datacreate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`idproducto`, `categoriaid`, `codproducto`, `nombre`, `descripcion`, `precio`, `imagen`, `datacreate`, `status`) VALUES
(1, 13, 1111222233334444, 'Samsung - Televisor Qled QN65Q65BAPXPA 65\" | UHD 4K', 'Pasa horas de entretenimiento viendo tu contenido favorito, con una resolución excelente. Marca Samsung.', '1098.96', 'televisor.png', '2022-09-10 03:45:36', 1);

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
(5, 'Cliente', 'Cliente No hay permisos', 2);

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
(2, '456', 'Andres', 'Ramirez', 994603678, 'carlos.pfloger@yahoo.com', 'ac9c2c34c9f7ad52528c3422af40a66e2e24aaf2a727831255413c9470158984', NULL, 1, '2022-08-06 18:58:01', 1),
(3, '789', 'Freddy', 'Magallanes', 994603678, 'carlos.pflogger@hotmail.com', 'ac9c2c34c9f7ad52528c3422af40a66e2e24aaf2a727831255413c9470158984', NULL, 3, '2022-08-12 20:41:37', 1),
(4, '1000', 'Isabelle', 'Anibalcar', 12345678, 'isa@isa.com', 'ac9c2c34c9f7ad52528c3422af40a66e2e24aaf2a727831255413c9470158984', NULL, 4, '2022-08-31 01:27:30', 1),
(5, '1100', 'Pedro', 'Jimenez', 12345678, 'pedro@pedro.com', 'ac9c2c34c9f7ad52528c3422af40a66e2e24aaf2a727831255413c9470158984', NULL, 5, '2022-08-31 01:28:13', 1),
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
  MODIFY `idcategoria` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `modulos`
--
ALTER TABLE `modulos`
  MODIFY `idmodulo` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `idpermiso` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=947;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `idproducto` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
