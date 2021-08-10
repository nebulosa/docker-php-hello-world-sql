-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 02-08-2021 a las 21:47:29
-- Versión del servidor: 8.0.26-0ubuntu0.20.04.2
-- Versión de PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `heel`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encuesta`
--

CREATE TABLE `encuesta` (
  `id` int NOT NULL,
  `libro_id` int NOT NULL,
  `name` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `encuesta`
--

INSERT INTO `encuesta` (`id`, `libro_id`, `name`) VALUES
(1, 1, 'Diagnostic evaluation 1'),
(2, 2, 'Diagnostic evaluation 2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `id` int NOT NULL,
  `name` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`id`, `name`) VALUES
(1, 'Libro 1'),
(2, 'Libro 2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pivot`
--

CREATE TABLE `pivot` (
  `id` int NOT NULL,
  `libro_id` int DEFAULT NULL,
  `encuesta_id` int NOT NULL,
  `code_id` int DEFAULT NULL,
  `condicion` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pivot`
--

INSERT INTO `pivot` (`id`, `libro_id`, `encuesta_id`, `code_id`, `condicion`) VALUES
(1, 1, 1, 1, 0),
(2, 2, 2, 2, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pregunta_encuesta`
--

CREATE TABLE `pregunta_encuesta` (
  `id` int NOT NULL,
  `encuesta_id` int DEFAULT NULL,
  `pregunta` varchar(500) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pregunta_encuesta`
--

INSERT INTO `pregunta_encuesta` (`id`, `encuesta_id`, `pregunta`) VALUES
(1, 1, 'Malu ______my best friend.'),
(2, 1, 'You and your brother ______ teachers.'),
(3, 1, 'Rose is __________ in this school.'),
(4, 1, '_____Lola.'),
(5, 1, 'This is ________ house. We’re happy in here.'),
(6, 1, 'Are you the new teacher?   ______________'),
(7, 1, '__________old are you?'),
(8, 1, 'My birthday is on January the __________'),
(9, 1, 'I’m from Guadalajara. ______________'),
(10, 1, 'What’s your_____________? I’m a student.\r\n'),
(11, 2, 'Harold has two sisters.'),
(12, 2, 'Andrew and I have similar shirts.'),
(13, 2, 'This is the __________ pen.\r\n'),
(14, 2, '_______ book is new.'),
(15, 2, 'Sandy _________ jazz.'),
(16, 2, 'Gustave and Karen ______ to school every day.'),
(17, 2, 'I ________ play football, but I can play soccer.'),
(18, 2, 'You _______ ride your bike very well!'),
(19, 2, 'Look! Silvia _____________ for us! '),
(20, 2, 'I need some __________ to make lemonade.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `qr`
--

CREATE TABLE `qr` (
  `id` int NOT NULL,
  `image` varchar(150) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `hash` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `qr`
--

INSERT INTO `qr` (`id`, `image`, `hash`) VALUES
(1, 'qr_1_27-07-2021-05-28-52.png', '3cab553c613186068d0339543e7135cc0d4da473ff72d3a071f8af0a8119abfd'),
(2, 'qr_2_27-07-2021-06-06-39.png', '1e689a0c308148d62bdc104ba356eacf2d1c7b65b663eb05d5df55a2de2af197');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuesta_encuesta`
--

CREATE TABLE `respuesta_encuesta` (
  `id` int NOT NULL,
  `pregunta_id` int DEFAULT NULL,
  `opcion` varchar(3) COLLATE utf8_spanish_ci NOT NULL,
  `respuesta` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `respuesta_encuesta`
--

INSERT INTO `respuesta_encuesta` (`id`, `pregunta_id`, `opcion`, `respuesta`) VALUES
(1, 1, 'a)', 'am'),
(2, 1, 'b)', 'is'),
(3, 1, 'c)', 'are'),
(4, 2, 'a)', 'teacher'),
(5, 2, 'b)', 'is'),
(6, 2, 'c)', 'are'),
(7, 3, 'a)', 'teacher'),
(8, 3, 'b)', 'teachers'),
(9, 3, 'c)', 'a teacher'),
(10, 4, 'a)', 'My name is'),
(11, 4, 'b)', 'I’m'),
(12, 4, 'c)', 'My name am'),
(13, 6, 'a)', 'Yes, you are.'),
(14, 6, 'b)', 'Yes, I am.'),
(15, 6, 'c)', 'Yes, I’m.'),
(16, 5, 'a)', 'our'),
(17, 5, 'b)', 'we'),
(18, 5, 'c)', 'are'),
(19, 7, 'a)', 'Where'),
(20, 7, 'b)', 'Who'),
(21, 7, 'c)', 'How'),
(22, 8, 'a)', '1.'),
(23, 8, 'b)', '1th.'),
(24, 8, 'c)', '1st.'),
(25, 9, 'a)', 'I’m Mexican.'),
(26, 9, 'b)', 'I’m Mexico.'),
(27, 9, 'c)', '’m Guadalajara.'),
(28, 10, 'a)', 'occupation'),
(29, 10, 'b)', 'name'),
(30, 10, 'c)', 'favorite food'),
(31, 11, 'a)', 'have'),
(32, 11, 'b)', 'has'),
(33, 12, 'a)', 'have'),
(34, 12, 'b)', 'has'),
(35, 13, 'a)', 'teacher\'s'),
(36, 13, 'b)', 'teacher'),
(37, 13, 'c)', 'student'),
(38, 14, 'a)', 'Bob'),
(39, 14, 'b)', 'Bob’s'),
(40, 14, 'c)', 'The Bob'),
(41, 15, 'a)', 'dance'),
(42, 15, 'b)', 'can dances'),
(43, 15, 'c)', 'dances'),
(44, 16, 'a)', 'goes'),
(45, 16, 'b)', 'go'),
(46, 16, 'c)', 'can goes'),
(47, 17, 'a)', 'can’t'),
(48, 17, 'b)', 'doesn’t'),
(49, 17, 'c)', 'am not'),
(50, 18, 'a)', 'can'),
(51, 18, 'b)', 'doesn’t'),
(52, 18, 'c)', 'can see'),
(53, 19, 'a)', 'are waiting'),
(54, 19, 'b)', 'is waiting'),
(55, 19, 'c)', 'wait'),
(56, 20, 'a)', 'lime'),
(57, 20, 'b)', 'limes'),
(60, 20, 'c)', 'oranges');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `encuesta`
--
ALTER TABLE `encuesta`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pivot`
--
ALTER TABLE `pivot`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pregunta_encuesta`
--
ALTER TABLE `pregunta_encuesta`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `qr`
--
ALTER TABLE `qr`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `respuesta_encuesta`
--
ALTER TABLE `respuesta_encuesta`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `encuesta`
--
ALTER TABLE `encuesta`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `libros`
--
ALTER TABLE `libros`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `pivot`
--
ALTER TABLE `pivot`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `pregunta_encuesta`
--
ALTER TABLE `pregunta_encuesta`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `qr`
--
ALTER TABLE `qr`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `respuesta_encuesta`
--
ALTER TABLE `respuesta_encuesta`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
