-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-04-2019 a las 14:34:17
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
(880004, 'BALONMANO', 15, 40, '2019-04-03', '01:13:26'),
(880005, 'TENIS', 2, 60, '2019-04-10', '12:58:52');

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
  `ULTIMO_RESULTADO` varchar(10) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'NO HAY',
  `POSICION_LIGA` int(2) NOT NULL DEFAULT '0',
  `LOGO_EQUIPO` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `DESCRIPCION_EQUIPO` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `equipos`
--

INSERT INTO `equipos` (`ID_EQUIPO`, `DEPORTE`, `NOMBRE_EQUIPO`, `FECHA_CEQUIPO`, `HORA_CEQUIPO`, `PARTIDOS_GANADOS`, `PARTIDOS_EMPATADOS`, `PARTIDOS_PERDIDOS`, `MAYOR_RACHA`, `ULTIMO_RESULTADO`, `POSICION_LIGA`, `LOGO_EQUIPO`, `DESCRIPCION_EQUIPO`) VALUES
(550001, 880001, 'BULL', '2019-04-03', '01:50:02', 5, 2, 6, 2, '3-1(G)', 0, 'bull_logo.jpg', 'Somos los diablos rojos del basket, letales como nadie.'),
(550002, 880002, 'REAL MADRID', '2019-04-03', '01:50:02', 9, 0, 1, 8, '60-35(G)', 0, 'real_madrid.jpg', 'El equipo rey de reyes del barrio.'),
(550003, 880003, 'SALOU', '2019-04-03', '01:50:02', 3, 0, 1, 2, '8-5(G)', 0, 'salou.jpg', 'Bateamos con estilo y las cogemos cada pelota al vuelo.'),
(550004, 880004, 'VALENCIA', '2019-04-03', '01:50:02', 4, 0, 2, 2, '28-24(G)', 0, 'valencia.jpg', 'Gladidores chés, atacamos con fuerza, defendemos con murallas.'),
(550005, 880001, 'LOS CHACHOS FC', '2019-04-04', '03:00:00', 2, 4, 1, 1, '2-2(E)', 0, 'loschachosfc_logo.jpg', 'El equipo de los chachos ha sido creado con la intención de ser el mejor equipo de fútbol en Sports 4 Friends, únete ! '),
(550006, 880001, 'FLORIDA CDF', '2019-04-07', '13:00:00', 2, 1, 4, 1, '1-1(E)', 0, 'floridacdf_logo.jpg', 'Salidos del barrio de Hortaleza somos un equipo con las herramientas necesarias para vencer en la liga norte.'),
(550007, 880001, 'ASTON BIRRAS', '2019-04-10', '15:23:43', 6, 2, 1, 3, '4-2(G)', 0, 'aston_birra.jpg', 'Un equipo que jugamos con corazón y con una birra para levantar la moral.'),
(550008, 880001, 'MESSIRIANOS FC', '2019-04-10', '15:34:57', 18, 2, 4, 10, '1-1(E)', 0, 'messirianos.jpg', 'Equipo formado por los discipulos del más grande de todos los tiempos.'),
(550009, 880001, 'AC MILANAS', '2019-04-10', '15:37:05', 2, 2, 9, 1, '2-2(E)', 0, 'ac_milanas.jpg', 'Milanas que daremos muchas guerra con estilo y diversión.'),
(550010, 880001, 'RAYO MONCLOA', '2019-04-10', '15:37:41', 7, 8, 1, 3, '1-3(P)', 0, 'rayo_moncloa.jpg', 'Somos el rayo que descargará toda nuestra electricidad para ganar todos los partidos. '),
(550011, 880001, 'REAL ALUCHE', '2019-04-11', '13:33:13', 4, 2, 1, 2, '1-1(E)', 0, 'real_aluche.jpg', 'Equipo de un barrio de risas y con ganas de comernos la capital. '),
(550012, 880002, 'BASKETLEGA', '2019-04-11', '13:55:13', 5, 0, 2, 2, '35-60(P)', 0, 'basketlega.jpg', 'Equipo de Leganes que LEGAnamos a cualquiera '),
(550013, 880002, 'ADECORON', '2019-04-11', '14:06:44', 2, 0, 5, 1, '22-55(P)', 0, 'adecoron.png', 'Hay dos cosas que no gusta de verdad, el basket y el ron, viva las dos! ');

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
(8, 'lucas', 'Lucas', 'lucas@ucm.es', '$2y$10$0dVHdan2jVD8/O.zgt2nXeKx8dYF9WMRe1S3zvulKmqpFV/UqreEK', 'USER'),
(9, 'mlc9', 'Marta', 'martalopezc@ucm.es', '$2y$10$95CJ3WOCkdSQcTOfra3UmeoIsNd12NS3oy2xKbRGgMu3KyBiTHK2i', 'USER'),
(10, 'dfh10', 'Diana', 'dianadf@ucm.es', '$2y$10$AC6JL1NAMKow1BroC4YLi.zAt/tL/WNxlXpVIX4wiGBwT5g.w61Gq', 'USER'),
(11, 'rcg11', 'Ruben', 'rubi4512@gmail.com', '$2y$10$5wl9bSiKKMcQvjIrRoFAn.7t7Ju5Gz9Lu.l/Of3EhNHRT7fzwX4em', 'USER'),
(12, 'esmin12', 'Esmeralda', 'esmeral33@outlook.com', '$2y$10$UUpnYo2Xn80hTUoUvPWL9uLuKJ3oGj5wbwn24tYDVOnmEI7canYL6', 'USER'),
(13, 'sofivb13', 'Sofia', 'sofiavelasco@gmail.es', '$2y$10$WVPCMl88heXbqRBMQtNHzOI8K971iDxLmYBtfD8jSlJ6cpFDMJnSG', 'USER'),
(14, 'carmengar14', 'Carmen', 'carmengarri23@outlook.es', '$2y$10$MzzKTQYSOLv0BsL.z61JEO6Cc2GzHW3pJEe4itGKvIOnKEFsVFxoq', 'USER'),
(15, 'lucy15', 'Lucia', 'luciagimenezpi@ucm.es', '$2y$10$2TsfIdxcpgiPWHeYZWKxZOh0JS.OFt6XEdbsdq8/pc8rU35.3lf7.', 'USER'),
(16, 'sarase16', 'Sara', 'saraseboblanco@yahoo.es', '$2y$10$sGNIO1u56jf/.Ajxav1OhOMXTiw62w0MvsdT8PWokeJ9CI1dq2fTm', 'USER'),
(17, 'marisol17', 'Maria Soledad', 'mariasol567@gmail.es', '$2y$10$iZL.ACIBVQiLl0tD57JuHeeuEYwegn2D6ZHyvIeWtT/YGEq4mV/4C', 'USER'),
(18, 'Gonza18', 'Gonzalo', 'gonzagimenez@ucm.es', '$2y$10$rrtIVIoXLlBc4gwqYjGWa.W/f08X9Z3jQZOpEHMU4JKQXhQbe0S92', 'USER'),
(19, 'Miri19', 'Miriam', 'miriangelfe@yahoo.es', '$2y$10$KmgRlwHhNuk9Zs3yT7yg0umNm2.tenJnmoQla776T7qcckWd/BdEe', 'USER'),
(20, 'Leire20', 'Leire', 'leirebilbao@outlook.com', '$2y$10$gTnSHWlGshE2fPXEWpM8tego8AlbgSVb/MvzrawQodubD1uNKhpzC', 'USER'),
(21, 'Marcos21', 'Marcos', 'realmadridmarcos13@gmail.es', '$2y$10$PbdtVLi3ytA34nG6KaloWOahe8gsFIMc0Y/NaWFzeH24GstcUkZ3e', 'USER'),
(22, 'Jenni22', 'Jennifer', 'jenninformatica@ucm.es', '$2y$10$3TabhIqAjDWLFpoptN4f.elAq6KfaCNRFc1XSaOqwTk3UTbCDejKW', 'USER'),
(23, 'nadia23', 'Nadia', 'nadiagarciagh@gmail.es', '$2y$10$aPJIVe.AqltsQxBUjqOCSO/IR7uqy.dNI6ODbDuOXUWH/Icvt64hq', 'USER'),
(24, 'almu24', 'Almudena', 'almuceu@ucm.es', '$2y$10$RM.5E2E026DXeuBSnGhwgO34GsMWXXEJZkC/oKZopQG4ZUJsEyOxi', 'USER'),
(25, 'robert25', 'Roberto', 'robertoledo@gmail.es', '$2y$10$S1qpoJktObbfqeCXnsK5mOzzmj9SJq4sI9VGxFbCkaxerH5fR.Tyy', 'USER'),
(26, 'susin26', 'Susana', 'susanarroyoss@ucm.es', '$2y$10$ytCX1lI9c2tYPDQ6aQ1FZukOiDWey4A0LwGZIMmjR45s2SPHPS5rK', 'USER'),
(27, 'yao27', 'Yao Ying', 'yaoyingvv@outlook.uk', '$2y$10$IVTA8OlnvR835H87umLNb.oawnIg75IelFPvLcOFzvmw3iEFW5Dti', 'USER'),
(28, 'isid28', 'Isidoro', 'isidoromadrid@gmail.es', '$2y$10$RY1p1EXUvlG5xSYSOqQ4O.9MwoeKI2oxDcDG5koBfnsqaw1l7w4IW', 'USER'),
(29, 'beloki29', 'Rodolfo', 'rodolfobeloki@gmail.com', '$2y$10$xpiuEvnzSa3L570Ro/Xgx.LAtKHCo2kscyoxhZMabeoa6G0NzTjdS', 'USER'),
(30, 'rubi30', 'Sergio', 'sergioroplata@outlook.com', '$2y$10$lbgpHfQi0vlkhvUnvjPN7.BDR0GojC/XT1yAFDNj74bar91te6Dv6', 'USER'),
(31, 'marti31', 'Martina', 'martinacardoso@ucm.es', '$2y$10$UBeJmTFiSt/CJGqI1qBHzeVdZZg0Cx63T.ZB4qiPlqsCwcox8PCTW', 'USER'),
(32, 'marina32', 'Marina', 'marinabarcelona92@outlook.es', '$2y$10$YXCbvHtM8yVsH2pOPdWOcunZdBFO2ESdwk1/sA4lNuFqQ.AJY66Wm', 'USER'),
(33, 'juanpa33', 'Juan Pablo', 'jpmagicima@yahoo.com', '$2y$10$IEysk4hPOHiP1dT/ucCoVe7k0jQ5UGngFzl1exS2P.NI5IQGmwHDu', 'USER'),
(34, 'danizz34', 'Daniel', 'danielvalladolid@ucm.es', '$2y$10$N/5wIzClIIzLKg8JRbHZ4ekM.GeSf7c5JNeQQJOmQADSgvaCxtT32', 'USER'),
(35, 'kira35', 'Kira', 'kiragarrido@gmail.es', '$2y$10$fEBhmAppQQ4006ysf4octeVVBTXlQCTJdL2HkD1qvWMO1VVJlBjX.', 'USER'),
(36, 'rocii36', 'Rocio', 'rocitorrosca@gmail.es', '$2y$10$AWbaNYH35W3apMF34symw.PR/8HDu6DR7jPU0gMjEh1J9a8FOUj1G', 'USER'),
(37, 'rebeca37', 'Rebeca', 'rebe01ruiz@gmail.es', '$2y$10$zxaYepsuwmzdQiajPV5pW.m90BUHokkQY4Rm1UbrtMBMYnkjR4aY6', 'USER'),
(38, 'kevin38', 'Kevin', 'kevineeuu@yahoo.com', '$2y$10$FYhMCEVFPD1QAhpJerDfg.zlPeTu.tX.1bgrAotk.mOWQKGGkcnJi', 'USER'),
(39, 'blanca39', 'Blanca', 'blanca23fernan@gmail.es', '$2y$10$96pQ6nCIQjxDxxv2QfF.gu6i8PAsz5HDJw/1GSMG9MZMKaafdKS1C', 'USER'),
(40, 'gabri40', 'Gabriela', 'gabryespefer@yahoo.es', '$2y$10$V.do61Og2/lLU6zIKs3.lOkTh./GHPWu6pHVGgxfx7Rih7r1ceulq', 'USER');

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
  MODIFY `ID_DEPORTE` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=880006;

--
-- AUTO_INCREMENT de la tabla `equipos`
--
ALTER TABLE `equipos`
  MODIFY `ID_EQUIPO` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=550014;

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
  MODIFY `ID_USUARIO` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

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
