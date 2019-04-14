-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-04-2019 a las 21:45:16
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
CREATE DATABASE IF NOT EXISTS `sports4friends` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `ULTIMO_RESULTADO` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL DEFAULT 'NO HAY',
  `POSICION_LIGA` int(2) NOT NULL DEFAULT '0',
  `LOGO_EQUIPO` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `DESCRIPCION_EQUIPO` varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `equipos`
--

INSERT INTO `equipos` (`ID_EQUIPO`, `DEPORTE`, `NOMBRE_EQUIPO`, `FECHA_CEQUIPO`, `HORA_CEQUIPO`, `PARTIDOS_GANADOS`, `PARTIDOS_EMPATADOS`, `PARTIDOS_PERDIDOS`, `MAYOR_RACHA`, `ULTIMO_RESULTADO`, `POSICION_LIGA`, `LOGO_EQUIPO`, `DESCRIPCION_EQUIPO`) VALUES
(550001, 880001, 'BULL', '2019-04-03', '01:50:02', 5, 2, 6, 2, '3-1(G)', 0, 'bull_logo.jpg', 'Somos los diablos rojos del fútbol, letales como nadie.'),
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
(550013, 880002, 'ADECORON', '2019-04-11', '14:06:44', 2, 0, 5, 1, '22-55(P)', 0, 'adecoron.png', 'Hay dos cosas que nos gusta de verdad, el basket y el ron, viva las dos! '),
(550014, 880002, 'OLIMPICACOS', '2019-04-12', '13:59:54', 4, 0, 2, 3, '55-22(G)', 0, 'olimpicacos.jpg', 'Del Olimpo de los cacos, canastas y malos es lo que metemos.'),
(550015, 880002, 'CSKA USERA', '2019-04-12', '16:58:56', 7, 0, 1, 6, '74-73(G)', 0, 'cska_usera.jpg', 'Usera sabe quien controla las canchas y los tiros del barrio.'),
(550016, 880002, 'RUBIN BASKET', '2019-04-12', '16:58:56', 4, 0, 3, 2, '73-74(P)', 0, 'rubin_basket.jpg', 'Rubin Basket, recordad nuestro nombre.'),
(550017, 880002, 'NBDR', '2019-04-12', '16:58:56', 10, 0, 0, 10, '90-79(G)', 0, 'nbdr.jpg', 'Somos NBDR, marcaremos una época.'),
(550018, 880002, 'ESTUDIANTES  DTM', '2019-04-12', '16:58:56', 4, 0, 6, 1, '79-90(P)', 0, 'estu_dtm.jpg', 'Estudiantes que vivimos el basket.'),
(550019, 880003, 'BATE PACIFICO', '2019-04-14', '14:01:31', 6, 0, 2, 4, '5-8(P)', 0, 'bate_pacifico.jpg', 'Bate Pacifico, que no os confunda el nombre.'),
(550020, 880003, 'GUANTE VALLECANO', '2019-04-14', '14:01:31', 2, 0, 5, 1, '8-11(P)', 0, 'guante_vallecano.jpg', 'Los de Vallecas no necesitamos guantes para atrapar las bolas.'),
(550021, 880003, 'LAZADORESONE', '2019-04-14', '14:01:31', 5, 0, 1, 5, '10-4(P)', 0, 'lanzadoresone.jpg', 'Lanzamos números uno de la capital.'),
(550022, 880003, 'ATL BARAJAS', '2019-04-14', '14:01:31', 4, 0, 2, 2, '4-1(G)', 0, 'atl_barajas.jpg', 'Equipo de Barajas, más que un club.'),
(550023, 880003, 'CB HORTALEZA', '2019-04-14', '14:01:31', 1, 0, 7, 1, '11-8(G)', 0, 'cb_hortaleza.jpg', 'Preparados para que se enteren quien manda en el barrio.'),
(550024, 880003, 'CBS ARAVACA', '2019-04-14', '14:01:31', 7, 0, 3, 4, '1-4(P)', 0, 'cbs_aravaca.jpg', 'Nosotros os enseñaremos como se juega al beisbol.'),
(550025, 880003, 'RED MAXBALL', '2019-04-14', '14:01:31', 3, 0, 1, 2, '4-10(G)', 0, 'red_maxball.jpg', 'Venimos de la mejor cantera del mundo, vereís.'),
(550026, 880004, 'HAND CARABANCHEL', '2019-04-14', '14:44:45', 3, 1, 4, 2, '24-28(P)', 0, 'hand_carabanchel.jpg', 'tiramos más rápido que ir de carabanchel bajo a alto.'),
(550027, 880004, 'BC USERA', '2019-04-14', '14:44:45', 7, 0, 0, 7, '22-18(G)', 0, 'bc_usera.jpg', 'Equipo de Usera preparados para cualquier batalla.'),
(550028, 880004, 'RAYO FARO', '2019-04-14', '14:44:45', 4, 1, 2, 1, '30-27(P)', 0, 'rayo_faro.jpg', 'Entrenando en el faro de la victoria.'),
(550029, 880004, 'CEE CAMPAMENTO', '2019-04-14', '14:44:45', 1, 0, 3, 1, '23-24(P)', 0, 'cee_campamento.jpg', 'Campamento de lucha y sacrificio por el balonmano.'),
(550030, 880004, 'HANDBALL MADRID', '2019-04-14', '14:44:45', 2, 0, 2, 2, '18-22(P)', 0, 'handball_madrid.jpg', 'El mejor equipo de Madrid.'),
(550031, 880004, 'GVB HAND', '2019-04-14', '14:44:45', 5, 0, 2, 3, '24-23(G)', 0, 'gvb_hand.jpg', 'Ganar, Victoria, Balonmano.'),
(550032, 880004, 'ATLETI PIRULI', '2019-04-14', '14:44:45', 2, 0, 6, 1, '27-30(G)', 0, 'atleti_piruli.jpg', 'Equipo de barrio con el piruli como guía al olimpo.'),
(550033, 880005, 'DUO DINÁMICO', '2019-04-14', '18:44:19', 6, 0, 2, 4, '6-2,6-4(G)', 0, 'duo_dinamico.jpg', 'Duo que somos dinámicos en cada punto'),
(550034, 880005, 'LOS CHUNGUITOS', '2019-04-14', '18:44:19', 2, 0, 4, 1, '6-4,3-6,6-2(P)', 0, 'los_chunguitos.jpg', 'Chunguitos para ganar, chunguitos para volear'),
(550035, 880005, 'ANDYLUCAS', '2019-04-14', '18:44:19', 8, 0, 0, 8, '6-4,3-6,6-2(G)', 0, 'andy_y_lucas.jpg', 'Cantamos igual que jugamos'),
(550036, 880005, 'DOS TRÉBOLES', '2019-04-14', '18:44:19', 3, 0, 2, 2, '6-2,6-4(P)', 0, 'dos_treboles.jpg', 'Jugamos bien, pero hay que tener un punto de suerte para ganar'),
(550037, 880005, 'LIMÓNSAL', '2019-04-14', '18:44:19', 1, 0, 4, 1, '7-6,6-3(P)', 0, 'limon&sal.jpg', 'Asi nos llamamos, porque nos hace falta para jugar y el tequila!'),
(550038, 880005, 'CAMPEONAS', '2019-04-14', '18:44:19', 7, 0, 3, 4, '6-0,6-3(P)', 0, 'campeonas.jpg', 'Ganamos con estilo,garra y corazón'),
(550039, 880005, 'BLANCO NEGRO', '2019-04-14', '18:44:19', 2, 0, 2, 1, '7-6,6-3(G)', 0, 'blanco&negro.jpg', 'Somos éxito, vamos!'),
(550040, 880005, 'BANANA-SHOT', '2019-04-14', '18:44:19', 4, 0, 1, 3, '6-0,6-3(G)', 0, 'banana_shot.jpg', 'Nadal aprendió de nosotros como hay que hacer un banana-shot');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `id_evento` int(10) NOT NULL,
  `nombre_evento` varchar(30) CHARACTER SET utf8 NOT NULL,
  `deporte` varchar(30) CHARACTER SET utf8 NOT NULL,
  `ciudad` varchar(30) CHARACTER SET utf8 NOT NULL,
  `municipio` varchar(30) CHARACTER SET ascii NOT NULL,
  `localizacion` varchar(100) CHARACTER SET utf8 NOT NULL,
  `fecha_creacion` date NOT NULL,
  `fecha_evento` date NOT NULL,
  `hora_evento` varchar(30) CHARACTER SET utf8 NOT NULL,
  `descripcion` varchar(200) CHARACTER SET utf8 NOT NULL,
  `ruta_foto` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`id_evento`, `nombre_evento`, `deporte`, `ciudad`, `municipio`, `localizacion`, `fecha_creacion`, `fecha_evento`, `hora_evento`, `descripcion`, `ruta_foto`) VALUES
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `jugadores`
--

INSERT INTO `jugadores` (`ID_JUGADOR`, `EQUIPO`, `USUARIO`, `ROL_JUGADOR`, `FECHA_PJUGADOR`, `HORA_PJUGADOR`) VALUES
(330001, 550001, 2, 1, '2019-04-09', '00:17:23'),
(330002, 550001, 3, 0, '2019-04-09', '00:17:23'),
(330003, 550002, 4, 1, '2019-04-09', '00:17:23'),
(330004, 550002, 5, 0, '2019-04-09', '00:17:23'),
(330005, 550003, 6, 1, '2019-04-09', '00:17:23'),
(330006, 550003, 7, 0, '2019-04-09', '00:17:23'),
(330007, 550004, 8, 1, '2019-04-09', '00:17:23'),
(330008, 550001, 10, 0, '2019-04-14', '19:00:37'),
(330009, 550001, 14, 0, '2019-04-14', '19:00:37'),
(330010, 550001, 28, 0, '2019-04-14', '19:00:37'),
(330011, 550001, 33, 0, '2019-04-14', '19:00:37'),
(330012, 550001, 40, 0, '2019-04-14', '19:00:37'),
(330013, 550005, 11, 1, '2019-04-14', '19:08:53'),
(330014, 550005, 24, 0, '2019-04-14', '19:08:53'),
(330015, 550005, 8, 0, '2019-04-14', '19:08:53'),
(330016, 550005, 9, 0, '2019-04-14', '19:08:53'),
(330017, 550005, 32, 0, '2019-04-14', '19:08:53'),
(330018, 550005, 39, 0, '2019-04-14', '19:11:11'),
(330019, 550005, 22, 0, '2019-04-14', '19:11:11'),
(330027, 550006, 15, 1, '2019-04-14', '19:27:48'),
(330028, 550006, 12, 0, '2019-04-14', '19:27:48'),
(330029, 550006, 38, 0, '2019-04-14', '19:27:48'),
(330030, 550006, 29, 0, '2019-04-14', '19:27:48'),
(330031, 550006, 37, 0, '2019-04-14', '19:27:48'),
(330032, 550006, 27, 0, '2019-04-14', '19:27:48'),
(330033, 550006, 2, 0, '2019-04-14', '19:27:48'),
(330034, 550007, 13, 1, '2019-04-14', '19:41:18'),
(330035, 550007, 22, 0, '2019-04-14', '19:41:18'),
(330036, 550007, 36, 0, '2019-04-14', '19:41:18'),
(330037, 550007, 35, 0, '2019-04-14', '19:41:18'),
(330038, 550007, 23, 0, '2019-04-14', '19:41:18'),
(330039, 550007, 18, 0, '2019-04-14', '19:41:18'),
(330040, 550007, 25, 0, '2019-04-14', '19:41:18'),
(330041, 550008, 34, 1, '2019-04-14', '19:47:26'),
(330042, 550008, 16, 0, '2019-04-14', '19:47:26'),
(330043, 550008, 17, 0, '2019-04-14', '19:47:26'),
(330044, 550008, 19, 0, '2019-04-14', '19:47:26'),
(330045, 550008, 20, 0, '2019-04-14', '19:47:26'),
(330046, 550008, 21, 0, '2019-04-14', '19:47:26'),
(330047, 550008, 26, 0, '2019-04-14', '19:47:26'),
(330048, 550009, 30, 1, '2019-04-14', '19:50:23'),
(330049, 550009, 31, 0, '2019-04-14', '19:50:23'),
(330050, 550009, 34, 0, '2019-04-14', '19:50:23'),
(330051, 550009, 4, 0, '2019-04-14', '19:50:23'),
(330052, 550009, 9, 0, '2019-04-14', '19:50:23'),
(330053, 550009, 10, 0, '2019-04-14', '19:50:23'),
(330054, 550009, 11, 0, '2019-04-14', '19:50:23'),
(330055, 550010, 12, 1, '2019-04-14', '19:52:42'),
(330056, 550010, 13, 0, '2019-04-14', '19:52:42'),
(330057, 550010, 14, 0, '2019-04-14', '19:52:42'),
(330058, 550010, 22, 0, '2019-04-14', '19:52:42'),
(330059, 550010, 23, 0, '2019-04-14', '19:52:42'),
(330060, 550010, 24, 0, '2019-04-14', '19:52:42'),
(330061, 550010, 25, 0, '2019-04-14', '19:52:42'),
(330062, 550011, 26, 1, '2019-04-14', '19:54:37'),
(330063, 550011, 33, 0, '2019-04-14', '19:54:37'),
(330064, 550011, 40, 0, '2019-04-14', '19:54:37'),
(330065, 550011, 37, 0, '2019-04-14', '19:54:37'),
(330066, 550011, 32, 0, '2019-04-14', '19:54:37'),
(330067, 550011, 29, 0, '2019-04-14', '19:54:37'),
(330068, 550011, 30, 0, '2019-04-14', '19:54:37'),
(330069, 550002, 9, 0, '2019-04-14', '20:05:35'),
(330070, 550002, 11, 0, '2019-04-14', '20:05:35'),
(330071, 550002, 13, 0, '2019-04-14', '20:05:35'),
(330072, 550012, 10, 1, '2019-04-14', '20:13:36'),
(330073, 550012, 12, 0, '2019-04-14', '20:13:36'),
(330074, 550012, 14, 0, '2019-04-14', '20:13:36'),
(330075, 550012, 20, 0, '2019-04-14', '20:13:36'),
(330076, 550012, 22, 0, '2019-04-14', '20:13:36'),
(330077, 550013, 15, 1, '2019-04-14', '20:13:36'),
(330078, 550013, 17, 0, '2019-04-14', '20:13:36'),
(330079, 550013, 19, 0, '2019-04-14', '20:13:36'),
(330080, 550013, 21, 0, '2019-04-14', '20:13:36'),
(330081, 550013, 23, 0, '2019-04-14', '20:13:36'),
(330082, 550014, 24, 1, '2019-04-14', '20:13:36'),
(330083, 550014, 26, 0, '2019-04-14', '20:13:36'),
(330084, 550014, 28, 0, '2019-04-14', '20:13:36'),
(330085, 550014, 30, 0, '2019-04-14', '20:13:36'),
(330086, 550014, 32, 0, '2019-04-14', '20:13:36'),
(330087, 550015, 25, 1, '2019-04-14', '20:13:36'),
(330088, 550015, 27, 0, '2019-04-14', '20:13:36'),
(330089, 550015, 29, 0, '2019-04-14', '20:13:36'),
(330090, 550015, 31, 0, '2019-04-14', '20:13:36'),
(330091, 550015, 33, 0, '2019-04-14', '20:13:36'),
(330092, 550016, 34, 1, '2019-04-14', '20:13:36'),
(330093, 550016, 36, 0, '2019-04-14', '20:13:36'),
(330094, 550016, 38, 0, '2019-04-14', '20:13:36'),
(330095, 550016, 40, 0, '2019-04-14', '20:13:36'),
(330096, 550016, 2, 0, '2019-04-14', '20:13:36'),
(330097, 550017, 16, 1, '2019-04-14', '20:13:36'),
(330098, 550017, 18, 0, '2019-04-14', '20:13:36'),
(330099, 550017, 20, 0, '2019-04-14', '20:13:36'),
(330100, 550017, 8, 0, '2019-04-14', '20:13:36'),
(330101, 550017, 7, 0, '2019-04-14', '20:13:36'),
(330102, 550018, 11, 1, '2019-04-14', '20:13:36'),
(330103, 550018, 13, 0, '2019-04-14', '20:13:36'),
(330104, 550018, 37, 0, '2019-04-14', '20:13:36'),
(330105, 550018, 39, 0, '2019-04-14', '20:13:36'),
(330106, 550018, 14, 0, '2019-04-14', '20:13:36'),
(330107, 550003, 8, 0, '2019-04-14', '20:21:49'),
(330108, 550003, 9, 0, '2019-04-14', '20:21:49'),
(330109, 550003, 10, 0, '2019-04-14', '20:21:49'),
(330110, 550003, 11, 0, '2019-04-14', '20:21:49'),
(330111, 550019, 12, 1, '2019-04-14', '20:28:27'),
(330112, 550019, 13, 0, '2019-04-14', '20:28:27'),
(330113, 550019, 14, 0, '2019-04-14', '20:28:27'),
(330114, 550019, 15, 0, '2019-04-14', '20:28:27'),
(330115, 550019, 16, 0, '2019-04-14', '20:28:27'),
(330116, 550019, 17, 0, '2019-04-14', '20:28:27'),
(330117, 550020, 18, 1, '2019-04-14', '20:28:27'),
(330118, 550020, 19, 0, '2019-04-14', '20:28:27'),
(330119, 550020, 20, 0, '2019-04-14', '20:28:27'),
(330120, 550020, 21, 0, '2019-04-14', '20:28:27'),
(330121, 550020, 22, 0, '2019-04-14', '20:28:27'),
(330122, 550020, 23, 0, '2019-04-14', '20:28:27'),
(330123, 550021, 24, 1, '2019-04-14', '20:28:27'),
(330124, 550021, 25, 0, '2019-04-14', '20:28:27'),
(330125, 550021, 26, 0, '2019-04-14', '20:28:27'),
(330126, 550021, 27, 0, '2019-04-14', '20:28:27'),
(330127, 550021, 28, 0, '2019-04-14', '20:28:27'),
(330128, 550021, 29, 0, '2019-04-14', '20:28:27'),
(330129, 550022, 30, 1, '2019-04-14', '20:28:27'),
(330130, 550022, 31, 0, '2019-04-14', '20:28:27'),
(330131, 550022, 32, 0, '2019-04-14', '20:28:27'),
(330132, 550022, 33, 0, '2019-04-14', '20:28:27'),
(330133, 550022, 34, 0, '2019-04-14', '20:28:27'),
(330134, 550022, 35, 0, '2019-04-14', '20:28:27'),
(330135, 550023, 36, 1, '2019-04-14', '20:28:27'),
(330136, 550023, 37, 0, '2019-04-14', '20:28:27'),
(330137, 550023, 38, 0, '2019-04-14', '20:28:27'),
(330138, 550023, 39, 0, '2019-04-14', '20:28:27'),
(330139, 550023, 40, 0, '2019-04-14', '20:28:27'),
(330140, 550023, 4, 0, '2019-04-14', '20:28:27'),
(330141, 550024, 13, 1, '2019-04-14', '20:28:27'),
(330142, 550024, 22, 0, '2019-04-14', '20:28:27'),
(330143, 550024, 27, 0, '2019-04-14', '20:28:27'),
(330144, 550024, 10, 0, '2019-04-14', '20:28:27'),
(330145, 550024, 19, 0, '2019-04-14', '20:28:27'),
(330146, 550024, 33, 0, '2019-04-14', '20:28:27'),
(330147, 550025, 28, 1, '2019-04-14', '20:28:27'),
(330148, 550025, 29, 0, '2019-04-14', '20:28:27'),
(330149, 550025, 14, 0, '2019-04-14', '20:28:27'),
(330150, 550025, 18, 0, '2019-04-14', '20:28:27'),
(330151, 550025, 20, 0, '2019-04-14', '20:28:27'),
(330152, 550025, 21, 0, '2019-04-14', '20:28:27'),
(330153, 550004, 5, 0, '2019-04-14', '20:44:46'),
(330154, 550004, 10, 0, '2019-04-14', '20:44:46'),
(330155, 550004, 13, 0, '2019-04-14', '20:44:46'),
(330156, 550004, 16, 0, '2019-04-14', '20:44:46'),
(330157, 550004, 18, 0, '2019-04-14', '20:44:46'),
(330158, 550004, 19, 0, '2019-04-14', '20:44:46'),
(330159, 550026, 20, 1, '2019-04-14', '20:46:50'),
(330160, 550026, 21, 0, '2019-04-14', '20:46:50'),
(330161, 550026, 22, 0, '2019-04-14', '20:46:50'),
(330162, 550026, 23, 0, '2019-04-14', '20:46:50'),
(330163, 550026, 24, 0, '2019-04-14', '20:46:50'),
(330164, 550026, 25, 0, '2019-04-14', '20:46:50'),
(330165, 550026, 26, 0, '2019-04-14', '20:46:50'),
(330166, 550027, 27, 1, '2019-04-14', '20:52:49'),
(330167, 550027, 28, 0, '2019-04-14', '20:52:49'),
(330168, 550027, 29, 0, '2019-04-14', '20:52:49'),
(330169, 550027, 30, 0, '2019-04-14', '20:52:49'),
(330170, 550027, 31, 0, '2019-04-14', '20:52:49'),
(330171, 550027, 32, 0, '2019-04-14', '20:52:49'),
(330172, 550027, 33, 0, '2019-04-14', '20:52:49'),
(330173, 550028, 34, 1, '2019-04-14', '20:52:49'),
(330174, 550028, 35, 0, '2019-04-14', '20:52:49'),
(330175, 550028, 36, 0, '2019-04-14', '20:52:49'),
(330176, 550028, 37, 0, '2019-04-14', '20:52:49'),
(330177, 550028, 38, 0, '2019-04-14', '20:52:49'),
(330178, 550028, 39, 0, '2019-04-14', '20:52:49'),
(330179, 550028, 40, 0, '2019-04-14', '20:52:49'),
(330180, 550029, 2, 1, '2019-04-14', '20:52:49'),
(330181, 550029, 3, 0, '2019-04-14', '20:52:49'),
(330182, 550029, 11, 0, '2019-04-14', '20:52:49'),
(330183, 550029, 12, 0, '2019-04-14', '20:52:49'),
(330184, 550029, 14, 0, '2019-04-14', '20:52:49'),
(330185, 550029, 15, 0, '2019-04-14', '20:52:49'),
(330186, 550029, 17, 0, '2019-04-14', '20:52:49'),
(330187, 550030, 18, 1, '2019-04-14', '20:52:49'),
(330188, 550030, 20, 0, '2019-04-14', '20:52:49'),
(330189, 550030, 9, 0, '2019-04-14', '20:52:49'),
(330190, 550030, 37, 0, '2019-04-14', '20:52:49'),
(330191, 550030, 30, 0, '2019-04-14', '20:52:49'),
(330192, 550030, 31, 0, '2019-04-14', '20:52:49'),
(330193, 550030, 13, 0, '2019-04-14', '20:52:49'),
(330194, 550031, 23, 1, '2019-04-14', '20:52:49'),
(330195, 550031, 39, 0, '2019-04-14', '20:52:49'),
(330196, 550031, 40, 0, '2019-04-14', '20:52:49'),
(330197, 550031, 18, 0, '2019-04-14', '20:52:49'),
(330198, 550031, 19, 0, '2019-04-14', '20:52:49'),
(330199, 550031, 20, 0, '2019-04-14', '20:52:49'),
(330200, 550031, 21, 0, '2019-04-14', '20:52:49'),
(330201, 550032, 22, 1, '2019-04-14', '20:52:49'),
(330202, 550032, 24, 0, '2019-04-14', '20:52:49'),
(330203, 550032, 26, 0, '2019-04-14', '20:52:49'),
(330204, 550032, 28, 0, '2019-04-14', '20:52:49'),
(330205, 550032, 30, 0, '2019-04-14', '20:52:49'),
(330206, 550032, 4, 0, '2019-04-14', '20:52:49'),
(330207, 550032, 7, 0, '2019-04-14', '20:52:49'),
(330208, 550033, 3, 1, '2019-04-14', '20:57:54'),
(330209, 550033, 18, 0, '2019-04-14', '20:57:54'),
(330210, 550034, 4, 1, '2019-04-14', '20:57:54'),
(330211, 550034, 20, 0, '2019-04-14', '20:57:54'),
(330212, 550035, 5, 1, '2019-04-14', '20:57:54'),
(330213, 550035, 13, 0, '2019-04-14', '20:57:54'),
(330214, 550036, 6, 1, '2019-04-14', '20:57:54'),
(330215, 550036, 17, 0, '2019-04-14', '20:57:54'),
(330216, 550037, 7, 1, '2019-04-14', '20:57:54'),
(330217, 550037, 40, 0, '2019-04-14', '20:57:54'),
(330218, 550038, 8, 1, '2019-04-14', '20:57:54'),
(330219, 550038, 23, 0, '2019-04-14', '20:57:54'),
(330220, 550039, 9, 1, '2019-04-14', '20:57:54'),
(330221, 550039, 10, 0, '2019-04-14', '20:57:54'),
(330222, 550040, 10, 1, '2019-04-14', '20:57:54'),
(330223, 550040, 32, 0, '2019-04-14', '20:57:54');

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
  `PASSWORD` varchar(400) CHARACTER SET utf8 NOT NULL,
  `ROL_USUARIO` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL DEFAULT 'USER',
  `FOTO_USUARIO` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID_USUARIO`, `NICKNAME`, `NOMBRE`, `CORREO`, `PASSWORD`, `ROL_USUARIO`, `FOTO_USUARIO`) VALUES
(1, 'admin', 'Administrador', 'admin@ucm.es', '$2y$10$hSK.JgAQXT5YJIz6k207I.YyHiP4WlLPr2SIlI6dPrEqCf34Z8ifa', 'ADMIN', 'admin.jpg'),
(2, 'alv1', 'Alvaro', 'alvcarpi@ucm.es', '$2y$10$yvOHIrk7LyJH1bxhyvPbX.eAf7JguNq0RJM0OQZUcOr82z/Jji7Wi', 'USER', 'alvaro.jpg'),
(3, 'jhce2', 'Jhimmy Ender', 'jcandela@ucm.es', '$2y$10$WvEf90rD98SDOXOIUuf5/Ou28TEZTlBkC6WNFEA6UQFqsGtfrGEUi', 'USER', 'jhimmy.jpg'),
(4, 'jvp3', 'Jorge', 'jvalma01@ucm.es', '$2y$10$kPaZzPpNemtlB/bhFQ7k1eEGAvmThp/eVtZPtUmPq6D.kD6OpMexu', 'USER', 'jorge.jpg'),
(5, 'iiif4', 'Iker', 'ikeriban@ucm.es', '$2y$10$IexT7ht8yM5olEMl9kQKYeoUM54HKWtKyjqUQ436CTuinSNAAivA.', 'USER', 'iker.jpg'),
(6, 'atc5', 'Alberto', 'alberture@ucm.es', '$2y$10$14haQw95h4UGzooRpCzbQOwddRDsIzQTbZW4r8Sg6aBYmA/hZY2uO', 'USER', 'ture.jpg'),
(7, 'jjjj6', 'Jonathan Jose', 'jonathanj@ucm.es', '$2y$10$tnSbgl4cOzAurLUb0MXK1eAGUTJi2ASnjGOPCs/GjWT5bL53gZWTO', 'USER', 'jose.jpg'),
(8, 'lucas', 'Lucas', 'lucas@ucm.es', '$2y$10$0dVHdan2jVD8/O.zgt2nXeKx8dYF9WMRe1S3zvulKmqpFV/UqreEK', 'USER', NULL),
(9, 'mlc9', 'Marta', 'martalopezc@ucm.es', '$2y$10$95CJ3WOCkdSQcTOfra3UmeoIsNd12NS3oy2xKbRGgMu3KyBiTHK2i', 'USER', 'marta.jpg'),
(10, 'dfh10', 'Diana', 'dianadf@ucm.es', '$2y$10$AC6JL1NAMKow1BroC4YLi.zAt/tL/WNxlXpVIX4wiGBwT5g.w61Gq', 'USER', 'diana.jpg'),
(11, 'rcg11', 'Ruben', 'rubi4512@gmail.com', '$2y$10$5wl9bSiKKMcQvjIrRoFAn.7t7Ju5Gz9Lu.l/Of3EhNHRT7fzwX4em', 'USER', NULL),
(12, 'esmin12', 'Esmeralda', 'esmeral33@outlook.com', '$2y$10$UUpnYo2Xn80hTUoUvPWL9uLuKJ3oGj5wbwn24tYDVOnmEI7canYL6', 'USER', 'esmeralda.jpg'),
(13, 'sofivb13', 'Sofia', 'sofiavelasco@gmail.es', '$2y$10$WVPCMl88heXbqRBMQtNHzOI8K971iDxLmYBtfD8jSlJ6cpFDMJnSG', 'USER', NULL),
(14, 'carmengar14', 'Carmen', 'carmengarri23@outlook.es', '$2y$10$MzzKTQYSOLv0BsL.z61JEO6Cc2GzHW3pJEe4itGKvIOnKEFsVFxoq', 'USER', NULL),
(15, 'lucy15', 'Lucia', 'luciagimenezpi@ucm.es', '$2y$10$2TsfIdxcpgiPWHeYZWKxZOh0JS.OFt6XEdbsdq8/pc8rU35.3lf7.', 'USER', NULL),
(16, 'sarase16', 'Sara', 'saraseboblanco@yahoo.es', '$2y$10$sGNIO1u56jf/.Ajxav1OhOMXTiw62w0MvsdT8PWokeJ9CI1dq2fTm', 'USER', NULL),
(17, 'marisol17', 'Maria Soledad', 'mariasol567@gmail.es', '$2y$10$iZL.ACIBVQiLl0tD57JuHeeuEYwegn2D6ZHyvIeWtT/YGEq4mV/4C', 'USER', NULL),
(18, 'Gonza18', 'Gonzalo', 'gonzagimenez@ucm.es', '$2y$10$rrtIVIoXLlBc4gwqYjGWa.W/f08X9Z3jQZOpEHMU4JKQXhQbe0S92', 'USER', NULL),
(19, 'Miri19', 'Miriam', 'miriangelfe@yahoo.es', '$2y$10$KmgRlwHhNuk9Zs3yT7yg0umNm2.tenJnmoQla776T7qcckWd/BdEe', 'USER', NULL),
(20, 'Leire20', 'Leire', 'leirebilbao@outlook.com', '$2y$10$gTnSHWlGshE2fPXEWpM8tego8AlbgSVb/MvzrawQodubD1uNKhpzC', 'USER', NULL),
(21, 'Marcos21', 'Marcos', 'realmadridmarcos13@gmail.es', '$2y$10$PbdtVLi3ytA34nG6KaloWOahe8gsFIMc0Y/NaWFzeH24GstcUkZ3e', 'USER', NULL),
(22, 'Jenni22', 'Jennifer', 'jenninformatica@ucm.es', '$2y$10$3TabhIqAjDWLFpoptN4f.elAq6KfaCNRFc1XSaOqwTk3UTbCDejKW', 'USER', NULL),
(23, 'nadia23', 'Nadia', 'nadiagarciagh@gmail.es', '$2y$10$aPJIVe.AqltsQxBUjqOCSO/IR7uqy.dNI6ODbDuOXUWH/Icvt64hq', 'USER', NULL),
(24, 'almu24', 'Almudena', 'almuceu@ucm.es', '$2y$10$RM.5E2E026DXeuBSnGhwgO34GsMWXXEJZkC/oKZopQG4ZUJsEyOxi', 'USER', NULL),
(25, 'robert25', 'Roberto', 'robertoledo@gmail.es', '$2y$10$S1qpoJktObbfqeCXnsK5mOzzmj9SJq4sI9VGxFbCkaxerH5fR.Tyy', 'USER', NULL),
(26, 'susin26', 'Susana', 'susanarroyoss@ucm.es', '$2y$10$ytCX1lI9c2tYPDQ6aQ1FZukOiDWey4A0LwGZIMmjR45s2SPHPS5rK', 'USER', NULL),
(27, 'yao27', 'Yao Ying', 'yaoyingvv@outlook.uk', '$2y$10$IVTA8OlnvR835H87umLNb.oawnIg75IelFPvLcOFzvmw3iEFW5Dti', 'USER', NULL),
(28, 'isid28', 'Isidoro', 'isidoromadrid@gmail.es', '$2y$10$RY1p1EXUvlG5xSYSOqQ4O.9MwoeKI2oxDcDG5koBfnsqaw1l7w4IW', 'USER', NULL),
(29, 'beloki29', 'Rodolfo', 'rodolfobeloki@gmail.com', '$2y$10$xpiuEvnzSa3L570Ro/Xgx.LAtKHCo2kscyoxhZMabeoa6G0NzTjdS', 'USER', NULL),
(30, 'rubi30', 'Sergio', 'sergioroplata@outlook.com', '$2y$10$lbgpHfQi0vlkhvUnvjPN7.BDR0GojC/XT1yAFDNj74bar91te6Dv6', 'USER', NULL),
(31, 'marti31', 'Martina', 'martinacardoso@ucm.es', '$2y$10$UBeJmTFiSt/CJGqI1qBHzeVdZZg0Cx63T.ZB4qiPlqsCwcox8PCTW', 'USER', NULL),
(32, 'marina32', 'Marina', 'marinabarcelona92@outlook.es', '$2y$10$YXCbvHtM8yVsH2pOPdWOcunZdBFO2ESdwk1/sA4lNuFqQ.AJY66Wm', 'USER', NULL),
(33, 'juanpa33', 'Juan Pablo', 'jpmagicima@yahoo.com', '$2y$10$IEysk4hPOHiP1dT/ucCoVe7k0jQ5UGngFzl1exS2P.NI5IQGmwHDu', 'USER', NULL),
(34, 'danizz34', 'Daniel', 'danielvalladolid@ucm.es', '$2y$10$N/5wIzClIIzLKg8JRbHZ4ekM.GeSf7c5JNeQQJOmQADSgvaCxtT32', 'USER', NULL),
(35, 'kira35', 'Kira', 'kiragarrido@gmail.es', '$2y$10$fEBhmAppQQ4006ysf4octeVVBTXlQCTJdL2HkD1qvWMO1VVJlBjX.', 'USER', NULL),
(36, 'rocii36', 'Rocio', 'rocitorrosca@gmail.es', '$2y$10$AWbaNYH35W3apMF34symw.PR/8HDu6DR7jPU0gMjEh1J9a8FOUj1G', 'USER', NULL),
(37, 'rebeca37', 'Rebeca', 'rebe01ruiz@gmail.es', '$2y$10$zxaYepsuwmzdQiajPV5pW.m90BUHokkQY4Rm1UbrtMBMYnkjR4aY6', 'USER', NULL),
(38, 'kevin38', 'Kevin', 'kevineeuu@yahoo.com', '$2y$10$FYhMCEVFPD1QAhpJerDfg.zlPeTu.tX.1bgrAotk.mOWQKGGkcnJi', 'USER', NULL),
(39, 'blanca39', 'Blanca', 'blanca23fernan@gmail.es', '$2y$10$96pQ6nCIQjxDxxv2QfF.gu6i8PAsz5HDJw/1GSMG9MZMKaafdKS1C', 'USER', NULL),
(40, 'gabri40', 'Gabriela', 'gabryespefer@yahoo.es', '$2y$10$V.do61Og2/lLU6zIKs3.lOkTh./GHPWu6pHVGgxfx7Rih7r1ceulq', 'USER', NULL);

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
  ADD PRIMARY KEY (`id_evento`),
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
  MODIFY `ID_DEPORTE` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=880006;

--
-- AUTO_INCREMENT de la tabla `equipos`
--
ALTER TABLE `equipos`
  MODIFY `ID_EQUIPO` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=550041;

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id_evento` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=990003;

--
-- AUTO_INCREMENT de la tabla `jugadores`
--
ALTER TABLE `jugadores`
  MODIFY `ID_JUGADOR` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=330224;

--
-- AUTO_INCREMENT de la tabla `registros_eventos`
--
ALTER TABLE `registros_eventos`
  MODIFY `id_registro` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=770002;

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
