-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2015 at 01:03 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `finddle`
--

-- --------------------------------------------------------

--
-- Table structure for table `amigos`
--

CREATE TABLE IF NOT EXISTS `amigos` (
  `NickUsuario1` varchar(100) NOT NULL,
  `NickUsuario2` varchar(100) NOT NULL,
  PRIMARY KEY (`NickUsuario1`,`NickUsuario2`),
  KEY `NickUsuario1` (`NickUsuario1`),
  KEY `NickUsuario2` (`NickUsuario2`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `amigos`
--

INSERT INTO `amigos` (`NickUsuario1`, `NickUsuario2`) VALUES
('gandalf', 'paco'),
('paco', 'titomc');

-- --------------------------------------------------------

--
-- Table structure for table `asiste`
--

CREATE TABLE IF NOT EXISTS `asiste` (
  `NickUsuario` varchar(100) NOT NULL,
  `IDEvento` int(11) NOT NULL,
  PRIMARY KEY (`NickUsuario`,`IDEvento`),
  KEY `NickUsuario` (`NickUsuario`),
  KEY `IDEvento` (`IDEvento`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `asiste`
--

INSERT INTO `asiste` (`NickUsuario`, `IDEvento`) VALUES
('gandalf', 1),
('paco', 1),
('paco', 2);

-- --------------------------------------------------------

--
-- Table structure for table `comentarios`
--

CREATE TABLE IF NOT EXISTS `comentarios` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NickUsuario` varchar(100) NOT NULL,
  `IDEvento` int(11) NOT NULL,
  `Texto` text NOT NULL,
  `Fecha` date NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `ID` (`ID`),
  KEY `NickUsuario` (`NickUsuario`),
  KEY `IDEvento` (`IDEvento`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `compras`
--

CREATE TABLE IF NOT EXISTS `compras` (
  `Codigo` int(11) NOT NULL AUTO_INCREMENT,
  `NickUsuario` varchar(100) NOT NULL,
  `IDEvento` int(11) NOT NULL,
  `NumEntradas` int(11) NOT NULL,
  `Butacas` int(11) DEFAULT NULL,
  `PrecioTotal` double NOT NULL,
  PRIMARY KEY (`Codigo`),
  KEY `Codigo` (`Codigo`),
  KEY `NickUsuario` (`NickUsuario`),
  KEY `IDEvento` (`IDEvento`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `eventos`
--

CREATE TABLE IF NOT EXISTS `eventos` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(100) NOT NULL,
  `Descripcion` text NOT NULL,
  `Fecha` date NOT NULL,
  `Precio` double NOT NULL,
  `Imagen` varchar(40) NOT NULL,
  `PlazasDisponibles` int(11) NOT NULL,
  `Tipo` tinyint(1) NOT NULL,
  `Promotor` varchar(100) NOT NULL,
  `Activo` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `ID` (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `eventos`
--

INSERT INTO `eventos` (`ID`, `Nombre`, `Descripcion`, `Fecha`, `Precio`, `Imagen`, `PlazasDisponibles`, `Tipo`, `Promotor`, `Activo`) VALUES
(1, 'Arenal Sound', 'Festival de indie-rock situado en la Comunitat Valenciana', '2015-07-31', 50.23, 'includes/data/eventos/arenal.jpg', 60000, 0, 'AndresAJ', 1),
(2, 'Rock in Rio', 'Festival de musica electronica situado en Madrid', '2015-06-24', 30.23, 'includes/data/eventos/rir.jpg', 3000, 0, 'AndresAJ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mensajes`
--

CREATE TABLE IF NOT EXISTS `mensajes` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NickEmisor` varchar(100) NOT NULL,
  `NickReceptor` varchar(100) NOT NULL,
  `Correo` varchar(60) DEFAULT NULL,
  `Titulo` varchar(60) DEFAULT NULL,
  `TextoMensaje` text NOT NULL,
  `Fecha` datetime NOT NULL,
  `Leido` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `ID` (`ID`),
  KEY `NickEmisor` (`NickEmisor`),
  KEY `NickReceptor` (`NickReceptor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `peticionesamistad`
--

CREATE TABLE IF NOT EXISTS `peticionesamistad` (
  `NickUsuario1` varchar(100) NOT NULL,
  `NickUsuario2` varchar(100) NOT NULL,
  PRIMARY KEY (`NickUsuario1`,`NickUsuario2`),
  KEY `NickUsuario1` (`NickUsuario1`),
  KEY `NickUsuario2` (`NickUsuario2`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `Nick` varchar(100) NOT NULL,
  `Contrasena` varchar(60) NOT NULL,
  `Correo` varchar(100) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Apellidos` varchar(100) NOT NULL,
  `Edad` int(11) NOT NULL,
  `Avatar` varchar(40) DEFAULT NULL,
  `Tipo` enum('usuario','admin','promotor','banned') NOT NULL,
  PRIMARY KEY (`Nick`),
  KEY `Nick` (`Nick`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`Nick`, `Contrasena`, `Correo`, `Nombre`, `Apellidos`, `Edad`, `Avatar`, `Tipo`) VALUES
('', '', '', '', '', 0, NULL, 'usuario'),
('gandalf', 'gandalf', 'gandalf@elblanco.com', 'gandalf', 'elblanco', 400, NULL, 'admin'),
('paco', 'paco', 'paco@paco.com', 'Francisco', 'Paco', 30, NULL, 'usuario'),
('titomc', 'titomc', 'titomc@titomc', 'dominique', 'elnegrata', 32, NULL, 'promotor');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `amigos`
--
ALTER TABLE `amigos`
  ADD CONSTRAINT `amigos_ibfk_1` FOREIGN KEY (`NickUsuario1`) REFERENCES `usuarios` (`Nick`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `amigos_ibfk_2` FOREIGN KEY (`NickUsuario2`) REFERENCES `usuarios` (`Nick`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `asiste`
--
ALTER TABLE `asiste`
  ADD CONSTRAINT `asiste_ibfk_1` FOREIGN KEY (`NickUsuario`) REFERENCES `usuarios` (`Nick`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `asiste_ibfk_2` FOREIGN KEY (`IDEvento`) REFERENCES `eventos` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`NickUsuario`) REFERENCES `usuarios` (`Nick`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comentarios_ibfk_2` FOREIGN KEY (`IDEvento`) REFERENCES `eventos` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `compras_ibfk_1` FOREIGN KEY (`NickUsuario`) REFERENCES `usuarios` (`Nick`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `compras_ibfk_2` FOREIGN KEY (`IDEvento`) REFERENCES `eventos` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mensajes`
--
ALTER TABLE `mensajes`
  ADD CONSTRAINT `mensajes_ibfk_1` FOREIGN KEY (`NickEmisor`) REFERENCES `usuarios` (`Nick`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mensajes_ibfk_2` FOREIGN KEY (`NickReceptor`) REFERENCES `usuarios` (`Nick`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `peticionesamistad`
--
ALTER TABLE `peticionesamistad`
  ADD CONSTRAINT `peticionesamistad_ibfk_1` FOREIGN KEY (`NickUsuario1`) REFERENCES `usuarios` (`Nick`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `peticionesamistad_ibfk_2` FOREIGN KEY (`NickUsuario2`) REFERENCES `usuarios` (`Nick`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
