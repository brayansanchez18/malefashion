-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-09-2023 a las 06:29:02
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `malefashion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `call_to_action`
--

CREATE TABLE `call_to_action` (
  `id` int(11) NOT NULL,
  `titulo` varchar(250) NOT NULL,
  `imagen` varchar(250) NOT NULL,
  `boton` varchar(250) NOT NULL,
  `url` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `call_to_action`
--

INSERT INTO `call_to_action` (`id`, `titulo`, `imagen`, `boton`, `url`, `fecha`) VALUES
(1, 'Clothing Collections 2030', 'vistas/img/banner/banner-1.jpg', 'Ver producto', '#', '2023-09-27 03:36:14'),
(4, 'Accessories', 'vistas/img/banner/banner-2.jpg', 'Shop Now', '#', '2023-09-27 04:27:38'),
(5, 'Shoes Spring 2023', 'vistas/img/banner/banner-3.jpg', 'Shop Now', '#', '2023-09-27 04:28:46');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `call_to_action`
--
ALTER TABLE `call_to_action`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `call_to_action`
--
ALTER TABLE `call_to_action`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
