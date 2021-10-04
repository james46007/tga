-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3307
-- Tiempo de generación: 02-10-2021 a las 01:31:33
-- Versión del servidor: 10.4.13-MariaDB
-- Versión de PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `prueba`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parametrizaciones`
--

DROP TABLE IF EXISTS `parametrizaciones`;
CREATE TABLE IF NOT EXISTS `parametrizaciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `valor` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8_unicode_ci NOT NULL,
  `tipo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `state` tinyint(4) NOT NULL DEFAULT 1,
  `padre_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `parametrizaciones`
--

INSERT INTO `parametrizaciones` (`id`, `nombre`, `valor`, `descripcion`, `tipo`, `created_at`, `updated_at`, `state`, `padre_id`) VALUES
(1, 'Mujer', 'Mujer', 'TIPO GENERO', 'GENERO', '2021-10-01 04:17:13', NULL, 1, NULL),
(2, 'Hombre', 'Hombre', 'TIPO GENERO', 'GENERO', '2021-10-01 04:17:32', NULL, 1, NULL),
(3, 'Ninguno', 'Ninguno', '¿Tienes algún hobby?', 'HOBBY', '2021-10-01 04:18:43', NULL, 1, NULL),
(4, 'Deporte', 'Deporte', '¿Tienes algún hobby?', 'HOBBY', '2021-10-01 04:18:57', NULL, 1, NULL),
(5, 'Musical', 'Musical', '¿Tienes algún hobby?', 'HOBBY', '2021-10-01 04:19:13', NULL, 1, NULL),
(6, 'Cocina', 'Cocina', '¿Tienes algún hobby?', 'HOBBY', '2021-10-01 04:19:27', NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas`
--

DROP TABLE IF EXISTS `preguntas`;
CREATE TABLE IF NOT EXISTS `preguntas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `genero` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hobby` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tiempo` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `state` tinyint(4) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `preguntas`
--

INSERT INTO `preguntas` (`id`, `nombre`, `genero`, `hobby`, `tiempo`, `created_at`, `updated_at`, `state`) VALUES
(17, 'prueba2', 'Hombre', 'Ninguno', 0, '2021-10-02 00:13:19', NULL, 1),
(16, 'prueba6', 'Hombre', 'Ninguno', 0, '2021-10-01 23:13:53', NULL, 1),
(15, 'prueba6', 'Hombre', 'Ninguno', 0, '2021-10-01 20:15:48', NULL, 1),
(14, 'prueba5', 'Mujer', 'Ninguno', 0, '2021-10-01 20:15:26', NULL, 1),
(13, 'prueba4', 'Hombre', 'Ninguno', 0, '2021-10-01 20:15:03', NULL, 1),
(12, 'prueba3', 'Mujer', 'Deporte', 1, '2021-10-01 20:14:26', NULL, 1),
(10, 'prueba1', 'Hombre', 'Ninguno', 0, '2021-10-01 17:46:33', NULL, 1),
(11, 'prueba2', 'Hombre', 'Ninguno', 0, '2021-10-01 20:07:51', NULL, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
