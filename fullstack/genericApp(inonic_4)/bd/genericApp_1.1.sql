-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-07-2020 a las 12:02:05
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `genericapp`
--
CREATE DATABASE IF NOT EXISTS `genericapp` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `genericapp`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE `admin` (
  `CIAdmin` varchar(9) NOT NULL,
  `Nombre` varchar(20) NOT NULL,
  `Apellido` varchar(20) NOT NULL,
  `Pass` varchar(20) NOT NULL,
  `Activo` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`CIAdmin`, `Nombre`, `Apellido`, `Pass`, `Activo`) VALUES
('admin5770', 'Generic', 'Admin', 'contra2', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `crea`
--

CREATE TABLE `crea` (
  `idOperacion` int(11) NOT NULL,
  `CIAdmin` varchar(8) NOT NULL,
  `FechaOperacion` date NOT NULL,
  `HoraOperacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingresa`
--

CREATE TABLE `ingresa` (
  `CIPaciente` varchar(8) NOT NULL,
  `CIAdmin` varchar(8) NOT NULL,
  `Fecha` date NOT NULL,
  `Hora` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `operacion`
--

CREATE TABLE `operacion` (
  `idOperacion` int(11) NOT NULL,
  `CIPaciente` varchar(8) NOT NULL,
  `Fecha` date NOT NULL,
  `Hora` datetime NOT NULL,
  `Estado` varchar(50) NOT NULL,
  `Sala` smallint(2) NOT NULL,
  `Observaciones` varchar(50) NOT NULL,
  `Activo` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE `paciente` (
  `CIPaciente` varchar(8) NOT NULL,
  `Nombre` varchar(20) DEFAULT NULL,
  `Apellido` varchar(20) DEFAULT NULL,
  `Codigo` varchar(20) DEFAULT NULL,
  `Activo` tinyint(4) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `paciente`
--

INSERT INTO `paciente` (`CIPaciente`, `Nombre`, `Apellido`, `Codigo`, `Activo`) VALUES
('user5770', 'Leo', 'Funes', NULL, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`CIAdmin`);

--
-- Indices de la tabla `crea`
--
ALTER TABLE `crea`
  ADD PRIMARY KEY (`idOperacion`),
  ADD KEY `FK_crea_ciadmin` (`CIAdmin`);

--
-- Indices de la tabla `ingresa`
--
ALTER TABLE `ingresa`
  ADD PRIMARY KEY (`CIPaciente`),
  ADD KEY `FK_ing_ciadmin` (`CIAdmin`);

--
-- Indices de la tabla `operacion`
--
ALTER TABLE `operacion`
  ADD PRIMARY KEY (`idOperacion`,`CIPaciente`),
  ADD KEY `FK_ope_cipaciente` (`CIPaciente`);

--
-- Indices de la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`CIPaciente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `operacion`
--
ALTER TABLE `operacion`
  MODIFY `idOperacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `crea`
--
ALTER TABLE `crea`
  ADD CONSTRAINT `FK_crea_ciadmin` FOREIGN KEY (`CIAdmin`) REFERENCES `admin` (`CIAdmin`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_crea_idoperacion` FOREIGN KEY (`idOperacion`) REFERENCES `operacion` (`idOperacion`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `ingresa`
--
ALTER TABLE `ingresa`
  ADD CONSTRAINT `FK_ing_ciadmin` FOREIGN KEY (`CIAdmin`) REFERENCES `admin` (`CIAdmin`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_ing_cipaciente` FOREIGN KEY (`CIPaciente`) REFERENCES `paciente` (`CIPaciente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `operacion`
--
ALTER TABLE `operacion`
  ADD CONSTRAINT `FK_ope_cipaciente` FOREIGN KEY (`CIPaciente`) REFERENCES `paciente` (`CIPaciente`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
