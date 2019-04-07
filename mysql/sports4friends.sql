-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-04-2019 a las 00:47:41
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.3

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
  `id_eventos` int(10) NOT NULL,
  `nombre_evento` varchar(30) CHARACTER SET utf8 NOT NULL,
  `deporte` varchar(30) CHARACTER SET utf8 NOT NULL,
  `localizacion` varchar(100) CHARACTER SET utf8 NOT NULL,
  `fecha_creacion` date NOT NULL,
  `fecha_evento` date NOT NULL,
  `descripcion` varchar(200) CHARACTER SET utf8 NOT NULL,
  `foto_evento` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`id_eventos`, `nombre_evento`, `deporte`, `localizacion`, `fecha_creacion`, `fecha_evento`, `descripcion`, `foto_evento`) VALUES
(3, 'baloncesto 3v3 abril 2019', 'BALONCESTO', 'parque ugenia de montijo, canchas de detras del metro.', '2019-04-01', '2019-05-31', 'Se enfrentaras equipos de tres integrantes cada uno, que lucharán por hacersen con los tres puestos premiables del evento.', 'url');

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
(330001, 550001, 1, 1, '2019-04-03', '02:08:27'),
(330002, 550001, 2, 0, '2019-04-03', '02:10:16'),
(330003, 550002, 3, 1, '2019-04-03', '02:10:16'),
(330004, 550002, 4, 0, '2019-04-03', '02:10:16'),
(330005, 550003, 5, 1, '2019-04-03', '02:10:16'),
(330006, 550003, 6, 0, '2019-04-03', '02:10:16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registros_eventos`
--

CREATE TABLE `registros_eventos` (
  `id_registro` int(10) NOT NULL,
  `evento` varchar(30) CHARACTER SET utf8 NOT NULL,
  `equipo` varchar(30) CHARACTER SET utf8 NOT NULL,
  `p_victorias` int(11) NOT NULL,
  `fecha_creacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `registros_eventos`
--

INSERT INTO `registros_eventos` (`id_registro`, `evento`, `equipo`, `p_victorias`, `fecha_creacion`) VALUES
(1, 'baloncesto 3v3 abril 2019', 'BULL', 10, '2019-04-03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `ID_USUARIO` int(10) NOT NULL,
  `NICKNAME` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `NOMBRE` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `CORREO` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `PASSWORD` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `ROL_USUARIO` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL DEFAULT 'USER'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID_USUARIO`, `NICKNAME`, `NOMBRE`, `CORREO`, `PASSWORD`, `ROL_USUARIO`) VALUES
(1, 'admin', 'admin', 'admin@ucm.es', '25e4ee4e9229397b6b17776bfceaf8e7', 'ADMIN'),
(2, 'alv1', 'Alvaro', 'alvcarpi@ucm.es', 'b59c67bf196a4758191e42f76670ceba', 'USER'),
(3, 'jhce2', 'Jhimmy Ender', 'jcandela@ucm.es', '934b535800b1cba8f96a5d72f72f1611', 'USER'),
(4, 'jvp3', 'Jorge', 'jvalma01@ucm.es', '2be9bd7a3434f7038ca27d1918de58bd', 'USER'),
(5, 'iif4', 'Iker', 'ikeriban@ucm.es', 'dbc4d84bfcfe2284ba11beffb853a8c4', 'USER'),
(6, 'atc5', 'Alberto', 'alberture@ucm.es', '6074c6aa3488f3c2dddff2a7ca821aab', 'USER'),
(7, 'jjjj6', 'Jonathan Jose', 'jonathanj@ucm.es', 'e9510081ac30ffa83f10b68cde1cac07', 'USER'),
(8, 'jjjj8', 'Jonathan Josa', 'jonathanf@ucm.es', 'd79c8788088c2193f0244d8f1f36d2db', 'USER'),
(9, 'lucas', 'lucas', 'lucas@ucm.es', '$2y$10$qawAzPmYtYqLkWHgdrKxSusWbknFCrP6PzVnrcswN0Js6cK1JvAby', 'USER');

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
  ADD PRIMARY KEY (`id_eventos`),
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
  ADD PRIMARY KEY (`id_registro`),
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
  MODIFY `ID_EQUIPO` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=550005;

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id_eventos` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `jugadores`
--
ALTER TABLE `jugadores`
  MODIFY `ID_JUGADOR` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=330007;

--
-- AUTO_INCREMENT de la tabla `registros_eventos`
--
ALTER TABLE `registros_eventos`
  MODIFY `id_registro` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID_USUARIO` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
