-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-11-2017 a las 06:39:57
-- Versión del servidor: 10.1.26-MariaDB
-- Versión de PHP: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `estacionamiento`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id` int(10) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `sexo` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `clave` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `turno` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `perfil` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `foto` varchar(60) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id`, `nombre`, `apellido`, `sexo`, `email`, `clave`, `turno`, `perfil`, `fecha_ingreso`, `foto`) VALUES
(1, 'Daniel', 'de Brito', 'Masculino', 'admin@granateparking.com', '1234', 'Mañana', 'admin', '1996-09-01', ''),
(2, 'Marky', 'Ramone', 'Masculino', 'marky@granateparking.com', '1234', 'Mañana', 'Usuario', '1998-05-04', ''),
(3, 'Jack', 'Daniels', 'M', 'jack@granateparking.com', '1234', 't', 'usuario', '2001-12-12', 'link'),
(4, 'Jack', 'Daniels', 'M', 'jack@granateparking.com', '1234', 't', 'usuario', '2001-12-12', 'link'),
(5, 'Jack', 'Daniels', 'M', 'jack@granateparking.com', '1234', 't', 'usuario', '2001-12-12', 'link');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
