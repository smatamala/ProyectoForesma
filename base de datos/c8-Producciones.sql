-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-11-2016 a las 04:09:16
-- Versión del servidor: 5.5.50-0ubuntu0.14.04.1
-- Versión de PHP: 5.5.9-1ubuntu4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `c8`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `codigos`
--

CREATE TABLE IF NOT EXISTS `codigos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(150) COLLATE utf8_spanish2_ci NOT NULL,
  `descripcion` varchar(150) COLLATE utf8_spanish2_ci NOT NULL,
  `modified` datetime NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `codigos`
--

INSERT INTO `codigos` (`id`, `codigo`, `descripcion`, `modified`, `created`) VALUES
(1, '0000', 'mal clima', '2016-11-18 10:38:51', '2016-11-18 10:38:51'),
(2, '0001', 'viento fuerte', '2016-11-18 10:40:28', '2016-11-18 10:40:28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE IF NOT EXISTS `empleados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rut` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `especialidad` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `tel` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id`, `rut`, `nombre`, `especialidad`, `tel`, `created`, `modified`) VALUES
(1, '17963589-5', 'sebastian matamala', 'proyecto', '56987441107', '2016-11-15 23:49:07', '2016-11-15 23:49:07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `faenas`
--

CREATE TABLE IF NOT EXISTS `faenas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) COLLATE utf8_spanish2_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `faenas`
--

INSERT INTO `faenas` (`id`, `nombre`, `user_id`, `created`, `modified`) VALUES
(1, 'Faena Admin', 1, '2016-11-08 03:34:57', '2016-11-08 03:34:57');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `insumos`
--

CREATE TABLE IF NOT EXISTS `insumos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `descripcion` varchar(150) COLLATE utf8_spanish2_ci NOT NULL,
  `modified` datetime NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `insumos`
--

INSERT INTO `insumos` (`id`, `nombre`, `descripcion`, `modified`, `created`) VALUES
(1, 'cadena moto', 'cadena de moto sierra', '2016-11-18 10:42:20', '2016-11-18 10:42:20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maquinas`
--

CREATE TABLE IF NOT EXISTS `maquinas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `ano` int(11) NOT NULL,
  `descripcion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `maquinas`
--

INSERT INTO `maquinas` (`id`, `nombre`, `ano`, `descripcion`, `created`, `modified`) VALUES
(1, 'm1', 1234, 'retro', '2016-11-16 00:29:21', '2016-11-16 00:29:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `produccions`
--

CREATE TABLE IF NOT EXISTS `produccions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `empleado_id` int(11) NOT NULL,
  `maquina_id` int(11) NOT NULL,
  `faena_id` int(11) NOT NULL,
  `insumo_id` int(11) NOT NULL,
  `codigo_id` int(11) NOT NULL,
  `dia` date NOT NULL,
  `p_trozado` decimal(11,1) NOT NULL,
  `p_descortezado` decimal(11,1) NOT NULL,
  `comb` decimal(11,1) NOT NULL,
  `lubri_h` decimal(11,1) NOT NULL,
  `lubri_c` decimal(11,1) NOT NULL,
  `lubri_m` decimal(11,1) NOT NULL,
  `descripcion` longtext COLLATE utf8_spanish2_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `produccions`
--

INSERT INTO `produccions` (`id`, `empleado_id`, `maquina_id`, `faena_id`, `insumo_id`, `codigo_id`, `dia`, `p_trozado`, `p_descortezado`, `comb`, `lubri_h`, `lubri_c`, `lubri_m`, `descripcion`, `created`, `modified`) VALUES
(1, 1, 1, 1, 1, 1, '2016-11-23', 100.0, 1000.0, 20.0, 20.0, 10.0, 0.0, 'descripcion corta', '2016-11-23 03:46:14', '2016-11-23 03:46:14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) CHARACTER SET latin1 NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 NOT NULL,
  `role` varchar(20) CHARACTER SET latin1 NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `created`, `modified`) VALUES
(1, 'admin', '$2a$10$GRFW7VOtjnQRoXyfu79IhOeQrl9Dy9JINvQocHaYhT.7tbuYzpebm', 'admin', '2016-10-20 00:00:00', '2016-10-20 00:00:00'),
(6, 'user', '$2a$10$8fEKj0.kD9z1H8MUSLxpauWoovsXUCwi9MiBtyYJ0B0p5W0Xn7Yqu', 'user', '2016-10-26 04:37:08', '2016-10-26 04:37:08'),
(7, 'pro', '$2a$10$1AM9OEgeYXyEb0Q1.h6L2e8GfQKBt7c2D4urgoSISmHj3lWz32c/S', 'root', '2016-11-16 00:05:44', '2016-11-16 00:05:44');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
