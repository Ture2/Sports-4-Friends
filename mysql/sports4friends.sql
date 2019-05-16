-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-05-2019 a las 22:41:05
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
  `id_deporte` int(10) NOT NULL,
  `nombre_deporte` varchar(30) CHARACTER SET utf8 NOT NULL,
  `numero_maximo_jugadores` int(3) DEFAULT NULL,
  `duracion_min` int(5) DEFAULT NULL,
  `fecha_cdeporte` date NOT NULL,
  `hora_cdeporte` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `deportes`
--

INSERT INTO `deportes` (`id_deporte`, `nombre_deporte`, `numero_maximo_jugadores`, `duracion_min`, `fecha_cdeporte`, `hora_cdeporte`) VALUES
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
  `id_equipo` int(10) NOT NULL,
  `deporte` int(10) NOT NULL,
  `nombre_equipo` varchar(30) CHARACTER SET utf8 NOT NULL,
  `fecha_cequipo` date NOT NULL,
  `hora_cequipo` time NOT NULL,
  `partidos_ganados` int(4) NOT NULL DEFAULT '0',
  `partidos_empatados` int(4) NOT NULL DEFAULT '0',
  `partidos_perdidos` int(4) NOT NULL DEFAULT '0',
  `mayor_racha` int(2) NOT NULL DEFAULT '0',
  `ultimo_resultado` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL DEFAULT 'NO HAY',
  `posicion_liga` int(2) NOT NULL DEFAULT '0',
  `logo_equipo` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `descripcion_equipo` varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `equipos`
--

INSERT INTO `equipos` (`id_equipo`, `deporte`, `nombre_equipo`, `fecha_cequipo`, `hora_cequipo`, `partidos_ganados`, `partidos_empatados`, `partidos_perdidos`, `mayor_racha`, `ultimo_resultado`, `posicion_liga`, `logo_equipo`, `descripcion_equipo`) VALUES
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
-- Estructura de tabla para la tabla `estadisticas_baloncesto`
--

CREATE TABLE `estadisticas_baloncesto` (
  `id_esbaloncesto` int(10) NOT NULL,
  `es_usuario` int(10) NOT NULL,
  `es_equipo` varchar(30) NOT NULL,
  `pj_usuario` int(4) NOT NULL DEFAULT '0',
  `pg_usuario` int(4) NOT NULL DEFAULT '0',
  `pe_usuario` int(4) NOT NULL DEFAULT '0',
  `pp_usuario` int(4) NOT NULL DEFAULT '0',
  `puntos_anotados` int(4) NOT NULL DEFAULT '0',
  `asistencias` int(4) NOT NULL DEFAULT '0',
  `tapones` int(4) NOT NULL DEFAULT '0',
  `faltas_personales` int(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estadisticas_baloncesto`
--

INSERT INTO `estadisticas_baloncesto` (`id_esbaloncesto`, `es_usuario`, `es_equipo`, `pj_usuario`, `pg_usuario`, `pe_usuario`, `pp_usuario`, `puntos_anotados`, `asistencias`, `tapones`, `faltas_personales`) VALUES
(220001, 4, 'REAL MADRID', 10, 9, 0, 1, 40, 15, 15, 9),
(220002, 2, 'RUBIN BASKET', 6, 4, 0, 2, 60, 16, 25, 11),
(220003, 5, 'REAL MADRID', 10, 9, 0, 2, 35, 15, 11, 10),
(220004, 9, 'REAL MADRID', 10, 9, 0, 2, 70, 12, 35, 15),
(220005, 11, 'REAL MADRID', 10, 9, 0, 2, 20, 20, 12, 12),
(220006, 13, 'REAL MADRID', 10, 9, 0, 2, 30, 5, 20, 8),
(220007, 10, 'BASKETLEGA', 7, 5, 0, 2, 60, 10, 15, 5),
(220008, 12, 'BASKETLEGA', 7, 5, 0, 2, 50, 15, 12, 2),
(220009, 14, 'BASKETLEGA', 7, 5, 0, 2, 44, 5, 10, 8),
(220010, 20, 'BASKETLEGA', 7, 5, 0, 2, 15, 8, 3, 1),
(220011, 22, 'BASKETLEGA', 7, 5, 0, 2, 22, 10, 1, 7),
(220012, 15, 'ADECORON', 7, 2, 0, 5, 22, 10, 1, 5),
(220013, 17, 'ADECORON', 7, 2, 0, 5, 77, 3, 20, 11),
(220014, 19, 'ADECORON', 7, 2, 0, 5, 10, 2, 5, 2),
(220015, 21, 'ADECORON', 7, 2, 0, 5, 15, 12, 10, 5),
(220016, 23, 'ADECORON', 7, 2, 0, 5, 8, 14, 2, 1),
(220017, 24, 'OLIMPICACOS', 6, 4, 0, 2, 25, 10, 16, 5),
(220018, 26, 'OLIMPICACOS', 6, 4, 0, 2, 40, 8, 14, 1),
(220019, 28, 'OLIMPICACOS', 6, 4, 0, 2, 21, 9, 5, 4),
(220020, 30, 'OLIMPICACOS', 6, 4, 0, 2, 24, 12, 2, 6),
(220021, 32, 'OLIMPICACOS', 6, 4, 0, 2, 15, 5, 1, 2),
(220022, 25, 'CSKA USERA', 8, 7, 0, 1, 20, 5, 5, 1),
(220023, 27, 'CSKA USERA', 8, 7, 0, 1, 45, 5, 5, 5),
(220024, 29, 'CSKA USERA', 8, 7, 0, 1, 32, 14, 1, 3),
(220025, 31, 'CSKA USERA', 8, 7, 0, 1, 15, 20, 12, 2),
(220026, 33, 'CSKA USERA', 8, 7, 0, 1, 10, 10, 12, 7),
(220027, 34, 'RUBIN BASKET', 6, 4, 0, 2, 25, 2, 15, 5),
(220028, 36, 'RUBIN BASKET', 6, 4, 0, 2, 25, 10, 12, 5),
(220029, 38, 'RUBIN BASKET', 6, 4, 0, 2, 15, 10, 5, 5),
(220030, 40, 'RUBIN BASKET', 6, 4, 0, 2, 50, 5, 1, 5),
(220031, 16, 'NBDR', 10, 10, 0, 0, 60, 12, 30, 2),
(220032, 18, 'NBDR', 10, 10, 0, 0, 50, 15, 15, 5),
(220033, 20, 'NBDR', 10, 10, 0, 0, 45, 15, 5, 4),
(220034, 8, 'NBDR', 10, 10, 0, 0, 35, 8, 16, 8),
(220035, 7, 'NBDR', 10, 10, 0, 0, 37, 22, 14, 2),
(220036, 11, 'ESTUDIANTES  DTM', 10, 4, 0, 6, 30, 2, 15, 5),
(220037, 13, 'ESTUDIANTES  DTM', 10, 4, 0, 6, 25, 5, 5, 1),
(220038, 37, 'ESTUDIANTES  DTM', 10, 4, 0, 6, 25, 10, 4, 1),
(220039, 39, 'ESTUDIANTES  DTM', 10, 4, 0, 6, 15, 6, 5, 2),
(220040, 14, 'ESTUDIANTES  DTM', 10, 4, 0, 6, 8, 12, 2, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadisticas_balonmano`
--

CREATE TABLE `estadisticas_balonmano` (
  `id_esbalonmano` int(10) NOT NULL,
  `es_usuario` int(10) NOT NULL,
  `es_equipo` varchar(30) NOT NULL DEFAULT '0',
  `pj_usuario` int(4) NOT NULL DEFAULT '0',
  `pg_usuario` int(4) NOT NULL DEFAULT '0',
  `pe_usuario` int(4) NOT NULL DEFAULT '0',
  `pp_usuario` int(4) NOT NULL DEFAULT '0',
  `goles` int(4) NOT NULL DEFAULT '0',
  `asistencias` int(4) NOT NULL DEFAULT '0',
  `tapones` int(4) NOT NULL DEFAULT '0',
  `faltas` int(4) NOT NULL DEFAULT '0',
  `tarjeta_a` int(4) NOT NULL DEFAULT '0',
  `tarjeta_r` int(4) NOT NULL DEFAULT '0',
  `expulsion_dos_min` int(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estadisticas_balonmano`
--

INSERT INTO `estadisticas_balonmano` (`id_esbalonmano`, `es_usuario`, `es_equipo`, `pj_usuario`, `pg_usuario`, `pe_usuario`, `pp_usuario`, `goles`, `asistencias`, `tapones`, `faltas`, `tarjeta_a`, `tarjeta_r`, `expulsion_dos_min`) VALUES
(660001, 2, 'CEE CAMPAMENTO', 4, 1, 0, 3, 8, 4, 10, 15, 5, 1, 3),
(660002, 5, 'VALENCIA', 6, 4, 0, 2, 5, 10, 8, 5, 3, 0, 1),
(660003, 8, 'VALENCIA', 6, 4, 0, 2, 2, 5, 50, 1, 2, 1, 0),
(660004, 10, 'VALENCIA', 6, 4, 0, 2, 10, 10, 2, 10, 2, 0, 2),
(660005, 13, 'VALENCIA', 6, 4, 0, 2, 15, 2, 5, 12, 5, 0, 3),
(660006, 16, 'VALENCIA', 6, 4, 0, 2, 5, 5, 4, 15, 2, 0, 5),
(660007, 18, 'VALENCIA', 6, 4, 0, 2, 8, 8, 6, 5, 4, 0, 2),
(660008, 19, 'VALENCIA', 6, 4, 0, 2, 5, 6, 5, 6, 5, 0, 1),
(660009, 3, 'CEE CAMPAMENTO', 4, 1, 0, 3, 1, 1, 68, 1, 1, 0, 1),
(660010, 11, 'CEE CAMPAMENTO', 4, 1, 0, 3, 8, 8, 5, 5, 1, 1, 5),
(660011, 12, 'CEE CAMPAMENTO', 4, 1, 0, 3, 10, 2, 4, 10, 1, 0, 4),
(660012, 14, 'CEE CAMPAMENTO', 4, 1, 0, 3, 14, 3, 2, 12, 1, 0, 5),
(660013, 15, 'CEE CAMPAMENTO', 4, 1, 0, 3, 5, 5, 3, 5, 1, 0, 6),
(660014, 17, 'CEE CAMPAMENTO', 4, 1, 0, 3, 2, 2, 10, 6, 1, 0, 4),
(660015, 20, 'HAND CARABANCHEL', 8, 3, 1, 4, 1, 1, 66, 1, 1, 0, 2),
(660016, 21, 'HAND CARABANCHEL', 8, 3, 1, 4, 15, 10, 10, 12, 1, 0, 1),
(660017, 22, 'HAND CARABANCHEL', 8, 3, 1, 4, 22, 5, 5, 2, 1, 0, 2),
(660018, 23, 'HAND CARABANCHEL', 8, 3, 1, 4, 5, 12, 4, 2, 1, 0, 0),
(660019, 24, 'HAND CARABANCHEL', 8, 3, 1, 4, 8, 5, 8, 10, 2, 0, 2),
(660020, 25, 'HAND CARABANCHEL', 8, 3, 1, 4, 4, 4, 6, 2, 1, 0, 0),
(660021, 26, 'HAND CARABANCHEL', 8, 3, 1, 4, 11, 10, 8, 7, 2, 0, 2),
(660022, 27, 'BC USERA', 7, 7, 0, 0, 0, 6, 77, 2, 1, 0, 0),
(660023, 28, 'BC USERA', 7, 7, 0, 0, 22, 10, 10, 5, 1, 0, 5),
(660024, 29, 'BC USERA', 7, 7, 0, 0, 25, 12, 22, 6, 2, 0, 2),
(660025, 30, 'BC USERA', 7, 7, 0, 0, 10, 5, 15, 7, 3, 1, 4),
(660026, 31, 'BC USERA', 7, 7, 0, 0, 5, 22, 5, 5, 0, 0, 2),
(660027, 32, 'BC USERA', 7, 7, 0, 0, 6, 11, 14, 2, 1, 0, 1),
(660028, 33, 'BC USERA', 7, 7, 0, 0, 7, 5, 5, 6, 1, 0, 0),
(660029, 34, 'RAYO FARO', 7, 4, 1, 2, 0, 0, 84, 1, 1, 0, 0),
(660030, 35, 'RAYO FARO', 7, 4, 1, 2, 20, 2, 15, 2, 2, 1, 2),
(660031, 36, 'RAYO FARO', 7, 4, 1, 2, 10, 3, 2, 5, 2, 0, 2),
(660032, 37, 'RAYO FARO', 7, 4, 1, 2, 5, 5, 12, 6, 2, 0, 3),
(660033, 38, 'RAYO FARO', 7, 4, 1, 2, 2, 15, 15, 10, 2, 0, 1),
(660034, 39, 'RAYO FARO', 7, 4, 1, 2, 2, 10, 15, 12, 1, 0, 0),
(660035, 40, 'RAYO FARO', 7, 4, 1, 2, 7, 7, 2, 15, 2, 0, 0),
(660036, 18, 'HANDBALL MADRID', 4, 2, 0, 2, 1, 1, 75, 1, 1, 0, 0),
(660037, 20, 'HANDBALL MADRID', 4, 2, 0, 2, 10, 5, 5, 12, 2, 0, 5),
(660038, 9, 'HANDBALL MADRID', 4, 2, 0, 2, 12, 5, 19, 22, 5, 0, 6),
(660039, 37, 'HANDBALL MADRID', 4, 2, 0, 2, 6, 5, 2, 12, 2, 0, 2),
(660040, 30, 'HANDBALL MADRID', 4, 2, 0, 2, 12, 5, 5, 10, 2, 0, 0),
(660041, 31, 'HANDBALL MADRID', 4, 2, 0, 2, 12, 6, 6, 2, 2, 0, 0),
(660042, 13, 'HANDBALL MADRID', 4, 2, 0, 2, 5, 3, 2, 1, 1, 0, 0),
(660043, 23, 'GVB HAND', 7, 5, 0, 2, 12, 2, 12, 2, 1, 1, 0),
(660044, 39, 'GVB HAND', 7, 5, 0, 2, 25, 2, 12, 5, 1, 0, 0),
(660045, 40, 'GVB HAND', 7, 5, 0, 2, 10, 5, 23, 6, 1, 0, 2),
(660046, 18, 'GVB HAND', 7, 5, 0, 2, 5, 12, 5, 2, 1, 0, 4),
(660047, 19, 'GVB HAND', 7, 5, 0, 2, 0, 0, 86, 5, 1, 0, 0),
(660048, 20, 'GVB HAND', 7, 5, 0, 2, 6, 15, 2, 4, 2, 0, 5),
(660049, 21, 'GVB HAND', 7, 5, 0, 2, 3, 15, 1, 12, 3, 1, 6),
(660050, 22, 'ATLETI PIRULI', 8, 2, 0, 6, 6, 10, 10, 1, 1, 0, 0),
(660051, 24, 'ATLETI PIRULI', 8, 2, 0, 6, 5, 5, 5, 2, 2, 0, 0),
(660052, 26, 'ATLETI PIRULI', 8, 2, 0, 6, 5, 2, 6, 10, 3, 2, 10),
(660053, 28, 'ATLETI PIRULI', 8, 2, 0, 6, 10, 3, 8, 2, 0, 0, 2),
(660054, 30, 'ATLETI PIRULI', 8, 2, 0, 6, 22, 6, 4, 5, 0, 0, 5),
(660055, 4, 'ATLETI PIRULI', 8, 2, 0, 6, 2, 5, 5, 6, 0, 0, 1),
(660056, 7, 'ATLETI PIRULI', 8, 2, 0, 6, 0, 1, 87, 5, 1, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadisticas_beisbol`
--

CREATE TABLE `estadisticas_beisbol` (
  `id_esbeisbol` int(10) NOT NULL,
  `es_usuario` int(10) NOT NULL,
  `es_equipo` varchar(30) NOT NULL,
  `pj_usuario` int(4) NOT NULL DEFAULT '0',
  `pg_usuario` int(4) NOT NULL DEFAULT '0',
  `pe_usuario` int(4) NOT NULL DEFAULT '0',
  `pp_usuario` int(4) NOT NULL DEFAULT '0',
  `strike` int(4) NOT NULL DEFAULT '0',
  `homerun` int(4) NOT NULL DEFAULT '0',
  `eliminaciones` int(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estadisticas_beisbol`
--

INSERT INTO `estadisticas_beisbol` (`id_esbeisbol`, `es_usuario`, `es_equipo`, `pj_usuario`, `pg_usuario`, `pe_usuario`, `pp_usuario`, `strike`, `homerun`, `eliminaciones`) VALUES
(440001, 4, 'CB HORTALEZA', 8, 1, 0, 7, 20, 1, 10),
(440002, 6, 'SALOU', 4, 3, 0, 1, 15, 3, 7),
(440003, 36, 'CB HORTALEZA', 8, 1, 0, 7, 12, 1, 5),
(440004, 37, 'CB HORTALEZA', 8, 1, 0, 7, 10, 0, 4),
(440005, 38, 'CB HORTALEZA', 8, 1, 0, 7, 5, 0, 8),
(440006, 39, 'CB HORTALEZA', 8, 1, 0, 7, 1, 4, 3),
(440007, 40, 'CB HORTALEZA', 8, 1, 0, 7, 0, 0, 0),
(440008, 7, 'SALOU', 4, 3, 0, 1, 15, 1, 5),
(440009, 8, 'SALOU', 4, 3, 0, 1, 8, 4, 6),
(440010, 9, 'SALOU', 4, 3, 0, 1, 11, 3, 8),
(440011, 10, 'SALOU', 4, 3, 0, 1, 0, 0, 0),
(440012, 11, 'SALOU', 4, 3, 0, 1, 15, 5, 11),
(440013, 12, 'BATE PACIFICO', 8, 6, 0, 2, 12, 3, 10),
(440014, 13, 'BATE PACIFICO', 8, 6, 0, 2, 8, 2, 5),
(440015, 14, 'BATE PACIFICO', 8, 6, 0, 2, 0, 0, 0),
(440016, 15, 'BATE PACIFICO', 8, 6, 0, 2, 7, 1, 8),
(440017, 16, 'BATE PACIFICO', 8, 6, 0, 2, 5, 0, 2),
(440018, 17, 'BATE PACIFICO', 8, 6, 0, 2, 2, 1, 3),
(440019, 18, 'GUANTE VALLECANO', 7, 2, 0, 5, 12, 2, 7),
(440020, 19, 'GUANTE VALLECANO', 7, 2, 0, 5, 15, 1, 5),
(440021, 20, 'GUANTE VALLECANO', 7, 2, 0, 5, 12, 0, 12),
(440022, 21, 'GUANTE VALLECANO', 7, 2, 0, 5, 17, 0, 8),
(440023, 22, 'GUANTE VALLECANO', 7, 2, 0, 5, 16, 2, 5),
(440024, 23, 'GUANTE VALLECANO', 7, 2, 0, 5, 0, 0, 0),
(440025, 24, 'LAZADORESONE', 6, 5, 0, 1, 14, 4, 3),
(440026, 25, 'LAZADORESONE', 6, 5, 0, 1, 13, 2, 4),
(440027, 26, 'LAZADORESONE', 6, 5, 0, 1, 10, 2, 6),
(440028, 27, 'LAZADORESONE', 6, 5, 0, 1, 0, 0, 0),
(440029, 28, 'LAZADORESONE', 6, 5, 0, 1, 10, 1, 5),
(440030, 29, 'LAZADORESONE', 6, 5, 0, 1, 7, 0, 7),
(440031, 30, 'ATL BARAJAS', 6, 4, 0, 2, 7, 0, 10),
(440032, 31, 'ATL BARAJAS', 6, 4, 0, 2, 6, 0, 10),
(440033, 32, 'ATL BARAJAS', 6, 4, 0, 2, 11, 5, 5),
(440034, 33, 'ATL BARAJAS', 6, 4, 0, 2, 15, 3, 3),
(440035, 34, 'ATL BARAJAS', 6, 4, 0, 2, 0, 0, 0),
(440036, 35, 'ATL BARAJAS', 6, 4, 0, 2, 12, 2, 4),
(440037, 13, 'CBS ARAVACA', 10, 7, 0, 3, 15, 5, 11),
(440038, 22, 'CBS ARAVACA', 10, 7, 0, 3, 12, 2, 7),
(440039, 27, 'CBS ARAVACA', 10, 7, 0, 3, 10, 3, 5),
(440040, 10, 'CBS ARAVACA', 10, 7, 0, 3, 5, 5, 6),
(440041, 19, 'CBS ARAVACA', 10, 7, 0, 3, 6, 1, 7),
(440042, 33, 'CBS ARAVACA', 10, 7, 0, 3, 0, 0, 0),
(440043, 28, 'RED MAXBALL', 4, 3, 0, 1, 12, 2, 10),
(440044, 29, 'RED MAXBALL', 4, 3, 0, 1, 3, 2, 7),
(440045, 14, 'RED MAXBALL', 4, 3, 0, 1, 5, 2, 5),
(440046, 18, 'RED MAXBALL', 4, 3, 0, 1, 4, 1, 6),
(440047, 20, 'RED MAXBALL', 4, 3, 0, 1, 0, 0, 0),
(440048, 21, 'RED MAXBALL', 4, 3, 0, 1, 4, 5, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadisticas_futbol`
--

CREATE TABLE `estadisticas_futbol` (
  `id_esfutbol` int(10) NOT NULL,
  `es_usuario` int(10) NOT NULL,
  `es_equipo` varchar(30) NOT NULL,
  `pj_usuario` int(4) NOT NULL DEFAULT '0',
  `pg_usuario` int(4) NOT NULL DEFAULT '0',
  `pe_usuario` int(4) NOT NULL DEFAULT '0',
  `pp_usuario` int(4) NOT NULL DEFAULT '0',
  `goles` int(4) NOT NULL DEFAULT '0',
  `asistencias` int(4) NOT NULL DEFAULT '0',
  `tarjeta_a` int(4) NOT NULL DEFAULT '0',
  `tarjeta_r` int(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estadisticas_futbol`
--

INSERT INTO `estadisticas_futbol` (`id_esfutbol`, `es_usuario`, `es_equipo`, `pj_usuario`, `pg_usuario`, `pe_usuario`, `pp_usuario`, `goles`, `asistencias`, `tarjeta_a`, `tarjeta_r`) VALUES
(110001, 2, 'BULL', 13, 5, 2, 6, 5, 2, 3, 0),
(110002, 2, 'FLORIDA CDF', 7, 2, 1, 4, 6, 1, 4, 0),
(110003, 3, 'BULL', 13, 5, 2, 6, 1, 3, 1, 1),
(110004, 10, 'BULL', 12, 5, 1, 6, 0, 6, 4, 0),
(110005, 4, 'AC MILANAS', 13, 2, 2, 9, 2, 1, 2, 0),
(110006, 9, 'AC MILANAS', 11, 1, 1, 9, 2, 1, 4, 1),
(110007, 10, 'AC MILANAS', 13, 2, 2, 9, 1, 0, 2, 0),
(110008, 11, 'AC MILANAS', 12, 2, 2, 7, 0, 2, 1, 0),
(110009, 8, 'LOS CHACHOS FC', 7, 2, 4, 1, 2, 5, 2, 1),
(110010, 9, 'LOS CHACHOS FC', 7, 2, 4, 1, 2, 1, 2, 0),
(110011, 11, 'LOS CHACHOS FC', 6, 2, 3, 1, 2, 0, 3, 0),
(110012, 12, 'FLORIDA CDF', 7, 2, 1, 4, 3, 2, 0, 0),
(110013, 15, 'FLORIDA CDF', 7, 2, 1, 4, 1, 1, 2, 0),
(110014, 12, 'RAYO MONCLOA', 16, 7, 8, 1, 0, 1, 1, 0),
(110015, 13, 'RAYO MONCLOA', 16, 7, 8, 1, 4, 2, 0, 1),
(110016, 14, 'RAYO MONCLOA', 16, 7, 8, 1, 3, 1, 0, 0),
(110017, 14, 'BULL', 13, 5, 2, 6, 2, 2, 1, 0),
(110018, 13, 'ASTON BIRRAS', 9, 6, 2, 1, 3, 2, 3, 1),
(110019, 18, 'ASTON BIRRAS', 9, 6, 2, 1, 1, 0, 3, 0),
(110020, 16, 'MESSIRIANOS FC', 24, 18, 2, 4, 6, 2, 2, 0),
(110021, 17, 'MESSIRIANOS FC', 24, 18, 2, 4, 6, 1, 1, 0),
(110022, 19, 'MESSIRIANOS FC', 24, 18, 2, 4, 2, 5, 2, 1),
(110023, 20, 'MESSIRIANOS FC', 24, 18, 2, 4, 0, 1, 2, 0),
(110024, 21, 'MESSIRIANOS FC', 24, 18, 2, 4, 1, 6, 0, 0),
(110025, 26, 'MESSIRIANOS FC', 24, 18, 2, 4, 8, 1, 0, 0),
(110026, 34, 'MESSIRIANOS FC', 24, 18, 2, 4, 5, 1, 1, 0),
(110027, 22, 'LOS CHACHOS FC', 7, 2, 4, 1, 1, 1, 1, 0),
(110028, 28, 'BULL', 13, 5, 2, 6, 3, 2, 2, 0),
(110029, 33, 'BULL', 13, 5, 2, 6, 6, 0, 0, 0),
(110030, 40, 'BULL', 13, 5, 2, 6, 2, 1, 1, 0),
(110031, 22, 'ASTON BIRRAS', 9, 6, 2, 1, 2, 1, 2, 0),
(110032, 23, 'ASTON BIRRAS', 9, 6, 2, 1, 1, 1, 2, 0),
(110033, 25, 'ASTON BIRRAS', 9, 6, 2, 1, 0, 3, 0, 0),
(110034, 35, 'ASTON BIRRAS', 9, 6, 2, 1, 0, 0, 0, 0),
(110035, 36, 'ASTON BIRRAS', 9, 6, 2, 1, 3, 6, 1, 0),
(110036, 22, 'RAYO MONCLOA', 16, 7, 8, 1, 0, 0, 2, 0),
(110037, 23, 'RAYO MONCLOA', 16, 7, 8, 1, 2, 2, 1, 0),
(110038, 24, 'RAYO MONCLOA', 16, 7, 8, 1, 4, 2, 2, 0),
(110039, 25, 'RAYO MONCLOA', 16, 7, 8, 1, 9, 1, 3, 0),
(110040, 24, 'LOS CHACHOS FC', 7, 2, 4, 1, 2, 1, 1, 0),
(110041, 32, 'LOS CHACHOS FC', 7, 2, 4, 1, 0, 0, 0, 0),
(110042, 39, 'LOS CHACHOS FC', 7, 2, 4, 1, 3, 3, 0, 0),
(110043, 26, 'REAL ALUCHE', 7, 4, 2, 1, 0, 0, 0, 0),
(110044, 29, 'REAL ALUCHE', 7, 4, 2, 1, 3, 1, 1, 0),
(110045, 30, 'REAL ALUCHE', 7, 4, 2, 1, 2, 5, 2, 1),
(110046, 32, 'REAL ALUCHE', 7, 4, 2, 1, 5, 3, 3, 0),
(110047, 33, 'REAL ALUCHE', 7, 4, 2, 1, 1, 5, 0, 0),
(110048, 37, 'REAL ALUCHE', 7, 4, 2, 1, 0, 1, 0, 0),
(110049, 40, 'REAL ALUCHE', 7, 4, 2, 1, 0, 2, 1, 0),
(110050, 27, 'FLORIDA CDF', 7, 2, 1, 4, 0, 0, 1, 0),
(110051, 29, 'FLORIDA CDF', 7, 2, 1, 4, 2, 2, 0, 0),
(110052, 37, 'FLORIDA CDF', 7, 2, 1, 4, 4, 1, 0, 0),
(110053, 38, 'FLORIDA CDF', 7, 2, 1, 4, 2, 2, 0, 0),
(110054, 30, 'AC MILANAS', 13, 2, 2, 9, 0, 0, 1, 0),
(110055, 31, 'AC MILANAS', 13, 2, 2, 9, 2, 2, 2, 0),
(110056, 34, 'AC MILANAS', 13, 2, 2, 9, 3, 3, 3, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadisticas_tenis`
--

CREATE TABLE `estadisticas_tenis` (
  `id_estenis` int(10) NOT NULL,
  `es_usuario` int(10) NOT NULL,
  `es_equipo` varchar(30) NOT NULL,
  `pj_usuario` int(4) NOT NULL DEFAULT '0',
  `pg_usuario` int(4) NOT NULL DEFAULT '0',
  `pe_usuario` int(4) NOT NULL DEFAULT '0',
  `pp_usuario` int(4) NOT NULL DEFAULT '0',
  `puntos_usuario` int(5) NOT NULL DEFAULT '0',
  `sets` int(4) NOT NULL DEFAULT '0',
  `juegos` int(4) NOT NULL DEFAULT '0',
  `aces` int(4) NOT NULL DEFAULT '0',
  `dobles_faltas` int(4) NOT NULL DEFAULT '0',
  `errores_no_forzados` int(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estadisticas_tenis`
--

INSERT INTO `estadisticas_tenis` (`id_estenis`, `es_usuario`, `es_equipo`, `pj_usuario`, `pg_usuario`, `pe_usuario`, `pp_usuario`, `puntos_usuario`, `sets`, `juegos`, `aces`, `dobles_faltas`, `errores_no_forzados`) VALUES
(1000001, 3, 'DUO DINÁMICO', 8, 6, 0, 2, 150, 12, 35, 25, 10, 40),
(1000002, 4, 'LOS CHUNGUITOS', 6, 2, 0, 4, 100, 4, 22, 10, 15, 60),
(1000003, 3, 'DUO DINÁMICO', 8, 6, 0, 2, 121, 12, 35, 15, 5, 22),
(1000004, 4, 'LOS CHUNGUITOS', 6, 2, 0, 4, 89, 4, 22, 22, 12, 35),
(1000005, 5, 'ANDYLUCAS', 8, 8, 0, 0, 250, 16, 55, 35, 10, 20),
(1000006, 13, 'ANDYLUCAS', 8, 8, 0, 0, 224, 16, 55, 20, 12, 24),
(1000007, 6, 'DOS TRÉBOLES', 5, 3, 0, 2, 51, 11, 40, 15, 10, 62),
(1000008, 17, 'DOS TRÉBOLES', 5, 3, 0, 2, 42, 11, 40, 10, 15, 55),
(1000009, 7, 'LIMÓNSAL', 5, 1, 0, 4, 60, 5, 41, 20, 10, 50),
(1000010, 40, 'LIMÓNSAL', 5, 1, 0, 4, 65, 5, 41, 25, 15, 55),
(1000011, 8, 'CAMPEONAS', 10, 7, 0, 3, 165, 24, 60, 60, 2, 40),
(1000012, 23, 'CAMPEONAS', 10, 7, 0, 3, 130, 24, 60, 5, 5, 40),
(1000013, 9, 'BLANCO NEGRO', 4, 2, 0, 2, 70, 7, 45, 22, 1, 20),
(1000014, 10, 'BLANCO NEGRO', 4, 2, 0, 2, 72, 7, 45, 10, 10, 46),
(1000015, 10, 'BANANA-SHOT', 5, 4, 0, 1, 95, 11, 50, 8, 5, 10),
(1000016, 32, 'BANANA-SHOT', 5, 4, 0, 1, 90, 11, 50, 9, 8, 22);

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
(990001, 'baloncesto 3v3 abril 2019', 'BALONCESTO', 'Madrid', 'Carabanchel', 'Parque Ugenia de Montijo, canchas de detras del metro', '2019-04-09', '2019-05-31', '10:00 - 15:00', 'Partidos de basket en Carabanchel', 'images/eventos/evento1.png'),
(990002, 'futbol rey de la pista', 'FUTBOL', 'Madrid', 'Usera', 'Parque aluche en las pistas de fútbol', '2019-04-09', '2019-04-27', '09:00 - 18:00', 'Partidos de futbol sala minimo 6 participantes por equipo', 'images/eventos/evento2.jpg'),
(990003, 'Tenis dobles hierba', 'TENIS', 'Madrid', 'Chamberi', 'Pistas Canal Isabel II', '2019-04-15', '2019-05-04', '10:00 - 19:00', 'Partidos de tenis por parejas en pista de hierba artificial', 'images/eventos/evento3.jpg'),
(990004, 'Atrapalo si puedes', 'BEISBOL', 'Madrid', 'Vicalvaro', 'Parque Pio Pio', '2019-04-15', '2019-04-28', '12:00 - 20:00', 'Partido de beisbol en campo de tierra', 'images/eventos/evento4.jpg'),
(990005, 'balonmano rey del campo', 'BALONMANO', 'Madrid', 'Moncloa', 'Pistas Moncloa XIII', '2019-04-15', '2019-04-29', '14:00 - 20:00', 'Partidos de balonmano, quien llegue antes a 10 goles gana', 'images/eventos/evento5.jpg'),
(990006, 'balonceto Michael Jordan', 'BALONCESTO', 'Madrid', 'Vallecas', 'Canchas El Pozo', '2019-04-15', '2019-05-10', '10:00 - 18:00', 'Torneo de baloncesto, incripción minimo 5 jugadores', 'images/eventos/evento6.jpg'),
(990007, 'partido a dos goles', 'FUTBOL', 'Madrid', 'Chamartin', 'Polideportivo Susana Griso', '2019-04-15', '2019-06-29', '13:00 - 21:00', 'Partidos de fútbol sala que quien marque antes dos goles, gana', 'images/eventos/evento7.jpg'),
(990008, 'futbol torneo I Madrid', 'FUTBOL', 'Madrid', 'Atocha', 'Polideportivo Fernando Martín', '2019-04-15', '2019-05-18', '17:00 - 21:00', 'Torneo de fútbol, incripción minimo 5 jugadores', 'images/eventos/evento8.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `invitados`
--

CREATE TABLE `invitados` (
  `id_invitado` int(10) NOT NULL,
  `quedada` int(10) NOT NULL,
  `usuario` int(10) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `invitados`
--

INSERT INTO `invitados` (`id_invitado`, `quedada`, `usuario`, `fecha_creacion`) VALUES
(1100001, 1200001, 7, '2019-05-16 15:54:13'),
(1100002, 1200002, 2, '2019-05-16 16:11:13'),
(1100003, 1200003, 11, '2019-05-16 16:35:40'),
(1100004, 1200004, 5, '2019-05-16 16:46:45'),
(1100005, 1200005, 6, '2019-05-16 17:04:25'),
(1100006, 1200006, 4, '2019-05-16 17:20:02'),
(1100007, 1200001, 18, '2019-05-16 20:22:02'),
(1100008, 1200001, 22, '2019-05-16 20:23:12'),
(1100009, 1200001, 40, '2019-05-16 20:24:22'),
(1100010, 1200001, 3, '2019-05-16 20:25:32'),
(1100011, 1200001, 33, '2019-05-16 20:26:14'),
(1100012, 1200001, 32, '2019-05-16 20:27:01'),
(1100013, 1200001, 17, '2019-05-16 20:28:45'),
(1100014, 1200001, 19, '2019-05-16 20:29:42'),
(1100015, 1200002, 3, '2019-05-16 20:30:02'),
(1100016, 1200002, 10, '2019-05-16 20:33:14'),
(1100017, 1200002, 12, '2019-05-16 20:33:55'),
(1100018, 1200002, 22, '2019-05-16 20:35:12'),
(1100019, 1200002, 23, '2019-05-16 20:35:33'),
(1100020, 1200002, 24, '2019-05-16 20:40:12'),
(1100021, 1200002, 26, '2019-05-16 20:41:45'),
(1100022, 1200002, 28, '2019-05-16 20:42:02'),
(1100023, 1200002, 37, '2019-05-16 20:42:32'),
(1100024, 1200003, 12, '2019-05-16 20:43:24'),
(1100025, 1200003, 13, '2019-05-16 20:44:11'),
(1100026, 1200003, 17, '2019-05-16 20:44:56'),
(1100027, 1200003, 20, '2019-05-16 20:45:12'),
(1100028, 1200003, 30, '2019-05-16 20:45:23'),
(1100029, 1200003, 40, '2019-05-16 20:46:24'),
(1100030, 1200003, 35, '2019-05-16 20:44:12'),
(1100031, 1200003, 29, '2019-05-16 20:45:13'),
(1100032, 1200004, 6, '2019-05-16 20:46:22'),
(1100033, 1200004, 3, '2019-05-16 20:47:44'),
(1100034, 1200004, 2, '2019-05-16 20:48:25'),
(1100035, 1200004, 11, '2019-05-16 20:49:32'),
(1100036, 1200004, 15, '2019-05-16 20:52:00'),
(1100037, 1200004, 16, '2019-05-16 20:53:11'),
(1100038, 1200004, 19, '2019-05-16 20:54:17'),
(1100039, 1200004, 24, '2019-05-16 20:55:18'),
(1100040, 1200005, 7, '2019-05-16 20:56:19'),
(1100041, 1200005, 8, '2019-05-16 20:57:20'),
(1100042, 1200005, 9, '2019-05-16 20:58:12'),
(1100043, 1200005, 10, '2019-05-16 20:59:45'),
(1100044, 1200005, 12, '2019-05-16 21:02:15'),
(1100045, 1200005, 16, '2019-05-16 21:05:17'),
(1100046, 1200005, 35, '2019-05-16 21:06:54'),
(1100047, 1200006, 5, '2019-05-16 21:10:45'),
(1100048, 1200006, 10, '2019-05-16 21:15:54'),
(1100049, 1200006, 14, '2019-05-16 21:17:45'),
(1100050, 1200006, 18, '2019-05-16 21:19:17'),
(1100051, 1200006, 22, '2019-05-16 21:22:14'),
(1100052, 1200006, 32, '2019-05-16 21:23:01'),
(1100053, 1200006, 33, '2019-05-16 21:42:32'),
(1100054, 1200006, 39, '2019-05-16 21:42:44'),
(1100055, 1200006, 27, '2019-05-16 21:42:55'),
(1100056, 1200006, 26, '2019-05-16 21:45:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jugadores`
--

CREATE TABLE `jugadores` (
  `id_jugador` int(10) NOT NULL,
  `equipo` int(10) NOT NULL,
  `usuario` int(10) NOT NULL,
  `rol_jugador` tinyint(1) NOT NULL DEFAULT '0',
  `fecha_pjugador` date NOT NULL,
  `hora_pjugador` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `jugadores`
--

INSERT INTO `jugadores` (`id_jugador`, `equipo`, `usuario`, `rol_jugador`, `fecha_pjugador`, `hora_pjugador`) VALUES
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
-- Estructura de tabla para la tabla `quedadas`
--

CREATE TABLE `quedadas` (
  `id_quedada` int(10) NOT NULL,
  `nombre_quedada` varchar(30) NOT NULL,
  `creador` int(10) NOT NULL,
  `ciudad` varchar(100) NOT NULL,
  `localizacion` varchar(200) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_quedada` date NOT NULL,
  `hora_quedada` time NOT NULL,
  `descripcion` varchar(400) NOT NULL,
  `ruta_foto` varchar(100) NOT NULL,
  `aforo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `quedadas`
--

INSERT INTO `quedadas` (`id_quedada`, `nombre_quedada`, `creador`, `ciudad`, `localizacion`, `fecha_creacion`, `fecha_quedada`, `hora_quedada`, `descripcion`, `ruta_foto`, `aforo`) VALUES
(1200001, 'Clásico Bar Manolo', 7, 'Madrid', 'Calle Bravo Murillo 146, Metro: Cuatro Caminos L1,L2,L6', '2019-05-16 15:54:13', '2019-05-20', '18:30:00', 'Si quieres vivir el clásico con la mejor compañia y los mejores bocatas vente al Bar Manolo.', 'images/quedadas/bar_manolo.jpg', 60),
(1200002, 'Mundial Fútbol Femenino 2019', 2, 'Madrid', 'Plaza de Neptuno, Metro: Banco de España (L2), Atocha (L1)', '2019-05-16 16:11:13', '2019-06-22', '20:00:00', 'Ven con tus amigos a la pantalla gigante de Plaza de Neptuno y en concreto a nuestro aforo reservado  para ver el Mundial de Fúbol Femenino que juegan España vs EEUU. ', 'images/quedadas/neptuno.jpg', 300),
(1200003, 'Final Champions League 2019', 11, 'Madrid', 'Avenida de Arcentales, Metro: Las Musas, Estadio Metropolitano (L7)', '2019-05-16 16:35:40', '2019-06-01', '21:00:00', 'Si nos has podido conseguir entradas para ver la Final de Champions entre el Liverpool - Tottenham ,  que se juega en el Wanda Metropolitano, vente a nuestro aforo reservado para verlo en pantalla gigante al aire libre.', 'images/quedadas/wanda.jpg', 500),
(1200004, 'Final Four Euroliga 2019', 5, 'Madrid', 'Avenida Felipe II Metro: O´donnell (L6), Goya (L2,L4)', '2019-05-16 16:46:45', '2019-05-25', '18:00:00', 'Vive en la plaza del basket en el aforo reservado para ver en pantalla gigante la final a cuatro de la mejor competición de europa del basket.', 'images/quedadas/felipe_ii.jpg', 150),
(1200005, 'Triatlón Casa de Campo', 6, 'Madrid', 'Paseo del Embarcadero, Metro: Lago(L10)', '2019-05-16 17:04:25', '2019-06-29', '08:00:00', 'Que mejor plan que animar a los mejores triatletas del mundo entre ellos los españoles Javier Gómez Noya y  Mario Mola, en nuestra zona Triatlón Sports4Friends situada en la Casa de Campo.  ', 'images/quedadas/casa_campo.jpg', 100),
(1200006, 'Toledo Piraguas ', 4, 'Toledo', 'Paseo del Barco Pasaje, Bus: 567 (Cogerlo Intercambiador Plaza Eliptica, Madrid)', '2019-05-16 17:20:02', '2019-07-07', '09:00:00', 'Vivir piraguismo manchego en el Rio Tajo es algo único e irrepetible, ven y verás. ', 'images/quedadas/toledo.jpg', 120);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registros_eventos`
--

CREATE TABLE `registros_eventos` (
  `id_registro` int(10) NOT NULL,
  `evento` varchar(30) CHARACTER SET utf8 NOT NULL,
  `equipo` varchar(30) CHARACTER SET utf8 NOT NULL,
  `fecha_creacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `registros_eventos`
--

INSERT INTO `registros_eventos` (`id_registro`, `evento`, `equipo`, `fecha_creacion`) VALUES
(770001, 'baloncesto 3v3 abril 2019', 'BULL', '2019-04-09'),
(770002, 'balonmano rey del campo', 'VALENCIA', '2019-04-15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(10) NOT NULL,
  `nickname` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(400) CHARACTER SET utf8 NOT NULL,
  `rol_usuario` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL DEFAULT 'USER',
  `foto_usuario` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nickname`, `nombre`, `correo`, `password`, `rol_usuario`, `foto_usuario`) VALUES
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
  ADD PRIMARY KEY (`id_deporte`),
  ADD UNIQUE KEY `NOMBRE_DEPORTE` (`nombre_deporte`);

--
-- Indices de la tabla `equipos`
--
ALTER TABLE `equipos`
  ADD PRIMARY KEY (`id_equipo`),
  ADD UNIQUE KEY `NOMBRE_EQUIPO` (`nombre_equipo`),
  ADD KEY `DEPORTE` (`deporte`);

--
-- Indices de la tabla `estadisticas_baloncesto`
--
ALTER TABLE `estadisticas_baloncesto`
  ADD PRIMARY KEY (`id_esbaloncesto`),
  ADD KEY `es_usuario` (`es_usuario`);

--
-- Indices de la tabla `estadisticas_balonmano`
--
ALTER TABLE `estadisticas_balonmano`
  ADD PRIMARY KEY (`id_esbalonmano`),
  ADD KEY `es_usuario` (`es_usuario`);

--
-- Indices de la tabla `estadisticas_beisbol`
--
ALTER TABLE `estadisticas_beisbol`
  ADD PRIMARY KEY (`id_esbeisbol`),
  ADD KEY `es_usuario` (`es_usuario`);

--
-- Indices de la tabla `estadisticas_futbol`
--
ALTER TABLE `estadisticas_futbol`
  ADD PRIMARY KEY (`id_esfutbol`),
  ADD KEY `es_usuario` (`es_usuario`);

--
-- Indices de la tabla `estadisticas_tenis`
--
ALTER TABLE `estadisticas_tenis`
  ADD PRIMARY KEY (`id_estenis`),
  ADD KEY `es_usuario` (`es_usuario`);

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id_evento`),
  ADD UNIQUE KEY `nombre_evento` (`nombre_evento`),
  ADD KEY `deporte` (`deporte`);

--
-- Indices de la tabla `invitados`
--
ALTER TABLE `invitados`
  ADD PRIMARY KEY (`id_invitado`),
  ADD KEY `quedada` (`quedada`),
  ADD KEY `usuario` (`usuario`);

--
-- Indices de la tabla `jugadores`
--
ALTER TABLE `jugadores`
  ADD PRIMARY KEY (`id_jugador`),
  ADD KEY `USUARIO` (`usuario`),
  ADD KEY `EQUIPO` (`equipo`);

--
-- Indices de la tabla `quedadas`
--
ALTER TABLE `quedadas`
  ADD PRIMARY KEY (`id_quedada`),
  ADD KEY `creador` (`creador`);

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
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `NICKNAME` (`nickname`),
  ADD UNIQUE KEY `CORREO` (`correo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `deportes`
--
ALTER TABLE `deportes`
  MODIFY `id_deporte` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=880006;

--
-- AUTO_INCREMENT de la tabla `equipos`
--
ALTER TABLE `equipos`
  MODIFY `id_equipo` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=550041;

--
-- AUTO_INCREMENT de la tabla `estadisticas_baloncesto`
--
ALTER TABLE `estadisticas_baloncesto`
  MODIFY `id_esbaloncesto` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=220041;

--
-- AUTO_INCREMENT de la tabla `estadisticas_balonmano`
--
ALTER TABLE `estadisticas_balonmano`
  MODIFY `id_esbalonmano` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=660057;

--
-- AUTO_INCREMENT de la tabla `estadisticas_beisbol`
--
ALTER TABLE `estadisticas_beisbol`
  MODIFY `id_esbeisbol` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=440049;

--
-- AUTO_INCREMENT de la tabla `estadisticas_futbol`
--
ALTER TABLE `estadisticas_futbol`
  MODIFY `id_esfutbol` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110057;

--
-- AUTO_INCREMENT de la tabla `estadisticas_tenis`
--
ALTER TABLE `estadisticas_tenis`
  MODIFY `id_estenis` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1000017;

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id_evento` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=990009;

--
-- AUTO_INCREMENT de la tabla `jugadores`
--
ALTER TABLE `jugadores`
  MODIFY `id_jugador` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=330224;

--
-- AUTO_INCREMENT de la tabla `registros_eventos`
--
ALTER TABLE `registros_eventos`
  MODIFY `id_registro` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=770003;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `equipos`
--
ALTER TABLE `equipos`
  ADD CONSTRAINT `equipos_ibfk_1` FOREIGN KEY (`deporte`) REFERENCES `deportes` (`id_deporte`) ON DELETE CASCADE;

--
-- Filtros para la tabla `estadisticas_baloncesto`
--
ALTER TABLE `estadisticas_baloncesto`
  ADD CONSTRAINT `estadisticas_baloncesto_ibfk_1` FOREIGN KEY (`es_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE;

--
-- Filtros para la tabla `estadisticas_balonmano`
--
ALTER TABLE `estadisticas_balonmano`
  ADD CONSTRAINT `estadisticas_balonmano_ibfk_1` FOREIGN KEY (`es_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE;

--
-- Filtros para la tabla `estadisticas_beisbol`
--
ALTER TABLE `estadisticas_beisbol`
  ADD CONSTRAINT `estadisticas_beisbol_ibfk_1` FOREIGN KEY (`es_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE;

--
-- Filtros para la tabla `estadisticas_futbol`
--
ALTER TABLE `estadisticas_futbol`
  ADD CONSTRAINT `estadisticas_futbol_ibfk_1` FOREIGN KEY (`es_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE;

--
-- Filtros para la tabla `estadisticas_tenis`
--
ALTER TABLE `estadisticas_tenis`
  ADD CONSTRAINT `estadisticas_tenis_ibfk_1` FOREIGN KEY (`es_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE;

--
-- Filtros para la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD CONSTRAINT `eventos_ibfk_1` FOREIGN KEY (`deporte`) REFERENCES `deportes` (`nombre_deporte`) ON DELETE CASCADE;

--
-- Filtros para la tabla `invitados`
--
ALTER TABLE `invitados`
  ADD CONSTRAINT `invitados_ibfk_1` FOREIGN KEY (`quedada`) REFERENCES `quedadas` (`id_quedada`),
  ADD CONSTRAINT `invitados_ibfk_2` FOREIGN KEY (`usuario`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `jugadores`
--
ALTER TABLE `jugadores`
  ADD CONSTRAINT `jugadores_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE,
  ADD CONSTRAINT `jugadores_ibfk_2` FOREIGN KEY (`equipo`) REFERENCES `equipos` (`id_equipo`) ON DELETE CASCADE;

--
-- Filtros para la tabla `quedadas`
--
ALTER TABLE `quedadas`
  ADD CONSTRAINT `quedadas_ibfk_1` FOREIGN KEY (`creador`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `registros_eventos`
--
ALTER TABLE `registros_eventos`
  ADD CONSTRAINT `registros_eventos_ibfk_1` FOREIGN KEY (`equipo`) REFERENCES `equipos` (`nombre_equipo`) ON DELETE CASCADE,
  ADD CONSTRAINT `registros_eventos_ibfk_2` FOREIGN KEY (`evento`) REFERENCES `eventos` (`nombre_evento`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
