-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-06-2015 a las 10:11:55
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

--
-- Volcado de datos para la tabla `amigos`
--

INSERT INTO `amigos` (`NickUsuario1`, `NickUsuario2`) VALUES
('gandalf', 'paco'),
('paco', 'titomc');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asiste`
--

CREATE TABLE IF NOT EXISTS `asiste` (
  `NickUsuario` varchar(100) NOT NULL,
  `IDEvento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `asiste`
--

INSERT INTO `asiste` (`NickUsuario`, `IDEvento`) VALUES
('gandalf', 1),
('paco', 1),
('paco', 2),
('paco', 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE IF NOT EXISTS `comentarios` (
`ID` int(11) NOT NULL,
  `NickUsuario` varchar(100) NOT NULL,
  `IDEvento` int(11) NOT NULL,
  `Texto` text NOT NULL,
  `Fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`Codigo`, `NickUsuario`, `IDEvento`, `NumEntradas`, `Butacas`, `PrecioTotal`) VALUES
(21, 'paco', 17, 3, 83, 5),
(24, 'paco', 17, 2, 11, 5),
(25, 'paco', 17, 2, 12, 5),
(32, 'paco', 17, 1, 145, 5),
(33, 'paco', 17, 1, 139, 5),
(34, 'paco', 17, 2, 35, 5),
(42, 'paco', 17, 1, 39, 5),
(43, 'paco', 17, 1, 53, 5),
(44, 'paco', 17, 1, 48, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE IF NOT EXISTS `eventos` (
`ID` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Descripcion` text NOT NULL,
  `Fecha` datetime NOT NULL,
  `Precio` double NOT NULL,
  `Imagen` varchar(40) NOT NULL,
  `PlazasDisponibles` int(11) NOT NULL,
  `Tipo` tinyint(1) NOT NULL,
  `Promotor` varchar(100) NOT NULL,
  `Activo` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`ID`, `Nombre`, `Descripcion`, `Fecha`, `Precio`, `Imagen`, `PlazasDisponibles`, `Tipo`, `Promotor`, `Activo`) VALUES
(1, 'Arenal Sound', 'Festival de indie-rock situado en la Comunitat Valenciana', '2015-07-31 00:00:00', 50, 'includes/data/eventos/arenal.jpg', 60000, 0, 'AndresAJ', 1),
(2, 'Rock in Rio', 'Festival de musica electronica situado en Madrid', '2015-06-24 00:00:00', 30, 'includes/data/eventos/rir.jpg', 3000, 0, 'AndresAJ', 1),
(4, 'Festival de monegros', 'Festival de musica electronica en medio del desierto, disfruta de los mejores DJs en una alocada fiesta.', '2015-06-10 21:00:00', 65, 'includes/data/eventos/monegros.jpg', 10000, 0, 'AndresAJ', 1),
(5, 'Grimmey por Palestina', 'Festival de RAP cuyos beneficios seran entregados a una ONG para enviarlos a Palestina. Se puede pagar con alimentos no perecederos.', '2015-06-13 21:00:00', 10, 'includes/data/eventos/grimmpalestina.jpg', 1000, 0, 'AndresAJ', 1),
(6, 'BOA Fest', 'Festival de los grandes cantantes de HIP-HOP en el auditorio Miguel Rios de Rivas Vaciamadrid.', '2015-06-15 21:00:00', 12, 'includes/data/eventos/boafest.jpg', 750, 0, 'AndresAJ', 1),
(7, 'Rivas Rock', 'Festival de Rock en el auditorio Miguel Rios de Rivas Vaciamadrid. Reunion de los clasicos del rock.', '2015-06-19 21:00:00', 25, 'includes/data/eventos/rivasrock.jpg', 750, 0, 'AndresAJ', 1),
(8, 'Tomorrowland', 'Festival de musica electronica en un bonito lago de la ciudad de Boom, Belgica.', '2015-06-21 21:00:00', 150, 'includes/data/eventos/tomorrowland.jpg', 10000, 0, 'AndresAJ', 1),
(9, 'Rap por palestina', 'Concierto de musica reaggue y rap para recaudar fondos que ayuden a la causa Palestina.', '2015-07-03 21:00:00', 10, 'includes/data/eventos/palestina.jpg', 750, 0, 'AndresAJ', 1),
(10, 'SAW VI', 'Pelicula de terror y thriller psicologico que te causara fascinacion y repulsion a partes iguales.', '2015-08-10 22:00:00', 5, 'includes/data/eventos/saw6.jpg', 150, 1, 'AndresAJ', 1),
(11, 'Insurgente', 'Pelicula de la saga Divergente que proviene a su vez de una famosa triologia de libros de ciencia ficcion.', '2015-09-10 18:00:00', 5, 'includes/data/eventos/insurgente.png', 150, 1, 'AndresAJ', 1),
(12, 'Zonas Humedas', 'Comedia romantica ideal para parejas que llevara el humor picante a un nuevo nivel.', '2015-06-17 20:00:00', 5, 'includes/data/eventos/ZonasHumedas.png', 150, 1, 'AndresAJ', 1),
(13, 'Los Vengadores la era de Ultron', 'Nueva entrega de la saga los Vengadores que nos acerca a nuestros mas queridos super heroes combatiendo unidos para salvar la humanidad una vez mas.', '2015-06-14 23:00:00', 5, 'includes/data/eventos/Vengadores.png', 150, 1, 'AndresAJ', 1),
(14, 'Desde la Oscuridad', 'Pelicula de terror que es un MUST SEE para los amantes de este genero.', '2015-09-10 23:59:00', 5, 'includes/data/eventos/oscuridad.png', 150, 1, 'AndresAJ', 1),
(15, 'Fast and Furious VII', 'Nueva entrega de la saga Fast and Furious que nos trae toda la velocidad y adrenalina de las carreras de coches callejeras a la gran pantalla.', '2015-08-10 23:00:00', 5, 'includes/data/eventos/FF7.png', 150, 1, 'AndresAJ', 1),
(16, 'Gueros', 'Nueva pelicula de genero drama que cuenta las penurias de un chico que es abandonado por su familia.', '2015-09-06 13:59:00', 5, 'includes/data/eventos/gueros.png', 150, 1, 'AndresAJ', 1),
(17, 'El ultimo trago', 'Pelicula de comedia que cuenta la historia de un grupo de amigos durante una noche de borrachera y fiesta.', '2015-09-12 23:59:00', 5, 'includes/data/eventos/trago.png', 150, 1, 'AndresAJ', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE IF NOT EXISTS `mensajes` (
`ID` int(11) NOT NULL,
  `NickEmisor` varchar(100) NOT NULL,
  `NickReceptor` varchar(100) NOT NULL,
  `Correo` varchar(60) DEFAULT NULL,
  `Titulo` varchar(60) DEFAULT NULL,
  `TextoMensaje` text NOT NULL,
  `Fecha` datetime NOT NULL,
  `Leido` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `Contrasena` varchar(60) NOT NULL,
  `Correo` varchar(100) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Apellidos` varchar(100) NOT NULL,
  `Edad` int(11) NOT NULL,
  `Avatar` varchar(40) DEFAULT NULL,
  `Tipo` enum('usuario','admin','promotor','banned') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`Nick`, `Contrasena`, `Correo`, `Nombre`, `Apellidos`, `Edad`, `Avatar`, `Tipo`) VALUES
('AndresAJ', '$2y$10$qFiVsUSYp3YNlC/qz4.F/ectSocojiTGu9cwb7GMn50u4mGdLMBSO', 'andresita@gg.com', 'Andresita', 'Aguirre', 20, NULL, 'promotor'),
('gandalf', '$2y$10$bmFFru3Vha1I7uSzo4NhdODTrM3tdNDHAb71KoD0hX/m9rM23lIoK', 'itsravenbooking@gmail.com', 'Paquito', 'El chocolatero', 23, NULL, 'admin'),
('paco', '$2y$10$3GmlDzQJWKtrwvr0XVlT8.qL7tf/7Coz3oaP01/qZkmXa2tzppPXm', 'itsravenbooking@gmail.com', 'Paquito', 'eeee', 23, NULL, 'usuario'),
('titomc', '$2y$10$A/fQzkFnog/RucTrzbya3OmfW1WbUltXw3SBNQ74ePXJM2XUR.chS', 'itsravenbooking@gmail.com', 'Paquito', 'eeee', 23, NULL, 'promotor');

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
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
MODIFY `Codigo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT de la tabla `mensajes`
--
ALTER TABLE `mensajes`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
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
