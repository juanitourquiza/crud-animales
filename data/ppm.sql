-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 11-03-2020 a las 22:39:40
-- Versión del servidor: 8.0.16
-- Versión de PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ppm`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

CREATE TABLE `animales` (
  `id` int(11) NOT NULL,
  `name` varchar(190) NOT NULL,
  `tipo` varchar(190) NOT NULL,
  `edad` varchar(100) NOT NULL,
  `register` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `personal`
--

INSERT INTO `animales` (`id`, `name`, `tipo`, `edad`, `register`) VALUES
(1, 'Tosco', 'perro', '2', '1234567876'),
(2, 'Anibal', 'Aguila', '8', '1234567878'),
(3, 'Vensima', 'Tigre', '10', '1234598876'),
(4, 'Toma', 'Leon', '5', '1784567876'),
(5, 'Oblak', 'Oso', '4', '1209567876');

