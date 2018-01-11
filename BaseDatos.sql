-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb2+deb7u7
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 26-12-2017 a las 21:44:44
-- Versión del servidor: 5.5.54
-- Versión de PHP: 5.4.45-0+deb7u7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `Xdperez067_web_auditoria_sgssi`
--
DROP DATABASE 'Xdperez067_web_auditoria_sgssi';
CREATE DATABASE 'Xdperez067_web_auditoria_sgssi';
USE 'Xdperez067_web_auditoria_sgssi';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Jugadores`
--
CREATE TABLE IF NOT EXISTS `Jugadores` (
  `ID` int(255) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(255) NOT NULL,
  `Nacionalidad` varchar(255) NOT NULL,
  `FechaNacimiento` date NOT NULL,
  `NombreEquipo` varchar(20) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Volcado de datos para la tabla `Jugadores`
--

INSERT INTO `Jugadores` (`ID`, `Nombre`, `Nacionalidad`, `FechaNacimiento`, `NombreEquipo`) VALUES
(5, 'Pedro Pedro', 'Portugal', '2017-11-08', 'Madeira'),
(6, 'hola', 'wfa', '2017-11-03', 'hjd'),
(7, '12df', 'agd', '2017-11-16', 'afdag'),
(8, 'wdfsad33', 'zvzxvz', '2017-11-02', 'vzxvzx'),
(9, 'asd', 'ads', '2017-11-02', 'ads'),
(13, '41wfc', 'zvbcxbx', '2017-11-17', 'vxcbx'),
(15, '3qefsf', 'gsgs3', '2017-11-11', 'sdvsd'),
(16, 'asbvakv', 'dasdb', '2017-11-08', 'avddsbsd'),
(22, 'Babe Ruth', 'EEUU', '2005-02-03', 'New York');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Usuarios`
--

CREATE TABLE IF NOT EXISTS `Usuarios` (
  `username` varchar(15) NOT NULL,
  `password` char(255) NOT NULL,
  `nombre` varchar(15) NOT NULL,
  `apellidos` varchar(20) NOT NULL,
  `dni` varchar(10) NOT NULL,
  `fechanacimiento` date NOT NULL,
  `email` varchar(20) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Usuarios`
--

INSERT INTO `Usuarios` (`username`, `password`, `nombre`, `apellidos`, `dni`, `fechanacimiento`, `email`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'Pedro', 'Piqueras', '1234567890', '2017-11-07', 'mail@mail.com'),
('franco', 'd41d8cd98f00b204e9800998ecf8427e', 'franko', 'franco', '78993757-G', '2017-11-30', 'fsg@gamil.com'),
('hola', '202cb962ac59075b964b07152d234b70', 'hola', 'hola', '06976781-F', '2017-11-09', 'feafd@gmail.com'),
('mikel', '8a8bc6f1f2e6762dae7780efd335c743', 'mikel', 'villamane', '12345678-Z', '2022-07-09', 'pepe@pepe.es'),
('oliver', 'd41d8cd98f00b204e9800998ecf8427e', 'holahermano', 'PODEMOS', '59144796-C', '2017-11-02', 'mail@mailist.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
