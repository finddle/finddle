-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-05-2015 a las 12:29:12
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `finddle`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `amigos`
--

CREATE TABLE IF NOT EXISTS `amigos` (
  `NickUsuario1` varchar(100) NOT NULL,
  `NickUsuario2` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asiste`
--

CREATE TABLE IF NOT EXISTS `asiste` (
  `NickUsuario` varchar(100) NOT NULL,
  `IDEvento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE IF NOT EXISTS `comentarios` (
`ID` int(11) NOT NULL,
  `NickUsuario` varchar(100) NOT NULL,
  `IDEvento` int(11) NOT NULL,
  `Texto` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE IF NOT EXISTS `compras` (
`Codigo` int(11) NOT NULL,
  `NickUsuario` varchar(100) NOT NULL,
  `IDEvento` int(11) NOT NULL,
  `NumEntradas` int(11) NOT NULL,
  `Butacas` int(11) DEFAULT NULL,
  `PrecioTotal` double NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE IF NOT EXISTS `eventos` (
`ID` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Descripcion` text NOT NULL,
  `Fecha` date NOT NULL,
  `Precio` double NOT NULL,
  `Imagen` blob NOT NULL,
  `PlazasDisponibles` int(11) NOT NULL,
  `Tipo` tinyint(1) NOT NULL,
  `Promotor` varchar(100) NOT NULL,
  `Activo` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`ID`, `Nombre`, `Descripcion`, `Fecha`, `Precio`, `Imagen`, `PlazasDisponibles`, `Tipo`, `Promotor`, `Activo`) VALUES
(1, 'Arenal Sound', 'Festival en la comunitat valenciana', '2015-06-25', 25, '', 1500, 0, 'AndresAJ', 1),
(2, 'Rock in Rio', 'Festival comunidad de madrid.', '2015-05-26', 30, '', 2000, 0, 'AndresAJ', 1),
(3, 'Vengadores', 'Peli muy wena.', '2015-05-29', 8, '', 50, 1, 'AndresAJ', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE IF NOT EXISTS `mensajes` (
`ID` int(11) NOT NULL,
  `NickEmisor` varchar(100) NOT NULL,
  `NickReceptor` varchar(100) NOT NULL,
  `TextoMensaje` text NOT NULL,
  `Leido` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peticionesamistad`
--

CREATE TABLE IF NOT EXISTS `peticionesamistad` (
  `NickUsuario1` varchar(100) NOT NULL,
  `NickUsuario2` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `Nick` varchar(100) NOT NULL,
  `Contraseña` varchar(100) NOT NULL,
  `Correo` varchar(100) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Apellidos` varchar(100) NOT NULL,
  `Edad` int(11) NOT NULL,
  `Avatar` blob,
  `Tipo` enum('usuario','admin','promotor','banned') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`Nick`, `Contraseña`, `Correo`, `Nombre`, `Apellidos`, `Edad`, `Avatar`, `Tipo`) VALUES
('gandalf', 'gandalf', 'gandalf@elblanco.com', 'gandalf', 'elblanco', 400, NULL, 'admin'),
('paco', 'paco', 'paco@paco.com', 'Francisco', 'Paco', 30, NULL, 'usuario'),
('titomc', 'titomc', 'titomc@titomc', 'dominique', 'elnegrata', 32, NULL, 'promotor');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `amigos`
--
ALTER TABLE `amigos`
 ADD PRIMARY KEY (`NickUsuario1`,`NickUsuario2`), ADD KEY `NickUsuario1` (`NickUsuario1`), ADD KEY `NickUsuario2` (`NickUsuario2`);

--
-- Indices de la tabla `asiste`
--
ALTER TABLE `asiste`
 ADD PRIMARY KEY (`NickUsuario`,`IDEvento`), ADD KEY `NickUsuario` (`NickUsuario`), ADD KEY `IDEvento` (`IDEvento`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
 ADD PRIMARY KEY (`ID`), ADD KEY `ID` (`ID`), ADD KEY `NickUsuario` (`NickUsuario`), ADD KEY `IDEvento` (`IDEvento`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
 ADD PRIMARY KEY (`Codigo`), ADD KEY `Codigo` (`Codigo`), ADD KEY `NickUsuario` (`NickUsuario`), ADD KEY `IDEvento` (`IDEvento`);

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
 ADD PRIMARY KEY (`ID`), ADD KEY `ID` (`ID`);

--
-- Indices de la tabla `mensajes`
--
ALTER TABLE `mensajes`
 ADD PRIMARY KEY (`ID`), ADD KEY `ID` (`ID`), ADD KEY `NickEmisor` (`NickEmisor`), ADD KEY `NickReceptor` (`NickReceptor`);

--
-- Indices de la tabla `peticionesamistad`
--
ALTER TABLE `peticionesamistad`
 ADD PRIMARY KEY (`NickUsuario1`,`NickUsuario2`), ADD KEY `NickUsuario1` (`NickUsuario1`), ADD KEY `NickUsuario2` (`NickUsuario2`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
 ADD PRIMARY KEY (`Nick`), ADD KEY `Nick` (`Nick`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
MODIFY `Codigo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `mensajes`
--
ALTER TABLE `mensajes`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `amigos`
--
ALTER TABLE `amigos`
ADD CONSTRAINT `amigos_ibfk_1` FOREIGN KEY (`NickUsuario1`) REFERENCES `usuarios` (`Nick`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `amigos_ibfk_2` FOREIGN KEY (`NickUsuario2`) REFERENCES `usuarios` (`Nick`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `asiste`
--
ALTER TABLE `asiste`
ADD CONSTRAINT `asiste_ibfk_1` FOREIGN KEY (`NickUsuario`) REFERENCES `usuarios` (`Nick`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `asiste_ibfk_2` FOREIGN KEY (`IDEvento`) REFERENCES `eventos` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`NickUsuario`) REFERENCES `usuarios` (`Nick`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `comentarios_ibfk_2` FOREIGN KEY (`IDEvento`) REFERENCES `eventos` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `compras`
--
ALTER TABLE `compras`
ADD CONSTRAINT `compras_ibfk_1` FOREIGN KEY (`NickUsuario`) REFERENCES `usuarios` (`Nick`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `compras_ibfk_2` FOREIGN KEY (`IDEvento`) REFERENCES `eventos` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `mensajes`
--
ALTER TABLE `mensajes`
ADD CONSTRAINT `mensajes_ibfk_1` FOREIGN KEY (`NickEmisor`) REFERENCES `usuarios` (`Nick`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `mensajes_ibfk_2` FOREIGN KEY (`NickReceptor`) REFERENCES `usuarios` (`Nick`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `peticionesamistad`
--
ALTER TABLE `peticionesamistad`
ADD CONSTRAINT `peticionesamistad_ibfk_1` FOREIGN KEY (`NickUsuario1`) REFERENCES `usuarios` (`Nick`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `peticionesamistad_ibfk_2` FOREIGN KEY (`NickUsuario2`) REFERENCES `usuarios` (`Nick`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
