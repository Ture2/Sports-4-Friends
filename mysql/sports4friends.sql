-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-04-2019 a las 23:55:01
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 7.2.10

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
  `NOMBRE_DEPORTE` varchar(30) CHARACTER SET utf8 NOT NULL,
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
  `NOMBRE_EQUIPO` varchar(30) CHARACTER SET utf8 NOT NULL,
  `FECHA_CEQUIPO` date NOT NULL,
  `HORA_CEQUIPO` time NOT NULL,
  `PARTIDOS_GANADOS` int(4) NOT NULL DEFAULT '0',
  `PARTIDOS_EMPATADOS` int(4) NOT NULL DEFAULT '0',
  `PARTIDOS_PERDIDOS` int(4) NOT NULL DEFAULT '0',
  `MAYOR_RACHA` int(2) NOT NULL DEFAULT '0',
  `ULTIMO_RESULTADO` int(2) NOT NULL,
  `POSICION_LIGA` int(2) NOT NULL,
  `LOGO_EQUIPO` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `DESCRIPCION_EQUIPO` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `equipos`
--

INSERT INTO `equipos` (`ID_EQUIPO`, `DEPORTE`, `NOMBRE_EQUIPO`, `FECHA_CEQUIPO`, `HORA_CEQUIPO`, `PARTIDOS_GANADOS`, `PARTIDOS_EMPATADOS`, `PARTIDOS_PERDIDOS`, `MAYOR_RACHA`, `ULTIMO_RESULTADO`, `POSICION_LIGA`, `LOGO_EQUIPO`, `DESCRIPCION_EQUIPO`) VALUES
(550001, 880001, 'BULL', '2019-04-03', '01:50:02', 0, 0, 0, 0, 0, 0, 'images/logo_equipos/bull_logo.jpg', 'Somos un equipo de basket'),
(550002, 880002, 'REAL MADRID', '2019-04-03', '01:50:02', 0, 0, 0, 0, 0, 0, NULL, 'Somos un equipo de fútbol'),
(550003, 880003, 'SALOU', '2019-04-03', '01:50:02', 0, 0, 0, 0, 0, 0, NULL, 'Somos un equipo de beisbol'),
(550004, 880004, 'VALENCIA', '2019-04-03', '01:50:02', 0, 0, 0, 0, 0, 0, NULL, 'Somos un equipo de balonmano'),
(550005, 880001, 'LOS CHACHOS FC', '2019-04-04', '03:00:00', 2, 4, 1, 0, 0, 0, 'images/logo_equipos/loschachosfc_logo.jpg', 'El equipo de los chachos ha sido creado con la intención de ser el mejor equipo de fútbol en Sports 4 Friends, únete ! '),
(550006, 880001, 'FLORIDA CDF', '2019-04-07', '13:00:00', 2, 1, 4, 0, 0, 0, 'images/logo_equipos/floridacdf_logo.jpg', 'Salidos del barrio de Hortaleza somos un equipo con las herramientas necesarias para vencer en la liga norte');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `ID_EVENTO` int(10) NOT NULL,
  `nombre_evento` varchar(30) CHARACTER SET utf8 NOT NULL,
  `deporte` varchar(30) CHARACTER SET utf8 NOT NULL,
  `ciudad` varchar(30) CHARACTER SET utf8 NOT NULL,
  `municipio` varchar(30) CHARACTER SET ascii NOT NULL,
  `localizacion` varchar(100) CHARACTER SET utf8 NOT NULL,
  `fecha_creacion` date NOT NULL,
  `fecha_evento` date NOT NULL,
  `hora_evento` varchar(30) CHARACTER SET utf8 NOT NULL,
  `descripcion` varchar(200) CHARACTER SET utf8 NOT NULL,
  `foto_evento` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`ID_EVENTO`, `nombre_evento`, `deporte`, `ciudad`, `municipio`, `localizacion`, `fecha_creacion`, `fecha_evento`, `hora_evento`, `descripcion`, `foto_evento`) VALUES
(990001, 'baloncesto 3v3 abril 2019', 'BALONCESTO', 'Madrid', 'Carabanchel', 'Parque Ugenia de Montijo, canchas de detras del metro', '2019-04-09', '2019-05-31', '10:00 - 15:00', 'Este es el primer evento que hemos creado', 'images/evento1.png'),
(990002, 'futbol rey de la pista', 'FUTBOL', 'Madrid', 'Usera', 'Parque aluche en las pistas de fútbol', '2019-04-09', '2019-04-27', '09:00 - 18:00', 'Partidos de futbol sala minimo 6 participantes por equipo', 'images/evento2.jpg');

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
(330007, 550001, 2, 1, '2019-04-09', '00:17:23'),
(330008, 550001, 3, 0, '2019-04-09', '00:17:23'),
(330009, 550002, 4, 1, '2019-04-09', '00:17:23'),
(330010, 550002, 5, 0, '2019-04-09', '00:17:23'),
(330011, 550003, 6, 1, '2019-04-09', '00:17:23'),
(330012, 550003, 7, 0, '2019-04-09', '00:17:23'),
(330013, 550004, 8, 1, '2019-04-09', '00:17:23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registros_eventos`
--

CREATE TABLE `registros_eventos` (
  `ID_REGISTRO` int(10) NOT NULL,
  `evento` varchar(30) CHARACTER SET utf8 NOT NULL,
  `equipo` varchar(30) CHARACTER SET utf8 NOT NULL,
  `p_victorias` int(11) NOT NULL,
  `fecha_creacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `registros_eventos`
--

INSERT INTO `registros_eventos` (`ID_REGISTRO`, `evento`, `equipo`, `p_victorias`, `fecha_creacion`) VALUES
(770001, 'baloncesto 3v3 abril 2019', 'BULL', 10, '2019-04-09');

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
(1, 'admin', 'Administrador', 'admin@ucm.es', '$2y$10$hSK.JgAQXT5YJIz6k207I.YyHiP4WlLPr2SIlI6dPrEqCf34Z8ifa', 'ADMIN'),
(2, 'alv1', 'Alvaro', 'alvcarpi@ucm.es', '$2y$10$yvOHIrk7LyJH1bxhyvPbX.eAf7JguNq0RJM0OQZUcOr82z/Jji7Wi', 'USER'),
(3, 'jhce2', 'Jhimmy Ender', 'jcandela@ucm.es', '$2y$10$WvEf90rD98SDOXOIUuf5/Ou28TEZTlBkC6WNFEA6UQFqsGtfrGEUi', 'USER'),
(4, 'jvp3', 'Jorge', 'jvalma01@ucm.es', '$2y$10$kPaZzPpNemtlB/bhFQ7k1eEGAvmThp/eVtZPtUmPq6D.kD6OpMexu', 'USER'),
(5, 'iiif4', 'Iker', 'ikeriban@ucm.es', '$2y$10$IexT7ht8yM5olEMl9kQKYeoUM54HKWtKyjqUQ436CTuinSNAAivA.', 'USER'),
(6, 'atc5', 'Alberto', 'alberture@ucm.es', '$2y$10$14haQw95h4UGzooRpCzbQOwddRDsIzQTbZW4r8Sg6aBYmA/hZY2uO', 'USER'),
(7, 'jjjj6', 'Jonathan Jose', 'jonathanj@ucm.es', '$2y$10$tnSbgl4cOzAurLUb0MXK1eAGUTJi2ASnjGOPCs/GjWT5bL53gZWTO', 'USER'),
(8, 'lucas', 'Lucas', 'lucas@ucm.es', '$2y$10$0dVHdan2jVD8/O.zgt2nXeKx8dYF9WMRe1S3zvulKmqpFV/UqreEK', 'USER');

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
  ADD UNIQUE KEY `nombre_evento` (`nombre_evento`),
  ADD KEY `deporte` (`deporte`);

--
-- Indices de la tabla `jugadores`
--
ALTER TABLE `jugadores`
  ADD PRIMARY KEY (`ID_JUGADOR`),
  ADD KEY `USUARIO` (`USUARIO`),
  ADD KEY `EQUIPO` (`EQUIPO`);

--
-- Indices de la tabla `registros_eventos`
--
ALTER TABLE `registros_eventos`
  ADD PRIMARY KEY (`ID_REGISTRO`),
  ADD KEY `equipo` (`equipo`),
  ADD KEY `registros_eventos_ibfk_2` (`evento`);

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
  MODIFY `ID_EQUIPO` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=550007;

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `ID_EVENTO` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=990003;

--
-- AUTO_INCREMENT de la tabla `jugadores`
--
ALTER TABLE `jugadores`
  MODIFY `ID_JUGADOR` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=330014;

--
-- AUTO_INCREMENT de la tabla `registros_eventos`
--
ALTER TABLE `registros_eventos`
  MODIFY `ID_REGISTRO` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=770002;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID_USUARIO` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
  ADD CONSTRAINT `eventos_ibfk_1` FOREIGN KEY (`deporte`) REFERENCES `deportes` (`NOMBRE_DEPORTE`) ON DELETE CASCADE;

--
-- Filtros para la tabla `jugadores`
--
ALTER TABLE `jugadores`
  ADD CONSTRAINT `jugadores_ibfk_1` FOREIGN KEY (`USUARIO`) REFERENCES `usuarios` (`ID_USUARIO`) ON DELETE CASCADE,
  ADD CONSTRAINT `jugadores_ibfk_2` FOREIGN KEY (`EQUIPO`) REFERENCES `equipos` (`ID_EQUIPO`) ON DELETE CASCADE;

--
-- Filtros para la tabla `registros_eventos`
--
ALTER TABLE `registros_eventos`
  ADD CONSTRAINT `registros_eventos_ibfk_1` FOREIGN KEY (`equipo`) REFERENCES `equipos` (`NOMBRE_EQUIPO`) ON DELETE CASCADE,
  ADD CONSTRAINT `registros_eventos_ibfk_2` FOREIGN KEY (`evento`) REFERENCES `eventos` (`nombre_evento`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
