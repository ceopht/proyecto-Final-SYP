-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-05-2021 a las 17:04:53
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
-- Base de datos: `records`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `idCliente` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `NRC` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`idCliente`, `nombre`, `NRC`) VALUES
(1, 'COSASE', 32353),
(2, 'ABC', 443622),
(4, 'Lactosac', 44361234),
(5, 'Lacteos SA', 46262);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user` text NOT NULL,
  `type` text NOT NULL,
  `pass` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `user`, `type`, `pass`) VALUES
(1, 'admin', 'admin', 'admin'),
(4, 'vendedor3', 'vendeor', 'wqfr');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventascontribuyente`
--

CREATE TABLE `ventascontribuyente` (
  `id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `nFactura` int(11) NOT NULL,
  `idCliente` int(11) NOT NULL,
  `venta` float NOT NULL,
  `IVA` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ventascontribuyente`
--

INSERT INTO `ventascontribuyente` (`id`, `fecha`, `nFactura`, `idCliente`, `venta`, `IVA`) VALUES
(5, '2021-05-02', 1, 2, 52, 0),
(6, '2021-05-03', 2, 4, 34, 0),
(7, '2021-05-04', 3, 1, 78, 0),
(8, '2021-05-02', 1, 2, 52, 0),
(9, '2021-05-02', 2, 2, 45, 0),
(11, '2021-05-05', 6, 1, 50, 67.4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventasfinal`
--

CREATE TABLE `ventasfinal` (
  `id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `nFactura` int(11) NOT NULL,
  `Total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ventasfinal`
--

INSERT INTO `ventasfinal` (`id`, `fecha`, `nFactura`, `Total`) VALUES
(1, '2021-05-01', 1, 20.5),
(3, '2021-05-02', 3, 60),
(4, '2021-05-03', 4, 89);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`idCliente`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user` (`user`) USING HASH;

--
-- Indices de la tabla `ventascontribuyente`
--
ALTER TABLE `ventascontribuyente`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idCliente` (`idCliente`);

--
-- Indices de la tabla `ventasfinal`
--
ALTER TABLE `ventasfinal`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `ventascontribuyente`
--
ALTER TABLE `ventascontribuyente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `ventasfinal`
--
ALTER TABLE `ventasfinal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ventascontribuyente`
--
ALTER TABLE `ventascontribuyente`
  ADD CONSTRAINT `ventascontribuyente_ibfk_1` FOREIGN KEY (`idCliente`) REFERENCES `clientes` (`idCliente`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
