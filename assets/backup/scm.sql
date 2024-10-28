-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-10-2024 a las 04:26:03
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `scm`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `agenda`
--

CREATE TABLE `agenda` (
  `CodContacto` int(11) NOT NULL,
  `CodMedio` varchar(255) NOT NULL,
  `Nombre` text DEFAULT NULL,
  `Telefono` varchar(255) NOT NULL,
  `Correo` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contenedordecodigos`
--

CREATE TABLE `contenedordecodigos` (
  `Id` int(11) NOT NULL,
  `CodPerteneciente` varchar(255) NOT NULL,
  `CodAlmacenado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medios`
--

CREATE TABLE `medios` (
  `CodMedio` varchar(255) NOT NULL,
  `Nombre` text DEFAULT NULL,
  `Categoria` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticia`
--

CREATE TABLE `noticia` (
  `CodNoticia` varchar(255) NOT NULL,
  `FechaNoticia` date DEFAULT NULL,
  `Medio` varchar(255) NOT NULL,
  `Titular` text DEFAULT NULL,
  `Espacio` text DEFAULT NULL,
  `Periodista` text DEFAULT NULL,
  `Impacto` varchar(255) NOT NULL,
  `ComentarioArticulo` text DEFAULT NULL,
  `Recomendaciones` text DEFAULT NULL,
  `FuenteNoticia` text DEFAULT NULL,
  `ArchivoAdjunto` text DEFAULT NULL,
  `EnlaceAdicional` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `Nombre` text DEFAULT NULL,
  `Usuario` varchar(255) NOT NULL,
  `Contraseña` varchar(255) NOT NULL,
  `Rol` varchar(255) NOT NULL,
  `Estado` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`CodContacto`),
  ADD KEY `agenda_CodMedio_fk` (`CodMedio`);

--
-- Indices de la tabla `contenedordecodigos`
--
ALTER TABLE `contenedordecodigos`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `contenedordecodigos_CodPerteneciente_fk2` (`CodPerteneciente`);

--
-- Indices de la tabla `medios`
--
ALTER TABLE `medios`
  ADD PRIMARY KEY (`CodMedio`);

--
-- Indices de la tabla `noticia`
--
ALTER TABLE `noticia`
  ADD PRIMARY KEY (`CodNoticia`),
  ADD KEY `noticia_Medio_fk` (`Medio`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `agenda`
--
ALTER TABLE `agenda`
  MODIFY `CodContacto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `contenedordecodigos`
--
ALTER TABLE `contenedordecodigos`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `agenda`
--
ALTER TABLE `agenda`
  ADD CONSTRAINT `agenda_CodMedio_fk` FOREIGN KEY (`CodMedio`) REFERENCES `medios` (`CodMedio`);

--
-- Filtros para la tabla `contenedordecodigos`
--
ALTER TABLE `contenedordecodigos`
  ADD CONSTRAINT `contenedordecodigos_CodPerteneciente_fk1` FOREIGN KEY (`CodPerteneciente`) REFERENCES `noticia` (`CodNoticia`),
  ADD CONSTRAINT `contenedordecodigos_CodPerteneciente_fk2` FOREIGN KEY (`CodPerteneciente`) REFERENCES `medios` (`CodMedio`);

--
-- Filtros para la tabla `noticia`
--
ALTER TABLE `noticia`
  ADD CONSTRAINT `noticia_Medio_fk` FOREIGN KEY (`Medio`) REFERENCES `medios` (`CodMedio`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
