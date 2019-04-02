
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
  `DURACION_MIN` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `deportes`
--

INSERT INTO `deportes` (`ID_DEPORTE`, `NOMBRE_DEPORTE`, `NUMERO_MAXIMO_JUGADORES`, `DURACION_MIN`) VALUES
(880001, 'BALONCESTO', 10, 40),
(880002, 'FUTBOL', 20, 90),
(880003, 'BEISBOL', 10, 60),
(880004, 'BALONMANO', 15, 40);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipos`
--

CREATE TABLE `equipos` (
  `ID_EQUIPO` int(10) NOT NULL,
  `DEPORTE` int(10) DEFAULT NULL,
  `NOMBRE_EQUIPO` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `equipos`
--

INSERT INTO `equipos` (`ID_EQUIPO`, `DEPORTE`, `NOMBRE_EQUIPO`) VALUES
(550001, 880001, 'BULL'),
(550002, 880002, 'REAL MADRID'),
(550003, 880003, 'SALOU'),
(550004, 880001, 'VALENCIA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jugadores`
--

CREATE TABLE `jugadores` (
  `ID_JUGADOR` int(10) NOT NULL,
  `EQUIPO` int(10) DEFAULT NULL,
  `USUARIO` int(10) DEFAULT NULL,
  `Admin_team` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `jugadores`
--

INSERT INTO `jugadores` (`ID_JUGADOR`, `EQUIPO`, `USUARIO`, `Admin_team`) VALUES
(330001, 550001, 1, 1),
(330002, 550001, 2, 0),
(330003, 550002, 3, 1),
(330004, 550002, 4, 0),
(330005, 550003, 5, 1),
(330006, 550003, 6, 0),
(330007, 550001, 7, 0),
(330008, 550001, 8, 0),
(330009, 550001, 9, 0),
(330010, 550002, 10, 0),
(330011, 550002, 11, 0),
(330012, 550002, 12, 0),
(330013, 550002, 13, 0),
(330014, 550003, 14, 0),
(330015, 550003, 15, 0),
(330016, 550003, 16, 0),
(330017, 550003, 17, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `ID_USUARIO` int(10) NOT NULL,
  `NICKNAME` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `NOMBRE` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `APELLIDOS` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `TELEFONO` int(9) DEFAULT NULL,
  `CORREO` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `PASSWORD` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID_USUARIO`, `NICKNAME`, `NOMBRE`, `APELLIDOS`, `TELEFONO`, `CORREO`, `PASSWORD`) VALUES
(1, 'alv1', 'Alvaro', 'Carpizo Garcia', 611111111, 'alvcarpi@ucm', '1111'),
(2, 'jhce2', 'Jhimmy Ender', 'Candela Espinosa', 622222222, 'jcandela@ucm.es', '2222'),
(3, 'jvp3', 'Jorge', 'Valsameda Plasencia', 633333333, 'jvalma01@ucm.es', '3333'),
(4, 'iif4', 'Iker', 'Ibañez FLores', 644444444, 'ikeriban@ucm.es', '4444'),
(5, 'atc5', 'Alberto', 'Turegano Castedo', 655555555, 'alberture@ucm.es', '5555'),
(6, 'jjjj6', 'Jonathan Jose', 'Jimenez Jimenez', 666666666, 'jonathanj@ucm.es', '6666'),
(7, 'fff7', 'Federico', 'Garcia Muñoz', 777777777, 'federico@ucm.es', '7777'),
(8, 'ale45', 'Alejandro', 'Rivas Moreira', 647282865, 'alerivas@ucm.es', 'sodf1234'),
(9, 'adr', 'Andrea Sthephania', 'Janampa Nebrica', 675820123, 'Andreasthe@ucm.es', '1234jii'),
(10, 'anton', 'Antonio ', 'Rodiriguez', 693874739, 'Antonioro@ucm.es', 'ciin585'),
(11, 'charly', 'Carlos', 'Cervigon', 685894939, 'Carlocer@ucm.es', 'sf3€'),
(12, 'mia', 'Cintia', 'Perraño Ruiz', 685930022, 'Cintiapry@ucm.es', 'lsdfo'),
(13, 'bull', 'Cristian ', 'Molina Muñoz', 674828382, 'Cristianm@ucm.es', '234qwer'),
(14, 'fan', 'Daniel', 'Jorguera', 685393434, 'Danialjord@ucm.es', '1234'),
(15, 'user', 'Hector', 'Mangarran', 688493454, 'Hector@ucm.es', '12342'),
(16, 'jenni', 'Jennifer ', 'Marmorejos', 658200304, 'Jennyfer4@ucm.es', 'jeny1234'),
(17, 'hacking', 'Jokin', 'Garde ', 657392939, 'Jockinga@ucm.es', '11234');

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
-- AUTO_INCREMENT de la tabla `jugadores`
--
ALTER TABLE `jugadores`
  MODIFY `ID_JUGADOR` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=330018;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID_USUARIO` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `equipos`
--
ALTER TABLE `equipos`
  ADD CONSTRAINT `equipos_ibfk_1` FOREIGN KEY (`DEPORTE`) REFERENCES `deportes` (`ID_DEPORTE`) ON DELETE CASCADE;

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
