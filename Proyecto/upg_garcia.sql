-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-12-2023 a las 19:03:35
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `upg_garcia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `loginusuarios`
--

CREATE TABLE `loginusuarios` (
  `Id_usuario` int(11) NOT NULL,
  `Usuario` varchar(50) NOT NULL,
  `Rol` varchar(50) NOT NULL,
  `Contraseña` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_login`
--

CREATE TABLE `usuarios_login` (
  `id_usuario` int(50) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `rol` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios_login`
--

INSERT INTO `usuarios_login` (`id_usuario`, `usuario`, `rol`, `password`) VALUES
(2, 'debannie', 'admin', 'natsume23'),
(3, 'Levi', 'maestro', 'foreverer2'),
(4, 'Angel ', 'alumno', '1212ksdfs'),
(5, 'Delias', 'alumno', 'junkoodshd'),
(6, 'roberto', 'admin', 'roberto'),
(7, 'andrea', 'maestro', '123456');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `loginusuarios`
--
ALTER TABLE `loginusuarios`
  ADD PRIMARY KEY (`Id_usuario`);

--
-- Indices de la tabla `usuarios_login`
--
ALTER TABLE `usuarios_login`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `loginusuarios`
--
ALTER TABLE `loginusuarios`
  MODIFY `Id_usuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios_login`
--
ALTER TABLE `usuarios_login`
  MODIFY `id_usuario` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
