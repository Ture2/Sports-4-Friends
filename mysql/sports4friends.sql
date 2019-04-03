-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-04-2019 a las 14:27:21
-- Versión del servidor: 10.1.35-MariaDB
-- Versión de PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sports4friends`
--
CREATE DATABASE IF NOT EXISTS `sports4friends` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `sports4friends`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deportes`
--

CREATE TABLE `deportes` (
  `ID_DEPORTE` int(10) NOT NULL,
  `NOMBRE_DEPORTE` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `NUMERO_MAXIMO_JUGADORES` int(3) DEFAULT NULL,
  `DURACION_MIN` int(5) DEFAULT NULL,
  `FECHA_CDEPORTE` date NOT NULL,
  `HORA_CDEPORTE` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `deportes`
--

INSERT INTO `deportes` (`ID_DEPORTE`, `NOMBRE_DEPORTE`, `NUMERO_MAXIMO_JUGADORES`, `DURACION_MIN`, `FECHA_CDEPORTE`, `HORA_CDEPORTE`) VALUES
(880001, 'FUTBOL', 20, 90, '2019-04-03', '01:13:26'),
(880002, 'BALONCESTO', 10, 40, '2019-04-03', '01:13:26'),
(880003, 'BEISBOL', 10, 60, '2019-04-03', '01:13:26'),
(880004, 'BALONMANO', 15, 40, '2019-04-03', '01:13:26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipos`
--

CREATE TABLE `equipos` (
  `ID_EQUIPO` int(10) NOT NULL,
  `DEPORTE` int(10) NOT NULL,
  `NOMBRE_EQUIPO` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `FECHA_CEQUIPO` date NOT NULL,
  `HORA_CEQUIPO` time NOT NULL,
  `PARTIDOS_GANADOS` int(4) NOT NULL DEFAULT '0',
  `PARTIDOS_EMPATADOS` int(4) NOT NULL DEFAULT '0',
  `PARTIDOS_PERDIDOS` int(4) NOT NULL DEFAULT '0',
  `LOGO_EQUIPO` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `DESCRIPCION_EQUIPO` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `equipos`
--

INSERT INTO `equipos` (`ID_EQUIPO`, `DEPORTE`, `NOMBRE_EQUIPO`, `FECHA_CEQUIPO`, `HORA_CEQUIPO`, `PARTIDOS_GANADOS`, `PARTIDOS_EMPATADOS`, `PARTIDOS_PERDIDOS`, `LOGO_EQUIPO`, `DESCRIPCION_EQUIPO`) VALUES
(550001, 880001, 'BULL', '2019-04-03', '01:50:02', 0, 0, 0, NULL, 'Somos un equipo de basket'),
(550002, 880002, 'REAL MADRID', '2019-04-03', '01:50:02', 0, 0, 0, NULL, 'Somos un equipo de fútbol'),
(550003, 880003, 'SALOU', '2019-04-03', '01:50:02', 0, 0, 0, NULL, 'Somos un equipo de beisbol'),
(550004, 880004, 'VALENCIA', '2019-04-03', '01:50:02', 0, 0, 0, NULL, 'Somos un equipo de balonmano');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `ID_EVENTO` int(11) NOT NULL,
  `NOMBRE` varchar(45) NOT NULL,
  `LOCALIZACION` varchar(100) NOT NULL,
  `TIPO_DEPORTE` varchar(45) NOT NULL,
  `DESCRIPCION` varchar(100) DEFAULT NULL,
  `EQUIPO_1` int(10) DEFAULT NULL,
  `EQUIPO_2` int(10) DEFAULT NULL,
  `PORCENTAJE` decimal(10,2) NOT NULL,
  `FECHA_CREACION` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jugadores`
--

CREATE TABLE `jugadores` (
  `ID_JUGADOR` int(10) NOT NULL,
  `EQUIPO` int(10) NOT NULL,
  `USUARIO` int(10) NOT NULL,
  `ROL_JUGADOR` tinyint(1) NOT NULL DEFAULT '0',
  `FECHA_PJUGADOR` date NOT NULL,
  `HORA_PJUGADOR` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `jugadores`
--

INSERT INTO `jugadores` (`ID_JUGADOR`, `EQUIPO`, `USUARIO`, `ROL_JUGADOR`, `FECHA_PJUGADOR`, `HORA_PJUGADOR`) VALUES
(330007, 550001, 1, 1, '2019-04-03', '14:23:53'),
(330008, 550001, 2, 0, '2019-04-03', '14:23:53'),
(330009, 550002, 3, 1, '2019-04-03', '14:23:53'),
(330010, 550002, 4, 0, '2019-04-03', '14:23:53'),
(330011, 550003, 5, 1, '2019-04-03', '14:23:53'),
(330012, 550003, 6, 0, '2019-04-03', '14:23:53');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `ID_USUARIO` int(10) NOT NULL,
  `NICKNAME` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `NOMBRE` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `CORREO` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `PASSWORD` varchar(400) NOT NULL,
  `ROL_USUARIO` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL DEFAULT 'USER'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID_USUARIO`, `NICKNAME`, `NOMBRE`, `CORREO`, `PASSWORD`, `ROL_USUARIO`) VALUES
(1, 'admin', 'admin', 'admin@ucm.es', '$2y$10$9a4JwHk7lWyFTD7zdCuJVejAxOVHxBN5NIlBJ82xhDG0GQE4q0czS', 'ADMIN'),
(2, 'alv1', 'Alvaro', 'alvcarpi@ucm.es', '$2y$10$.wMVVI01Uuj8dxOXvf443.o6XAcFrhcNWdBrAzK/jCYX3A3bFgU9a', 'USER'),
(3, 'jhce2', 'Jhimmy Ender', 'jcandela@ucm.es', '$2y$10$3wJl3O81bdsI0a4L7iTGvOocRVFnIlzx6xZ7VvI8Vgto9x/bKGv2G', 'USER'),
(4, 'jvp3', 'Jorge', 'jvalma01@ucm.es', '$2y$10$AaoHd58VRYJqQ1QZXMMMKuR5uF.ZDZc4rJF/F2z0LrOU3y0Q8VKqi', 'USER'),
(5, 'iif4', 'Iker', 'ikeriban@ucm.es', '$2y$10$YiSg6sVyOMVGSAfP9YXxn.52ulfwfI3oC7JKEgv5WheRnSIh/zfhW', 'USER'),
(6, 'atc5', 'Alberto', 'alberture@ucm.es', '$2y$10$oEB5gyRuHPDKqM4ZF2sb5uHMiZ5V4m6lnXJgIOX.ipDkLiQm3RFxO', 'USER'),
(7, 'jjjj6', 'Jonathan Jose', 'jonathanj@ucm.es', '$2y$10$U96bK9tO7sIxKSHTw/Ojie6P.ccoGlGuu2kPksun1g3aqCVMJEini', 'USER');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `deportes`
--
ALTER TABLE `deportes`
  ADD PRIMARY KEY (`ID_DEPORTE`),
  ADD UNIQUE KEY `NOMBRE_DEPORTE` (`NOMBRE_DEPORTE`);

--
-- Indices de la tabla `equipos`
--
ALTER TABLE `equipos`
  ADD PRIMARY KEY (`ID_EQUIPO`),
  ADD UNIQUE KEY `NOMBRE_EQUIPO` (`NOMBRE_EQUIPO`),
  ADD KEY `DEPORTE` (`DEPORTE`);

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`ID_EVENTO`),
  ADD KEY `eventos_ibfk_1` (`EQUIPO_1`),
  ADD KEY `eventos_ibfk_2` (`EQUIPO_2`);

--
-- Indices de la tabla `jugadores`
--
ALTER TABLE `jugadores`
  ADD PRIMARY KEY (`ID_JUGADOR`),
  ADD KEY `USUARIO` (`USUARIO`),
  ADD KEY `EQUIPO` (`EQUIPO`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID_USUARIO`),
  ADD UNIQUE KEY `NICKNAME` (`NICKNAME`),
  ADD UNIQUE KEY `CORREO` (`CORREO`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `deportes`
--
ALTER TABLE `deportes`
  MODIFY `ID_DEPORTE` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=880005;

--
-- AUTO_INCREMENT de la tabla `equipos`
--
ALTER TABLE `equipos`
  MODIFY `ID_EQUIPO` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=550005;

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `ID_EVENTO` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `jugadores`
--
ALTER TABLE `jugadores`
  MODIFY `ID_JUGADOR` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=330013;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID_USUARIO` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `equipos`
--
ALTER TABLE `equipos`
  ADD CONSTRAINT `equipos_ibfk_1` FOREIGN KEY (`DEPORTE`) REFERENCES `deportes` (`ID_DEPORTE`) ON DELETE CASCADE;

--
-- Filtros para la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD CONSTRAINT `eventos_ibfk_1` FOREIGN KEY (`EQUIPO_1`) REFERENCES `equipos` (`ID_EQUIPO`) ON DELETE CASCADE,
  ADD CONSTRAINT `eventos_ibfk_2` FOREIGN KEY (`EQUIPO_2`) REFERENCES `equipos` (`ID_EQUIPO`) ON DELETE CASCADE;

--
-- Filtros para la tabla `jugadores`
--
ALTER TABLE `jugadores`
  ADD CONSTRAINT `jugadores_ibfk_1` FOREIGN KEY (`USUARIO`) REFERENCES `usuarios` (`ID_USUARIO`) ON DELETE CASCADE,
  ADD CONSTRAINT `jugadores_ibfk_2` FOREIGN KEY (`EQUIPO`) REFERENCES `equipos` (`ID_EQUIPO`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
