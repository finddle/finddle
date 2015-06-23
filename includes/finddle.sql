-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-06-2015 a las 22:43:39
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
('Fran', 'Adri'),
('Fran', 'Omar'),
('muchachoDry', 'Fran'),
('muchachoDry', 'Omar'),
('muchachoDry', 'Sergio'),
('Sergio', 'AndresAJ'),
('Sergio', 'Fran');

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
('Fran', 1),
('Sergio', 1),
('AndresAJ', 2),
('Fran', 4),
('muchachoDry', 5),
('muchachoDry', 6),
('Omar', 6),
('Adri', 7),
('Sergio', 8),
('Adri', 9),
('muchachoDry', 9),
('Adri', 10),
('Fran', 10),
('muchachoDry', 10),
('Sergio', 12),
('AndresAJ', 13),
('Adri', 14),
('Adri', 17),
('Sergio', 17);

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
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`ID`, `NickUsuario`, `IDEvento`, `Texto`, `Fecha`) VALUES
(12, 'MuchachoDry', 5, 'Vamos! Que ganas!!', '2015-06-23 11:23:51'),
(13, 'MuchachoDry', 9, 'DaSilva mi cantante favorito!!!!', '2015-06-23 11:26:27'),
(14, 'MuchachoDry', 10, 'Por fin el juego continúa...', '2015-06-23 11:35:55'),
(16, 'Sergio', 17, 'Pinta bien...', '2015-06-23 11:46:47'),
(17, 'Sergio', 1, 'Por fin puedo ir este año!', '2015-06-23 11:49:17'),
(18, 'Fran', 10, 'Ya te digo MuchachoDry! por fin!', '2015-06-23 11:51:49'),
(19, 'Fran', 10, 'PD: pillo sitio!', '2015-06-23 11:52:12'),
(20, 'Fran', 1, 'yo soy #sounder', '2015-06-23 11:52:57'),
(21, 'Fran', 4, 'Que ganas de ver a Carl Cox!!!', '2015-06-23 11:54:02'),
(22, 'Adri', 10, 'En Estados Unidos ha sido un éxito chavales...', '2015-06-23 11:56:38'),
(23, 'Adri', 7, 'Los Suaves!!!!!!', '2015-06-23 11:57:44'),
(24, 'Adri', 9, 'Yo creo que es mejor Shabu...', '2015-06-23 11:58:06'),
(25, 'AndresAJ', 2, 'Voy con todos mis amigos! Esperamos pasar un buen rato!', '2015-06-23 12:06:38'),
(26, 'MuchachoDry', 9, 'pero que me dices Adri!!!!!!!!!!', '2015-06-23 12:08:32'),
(28, 'Omar', 6, 'Alguien quiere acompañarme? :)', '2015-06-23 12:34:30'),
(29, 'Omar', 12, 'Wow sergio, te va la marcha?', '2015-06-23 12:37:35'),
(31, 'Adri', 17, 'Me apunto¡¡', '2015-06-23 22:36:03');

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
) ENGINE=InnoDB AUTO_INCREMENT=127 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`Codigo`, `NickUsuario`, `IDEvento`, `NumEntradas`, `Butacas`, `PrecioTotal`) VALUES
(88, 'muchachoDry', 5, 2, NULL, 20),
(89, 'muchachoDry', 9, 1, NULL, 10),
(90, 'muchachoDry', 6, 1, NULL, 12),
(91, 'muchachoDry', 10, 2, 1, 5),
(92, 'muchachoDry', 10, 2, 2, 5),
(93, 'Omar', 6, 1, NULL, 12),
(94, 'Sergio', 17, 3, 66, 5),
(95, 'Sergio', 17, 3, 67, 5),
(96, 'Sergio', 17, 3, 68, 5),
(97, 'Sergio', 12, 4, 52, 5),
(98, 'Sergio', 12, 4, 53, 5),
(99, 'Sergio', 12, 4, 54, 5),
(100, 'Sergio', 12, 4, 51, 5),
(101, 'Sergio', 1, 5, NULL, 250),
(102, 'Sergio', 8, 1, NULL, 150),
(103, 'Fran', 10, 3, 67, 5),
(104, 'Fran', 10, 3, 68, 5),
(105, 'Fran', 10, 3, 69, 5),
(106, 'Fran', 1, 1, NULL, 50),
(107, 'Fran', 4, 2, NULL, 130),
(108, 'Adri', 10, 2, 51, 5),
(109, 'Adri', 10, 2, 52, 5),
(110, 'Adri', 14, 6, 37, 5),
(111, 'Adri', 14, 6, 38, 5),
(112, 'Adri', 14, 6, 39, 5),
(113, 'Adri', 14, 6, 36, 5),
(114, 'Adri', 14, 6, 40, 5),
(115, 'Adri', 14, 6, 41, 5),
(116, 'Adri', 7, 4, NULL, 100),
(117, 'Adri', 9, 1, NULL, 10),
(118, 'AndresAJ', 13, 5, 35, 5),
(119, 'AndresAJ', 13, 5, 50, 5),
(120, 'AndresAJ', 13, 5, 65, 5),
(121, 'AndresAJ', 13, 5, 68, 5),
(122, 'AndresAJ', 13, 5, 53, 5),
(123, 'AndresAJ', 2, 10, NULL, 300),
(124, 'Fran', 10, 1, 3, 5),
(125, 'Adri', 17, 2, 34, 5),
(126, 'Adri', 17, 2, 35, 5);

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
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`ID`, `Nombre`, `Descripcion`, `Fecha`, `Precio`, `Imagen`, `PlazasDisponibles`, `Tipo`, `Promotor`, `Activo`) VALUES
(1, 'Arenal Sound', 'Festival de indie-rock situado en la Comunitat Valenciana', '2015-07-31 00:00:00', 50, 'includes/data/eventos/arenal.jpg', 60000, 0, 'AndresAJ', 1),
(2, 'Rock in Rio', 'Festival de musica electronica situado en Madrid', '2015-06-24 00:00:00', 30, 'includes/data/eventos/rir.jpg', 3000, 0, 'AndresAJ', 1),
(4, 'Festival de monegros', 'Festival de musica electronica en medio del desierto, disfruta de los mejores DJs en una alocada fiesta.', '2015-06-10 21:00:00', 65, 'includes/data/eventos/monegros.jpg', 10000, 0, 'AndresAJ', 1),
(5, 'Grimmey por Palestina', 'Festival de RAP cuyos beneficios seran entregados a una ONG para enviarlos a Palestina. Se puede pagar con alimentos no perecederos.', '2015-06-13 21:00:00', 10, 'includes/data/eventos/grimmpalestina.jpg', 1000, 0, 'AndresAJ', 1),
(6, 'BOA Fest', 'Festival de los grandes cantantes de HIP-HOP en el auditorio Miguel Rios de Rivas Vaciamadrid.', '2015-06-15 21:00:00', 12, 'includes/data/eventos/boafest.jpg', 7, 0, 'AndresAJ', 1),
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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `mensajes`
--

INSERT INTO `mensajes` (`ID`, `NickEmisor`, `NickReceptor`, `Correo`, `Titulo`, `TextoMensaje`, `Fecha`, `Leido`) VALUES
(4, 'Omar', 'MuchachoDry', '', 'Boa fest', 'Hola Muchacho,\r\ncon quien vas al BOA fest?\r\nUn saludo.', '2015-06-23 11:37:52', 0),
(5, 'Sergio', 'MuchachoDry', '', 'hola', 'que tal todo Omar?\r\nA ver cuando nos vemos eh, que ya hace tiempo que no te veo el pelo por la uni y perdi tu numero, pues me robaron el movil ', '2015-06-23 11:41:42', 1),
(6, 'Sergio', 'MuchachoDry', '', 'El ultimo trago', 'Te vienes a ver la del Ultimo trago? He leido que esta bien', '2015-06-23 11:47:41', 1),
(7, 'Fran', 'Sergio', '', 'Arenal', 'Nos vemos en el Arenal Sound compi!', '2015-06-23 11:51:23', 1),
(8, 'Adri', 'Fran', '', 'Vente al Palestina', 'por que no vienes al RAP por palestina de Grimey tio?\r\nYa vamos MuchachoDry y yo! Vente!!', '2015-06-23 12:01:52', 0),
(9, 'AndresAJ', 'Sergio', '', 'Una pregunta', 'Sergio sabes si este año las fiestas de Segovia caen en fin de semana?', '2015-06-23 12:05:45', 0),
(10, 'MuchachoDry', 'Sergio', '', 'Omar??', 'como que Omar? creo que te has confundido...', '2015-06-23 12:07:34', 0),
(11, 'MuchachoDry', 'Fran', '', 'Vacaciones', 'Fran te vienes a Javea en Julio?? tengo ganas de playa', '2015-06-23 12:11:20', 0),
(12, 'Omar', 'MuchachoDry', '', 'Quedada', 'Habiamos pensado en quedar mañana a las 7 a tomar unos ágapes. Te apuntas? Espero confirmación.', '2015-06-23 12:35:45', 0),
(13, 'Sergio', 'Adri', NULL, NULL, 'Hola tio , quedamos al final el viernes?', '2015-06-23 21:37:30', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peticionesamistad`
--

CREATE TABLE IF NOT EXISTS `peticionesamistad` (
  `NickUsuario1` varchar(100) NOT NULL,
  `NickUsuario2` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `peticionesamistad`
--

INSERT INTO `peticionesamistad` (`NickUsuario1`, `NickUsuario2`) VALUES
('Adri', 'Omar'),
('AndresAJ', 'Adri'),
('AndresAJ', 'Fran'),
('AndresAJ', 'muchachoDry'),
('AndresAJ', 'Omar'),
('MuchachoDry', 'Adri'),
('Omar', 'Adri'),
('Omar', 'Sergio');

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
('admin', '$2y$10$DqRigTe1daOoaJYDRInRruLEDpRgJyU8TwFP5Bg.DASF/cUEj2c0a', 'itsravenbooking@gmail.com', 'Administrador', 'del Sistema', 50, NULL, 'admin'),
('Adri', '$2y$10$ZQVkqOwc2nbHcDi2o1ARNuzyksLUP9TDfLTiW4R2hnVQYr47hfe/O', 'adri@gmail.com', 'Adrian', 'Garcia Garcia', 32, 'includes/data/users/f10.jpg', 'usuario'),
('AndresAJ', '$2y$10$z2BKDyQrB7DwFn20TgcxE.y33DCg8.zcF/e7aoTYFR65yqIF/OkIG', 'andragui@gmail.com', 'Andres', 'Aguirre Juarez', 21, NULL, 'promotor'),
('Enriquito', '$2y$10$HvTIXQSAehev66rcm3hGH.Pa9BCsUxssnYlbvirQj1ATwxWWtTena', 'enri@gmail.com', 'Enrique Javier', 'Laguna Munuera', 19, NULL, 'usuario'),
('Fran', '$2y$10$QobxYUnhEb43HqRTpqP9oOA7ZAnFDGfHYvG1QKXGgvtGk5aUMmBzm', 'alaci@hotmail.com', 'Francisco', 'Garcia Martinez', 22, 'includes/data/users/20130712_192931.jpg', 'usuario'),
('MuchachoDry', '$2y$10$02LAksA4nTXnpqG9hI2VMe2RypsL0Clk.1aNR7kKUmQ6qakJ7GBEe', 'fargo@cohen.es', 'Adrian', 'Calvo Lanza', 24, 'includes/data/users/D_gomez.png', 'usuario'),
('Omar', '$2y$10$avWORcdMPN.UTjY31Ve71etStywp5zmMCPGgcQl6Jvv3cfPMSe2Sa', 'pulp@gmail.com', 'Omar', 'Gaytan Silva', 25, 'includes/data/users/Gandalf.jpg', 'usuario'),
('Sergio', '$2y$10$E68QIrdtJCFeEkx.g/hR5upF.jkdUkrROMR/5izk4i01xPxrnIiq.', '0', 'Sergio', 'Raven', 22, 'includes/data/users/f1.jpg', 'usuario'),
('UsuarioAnonimo', '', '', '', '', 0, NULL, 'banned');

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
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
MODIFY `Codigo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=127;
--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT de la tabla `mensajes`
--
ALTER TABLE `mensajes`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
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

GRANT USAGE ON *.* TO 'finddleuser'@'localhost' IDENTIFIED BY PASSWORD '*E7253437FAE7FBF606772151AC76300D4B96966B';
GRANT SELECT, INSERT, UPDATE, DELETE ON `finddle`.* TO 'finddleuser'@'localhost';