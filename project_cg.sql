-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 22-09-2022 a las 16:09:49
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
(1017, 1, 1, 1, 0, 0, 0),
(1018, 1, 2, 1, 1, 1, 1),
(1019, 1, 3, 1, 1, 1, 1),
(1020, 1, 4, 1, 1, 1, 1),
(1021, 1, 5, 1, 1, 1, 1);

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

INSERT INTO `productos` (`idproducto`, `categoriaid`, `codproducto`, `nombre`, `descripcion`, `marca`, `precio`, `stock`, `imagen`, `datacreate`, `status`) VALUES
(1, 25, 123456789, 'BaByliss - Rastrillo de pelo para mascotas bpprd | Blanco', 'Elimina los enredos ligeros y lleva los aceites de la piel al tallo del pelo para obtener un pelaje brillante.', 'BaByliss', '20.00', 12, NULL, '2022-09-19 03:28:05', 1),
(2, 17, 987654321, 'Apple - MacBook Pro 13 In M2 512 GB| Space Gray', 'Disfrute de gran durabilidad con una laptop diseñada para hacer lo que desea con facilidad.', 'Apple', '1999.00', 100, NULL, '2022-09-19 22:25:54', 1),
(3, 29, 123459876, 'Motocicleta TKZ-150 TUKO', 'La Moto Tuko TKZ-150 es tipo enduro y tiene un motor de 150cc. Además alcanza velocidades de hasta 95km/h', 'TUKO', '1667.36', 0, NULL, '2022-09-20 09:39:37', 1),
(4, 20, 543216789, 'Celular smartphone Motorola de 32GB con tarjeta de 32GB', 'El celular Motorola Moto E20 tiene una pantalla de 6.5 pulgadas y su sistema operativo es Android 11 Viene con tarjeta de memoria de 32 GB Gratis', 'Motorola', '175.64', 123, NULL, '2022-09-20 10:12:31', 1),
(5, 32, 129379012, 'Montez - Bicicleta de Montaña A27,5 M | Negro', 'Bicicleta urbana. Ideal para movilizarse dentro y fuera de la ciudad.', 'Montez', '290.00', 10, NULL, '2022-09-20 10:25:28', 1),
(6, 14, 93284093, 'Direct TV - Antena señal satelital kit prepago | Hd', 'Accede a televisión satelital, con imagen y sonido 100% digital.', 'Direct TV', '1200.00', 1, NULL, '2022-09-20 15:47:20', 1),
(7, 10, 435345234, 'LG - Minicomponente CJ44', 'Haz tus momentos más divertidos con el sonido envolvente de los mejores parlantes y amplificadores. Marca LG.', 'LG', '1919.00', 2, NULL, '2022-09-20 15:50:26', 1);

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
(2, '070671565-3', 'Andres', 'Ramirez', 994603678, 'carlos.pfloger@yahoo.com', 'ac9c2c34c9f7ad52528c3422af40a66e2e24aaf2a727831255413c9470158984', NULL, 1, '2022-08-06 18:58:01', 1),
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
  MODIFY `idimgprod` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `modulos`
--
ALTER TABLE `modulos`
  MODIFY `idmodulo` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `idpermiso` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1022;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `idproducto` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
