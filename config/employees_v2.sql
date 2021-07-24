-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-07-2021 a las 15:00:23
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `employees_v2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `lastname` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `gender` enum('woman','man','other','no answer', '') NOT NULL,
  `age` int(3) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(25) NOT NULL,
  `state` varchar(25) NOT NULL,
  `postal_code` int(12) NOT NULL,
  `phone_number` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `employees`
--

INSERT INTO `employees` (`id`, `name`, `lastname`, `email`, `gender`, `age`, `address`, `city`, `state`, `postal_code`, `phone_number`) VALUES
(8, 'Rack', 'Lei', 'jackon@network.com', 'man', 35, 'San Jone', 'Atlanta', 'CA', 394221, '7383627627'),
(9, 'John', 'Doe', 'jhondoe@foo.com', 'man', 39, '29', 'New York', 'WA', 9889, '1283645645'),
(10, 'Leila', 'Mills', 'mills@leila.com', 'woman', 26, '55', 'San Diego', 'CA', 98765, '9983632461'),
(11, 'Susan', 'Smith', 'susanmith@baz.com', 'woman', 28, '43', 'Louisville', 'KNT', 445321, '224355488976'),
(12, 'Brad', 'Simpson', 'brad@foo.com', 'man', 40, '128', 'Atlanta', 'GEO', 394221, '6854634522'),
(13, 'Neil', 'Walker', 'walkerneil@baz.com', 'man', 42, '1', 'Nashville', 'TN', 90143, '45372788192'),
(14, 'Robert', 'Thomson', 'jackon@network.com', 'man', 24, '126', 'New Orleans', 'LU', 63281, '91232876454');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(1, 'admin', 'admin@assemblerschool.com', '$2y$10$nuh1LEwFt7Q2/wz9/CmTJO91stTBS4cRjiJYBY3sVCARnllI.wzBC');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
