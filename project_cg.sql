-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 05-08-2022 a las 03:36:20
-- Versión del servidor: 5.7.24
-- Versión de PHP: 7.2.19

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
(2, 'Usuarios', 'Usuarios del sistema', 1),
(3, 'Productos', 'Todos los productos', 1),
(4, 'Categorias', 'Todas las categorias', 1);

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
(7, 3, 1, 1, 0, 0, 0),
(8, 3, 2, 1, 0, 0, 0),
(9, 3, 3, 1, 0, 0, 0),
(91, 1, 1, 1, 0, 0, 0),
(92, 1, 2, 1, 1, 1, 1),
(93, 1, 3, 1, 0, 0, 0),
(94, 1, 4, 1, 0, 0, 0),
(95, 2, 1, 1, 0, 0, 0),
(96, 2, 2, 1, 1, 1, 0),
(97, 2, 3, 1, 0, 0, 0),
(98, 2, 4, 1, 0, 0, 0);

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
(1, 'Administrador', 'Administrador Todos los permisos', 1),
(2, 'Supervisor', 'Supervisor  La mayoria de los permisos', 1),
(3, 'Suplente', 'Suplente  Permisos restringidos', 1),
(4, 'Vendedor', 'Vendedor - No tiene permisos', 1),
(5, 'Cliente', 'Cliente - No hay permisos', 1);

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
(1, '123', 'Carlos', 'Pozo', 994603678, 'carlospozo95@gmail.com', 'ac9c2c34c9f7ad52528c3422af40a66e2e24aaf2a727831255413c9470158984', NULL, 1, '2022-07-23 18:54:53', 1),
(2, '456', 'Dos', 'Dos', 1234567891, 'carlos.pfloger@yahoo.com', 'ac9c2c34c9f7ad52528c3422af40a66e2e24aaf2a727831255413c9470158984', NULL, 2, '2022-07-23 21:28:01', 1),
(3, '789', 'Tres', 'Tres', 365465465, 'tres@tres.com', 'b4fd4d2244853919a887f059be711870dffcd09859032433de6bb31483b0e194', NULL, 3, '2022-07-24 14:20:02', 1),
(4, '100', 'Cuatro', 'Cuatro', 9654656, 'cuatro@cuatro.com', '76041c530ce73f870e2dc8263bdac7b8d8e818711090f19b49778757be9f5fa6', NULL, 4, '2022-07-24 14:24:16', 1),
(5, '1100', 'Cinco', 'Cinco', 6845461625, 'cinco@cinco.com', '383c9d639d9f2f1dfa5325be5c7c01050e4052c8e29ad09aa9065dedaf6793e0', NULL, 5, '2022-07-24 14:26:06', 1),
(6, '200', 'Seis', 'Seis', 6545665485, 'carlos.pflogger@hotmail.com', '0e5c50d9a45bde6a59d2052afa319d93928095b24589b1b887bcecbad7c010a8', '4ceb682b6e235dd9e75d87a37fc2d24cf41e31c40f2902eb5a1b0afe446fc9016a6f4d9d7ca4675f', 5, '2022-07-27 21:48:18', 1);

--
-- Índices para tablas volcadas
--

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
-- AUTO_INCREMENT de la tabla `modulos`
--
ALTER TABLE `modulos`
  MODIFY `idmodulo` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `idpermiso` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

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
-- Filtros para la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD CONSTRAINT `permisos_ibfk_1` FOREIGN KEY (`rolid`) REFERENCES `roles` (`idrol`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permisos_ibfk_2` FOREIGN KEY (`moduloid`) REFERENCES `modulos` (`idmodulo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`rolid`) REFERENCES `roles` (`idrol`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
