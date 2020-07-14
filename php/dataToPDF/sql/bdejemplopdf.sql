-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Creado por: Jairo Galeas -> www.jairogaleas.com
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdejemplopdf`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `IdCategoria` int(11) NOT NULL,
  `NombreC` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`IdCategoria`, `NombreC`) VALUES
(1, 'Computo'),
(2, 'Consumible'),
(3, 'Audio y video'),
(4, 'Impresion'),
(5, 'Infraestructura');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `IdProducto` int(11) NOT NULL,
  `CodigoP` varchar(15) NOT NULL,
  `NombreP` varchar(120) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `Precio` decimal(10,2) NOT NULL,
  `IdCategoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`IdProducto`, `CodigoP`, `NombreP`, `Cantidad`, `Precio`, `IdCategoria`) VALUES
(1, 'MON-012', 'DESKTOP DELL OPTIPLEX 980 USADO GRADO A, CI7 2.8GHz, 4G RAM, 250GB,\r\n', 30, '456.99', 1),
(2, 'M-0123-xy', 'MONITOR VIEWSONIC LED DE 22 PULGADAS, RESOLUCION 1920 X 1080, FULL \r\n', 12, '199.99', 1),
(3, 'K7X27AA#ABA', 'MONITOR HP P202 DE 20 PULGADAS, RESOLUCION 1600x900, VGA, ', 15, '99.99', 1),
(4, 'AIWPTFI4U1', 'MONITOR PARA BEBE, CON CAMARA Y PANTALLA 3.5 PULGADAS, Y AUDIO EN ', 11, '201.69', 1),
(5, 'K1234AA#A', 'COMPUTADORA PORTATIL, LAPTOP DELL INSP 14Z-5423 CI5 1.70GHz, 6GB, 500GB, 14″\r\n', 3, '699.99', 1),
(6, '14Z-5423', 'COMPUTADORA PORTATIL, LAPTOP PHP INSP 14Z-5423 CI5 1.70GHz, 6GB, 500GB, 16″', 4, '709.95', 1),
(7, 'CLX-3300', 'UNIDAD DE IMAGEN SAMSUNG PARA IMPRESORA CLX-3300 5FW', 34, '19.99', 2),
(8, 'CE314A ', 'TONER HP CE314A LJ CP1025/1025NW DRUM, 126A', 25, '99.96', 2),
(9, 'CL-54XL', 'TINTA CANON CL-54XL COLOR E481', 23, '15.22', 2),
(10, 'hp951', 'TINTA HP 951 MAGENTA P/8100/8600', 12, '10.00', 2),
(11, 'C170', 'WEBCAM CON MICROFONO, USB C170 5MP, NEGRO, LOGITECH, 960-000880', 37, '24.41', 3),
(12, 'LED39', 'TELEVISOR LED 39″ GPLUS HD 2HDMI/2USB/1VGA+SOPORTE PARED', 16, '147.96', 3),
(13, 'AU32D', 'AURICULAR BLUETOOTH, INALAMBRICO, CON ESTUCHE DE CARGA PORTATIL, KLIPX, KHS-700', 7, '49.00', 3),
(14, 'KP-12AU', 'AURICULAR BLUETOOTH, CON LECTOR MICRO SD, PLEGABLE, NEGRO, KLIPX, KHS-630BK', 11, '27.00', 3),
(15, 'B11B236201', 'SCANNER WORKFORCE DS-530, BLANCO, B11B236201', 14, '327.47', 4),
(16, '9856B067AA', 'PLOTTER IMAGEPROGRAF IPF770 MFP L36E DE 36 PULGADAS, 2,400 X 1,200 PPP, NEGRO', 12, '6400.21', 4),
(17, 'X5070', 'MULTIFUNCIONAL LEXMARK X5070, IMRPIME, COPIA, ESCANEA', 20, '97.97', 4),
(18, 'SL-M4580FX/XAA', 'MULTIFUNCIONAL SAMSUNG SL-M4580FX, IMPRIME, COPIA, ESCANEA, FAX, ', 9, '1400.25', 4),
(19, '44X527X89MM SUR', 'KIT DE MONTAJE APC PARA UPS 19″ ', 25, '77.00', 5),
(20, 'L-U5E-305', 'CABLE DE RED CATEGORIA 5e, UTP, 305m/1000pies, LOGAN, ', 49, '49.99', 5);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`IdCategoria`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`IdProducto`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `IdCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `IdProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
