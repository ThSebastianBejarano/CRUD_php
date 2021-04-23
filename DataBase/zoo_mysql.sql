-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-04-2021 a las 02:02:19
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `zoo_mysql`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `animales`
--

CREATE TABLE `animales` (
  `animal_Id` int(11) NOT NULL,
  `animal_Name` text COLLATE utf8_spanish2_ci NOT NULL,
  `animal_Sex` text COLLATE utf8_spanish2_ci NOT NULL,
  `animal_Bdate` date NOT NULL,
  `animal_Adate` date NOT NULL,
  `animal_Color` text COLLATE utf8_spanish2_ci NOT NULL,
  `cod_Especie` int(11) NOT NULL,
  `cod_Raza` int(11) NOT NULL,
  `crias_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `crias`
--

CREATE TABLE `crias` (
  `crias_Id` int(11) NOT NULL,
  `crias_Num` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuidador`
--

CREATE TABLE `cuidador` (
  `cuidador_Id` int(11) NOT NULL,
  `cuidador_Name` text COLLATE utf8_spanish2_ci NOT NULL,
  `cuidador_Age` int(11) NOT NULL,
  `cuidador_Adate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuidador_animales`
--

CREATE TABLE `cuidador_animales` (
  `cuidador_Id` int(11) NOT NULL,
  `animal_Id` int(11) NOT NULL,
  `date_assign` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_especie`
--

CREATE TABLE `tipo_especie` (
  `cod_Especie` int(11) NOT NULL,
  `name_Especie` text COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_raza`
--

CREATE TABLE `tipo_raza` (
  `cod_Raza` int(11) NOT NULL,
  `name_Raza` text COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `animales`
--
ALTER TABLE `animales`
  ADD PRIMARY KEY (`animal_Id`),
  ADD UNIQUE KEY `cod_Especie` (`cod_Especie`),
  ADD UNIQUE KEY `cod_Raza` (`cod_Raza`),
  ADD UNIQUE KEY `crias_Id` (`crias_Id`);

--
-- Indices de la tabla `crias`
--
ALTER TABLE `crias`
  ADD PRIMARY KEY (`crias_Id`);

--
-- Indices de la tabla `cuidador`
--
ALTER TABLE `cuidador`
  ADD PRIMARY KEY (`cuidador_Id`);

--
-- Indices de la tabla `cuidador_animales`
--
ALTER TABLE `cuidador_animales`
  ADD UNIQUE KEY `cuidador_Id` (`cuidador_Id`),
  ADD UNIQUE KEY `animal_Id` (`animal_Id`);

--
-- Indices de la tabla `tipo_especie`
--
ALTER TABLE `tipo_especie`
  ADD PRIMARY KEY (`cod_Especie`);

--
-- Indices de la tabla `tipo_raza`
--
ALTER TABLE `tipo_raza`
  ADD PRIMARY KEY (`cod_Raza`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `animales`
--
ALTER TABLE `animales`
  MODIFY `animal_Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `crias`
--
ALTER TABLE `crias`
  MODIFY `crias_Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cuidador`
--
ALTER TABLE `cuidador`
  MODIFY `cuidador_Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo_especie`
--
ALTER TABLE `tipo_especie`
  MODIFY `cod_Especie` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo_raza`
--
ALTER TABLE `tipo_raza`
  MODIFY `cod_Raza` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `animales`
--
ALTER TABLE `animales`
  ADD CONSTRAINT `animales_ibfk_1` FOREIGN KEY (`cod_Raza`) REFERENCES `tipo_raza` (`cod_Raza`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `animales_ibfk_2` FOREIGN KEY (`cod_Especie`) REFERENCES `tipo_especie` (`cod_Especie`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `animales_ibfk_3` FOREIGN KEY (`crias_Id`) REFERENCES `crias` (`crias_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cuidador_animales`
--
ALTER TABLE `cuidador_animales`
  ADD CONSTRAINT `cuidador_animales_ibfk_1` FOREIGN KEY (`animal_Id`) REFERENCES `animales` (`animal_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cuidador_animales_ibfk_2` FOREIGN KEY (`cuidador_Id`) REFERENCES `cuidador` (`cuidador_Id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
