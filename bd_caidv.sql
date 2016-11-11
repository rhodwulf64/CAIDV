-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-11-2016 a las 14:22:08
-- Versión del servidor: 10.1.16-MariaDB
-- Versión de PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_caidv`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulobn`
--

CREATE TABLE `articulobn` (
  `id_bien` int(11) NOT NULL,
  `cod_bien` char(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `LlavePrestado` char(1) COLLATE utf8_spanish_ci NOT NULL DEFAULT '0',
  `id_tbien` int(11) NOT NULL,
  `serial_bien` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `id_marca` int(11) DEFAULT NULL,
  `id_modelo` int(11) DEFAULT NULL,
  `des_bien` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `id_cond` int(11) NOT NULL,
  `precio` float DEFAULT NULL,
  `fecha_ent` date NOT NULL,
  `FechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` char(1) COLLATE utf8_spanish_ci NOT NULL,
  `observacion_bien` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `articulobn`
--

INSERT INTO `articulobn` (`id_bien`, `cod_bien`, `LlavePrestado`, `id_tbien`, `serial_bien`, `id_marca`, `id_modelo`, `des_bien`, `id_cond`, `precio`, `fecha_ent`, `FechaRegistro`, `status`, `observacion_bien`) VALUES
(72, '111', '0', 1, '14521ASD', 3, 1, 'PROCESADOR DUAL CORE', 4, 250000, '2015-05-13', '0000-00-00 00:00:00', '1', 'Buen Estado'),
(73, '112', '0', 2, 'N/A', 2, 1, 'PROCESADOR DUAL CORE', 2, 250000, '2015-05-13', '0000-00-00 00:00:00', '1', ''),
(74, '113', '0', 1, 'N/A', 3, 1, 'PROCESADOR DUAL CORE', 2, 250000, '2015-05-13', '0000-00-00 00:00:00', '1', 'qwe123123wq'),
(75, '114', '0', 1, 'N/A', 3, 1, 'PROCESADOR DUAL CORE', 2, 250000, '2015-05-13', '0000-00-00 00:00:00', '1', '12312qweqwe'),
(202, '342234', '0', 2, '23626723626233333333', 4, 1, 'jdjkytu456sadaq', 2, NULL, '1990-01-01', '2016-04-25 15:31:22', '1', 'wqehdasdavxvx'),
(203, 'r2352', '0', 1, '5235erq', 4, 1, 'jdjkytu456sadaq', 4, NULL, '1990-01-01', '2016-04-25 15:31:22', '1', 'wqehdasdavxvx'),
(205, '234234', '0', 2, '324234', 3, 1, 'qweqweq', 1, NULL, '2016-04-28', '2016-04-29 00:27:48', '1', 'qweqweq'),
(206, 'QWE23', '0', 3, 'QWRQWR234234', 3, 1, 'qweqweqweasda', 2, NULL, '2016-04-09', '2016-04-29 00:33:35', '1', 'sdasdasdasd'),
(207, 'RWERERA23', '0', 1, 'EWR43543WERWER', 3, 1, 'werwersdf324234', 1, NULL, '2016-04-27', '2016-04-29 00:37:54', '1', 'rwerw erwe r324234er'),
(208, 'WERTER435', '0', 2, 'ERT345ERT', 3, 1, 'TERTER345345RT', 1, NULL, '2016-04-28', '2016-04-29 00:41:24', '1', 'ERTERT345345ERT'),
(209, 'QWEQWE', '0', 2, 'QWEQ123123WQEQ', 4, 1, 'qweqweqwe', 2, NULL, '2016-05-01', '2016-05-03 06:09:34', '1', 'qweqweq'),
(210, 'ERWERW', '0', 2, 'WERWERWE234234', 3, 1, 'qweqweqwe', 2, NULL, '2016-05-01', '2016-05-03 06:16:35', '1', 'qweqwe'),
(211, 'QWEEW', '0', 2, 'Q2WEQWE', 2, 1, 'qweqwe', 2, NULL, '2016-05-01', '2016-05-03 06:32:21', '1', 'qweqwe'),
(212, 'W', '0', 1, 'QQWEQWE', 2, 1, 'qweqweqw', 1, NULL, '2016-05-01', '2016-05-03 06:34:15', '1', 'qweqweq'),
(213, 'QWEQWEQWE', '0', 3, '23QWEQWQE234', 4, 1, 'qweqweqwe', 1, NULL, '2016-05-01', '2016-05-03 21:27:32', '0', 'qweqwe'),
(214, '1234', '0', 8, '1234', 6, 5, 'hhsadfewruieqwyriuqw', 2, NULL, '1870-05-01', '2016-05-25 21:05:05', '1', 'hjkhfrjkwhqeriuywqru'),
(215, '1234', '0', 8, '1234', 6, 5, 'hhsadfewruieqwyriuqw', 2, NULL, '1870-05-01', '2016-05-25 21:05:05', '1', 'hjkhfrjkwhqeriuywqru'),
(216, 'NULL', '0', 8, 'NULL', 6, 5, 'hhsadfewruieqwyriuqw', 2, NULL, '1870-05-01', '2016-05-25 21:05:05', '1', 'hjkhfrjkwhqeriuywqru'),
(217, 'AZUCARR', '0', 3, 'QWEQWEQWE', 4, 1, 'qweqweqwe', 2, NULL, '2016-05-01', '2016-05-27 01:26:24', '1', 'qweqweqwe'),
(218, '32525235', '0', 3, 'EWRWERWER', 4, 1, 'qweqweqwe', 2, NULL, '2016-05-01', '2016-05-27 01:26:24', '1', 'qweqweqwe'),
(219, '123456', '0', 1, '1020', 2, 1, 'NULL', 1, NULL, '2015-05-01', '2016-05-28 15:31:02', '1', 'NULL'),
(220, '23851797', '0', 1, '23851797', 2, 2, 'NULL', 2, NULL, '2015-05-01', '2016-05-28 15:31:02', '1', 'NULL'),
(221, '111222333', '0', 3, '123456', 2, 4, 'NULL', 3, NULL, '2016-05-28', '2016-05-28 16:20:47', '1', 'NULL'),
(222, 'LAURA', '0', 4, 'NIEVES', 5, 2, 'NULL', 3, NULL, '2016-05-28', '2016-05-28 17:19:51', '1', 'NULL'),
(223, '13579', '0', 3, '12', 5, 5, 'acarigua', 2, NULL, '2016-05-01', '2016-05-31 20:57:47', '1', 'gregorio'),
(224, 'WER24', '0', 4, 'WERWER234234', 4, 2, 'werwer234', 2, NULL, '2016-05-01', '2016-05-31 21:47:56', '1', 'werwerwer'),
(239, '45345E', '0', 3, 'WERWER', NULL, 1, 'WERWER', 1, NULL, '2016-06-20', '2016-06-20 09:02:56', '1', 'WERWERWER'),
(240, NULL, '0', 2, '78787878787878787', 3, 2, 'JHKKH', 1, NULL, '2016-06-01', '2016-06-29 19:09:34', '1', 'UYIUY'),
(241, '7656767', '0', 2, NULL, 3, 2, 'JHKKH', 2, NULL, '2016-06-01', '2016-06-29 19:09:34', '1', 'UYIUY');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoriabn`
--

CREATE TABLE `categoriabn` (
  `id_categoria` int(11) NOT NULL,
  `nom_cat` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `status` char(1) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categoriabn`
--

INSERT INTO `categoriabn` (`id_categoria`, `nom_cat`, `status`) VALUES
(1, 'EQUIPOS ELECTRONICOS', '1'),
(2, 'EQUIPOS DE TECNOLOGIA', '1'),
(3, 'EQUIPOS DE OFICINA', '1'),
(4, 'CCCCC', '1'),
(5, 'COMIDA', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `condicionbn`
--

CREATE TABLE `condicionbn` (
  `id_cond` int(11) NOT NULL,
  `nom_cond` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `colorBootstrap` text COLLATE utf8_spanish_ci NOT NULL,
  `status` char(1) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `condicionbn`
--

INSERT INTO `condicionbn` (`id_cond`, `nom_cond`, `colorBootstrap`, `status`) VALUES
(1, 'DISPONIBLE', 'success', '1'),
(2, 'ASIGNADO', 'info', '1'),
(3, 'DESINCORPORADO', 'error', '1'),
(4, 'PRESTADO', 'warning', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dentrada`
--

CREATE TABLE `dentrada` (
  `iddentrada` int(11) NOT NULL,
  `identrada` int(11) NOT NULL,
  `idarticulo` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `cantidadentregada` int(11) NOT NULL,
  `estatus` char(1) COLLATE utf8_bin NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `dentrada`
--

INSERT INTO `dentrada` (`iddentrada`, `identrada`, `idarticulo`, `cantidad`, `cantidadentregada`, `estatus`) VALUES
(1, 1, 1, 3, 3, '1'),
(2, 2, 1, 432, 20, '1'),
(3, 3, 1, 50, 50, '1'),
(4, 5, 4, 332, 0, '1'),
(5, 5, 2, 2, 0, '1'),
(6, 5, 1, 54, 0, '1'),
(7, 6, 2, 4, 1, '1'),
(8, 6, 1, 112, 1, '1'),
(9, 7, 2, 34, 2, '1'),
(10, 7, 3, 5, 2, '1'),
(11, 8, 2, 43, 2, '1'),
(12, 8, 1, 3, 3, '1'),
(13, 9, 2, 65, 50, '1'),
(14, 9, 1, 7, 5, '1'),
(15, 10, 2, 43, 2, '1'),
(16, 11, 4, 45, 234, '1'),
(17, 11, 5, 34, 234, '1'),
(18, 21, 1, 50, 0, '1'),
(19, 22, 2, 50, 40, '1'),
(20, 22, 4, 30, 30, '1'),
(21, 23, 1, 100, 100, '1'),
(22, 24, 6, 234, 200, '1'),
(23, 25, 1, 345, 300, '1'),
(24, 26, 2, 200, 0, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dmovimientobn`
--

CREATE TABLE `dmovimientobn` (
  `id_detalle_mov` int(11) NOT NULL,
  `id_mov` int(11) NOT NULL,
  `id_bien` int(11) NOT NULL,
  `status` char(1) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `dmovimientobn`
--

INSERT INTO `dmovimientobn` (`id_detalle_mov`, `id_mov`, `id_bien`, `status`) VALUES
(141, 117, 72, '1'),
(142, 117, 73, '1'),
(143, 117, 74, '1'),
(144, 117, 75, '1'),
(145, 118, 72, '1'),
(146, 119, 73, '1'),
(147, 120, 72, '1'),
(148, 121, 72, '1'),
(149, 122, 74, '1'),
(150, 123, 75, '1'),
(216, 217, 202, '1'),
(217, 217, 203, '1'),
(219, 219, 205, '1'),
(220, 220, 206, '1'),
(221, 221, 207, '1'),
(222, 222, 208, '1'),
(244, 249, 209, '1'),
(245, 250, 210, '1'),
(246, 251, 211, '1'),
(247, 252, 212, '1'),
(248, 253, 213, '0'),
(249, 254, 75, '1'),
(250, 254, 202, '1'),
(251, 254, 210, '1'),
(252, 254, 206, '1'),
(253, 254, 209, '1'),
(254, 255, 72, '1'),
(255, 256, 205, '0'),
(256, 256, 213, '0'),
(257, 256, 212, '0'),
(258, 256, 208, '1'),
(266, 266, 72, '1'),
(267, 266, 203, '1'),
(269, 268, 211, '1'),
(270, 269, 207, '1'),
(287, 291, 211, '1'),
(288, 292, 207, '1'),
(289, 293, 214, '1'),
(290, 293, 215, '1'),
(291, 293, 216, '1'),
(292, 294, 215, '1'),
(293, 294, 216, '1'),
(294, 294, 214, '1'),
(295, 295, 207, '1'),
(296, 295, 212, '1'),
(297, 296, 217, '1'),
(298, 296, 218, '1'),
(299, 297, 217, '1'),
(300, 298, 217, '0'),
(301, 299, 219, '1'),
(302, 299, 220, '1'),
(303, 300, 219, '1'),
(304, 300, 208, '1'),
(305, 301, 219, '1'),
(306, 301, 208, '1'),
(307, 302, 217, '1'),
(308, 303, 221, '1'),
(309, 304, 221, '1'),
(310, 305, 221, '1'),
(311, 306, 212, '1'),
(312, 307, 217, '1'),
(313, 308, 217, '1'),
(314, 309, 221, '1'),
(315, 310, 212, '1'),
(316, 311, 212, '1'),
(317, 312, 205, '1'),
(318, 313, 222, '1'),
(319, 314, 222, '1'),
(320, 315, 222, '1'),
(321, 316, 222, '1'),
(322, 317, 222, '1'),
(323, 318, 222, '1'),
(324, 319, 223, '1'),
(325, 320, 223, '1'),
(326, 320, 220, '1'),
(327, 321, 207, '1'),
(328, 322, 224, '1'),
(329, 323, 218, '1'),
(330, 323, 211, '1'),
(331, 323, 207, '1'),
(332, 323, 224, '1'),
(333, 324, 205, '1'),
(336, 339, 239, '1'),
(337, 340, 240, '1'),
(338, 340, 241, '1'),
(339, 341, 241, '1'),
(340, 341, 217, '1'),
(341, 342, 207, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dsalida`
--

CREATE TABLE `dsalida` (
  `iddsalida` int(11) NOT NULL,
  `idsalida` int(11) NOT NULL,
  `idarticulo` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `cantidadentregada` int(11) NOT NULL,
  `estatus` char(1) COLLATE utf8_bin NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `dsalida`
--

INSERT INTO `dsalida` (`iddsalida`, `idsalida`, `idarticulo`, `cantidad`, `cantidadentregada`, `estatus`) VALUES
(1, 1, 1, 31, 2, '1'),
(2, 2, 1, 45, 30, '1'),
(3, 3, 3, 20, 0, '1'),
(4, 4, 3, 40, 0, '1'),
(5, 4, 1, 40, 1, '1'),
(6, 5, 2, 543, 0, '1'),
(7, 5, 3, 64, 2, '1'),
(8, 6, 1, 34, 2, '1'),
(9, 6, 4, 42, 2, '1'),
(10, 7, 2, 21, 4, '1'),
(11, 8, 2, 45, 12, '1'),
(12, 9, 1, 200, 80, '1'),
(13, 10, 1, 123, 0, '1'),
(14, 11, 1, 200, 200, '1'),
(15, 11, 2, 50, 0, '1'),
(16, 11, 4, 80, 80, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcabn`
--

CREATE TABLE `marcabn` (
  `id_marca` int(11) NOT NULL,
  `nom_marca` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `status` char(1) COLLATE utf8_spanish_ci NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `marcabn`
--

INSERT INTO `marcabn` (`id_marca`, `nom_marca`, `status`) VALUES
(1, 'NINGUNA MARCAS', '2'),
(2, 'OPERACIONES', '1'),
(3, 'HP', '1'),
(4, 'LG', '1'),
(5, 'APPLE', '1'),
(6, 'ADIDAS', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modelobn`
--

CREATE TABLE `modelobn` (
  `id_modelo` int(11) NOT NULL,
  `idFmarca` int(11) NOT NULL,
  `nom_modelo` varchar(120) COLLATE utf8_spanish_ci NOT NULL,
  `status` char(1) COLLATE utf8_spanish_ci NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `modelobn`
--

INSERT INTO `modelobn` (`id_modelo`, `idFmarca`, `nom_modelo`, `status`) VALUES
(1, 4, 'LSETE', '1'),
(2, 2, 'PKWX', '1'),
(4, 3, 'WQEQWE', '1'),
(5, 4, 'GREGORIO25', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `motivobn`
--

CREATE TABLE `motivobn` (
  `id_motivo_mov` int(11) NOT NULL,
  `des_motivo_mov` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `tipo_motivo` int(11) NOT NULL,
  `status` char(1) COLLATE utf8_spanish_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `motivobn`
--

INSERT INTO `motivobn` (`id_motivo_mov`, `des_motivo_mov`, `tipo_motivo`, `status`) VALUES
(1, 'DONACIÃ“N', 1, '0'),
(2, 'COMPRA', 1, '1'),
(3, 'ERROR DE TRANSCRIPCIÃ“N', 2, '1'),
(4, 'ME FALTO UN BIEN', 2, '1'),
(5, 'SOLICITUD', 3, '1'),
(6, 'LE TOCABA', 4, '1'),
(7, 'ERROR DE MOVIMIENTO', 5, '1'),
(8, 'BIENES NACIONALES DAÃ‘ADOS', 5, '1'),
(10, 'ERROR DE MOVIMIENTO', 6, '1'),
(11, 'SOLICITUD EQUIVOCADA', 6, '1'),
(12, 'NECESIDAD', 3, '1'),
(13, 'ERROR DE DESINCORPORACIÃ“N', 7, '1'),
(14, 'DE VACACIONES', 8, '1'),
(15, 'YA NO ES USUARIO', 8, '1'),
(16, 'ERROR DE TRANSCRIPCIÃ“N', 9, '1'),
(17, 'EQUIVOCACIÃ³N DE DEVOLUCIÃ“N', 10, '1'),
(18, 'EXPIRACION DE CLAVES', 8, '1'),
(19, 'SOLICITUD DE COLABORACIÃ“N', 11, '1'),
(20, 'POR DESUSO', 12, '1'),
(23, 'EQWE', 1, '1'),
(24, 'CERRADO POR DUELO', 3, '1'),
(25, 'DONACIONNNNNNN', 11, '1'),
(26, 'DONACIONN', 11, '1'),
(27, 'EWRQWEQWEQEWQ', 4, '1'),
(28, 'ERWRWERWER', 3, '1'),
(29, 'TAZON', 6, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimientobn`
--

CREATE TABLE `movimientobn` (
  `id_mov` int(11) NOT NULL,
  `nro_document` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_reg` date NOT NULL,
  `hora_reg` time NOT NULL,
  `fecha_mov` date NOT NULL,
  `id_mov_prestamo` int(11) DEFAULT NULL,
  `FechaAcordada` date DEFAULT NULL,
  `idFresponsableente` int(11) DEFAULT NULL,
  `FechabnDevuelto` date DEFAULT NULL,
  `idFentefiador` int(11) DEFAULT NULL,
  `id_tipo_mov` int(11) NOT NULL,
  `id_prov` int(11) DEFAULT NULL,
  `id_per` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL COMMENT 'este campo representa el id del usuario que realizo el registro del movimiento',
  `id_motivo_mov` int(11) NOT NULL,
  `id_periodo` int(11) DEFAULT NULL,
  `id_dep` int(11) DEFAULT NULL,
  `id_resp_dep` int(11) DEFAULT NULL,
  `observacion_mov` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `id_usuario_anulacion` int(11) DEFAULT NULL COMMENT 'este campo representa el id del usuario que realizo la anulacion del movimiento',
  `fecha_anulacion` date DEFAULT NULL,
  `id_motivo_anulacion` int(11) DEFAULT NULL,
  `status` char(1) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `movimientobn`
--

INSERT INTO `movimientobn` (`id_mov`, `nro_document`, `fecha_reg`, `hora_reg`, `fecha_mov`, `id_mov_prestamo`, `FechaAcordada`, `idFresponsableente`, `FechabnDevuelto`, `idFentefiador`, `id_tipo_mov`, `id_prov`, `id_per`, `id_usuario`, `id_motivo_mov`, `id_periodo`, `id_dep`, `id_resp_dep`, `observacion_mov`, `id_usuario_anulacion`, `fecha_anulacion`, `id_motivo_anulacion`, `status`) VALUES
(117, 'RECE1', '2015-05-23', '01:39:25', '2015-05-13', NULL, NULL, NULL, NULL, NULL, 1, 2, 3, 1, 1, 6, 2, 1, 'OBSER RECEP', 0, '0000-00-00', 0, '1'),
(118, 'ASIG1', '2015-05-23', '01:40:27', '2015-05-15', NULL, NULL, NULL, NULL, NULL, 2, NULL, 3, 1, 5, 6, 1, 1, 'OBSER ASIG1', 0, '0000-00-00', 0, '1'),
(119, 'ASIG2', '2015-05-23', '01:41:04', '2015-05-19', NULL, NULL, NULL, NULL, NULL, 2, NULL, 1, 1, 12, 6, 3, 5, 'OBSER ASIG 2', 0, '0000-00-00', 0, '1'),
(120, 'DEV1', '2015-05-23', '01:42:11', '2015-05-22', NULL, NULL, NULL, NULL, NULL, 3, NULL, 2, 1, 11, 6, 1, 1, 'OBSER DEV 1', 0, '0000-00-00', 0, '1'),
(121, 'ASIG3', '2015-05-23', '01:43:05', '2015-05-21', NULL, NULL, NULL, NULL, NULL, 2, NULL, 5, 1, 5, 6, 1, 2, 'OBSER ASIG 3', 0, '0000-00-00', 0, '1'),
(122, 'DESIN1', '2015-05-23', '01:45:09', '2015-05-22', NULL, NULL, NULL, NULL, NULL, 4, NULL, 3, 1, 8, 6, NULL, NULL, 'OBSER DESIN 1', 1, '2015-05-23', 16, '1'),
(123, 'PREST1', '2015-05-23', '01:45:09', '2015-05-22', NULL, '2016-04-11', 4, NULL, 1, 5, NULL, 3, 1, 8, 6, NULL, NULL, 'OBSER DESIN 1', 1, '2015-05-23', 16, '1'),
(217, 'ytuy', '2016-04-25', '11:01:22', '1990-01-01', NULL, NULL, NULL, NULL, NULL, 1, 2, 4, 5, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1'),
(219, 'QWEQ234', '2016-04-28', '19:57:48', '2016-04-28', NULL, NULL, NULL, NULL, NULL, 1, 4, 3, 5, 1, NULL, NULL, NULL, 'NULL', NULL, NULL, NULL, '1'),
(220, '45345', '2016-04-28', '20:03:35', '2016-04-09', NULL, NULL, NULL, NULL, NULL, 1, 3, 3, 5, 2, NULL, NULL, NULL, 'NULL', NULL, NULL, NULL, '1'),
(221, 'REWR23423', '2016-04-28', '20:07:54', '2016-04-27', NULL, NULL, NULL, NULL, NULL, 1, 3, 4, 5, 1, 0, NULL, NULL, 'NULL', NULL, NULL, NULL, '1'),
(222, 'ERT345345', '2016-04-28', '20:11:24', '2016-04-28', NULL, NULL, NULL, NULL, NULL, 1, 3, 2, 5, 2, NULL, NULL, NULL, 'ERTERTERT', NULL, NULL, NULL, '1'),
(249, 'QWEQWE', '2016-05-03', '01:39:34', '2016-05-01', NULL, NULL, NULL, NULL, NULL, 1, 3, 2, 5, 1, NULL, NULL, NULL, 'qweqweqwe', NULL, NULL, NULL, '1'),
(250, 'QWEQWEQWE', '2016-05-03', '01:46:35', '2016-05-01', NULL, NULL, NULL, NULL, NULL, 1, 4, 3, 5, 1, NULL, NULL, NULL, 'qweqweqwe', NULL, NULL, NULL, '1'),
(251, 'WQEQWE', '2016-05-03', '02:02:21', '2016-05-01', NULL, NULL, NULL, NULL, NULL, 1, 2, 2, 5, 2, NULL, NULL, NULL, 'QWEQWEQ', NULL, NULL, NULL, '1'),
(252, 'QWEQWE213', '2016-05-03', '02:04:15', '2016-05-01', NULL, NULL, NULL, NULL, NULL, 1, 2, 5, 5, 1, NULL, NULL, NULL, 'qweqweqwe', NULL, NULL, NULL, '1'),
(253, 'WEQWEQWE', '2016-05-03', '16:57:32', '2016-05-01', NULL, NULL, NULL, NULL, NULL, 1, 3, 3, 5, 1, NULL, NULL, NULL, 'NULL', 0, '2016-06-07', 4, '0'),
(254, 'WERWER345', '2016-05-03', '16:58:37', '2016-05-01', NULL, NULL, NULL, NULL, NULL, 2, NULL, 1, 5, 5, NULL, 2, 4, 'werwerwer', NULL, NULL, NULL, '1'),
(255, 'ERWQQREWE', '2016-05-03', '17:00:22', '2016-05-02', NULL, NULL, NULL, NULL, NULL, 3, NULL, 1, 5, 11, NULL, 1, 3, 'werwerwer', NULL, NULL, NULL, '1'),
(256, '324234WER', '2016-05-03', '17:02:09', '2016-05-01', NULL, NULL, NULL, NULL, NULL, 4, NULL, 3, 5, 7, NULL, NULL, NULL, 'qweqeqwe', 0, '2016-05-25', 3, '1'),
(266, 'WERWER32', '2016-05-03', '17:08:49', '2016-05-01', NULL, '2016-05-27', 5, NULL, 1, 5, NULL, 1, 5, 19, NULL, NULL, NULL, 'erwrwer', NULL, NULL, NULL, '1'),
(268, 'QWEQW23', '2016-05-03', '17:13:18', '2016-05-01', NULL, '2016-05-27', 2, '2016-05-01', 1, 5, NULL, 2, 5, 19, NULL, NULL, NULL, 'qweqwe', NULL, NULL, NULL, '1'),
(269, 'DSAFADASD', '2016-05-23', '04:58:07', '2016-05-01', NULL, '2016-05-30', 3, '2016-05-25', 1, 5, NULL, 1, 5, 19, NULL, NULL, NULL, 'asdasd', NULL, NULL, NULL, '1'),
(291, 'YIYUIY', '2016-05-25', '11:58:38', '2016-05-01', 268, '2016-05-27', 3, '2016-05-01', 1, 6, NULL, 3, 5, 20, NULL, NULL, NULL, 'fhghfg', NULL, NULL, NULL, '1'),
(292, 'SDFASDF43', '2016-05-25', '13:30:11', '2016-05-25', 269, '2016-05-30', 3, '2016-05-25', 1, 6, NULL, 2, 5, 20, NULL, NULL, NULL, 'wrwerwer', NULL, NULL, NULL, '1'),
(293, '1234', '2016-05-25', '16:35:05', '1870-05-01', NULL, NULL, NULL, NULL, NULL, 1, 10, 2, 5, 1, NULL, NULL, NULL, 'hjkhdsahf', NULL, NULL, NULL, '1'),
(294, '4321', '2016-05-25', '16:45:38', '1959-05-01', NULL, NULL, NULL, NULL, NULL, 2, NULL, 1, 5, 12, NULL, 2, 1, 'jhdfjashd', NULL, NULL, NULL, '1'),
(295, '4312', '2016-05-25', '16:50:51', '2009-05-01', NULL, NULL, NULL, NULL, NULL, 2, NULL, 2, 5, 5, NULL, 1, 1, 'njhgjhsdf', NULL, NULL, NULL, '1'),
(296, 'REAZU', '2016-05-26', '20:56:24', '2016-05-01', NULL, NULL, NULL, NULL, NULL, 1, 8, 2, 5, 1, NULL, NULL, NULL, 'qweqweqwe', NULL, NULL, NULL, '1'),
(297, 'PREST', '2016-05-26', '20:57:39', '2016-05-01', NULL, '2016-05-29', 3, '2016-05-04', 4, 5, NULL, 2, 5, 19, NULL, NULL, NULL, 'werwerwer', NULL, NULL, NULL, '1'),
(298, 'EWRWERWER', '2016-05-26', '20:58:35', '2016-05-01', NULL, '2016-05-29', 5, '2016-05-01', 4, 6, NULL, 4, 5, 20, NULL, NULL, NULL, 'werwerwer', 0, '2016-05-26', 3, '0'),
(299, '123456789', '2016-05-28', '11:01:02', '2015-05-01', NULL, NULL, NULL, NULL, NULL, 1, 2, 1, 5, 1, NULL, NULL, NULL, 'NULL', NULL, NULL, NULL, '1'),
(300, 'MESA', '2016-05-28', '11:06:58', '2016-05-15', NULL, '2016-06-30', 1, '2016-05-01', 1, 5, NULL, 5, 5, 26, NULL, NULL, NULL, 'NULL', NULL, NULL, NULL, '1'),
(301, '12323426', '2016-05-28', '11:11:17', '2016-05-01', 300, '2016-06-30', 3, '2016-05-01', 1, 6, NULL, 1, 5, 20, NULL, NULL, NULL, 'NULL', NULL, NULL, NULL, '1'),
(302, '232323232', '2016-05-28', '11:15:24', '2016-05-04', 297, '2016-05-29', 4, '2016-05-04', 4, 6, NULL, 2, 5, 20, NULL, NULL, NULL, 'NULL', NULL, NULL, NULL, '1'),
(303, '112233445', '2016-05-28', '11:50:47', '2016-05-28', NULL, NULL, NULL, NULL, NULL, 1, 2, 1, 5, 1, NULL, NULL, NULL, 'NULL', NULL, NULL, NULL, '1'),
(304, '111111111', '2016-05-28', '11:59:34', '2016-05-28', NULL, NULL, NULL, NULL, NULL, 2, NULL, 1, 5, 12, NULL, 4, 1, 'NULL', NULL, NULL, NULL, '1'),
(305, '12341234', '2016-05-28', '12:05:42', '2016-05-28', NULL, NULL, NULL, NULL, NULL, 3, NULL, 1, 5, 10, NULL, 4, 1, 'NULL', NULL, NULL, NULL, '1'),
(306, '123123123', '2016-05-28', '12:08:25', '2016-05-28', NULL, NULL, NULL, NULL, NULL, 3, NULL, 1, 5, 10, NULL, 1, 1, 'NULL', NULL, NULL, NULL, '1'),
(307, '1235679', '2016-05-28', '12:19:47', '2016-05-28', NULL, NULL, NULL, NULL, NULL, 2, NULL, 1, 5, 5, NULL, 4, 1, 'NULL', NULL, NULL, NULL, '1'),
(308, '12345679', '2016-05-28', '12:22:27', '2016-05-28', NULL, NULL, NULL, NULL, NULL, 3, NULL, 1, 5, 11, NULL, 4, 1, 'NULL', NULL, NULL, NULL, '1'),
(309, '11111333', '2016-05-28', '12:24:42', '2016-05-28', NULL, NULL, NULL, NULL, NULL, 4, NULL, 1, 5, 7, NULL, NULL, NULL, 'NULL', NULL, NULL, NULL, '1'),
(310, '143434513', '2016-05-28', '12:31:15', '2016-05-28', NULL, '2016-05-31', 3, '2016-05-28', 2, 5, NULL, 1, 5, 19, NULL, NULL, NULL, 'NULL', NULL, NULL, NULL, '1'),
(311, '1KB21K2HB', '2016-05-28', '12:42:31', '2016-05-28', 310, '2016-05-31', 1, '2016-05-28', 2, 6, NULL, 1, 5, 20, NULL, NULL, NULL, 'NULL', NULL, NULL, NULL, '1'),
(312, 'VNGNHFGNJ', '2016-05-28', '12:47:21', '2016-05-28', NULL, '2016-05-29', 1, '2016-06-01', 4, 5, NULL, 1, 5, 19, NULL, NULL, NULL, 'NULL', NULL, NULL, NULL, '1'),
(313, 'MARIA', '2016-05-28', '12:49:51', '2016-05-28', NULL, NULL, NULL, NULL, NULL, 1, 6, 1, 5, 1, NULL, NULL, NULL, 'NULL', NULL, NULL, NULL, '1'),
(314, 'MARIAL', '2016-05-28', '12:53:36', '2016-05-28', NULL, NULL, NULL, NULL, NULL, 2, NULL, 1, 5, 12, NULL, 4, 1, 'NULL', NULL, NULL, NULL, '1'),
(315, 'NIEVESR', '2016-05-28', '12:56:40', '2016-05-28', NULL, NULL, NULL, NULL, NULL, 3, NULL, 1, 5, 10, NULL, 4, 1, 'NULL', NULL, NULL, NULL, '1'),
(316, 'RODRIGUEZ', '2016-05-28', '12:58:50', '2016-05-28', NULL, '2016-05-30', 1, '2016-05-28', 2, 5, NULL, 1, 5, 19, NULL, NULL, NULL, 'NULL', NULL, NULL, NULL, '1'),
(317, 'MARIALAUR', '2016-05-28', '13:02:58', '2016-05-28', 316, '2016-05-30', 1, '2016-05-28', 2, 6, NULL, 1, 5, 20, NULL, NULL, NULL, 'NULL', NULL, NULL, NULL, '1'),
(318, 'LAURANIEV', '2016-05-28', '13:04:02', '2016-05-28', NULL, NULL, NULL, NULL, NULL, 4, NULL, 1, 5, 8, NULL, NULL, NULL, 'NULL', NULL, NULL, NULL, '1'),
(319, '9875', '2016-05-31', '16:27:47', '2016-05-01', NULL, NULL, NULL, NULL, NULL, 1, 6, 6, 5, 1, NULL, NULL, NULL, 'llego bie', NULL, NULL, NULL, '1'),
(320, '9090', '2016-05-31', '16:32:10', '2016-05-31', NULL, NULL, NULL, NULL, NULL, 2, NULL, 6, 5, 5, NULL, 3, 6, 'azazaz', NULL, NULL, NULL, '1'),
(321, '123', '2016-05-31', '16:35:13', '2016-05-31', NULL, NULL, NULL, NULL, NULL, 3, NULL, 2, 5, 10, NULL, 1, 6, 'acacacaca', NULL, NULL, NULL, '1'),
(322, 'WERWERW', '2016-05-31', '17:17:56', '2016-05-01', NULL, NULL, NULL, NULL, NULL, 1, 6, 5, 5, 1, NULL, NULL, NULL, 'werwerw', NULL, NULL, NULL, '1'),
(323, 'SADASD', '2016-05-31', '17:18:58', '2016-05-01', NULL, NULL, NULL, NULL, NULL, 2, NULL, 3, 5, 12, NULL, 2, 2, 'dasdasda', NULL, NULL, NULL, '1'),
(324, 'WERWER', '2016-06-20', '02:47:06', '2016-06-01', 312, '2016-05-29', 5, '2016-06-01', 4, 6, NULL, 2, 5, 20, NULL, NULL, NULL, 'ertertert', NULL, NULL, NULL, '1'),
(339, 'R56456', '2016-06-20', '04:32:56', '2016-06-20', NULL, NULL, NULL, NULL, NULL, 1, 6, 4, 5, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1'),
(340, 'RD321.-', '2016-06-29', '14:39:34', '2016-06-01', NULL, NULL, NULL, NULL, NULL, 1, 7, 1, 5, 23, NULL, NULL, NULL, 'JHHU', NULL, NULL, NULL, '1'),
(341, 'RT5345345', '2016-06-30', '04:12:26', '2016-06-30', NULL, NULL, NULL, NULL, NULL, 2, NULL, 3, 5, 12, NULL, 3, 4, 'qrqwrqwr', NULL, NULL, NULL, '1'),
(342, '43534RE', '2016-07-06', '22:29:45', '2016-07-01', NULL, NULL, NULL, NULL, NULL, 3, NULL, 1, 5, 11, NULL, 1, 3, 'werwerwer', NULL, NULL, NULL, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `participante_familiar`
--

CREATE TABLE `participante_familiar` (
  `tparticipante_idparticipante` int(11) NOT NULL,
  `tfamiliar_idfamiliar` char(9) NOT NULL,
  `idparentesco` int(11) NOT NULL,
  `representante` char(1) NOT NULL DEFAULT '0',
  `estatus` char(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `participante_familiar`
--

INSERT INTO `participante_familiar` (`tparticipante_idparticipante`, `tfamiliar_idfamiliar`, `idparentesco`, `representante`, `estatus`) VALUES
(1, '9837744', 2, '1', '1'),
(2, '11078708', 2, '1', '1'),
(3, '15493031', 2, '1', '1'),
(4, '16964940', 2, '1', '1'),
(5, '19170250', 2, '1', '1'),
(6, '11540170', 1, '0', '1'),
(6, '11847486', 2, '1', '1'),
(7, '11542861', 2, '1', '1'),
(8, '20157379', 2, '1', '1'),
(9, '18732314', 2, '1', '1'),
(10, '99999999', 10, '1', '1'),
(11, '17364390', 2, '1', '1'),
(12, '99999999', 10, '1', '1'),
(13, '99999999', 10, '1', '1'),
(14, '11079158', 2, '1', '1'),
(15, '99999999', 10, '1', '1'),
(16, '21563851', 2, '1', '1'),
(17, '99999999', 10, '1', '1'),
(18, '99999999', 10, '1', '1'),
(19, '99999999', 10, '1', '1'),
(20, '99999999', 10, '1', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id_prov` int(11) NOT NULL,
  `des_prov` char(100) COLLATE utf8_spanish_ci NOT NULL,
  `rif_prov` char(15) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `status` char(1) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id_prov`, `des_prov`, `rif_prov`, `telefono`, `status`) VALUES
(1, 'COPOSA', 'COPOREW', '0412-5412312', '1'),
(2, 'ALCALDIA', 'ASDQWE', '0412-5412312', '1'),
(3, 'BANCO OBRERO', 'JASDASDAD', '0412-5412312', '1'),
(4, 'PRUEBA154', 'J343', '0412-5412312', '1'),
(5, 'CORPOELEC', 'J-34534-0', '0412-5412312', '1'),
(6, 'IANCARINA', 'J-12345-1', '0412-5412312', '1'),
(7, 'QWEQ', 'qweqwe', '0412-5412312', '1'),
(8, 'WERWER', 'werwer', '0412-5412312', '1'),
(9, 'QWEQWE', '234234e', '0412-5412312', '1'),
(10, 'DANIEL', '12345qwert', '0412-5412312', '1'),
(11, 'JOSE', '12345qwert', '0412-5412312', '1'),
(12, 'GREGORIO', '21394280-0', '0412-5412312', '0'),
(13, 'CACHAPA', '1234', '0412-5412312', '0'),
(14, 'CANTV', '23851797', '0412-5412312', '1'),
(15, '34234', 'J-2342342342', NULL, '1'),
(16, '32423424', 'g-3423423423', NULL, '1'),
(17, 'YOSLEIDI', ' 23851797', NULL, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tacceso`
--

CREATE TABLE `tacceso` (
  `idacceso` int(11) NOT NULL,
  `idusuario` varchar(20) NOT NULL,
  `exitoacc` char(1) NOT NULL,
  `fechaacc` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_salidaacc` datetime DEFAULT NULL,
  `ultima_actividadacc` datetime NOT NULL,
  `ipacc` varchar(15) NOT NULL,
  `estatusacc` char(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tacceso`
--

INSERT INTO `tacceso` (`idacceso`, `idusuario`, `exitoacc`, `fechaacc`, `fecha_salidaacc`, `ultima_actividadacc`, `ipacc`, `estatusacc`) VALUES
(2, 'administrador', '1', '2015-03-20 04:19:02', '2015-03-23 19:03:51', '2015-03-20 00:10:59', '127.0.0.1', '0'),
(4, 'administrador', '1', '2015-03-20 14:59:10', '2015-03-23 19:03:51', '2015-03-20 11:29:00', '127.0.0.1', '0'),
(5, 'administrador', '1', '2015-03-23 22:32:39', '2015-03-23 19:03:51', '2015-03-23 18:29:11', '192.168.1.100', '0'),
(6, '15491963', '1', '2015-03-23 22:43:55', '2015-03-23 18:19:22', '2015-03-23 18:18:54', '192.168.1.80', '0'),
(7, '15491963', '1', '2015-03-23 22:51:48', '2015-03-23 20:10:54', '2015-03-23 18:45:35', '192.168.1.80', '0'),
(8, '17960877', '1', '2015-03-23 23:08:42', '2015-03-23 20:14:02', '2015-03-23 20:12:12', '192.168.1.102', '0'),
(9, 'administrador', '1', '2015-03-23 23:34:00', '2015-03-23 20:38:17', '2015-03-23 20:37:30', '192.168.1.100', '0'),
(10, '15491963', '0', '2015-03-23 23:53:23', NULL, '0000-00-00 00:00:00', '::1', '0'),
(11, '155491963', '0', '2015-03-23 23:53:48', NULL, '0000-00-00 00:00:00', '::1', '0'),
(12, '15491963', '0', '2015-03-23 23:54:35', NULL, '0000-00-00 00:00:00', '::1', '0'),
(13, '15491963', '0', '2015-03-23 23:55:09', NULL, '0000-00-00 00:00:00', '::1', '0'),
(14, '15491963', '0', '2015-03-23 23:55:42', NULL, '0000-00-00 00:00:00', '::1', '0'),
(15, '15491963', '0', '2015-03-24 00:05:24', NULL, '0000-00-00 00:00:00', '192.168.1.80', '0'),
(16, '15491963', '0', '2015-03-24 00:11:08', NULL, '0000-00-00 00:00:00', '::1', '0'),
(17, '12526145', '1', '2015-03-24 00:16:15', '2015-03-23 19:50:24', '2015-03-23 19:50:17', '192.168.1.103', '0'),
(18, '15491963', '1', '2015-03-24 00:18:56', '2015-03-23 20:10:54', '2015-03-23 19:58:37', '::1', '0'),
(19, '12526145', '1', '2015-03-24 00:21:04', '2015-03-23 20:09:34', '2015-03-23 19:52:19', '192.168.1.103', '0'),
(20, '12526145', '1', '2015-03-24 00:39:50', '2015-03-23 20:10:42', '2015-03-23 20:10:31', '192.168.1.103', '0'),
(21, '15491963', '1', '2015-03-24 00:41:00', '2015-03-23 20:38:31', '2015-03-23 20:24:52', '::1', '0'),
(22, '12526145', '1', '2015-03-24 00:43:57', '2015-03-23 20:17:07', '2015-03-23 20:17:02', '192.168.1.103', '0'),
(23, '17960877', '1', '2015-03-24 00:44:56', '2015-03-23 20:26:43', '2015-03-23 20:15:36', '192.168.1.102', '0'),
(24, '17960877', '1', '2015-03-24 00:56:40', '2015-03-24 18:39:56', '2015-03-23 20:46:20', '192.168.1.102', '0'),
(25, '12526145', '1', '2015-03-24 01:05:55', '2015-03-24 18:35:01', '2015-03-23 20:36:54', '192.168.1.103', '0'),
(26, '15491963', '1', '2015-03-24 22:44:00', '2015-03-24 19:54:11', '2015-03-24 18:47:42', '::1', '0'),
(27, '12526145', '1', '2015-03-24 23:05:04', '2015-03-24 18:44:30', '2015-03-24 18:35:52', '192.168.1.100', '0'),
(28, 'administrador', '1', '2015-03-24 23:12:01', '2015-03-24 20:08:52', '2015-03-24 20:08:43', '192.168.1.102', '0'),
(29, '12526145', '1', '2015-03-24 23:15:34', '2015-03-24 18:56:34', '2015-03-24 18:55:39', '192.168.1.100', '0'),
(30, '17960877', '1', '2015-03-24 23:24:40', '2015-03-24 19:03:09', '2015-03-24 19:01:16', '192.168.1.101', '0'),
(31, '12526145', '1', '2015-03-24 23:26:58', '2015-03-24 19:15:21', '2015-03-24 19:13:42', '192.168.1.100', '0'),
(32, '17960877', '1', '2015-03-24 23:36:18', '2015-03-24 19:11:06', '2015-03-24 19:10:58', '192.168.1.101', '0'),
(33, '17960877', '1', '2015-03-24 23:42:11', '2015-03-24 19:15:04', '2015-03-24 19:14:41', '192.168.1.101', '0'),
(34, '17960877', '1', '2015-03-24 23:46:16', '2015-03-24 20:08:40', '2015-03-24 20:06:53', '192.168.1.101', '0'),
(35, '12526145', '1', '2015-03-24 23:48:52', '2015-03-24 22:13:51', '2015-03-24 22:08:53', '192.168.1.100', '0'),
(36, '18672728', '1', '2015-03-25 00:09:16', '2015-03-24 19:48:38', '2015-03-24 19:45:23', '192.168.1.103', '0'),
(37, '15491963', '1', '2015-03-25 00:43:39', '2015-05-04 14:55:47', '2015-03-24 21:13:31', '::1', '0'),
(40, '18672728', '1', '2015-03-25 01:42:30', '2015-03-24 22:15:12', '2015-03-24 22:12:29', '192.168.1.104', '0'),
(41, '15491963', '1', '2015-03-25 02:21:09', '2015-05-04 14:55:47', '2015-03-24 21:57:24', '::1', '0'),
(42, '15491963', '1', '2015-03-25 04:32:27', '2015-05-04 14:55:47', '2015-03-25 00:08:55', '::1', '0'),
(44, 'administrador', '1', '2015-03-26 13:26:54', '2015-03-26 12:21:22', '2015-03-26 12:01:36', '127.0.0.1', '0'),
(45, 'administrador', '1', '2015-03-27 14:32:51', '2015-03-27 10:58:13', '2015-03-27 10:46:55', '127.0.0.1', '0'),
(46, 'administrador', '1', '2013-04-23 13:18:56', '2013-04-23 15:26:58', '2013-04-23 13:11:38', '127.0.0.1', '0'),
(47, 'administrador', '1', '2013-04-23 18:27:05', '2013-04-23 15:40:11', '2013-04-23 15:32:28', '127.0.0.1', '0'),
(48, 'administrador', '1', '2015-05-22 18:44:11', '2015-05-22 16:04:11', '2015-05-22 16:04:08', '127.0.0.1', '0'),
(49, 'administrador', '1', '2015-05-22 21:24:55', NULL, '2015-05-22 18:44:13', '127.0.0.1', '0'),
(50, 'administrador', '1', '2015-05-22 22:06:46', '2015-05-22 19:10:24', '2015-05-22 19:09:11', '127.0.0.1', '0'),
(54, '15491963', '0', '2015-04-23 04:33:18', NULL, '0000-00-00 00:00:00', '::1', '0'),
(55, '15491963', '1', '2015-04-23 04:33:55', '2015-05-04 14:55:47', '2015-04-23 00:05:50', '::1', '0'),
(56, '15491963', '1', '2015-04-23 04:54:02', '2015-05-04 14:55:47', '2015-04-23 00:26:13', '::1', '0'),
(57, '15491963', '1', '2015-04-23 13:57:57', '2015-04-23 09:43:46', '2015-04-23 09:32:54', '::1', '0'),
(58, '15491963', '1', '2015-04-23 19:32:21', '2015-05-04 14:55:47', '2015-04-23 15:09:07', '::1', '0'),
(59, '15491963', '1', '2015-04-24 19:47:49', '2015-05-04 14:55:47', '2015-04-24 15:30:28', '::1', '0'),
(60, '15491963', '1', '2015-04-24 21:01:20', '2015-05-04 14:55:47', '2015-04-24 16:31:52', '::1', '0'),
(61, '15491963', '1', '2015-04-24 21:15:34', '2015-04-24 18:20:14', '2015-04-24 18:13:20', '::1', '0'),
(62, '15491963', '1', '2015-04-25 01:02:00', '2015-05-04 14:55:47', '2015-04-24 20:53:26', '::1', '0'),
(63, '15491963', '1', '2015-04-25 01:59:04', '2015-05-04 14:55:47', '2015-04-24 21:29:47', '::1', '0'),
(64, '15491963', '1', '2015-04-25 05:06:24', '2015-04-25 02:31:26', '2015-04-25 02:31:23', '::1', '0'),
(65, '15491963', '1', '2015-04-25 19:38:58', '2015-05-04 14:55:47', '2015-04-25 15:09:42', '::1', '0'),
(66, '15491963', '1', '2015-04-25 20:54:44', '2015-05-04 14:55:47', '2015-04-25 17:34:50', '::1', '0'),
(67, '15491963', '1', '2015-04-26 16:16:25', '2015-04-26 12:25:48', '2015-04-26 12:25:08', '::1', '0'),
(68, '15491963', '1', '2015-04-26 16:56:32', '2015-04-26 12:31:15', '2015-04-26 12:31:12', '::1', '0'),
(69, '15491963', '1', '2015-04-26 17:02:10', '2015-04-26 16:29:27', '2015-04-26 16:29:19', '::1', '0'),
(70, '15491963', '1', '2015-04-27 03:22:48', '2015-05-04 14:55:47', '2015-04-27 02:18:34', '::1', '0'),
(71, '15491963', '1', '2015-04-27 06:56:52', '2015-05-04 14:55:47', '2015-04-27 02:27:34', '::1', '0'),
(72, '15491963', '1', '2015-04-27 13:44:12', '2015-05-04 14:55:47', '2015-04-27 10:21:49', '::1', '0'),
(73, '15491963', '1', '2015-04-27 19:16:31', '2015-05-04 14:55:47', '2015-04-27 17:32:36', '::1', '0'),
(74, '15491963', '1', '2015-04-28 00:30:56', '2015-04-27 20:18:00', '2015-04-27 20:17:59', '::1', '0'),
(75, '15491963', '1', '2015-04-28 00:48:21', '2015-05-04 14:55:47', '2015-04-27 20:18:57', '::1', '0'),
(76, '15491963', '0', '2015-04-28 00:51:21', NULL, '0000-00-00 00:00:00', '::1', '0'),
(77, '15491963', '1', '2015-04-28 00:51:58', '2015-05-04 14:55:47', '2015-04-27 22:44:02', '::1', '0'),
(78, '15491963', '1', '2015-04-29 01:40:15', '2015-05-04 14:55:47', '2015-04-28 22:12:02', '::1', '0'),
(79, '15491963', '1', '2015-04-29 04:30:10', '2015-05-04 14:55:47', '2015-04-29 00:57:45', '::1', '0'),
(80, '15491963', '1', '2015-04-29 05:30:39', '2015-05-04 14:55:47', '2015-04-29 01:01:11', '::1', '0'),
(81, '15491963', '1', '2015-04-29 13:45:09', '2015-05-04 14:55:47', '2015-04-29 10:45:43', '::1', '0'),
(82, '15491963', '1', '2015-04-29 15:52:13', '2015-05-04 14:55:47', '2015-04-29 12:06:47', '::1', '0'),
(83, '15491963', '1', '2015-04-29 17:52:08', '2015-05-04 14:55:47', '2015-04-29 16:12:47', '::1', '0'),
(84, '15491963', '1', '2015-04-29 20:57:59', '2015-05-04 14:55:47', '2015-04-29 16:37:00', '::1', '0'),
(85, '15491963', '1', '2015-04-29 21:55:51', '2015-05-04 14:55:47', '2015-04-29 17:44:31', '::1', '0'),
(86, '15491963', '1', '2015-04-30 00:24:33', '2015-04-29 20:47:07', '2015-04-29 20:47:04', '::1', '0'),
(87, '15491963', '1', '2015-05-01 19:02:58', '2015-05-01 14:37:39', '2015-05-01 14:37:21', '::1', '0'),
(88, '15491963', '1', '2015-05-01 19:35:52', '2015-05-01 17:45:35', '2015-05-01 17:45:30', '::1', '0'),
(89, '12526145', '0', '2015-05-01 19:37:33', NULL, '0000-00-00 00:00:00', '192.168.1.100', '0'),
(90, '12526145', '1', '2015-05-01 19:38:09', '2015-05-01 17:52:27', '2015-05-01 17:47:44', '192.168.1.100', '0'),
(91, 'administrador', '0', '2015-05-01 20:39:27', NULL, '0000-00-00 00:00:00', '192.168.1.102', '0'),
(92, '15491963', '0', '2015-05-01 22:15:41', NULL, '0000-00-00 00:00:00', '::1', '0'),
(93, '15491963', '1', '2015-05-01 22:16:05', '2015-05-01 18:09:58', '2015-05-01 18:02:39', '::1', '0'),
(94, '15491963', '1', '2015-05-01 23:59:32', '2015-05-04 14:55:47', '2015-05-01 19:31:57', '::1', '0'),
(95, '15491963', '1', '2015-05-02 05:58:23', '2015-05-02 02:24:54', '2015-05-02 02:24:50', '::1', '0'),
(96, '15491963', '1', '2015-05-02 07:33:58', '2015-05-02 03:11:01', '2015-05-02 03:10:58', '::1', '0'),
(97, '15491963', '1', '2015-05-02 07:43:53', '2015-05-02 03:15:18', '2015-05-02 03:15:11', '::1', '0'),
(98, '15491963', '1', '2015-05-02 07:45:31', '2015-05-02 03:19:44', '2015-05-02 03:19:41', '::1', '0'),
(99, '15491963', '1', '2015-05-02 11:39:14', '2015-05-02 07:11:48', '2015-05-02 07:10:46', '::1', '0'),
(100, '15491963', '1', '2015-05-02 13:03:03', '2015-05-02 08:54:14', '2015-05-02 08:51:25', '::1', '0'),
(101, '15491963', '1', '2015-05-02 13:24:15', '2015-05-04 14:55:47', '2015-05-02 08:54:46', '::1', '0'),
(102, '15491963', '1', '2015-05-02 13:29:32', '2015-05-02 09:10:32', '2015-05-02 09:10:22', '::1', '0'),
(103, '15491963', '1', '2015-05-02 14:01:28', '2015-05-02 10:07:55', '2015-05-02 10:07:17', '::1', '0'),
(104, '15491963', '1', '2015-05-02 14:40:22', '2015-05-02 10:54:26', '2015-05-02 10:51:06', '::1', '0'),
(105, '15491963', '1', '2015-05-02 16:56:17', '2015-05-02 12:57:15', '2015-05-02 12:56:13', '::1', '0'),
(106, '15491963', '1', '2015-05-03 21:54:59', '2015-05-04 14:55:47', '2015-05-03 18:36:35', '::1', '0'),
(107, '15491963', '1', '2015-05-03 23:31:18', '2015-05-04 14:55:47', '2015-05-03 19:04:02', '::1', '0'),
(108, '15491963', '1', '2015-05-04 04:04:30', '2015-05-04 14:55:47', '2015-05-04 01:10:35', '::1', '0'),
(109, '15491963', '1', '2015-05-04 05:48:47', '2015-05-04 01:20:47', '2015-05-04 01:20:37', '::1', '0'),
(110, '15491963', '1', '2015-05-04 13:42:43', '2015-05-04 14:55:47', '2015-05-04 10:53:54', '::1', '0'),
(111, '15491963', '1', '2015-05-04 19:25:38', '2015-05-04 16:51:32', '2015-05-04 16:50:46', '::1', '0'),
(112, '15491963', '1', '2015-05-04 22:24:05', '2015-05-04 18:17:45', '2015-05-04 18:17:25', '::1', '0'),
(113, '15491963', '1', '2015-05-05 00:25:07', '2015-05-04 21:25:48', '2015-05-04 21:25:42', '::1', '0'),
(114, '15491963', '1', '2015-05-05 02:52:14', '2015-05-04 22:48:02', '2015-05-04 22:45:43', '::1', '0'),
(115, '15491963', '1', '2015-05-05 03:19:33', '2015-05-04 23:33:47', '2015-05-04 23:33:37', '::1', '0'),
(116, '15491963', '1', '2015-05-05 14:26:31', NULL, '2015-05-05 10:27:56', '::1', '0'),
(117, '15491963', '1', '2015-05-05 19:10:13', NULL, '2015-05-05 16:00:04', '::1', '0'),
(118, '15491963', '1', '2015-05-06 02:04:05', '2015-05-06 01:19:40', '2015-05-06 01:19:34', '::1', '0'),
(119, '15491963', '1', '2015-05-06 13:32:25', NULL, '2015-05-06 11:56:09', '::1', '0'),
(120, '15491963', '1', '2015-05-06 19:24:43', '2015-05-06 15:54:24', '2015-05-06 15:54:12', '::1', '0'),
(121, '15491963', '0', '2015-05-07 01:00:56', NULL, '0000-00-00 00:00:00', '::1', '0'),
(122, '15491963', '1', '2015-05-07 01:01:10', NULL, '2015-05-06 20:31:35', '::1', '0'),
(123, '15491963', '1', '2015-05-07 01:01:11', NULL, '2015-05-06 20:45:50', '::1', '0'),
(124, '15491963', '1', '2015-05-07 01:17:08', '2015-05-06 21:56:57', '2015-05-06 21:56:13', '::1', '0'),
(125, '155491963', '0', '2015-05-07 13:50:05', NULL, '0000-00-00 00:00:00', '::1', '0'),
(126, '15491963', '1', '2015-05-07 13:50:33', NULL, '2015-05-07 11:54:41', '::1', '0'),
(127, '15491963', '1', '2015-05-07 18:48:44', NULL, '2015-05-07 17:42:37', '::1', '0'),
(128, 'administrador', '1', '2015-05-08 00:39:42', '2015-05-07 20:10:58', '2015-05-07 20:10:13', '127.0.0.1', '0'),
(129, 'administrador', '0', '2015-05-08 00:41:24', NULL, '0000-00-00 00:00:00', '127.0.0.1', '0'),
(130, 'administrador', '1', '2015-05-08 00:41:30', '2015-05-08 02:46:50', '2015-05-08 02:41:27', '127.0.0.1', '0'),
(131, '15491963', '1', '2015-05-08 14:25:38', '2015-05-09 09:15:46', '2015-05-08 10:59:19', '::1', '0'),
(132, '145491963', '0', '2015-05-08 16:09:10', NULL, '0000-00-00 00:00:00', '::1', '0'),
(133, '15491963', '1', '2015-05-08 16:09:25', '2015-05-09 09:15:46', '2015-05-08 11:57:56', '::1', '0'),
(134, '15491963', '1', '2015-05-08 18:48:33', '2015-05-08 15:33:22', '2015-05-08 15:33:09', '::1', '0'),
(135, '15491963', '1', '2015-05-09 00:13:18', '2015-05-08 21:37:22', '2015-05-08 21:36:19', '::1', '0'),
(136, '15491963', '1', '2015-05-09 02:21:05', '2015-05-09 09:15:46', '2015-05-08 22:31:43', '::1', '0'),
(137, '15491963', '1', '2015-05-09 12:01:43', '2015-05-09 08:10:42', '2015-05-09 08:10:40', '::1', '0'),
(138, '15491963', '0', '2015-05-09 12:41:33', NULL, '0000-00-00 00:00:00', '::1', '0'),
(139, '15491963', '0', '2015-05-09 12:41:44', NULL, '0000-00-00 00:00:00', '::1', '0'),
(140, '15491963', '1', '2015-05-09 12:41:57', '2015-05-09 09:15:46', '2015-05-09 08:12:52', '::1', '0'),
(141, 'administrador', '0', '2015-05-09 13:45:55', NULL, '0000-00-00 00:00:00', '::1', '0'),
(142, 'administrador', '0', '2015-05-09 13:46:18', NULL, '0000-00-00 00:00:00', '::1', '0'),
(143, 'administrador', '0', '2015-05-09 13:46:44', NULL, '0000-00-00 00:00:00', '::1', '0'),
(144, 'administrador', '0', '2015-05-09 13:47:09', NULL, '0000-00-00 00:00:00', '::1', '0'),
(145, 'administrador', '1', '2015-05-09 13:49:42', '2015-05-09 09:33:31', '2015-05-09 09:23:46', '::1', '0'),
(146, '15491963', '1', '2015-05-09 14:03:23', '2015-05-09 10:43:35', '2015-05-09 10:40:25', '::1', '0'),
(147, '15491963', '1', '2015-05-14 02:23:07', '2016-01-19 16:34:32', '2015-05-13 22:54:17', '::1', '0'),
(148, '15491963', '1', '2015-05-14 03:27:26', '2016-01-19 16:34:32', '2015-05-13 22:57:59', '::1', '0'),
(149, '15491963', '1', '2015-05-14 03:29:46', '2015-05-13 23:26:57', '2015-05-13 23:25:43', '::1', '0'),
(150, '15491963', '1', '2015-05-14 04:03:02', '2015-05-14 00:19:51', '2015-05-14 00:14:17', '::1', '0'),
(151, '15491963', '0', '2015-05-14 05:04:56', NULL, '0000-00-00 00:00:00', '::1', '0'),
(152, '15491963', '1', '2015-05-14 05:05:23', '2016-01-19 16:34:32', '2015-05-14 00:56:52', '::1', '0'),
(153, '15491963', '0', '2015-05-16 14:20:50', NULL, '0000-00-00 00:00:00', '::1', '0'),
(154, '15491963', '0', '2015-05-16 14:21:12', NULL, '0000-00-00 00:00:00', '::1', '0'),
(155, '15491963', '1', '2015-05-16 14:21:37', '2016-01-19 16:34:32', '2015-05-16 10:36:44', '::1', '0'),
(156, '15491963', '1', '2015-05-16 20:25:43', '2016-01-19 16:34:32', '2015-05-16 16:07:57', '::1', '0'),
(157, '15491963', '1', '2015-05-21 00:38:43', '2015-05-20 20:12:54', '2015-05-20 20:12:52', '::1', '0'),
(158, 'administrador', '1', '2015-10-06 22:24:26', '2015-10-06 18:05:34', '2015-10-06 18:04:27', '::1', '0'),
(159, 'administrador', '1', '2015-10-06 22:37:40', '2015-10-06 22:22:41', '2015-10-06 18:28:01', '::1', '0'),
(160, '12526145', '0', '2015-11-24 05:05:19', NULL, '0000-00-00 00:00:00', '::1', '0'),
(161, '15491963', '0', '2015-11-24 05:06:48', NULL, '0000-00-00 00:00:00', '::1', '0'),
(162, '15491963', '0', '2015-11-24 05:06:59', NULL, '0000-00-00 00:00:00', '::1', '0'),
(163, '15491963', '0', '2015-11-24 05:08:26', NULL, '0000-00-00 00:00:00', '::1', '0'),
(164, '15491963', '0', '2015-11-24 05:08:37', NULL, '0000-00-00 00:00:00', '::1', '0'),
(165, '15491963', '0', '2015-11-24 05:08:46', NULL, '0000-00-00 00:00:00', '::1', '0'),
(166, '15491963', '1', '2015-11-24 05:17:30', '2016-01-19 16:34:32', '2015-11-24 00:59:23', '::1', '0'),
(167, '15491963', '1', '2015-11-24 05:30:37', '2016-01-19 16:34:32', '2015-11-24 03:51:42', '::1', '0'),
(168, '18672728', '1', '2015-11-24 05:49:16', '2015-11-24 02:58:51', '2015-11-24 02:55:45', '186.91.236.186', '0'),
(169, '15491963', '1', '2016-01-15 21:12:42', '2016-01-19 16:34:32', '2016-01-15 16:42:43', '::1', '0'),
(170, '15491963', '1', '2016-01-19 16:13:29', '2016-01-19 16:34:32', '2016-01-19 11:45:04', '::1', '0'),
(171, '15491963', '1', '2016-01-19 21:04:36', '2016-01-19 16:50:41', '2016-01-19 16:50:39', '::1', '0'),
(172, '15491963', '1', '2016-01-19 21:20:44', '2016-01-20 15:22:00', '2016-01-19 17:31:36', '::1', '0'),
(173, '15491963', '1', '2016-01-20 18:11:47', '2016-01-20 15:22:00', '2016-01-20 13:54:34', '::1', '0'),
(174, '15491963', '1', '2016-01-20 19:52:03', '2016-01-20 16:49:16', '2016-01-20 16:49:15', '::1', '0'),
(175, '15491963', '1', '2016-01-20 21:19:21', '2016-01-21 14:28:27', '2016-01-20 17:17:13', '::1', '0'),
(176, '15491963', '1', '2016-01-20 21:55:35', '2016-01-21 14:28:27', '2016-01-20 17:49:29', '::1', '0'),
(177, '15491963', '1', '2016-01-21 19:01:11', '2016-01-21 17:17:02', '2016-01-21 15:26:20', '::1', '0'),
(178, '15491963', '1', '2016-01-21 21:47:05', '2016-01-22 11:02:59', '2016-01-21 18:06:30', '::1', '0'),
(179, '15491963', '1', '2016-01-24 02:10:45', '2016-01-23 23:19:55', '2016-01-23 21:46:54', '::1', '0'),
(180, 'Master', '0', '2016-03-16 17:45:36', NULL, '0000-00-00 00:00:00', '::1', '0'),
(181, 'Master', '0', '2016-03-16 17:45:50', NULL, '0000-00-00 00:00:00', '::1', '0'),
(182, 'administrador', '1', '2016-03-16 17:46:40', '2016-03-16 16:16:03', '2016-03-16 13:36:28', '::1', '0'),
(183, 'administrador', '0', '2016-03-19 16:20:36', NULL, '0000-00-00 00:00:00', '::1', '0'),
(184, 'administrador', '1', '2016-03-19 16:20:48', '2016-04-03 20:41:25', '2016-03-19 12:53:53', '::1', '0'),
(185, 'administrador', '1', '2016-03-19 17:30:48', '2016-03-19 13:05:47', '2016-03-19 13:03:50', '::1', '0'),
(186, 'administrador', '1', '2016-03-19 17:42:59', '2016-03-19 15:52:29', '2016-03-19 15:42:05', '::1', '0'),
(187, 'administrador', '1', '2016-03-19 20:22:57', '2016-03-19 16:18:56', '2016-03-19 16:18:52', '192.168.0.106', '0'),
(188, 'administrador', '1', '2016-03-19 20:54:35', '2016-03-19 16:25:01', '2016-03-19 16:24:42', '::1', '0'),
(189, 'administrador', '1', '2016-03-19 21:26:03', '2016-04-03 20:41:25', '2016-03-19 17:04:49', '::1', '0'),
(190, 'administrador', '0', '2016-04-02 20:37:16', NULL, '0000-00-00 00:00:00', '::1', '0'),
(191, 'administrador', '1', '2016-04-02 20:37:51', '2016-04-02 16:23:01', '2016-04-02 16:18:41', '::1', '0'),
(192, 'administrador', '1', '2016-04-02 20:56:00', '2016-04-03 20:41:25', '2016-04-02 18:09:23', '::1', '0'),
(193, 'administrador', '1', '2016-04-03 23:31:00', '2016-04-03 20:41:25', '2016-04-03 19:24:06', '::1', '0'),
(194, 'administrador', '1', '2016-04-09 19:35:12', '2016-04-09 15:07:40', '2016-04-09 15:06:06', '::1', '0'),
(195, 'administrador', '1', '2016-04-09 19:39:48', '2016-04-09 18:31:40', '2016-04-09 15:48:23', '::1', '0'),
(196, 'administrador', '0', '2016-04-14 12:21:59', NULL, '0000-00-00 00:00:00', '::1', '0'),
(197, 'administrador', '1', '2016-04-14 12:22:19', '2016-04-15 16:45:08', '2016-04-14 09:31:05', '::1', '0'),
(198, 'administrador', '1', '2016-04-15 15:06:38', '2016-04-15 13:47:37', '2016-04-15 13:47:34', '::1', '0'),
(199, 'administrador', '1', '2016-04-15 18:14:33', '2016-04-15 13:44:39', '2016-04-15 13:44:33', '::1', '0'),
(200, 'administrador', '1', '2016-04-15 18:14:51', '2016-04-15 16:45:08', '2016-04-15 13:44:52', '::1', '0'),
(201, 'administrador', '1', '2016-04-15 18:15:57', '2016-04-15 16:45:08', '2016-04-15 13:47:15', '::1', '0'),
(202, 'administrador', '1', '2016-04-15 18:18:13', '2016-04-15 16:45:08', '2016-04-15 14:08:11', '::1', '0'),
(203, 'administrador', '1', '2016-04-15 21:15:45', '2016-04-15 18:13:15', '2016-04-15 18:13:14', '::1', '0'),
(204, 'administrador', '1', '2016-04-15 22:43:29', '2016-04-15 21:01:47', '2016-04-15 18:28:01', '::1', '0'),
(205, 'administrador', '1', '2016-04-16 02:25:21', '2016-04-16 01:21:46', '2016-04-15 23:19:38', '::1', '0'),
(206, 'administrador', '1', '2016-04-16 15:48:06', '2016-04-16 11:56:35', '2016-04-16 11:56:34', '::1', '0'),
(207, 'administrador', '1', '2016-04-16 16:27:13', '2016-04-16 13:42:55', '2016-04-16 13:42:35', '::1', '0'),
(208, 'administrador', '1', '2016-04-16 18:13:39', '2016-04-16 18:01:36', '2016-04-16 15:54:03', '::1', '0'),
(209, 'administrador', '1', '2016-04-16 22:41:40', '2016-04-16 20:55:03', '2016-04-16 19:24:28', '::1', '0'),
(210, 'administrador', '1', '2016-04-17 01:25:14', '2016-04-17 01:21:38', '2016-04-16 23:27:10', '::1', '0'),
(211, 'administrador', '1', '2016-04-17 06:53:30', '2016-04-17 10:41:51', '2016-04-17 04:15:23', '::1', '0'),
(212, 'administrador', '1', '2016-04-17 16:05:12', '2016-04-17 12:41:25', '2016-04-17 12:40:20', '::1', '0'),
(213, 'administrador', '1', '2016-04-17 17:11:35', '2016-04-17 14:05:11', '2016-04-17 12:46:03', '::1', '0'),
(214, 'administrador', '1', '2016-04-17 18:35:20', '2016-04-17 15:30:07', '2016-04-17 14:09:29', '::1', '0'),
(215, 'administrador', '1', '2016-04-17 20:00:16', '2016-04-17 21:17:40', '2016-04-17 15:49:38', '::1', '0'),
(216, 'administrador', '1', '2016-04-18 05:02:02', '2016-04-18 10:20:32', '2016-04-18 01:27:08', '::1', '0'),
(217, 'administrador', '1', '2016-04-18 16:12:34', '2016-04-18 21:39:44', '2016-04-18 11:58:53', '::1', '0'),
(218, 'administrador', '1', '2016-04-19 16:31:25', '2016-04-19 15:47:10', '2016-04-19 12:02:04', '::1', '0'),
(219, 'administrador', '1', '2016-04-19 20:19:06', '2016-04-19 17:08:01', '2016-04-19 15:54:05', '::1', '0'),
(220, 'administrador', '1', '2016-04-19 23:33:19', '2016-04-19 22:51:11', '2016-04-19 20:17:35', '::1', '0'),
(221, 'administrador', '1', '2016-04-20 03:21:22', '2016-04-20 12:09:59', '2016-04-20 01:18:44', '::1', '0'),
(222, 'administrador', '1', '2016-04-20 17:29:22', '2016-04-20 20:56:21', '2016-04-20 14:10:00', '::1', '0'),
(223, 'administrador', '1', '2016-04-21 02:09:27', '2016-04-20 23:45:50', '2016-04-20 23:45:48', '::1', '0'),
(224, 'administrador', '1', '2016-04-21 13:34:18', '2016-04-21 12:35:51', '2016-04-21 09:18:28', '::1', '0'),
(225, 'administrador', '1', '2016-04-21 17:52:53', '2016-04-21 15:53:13', '2016-04-21 15:52:47', '::1', '0'),
(226, 'administrador', '1', '2016-04-21 20:24:37', '2016-04-21 15:55:55', '2016-04-21 15:55:23', '::1', '0'),
(227, 'administrador', '1', '2016-04-21 20:26:58', '2016-04-21 22:56:27', '2016-04-21 15:57:34', '::1', '0'),
(228, 'administrador', '1', '2016-04-24 05:39:47', '2016-04-24 11:37:01', '2016-04-24 01:37:53', '::1', '0'),
(229, 'administrador', '1', '2016-04-24 16:57:55', '2016-04-24 15:43:08', '2016-04-24 12:35:39', '::1', '0'),
(230, 'administrador', '1', '2016-04-24 20:13:17', '2016-04-24 18:09:11', '2016-04-24 16:29:59', '::1', '0'),
(231, 'administrador', '1', '2016-04-24 22:40:18', '2016-04-24 18:49:59', '2016-04-24 18:49:58', '::1', '0'),
(232, 'administrador', '1', '2016-04-24 23:21:55', '2016-04-24 18:54:56', '2016-04-24 18:52:01', '::1', '0'),
(233, 'administrador', '1', '2016-04-24 23:25:37', '2016-04-25 00:15:27', '2016-04-24 19:01:28', '::1', '0'),
(234, 'administrador', '1', '2016-04-25 04:45:37', '2016-04-25 10:58:39', '2016-04-25 00:40:00', '::1', '0'),
(235, 'administrador', '1', '2016-04-25 15:28:54', '2016-04-25 12:30:50', '2016-04-25 11:03:30', '::1', '0'),
(236, 'administrador', '1', '2016-04-25 17:01:02', '2016-04-25 20:37:06', '2016-04-25 15:54:14', '::1', '0'),
(237, 'administrador', '1', '2016-04-26 02:37:19', '2016-04-25 23:55:27', '2016-04-25 22:07:19', '::1', '0'),
(238, 'administrador', '1', '2016-04-26 04:25:35', '2016-04-26 00:59:12', '2016-04-26 00:59:09', '::1', '0'),
(239, 'administrador', '1', '2016-04-27 02:59:25', '2016-04-27 14:38:26', '2016-04-27 01:10:40', '::1', '0'),
(240, 'administrador', '1', '2016-04-28 04:43:26', '2016-04-28 12:01:10', '2016-04-28 00:13:37', '::1', '0'),
(241, 'administrador', '1', '2016-04-29 00:25:15', '2016-04-28 22:59:51', '2016-04-28 21:36:29', '::1', '0'),
(242, 'administrador', '1', '2016-04-29 03:29:59', '2016-04-29 10:17:31', '2016-04-29 00:06:27', '::1', '0'),
(243, 'administrador', '1', '2016-04-29 15:56:57', '2016-04-29 19:07:10', '2016-04-29 14:50:33', '::1', '0'),
(244, 'administrador', '1', '2016-04-29 23:37:19', '2016-04-30 08:54:45', '2016-04-30 01:41:55', '::1', '0'),
(245, 'administrador', '1', '2016-04-30 14:14:41', '2016-04-30 13:23:03', '2016-04-30 10:41:34', '::1', '0'),
(246, 'administrador', '1', '2016-04-30 17:53:13', '2016-05-01 07:37:00', '2016-04-30 16:21:21', '::1', '0'),
(247, 'administrador', '1', '2016-05-01 16:23:18', '2016-05-01 13:49:58', '2016-05-01 12:23:00', '::1', '0'),
(248, 'administrador', '1', '2016-05-01 18:20:22', '2016-05-01 17:05:14', '2016-05-01 15:53:21', '::1', '0'),
(249, 'administrador', '1', '2016-05-01 21:35:24', '2016-05-02 11:31:32', '2016-05-01 21:46:57', '::1', '0'),
(250, '23052336', '0', '2016-05-01 22:01:36', NULL, '0000-00-00 00:00:00', '::1', '0'),
(251, 'administrador', '1', '2016-05-02 18:35:21', '2016-05-02 22:12:37', '2016-05-02 14:05:26', '::1', '0'),
(252, 'administrador', '1', '2016-05-03 04:00:03', '2016-05-03 12:04:08', '2016-05-03 04:28:01', '::1', '0'),
(253, 'administrador', '1', '2016-05-03 21:26:15', '2016-05-03 17:33:06', '2016-05-03 17:23:47', '::1', '0'),
(254, 'administrador', '1', '2016-05-06 17:04:57', '2016-05-06 16:52:47', '2016-05-06 13:09:37', '::1', '0'),
(255, 'administrador', '1', '2016-05-07 19:49:59', '2016-05-07 19:41:37', '2016-05-07 15:34:17', '::1', '0'),
(256, 'administrador', '1', '2016-05-08 00:55:17', '2016-05-07 23:33:47', '2016-05-07 20:33:03', '::1', '0'),
(257, 'administrador', '1', '2016-05-08 04:03:55', '2016-05-08 10:47:55', '2016-05-08 00:39:22', '::1', '0'),
(258, 'administrador', '1', '2016-05-08 23:43:59', '2016-05-08 20:55:16', '2016-05-08 19:14:00', '::1', '0'),
(259, 'administrador', '1', '2016-05-09 01:25:37', '2016-05-09 01:52:34', '2016-05-08 21:21:13', '::1', '0'),
(260, 'administrador', '1', '2016-05-10 18:37:47', '2016-05-11 05:19:35', '2016-05-10 14:10:18', '::1', '0'),
(261, 'administrador', '1', '2016-05-10 19:21:35', '2016-05-11 05:19:35', '2016-05-10 17:15:02', '::1', '0'),
(262, 'administrador', '1', '2016-05-13 03:42:26', '2016-05-13 04:14:29', '2016-05-12 23:34:53', '::1', '0'),
(263, 'administrador', '1', '2016-05-13 20:53:57', '2016-05-14 19:46:51', '2016-05-14 11:25:37', '::1', '0'),
(264, 'administrador', '1', '2016-05-14 15:15:58', '2016-05-14 19:46:51', '2016-05-14 11:14:24', '192.168.0.106', '0'),
(265, 'administrador', '1', '2016-05-15 00:45:20', '2016-05-14 21:18:52', '2016-05-14 20:15:26', '::1', '0'),
(266, 'administrador', '1', '2016-05-15 01:49:03', '2016-05-15 18:29:18', '2016-05-15 00:40:32', '::1', '0'),
(267, 'administrador', '1', '2016-05-16 00:14:27', '2016-05-15 21:17:02', '2016-05-15 19:44:27', '::1', '0'),
(268, 'administrador', '1', '2016-05-16 01:47:11', '2016-05-16 00:38:40', '2016-05-15 22:14:07', '::1', '0'),
(269, 'administrador', '1', '2016-05-16 05:08:51', '2016-05-16 03:29:13', '2016-05-16 00:39:08', '::1', '0'),
(270, 'administrador', '1', '2016-05-16 07:59:22', '2016-05-16 10:01:49', '2016-05-16 05:38:53', '::1', '0'),
(271, 'administrador', '0', '2016-05-16 14:45:31', NULL, '0000-00-00 00:00:00', '::1', '0'),
(272, 'administrador', '1', '2016-05-16 14:45:45', '2016-05-16 19:46:01', '2016-05-16 11:24:21', '::1', '0'),
(273, 'administrador', '1', '2016-05-18 08:53:55', '2016-05-18 14:44:33', '2016-05-18 06:33:41', '::1', '0'),
(274, 'administrador', '1', '2016-05-18 20:11:23', '2016-05-18 20:38:54', '2016-05-18 17:48:41', '::1', '0'),
(275, 'administrador', '1', '2016-05-19 01:09:03', '2016-05-19 00:43:45', '2016-05-18 22:51:59', '::1', '0'),
(276, 'administrador', '1', '2016-05-19 05:17:02', '2016-05-19 03:54:00', '2016-05-19 01:27:57', '::1', '0'),
(277, 'administrador', '1', '2016-05-20 00:44:00', '2016-05-19 22:25:20', '2016-05-19 20:15:25', '::1', '0'),
(278, 'administrador', '1', '2016-05-20 02:55:33', '2016-05-20 00:49:00', '2016-05-19 22:25:38', '::1', '0'),
(279, 'administrador', '1', '2016-05-21 05:18:59', '2016-05-21 05:45:07', '2016-05-21 00:50:53', '::1', '0'),
(280, 'administrador', '1', '2016-05-21 10:15:18', '2016-05-21 12:01:19', '2016-05-21 05:45:27', '::1', '0'),
(281, 'administrador', '1', '2016-05-23 07:30:02', '2016-05-23 14:41:18', '2016-05-23 05:01:45', '::1', '0'),
(282, 'admministrador', '0', '2016-05-24 04:58:08', NULL, '0000-00-00 00:00:00', '::1', '0'),
(283, 'administrador', '1', '2016-05-24 04:58:46', '2016-05-24 03:28:14', '2016-05-24 01:07:27', '::1', '0'),
(284, 'administrador', '1', '2016-05-24 07:58:27', '2016-05-24 05:09:21', '2016-05-24 03:35:21', '::1', '0'),
(285, 'administrador', '1', '2016-05-24 09:39:30', '2016-05-24 14:01:03', '2016-05-24 06:07:28', '::1', '0'),
(286, 'administrador', '0', '2016-05-24 18:54:05', NULL, '0000-00-00 00:00:00', '::1', '0'),
(287, 'admionistrador', '0', '2016-05-24 18:54:17', NULL, '0000-00-00 00:00:00', '::1', '0'),
(295, 'administrador', '1', '2016-05-25 20:34:32', '2016-05-25 16:08:22', '2016-05-25 16:06:46', '192.168.0.110', '0'),
(296, '18672728', '1', '2016-05-25 20:34:51', '2016-05-25 21:31:43', '2016-05-25 16:46:33', '::1', '0'),
(297, 'administrador', '1', '2016-05-25 20:38:53', '2016-05-25 16:09:43', '2016-05-25 16:08:53', '192.168.0.110', '0'),
(298, 'adm inistrador', '0', '2016-05-25 20:40:18', NULL, '0000-00-00 00:00:00', '192.168.0.110', '0'),
(299, 'administrador', '1', '2016-05-25 20:40:39', '2016-05-26 03:55:45', '2016-05-25 16:54:21', '192.168.0.110', '0'),
(300, 'administrador', '1', '2016-05-26 03:19:52', '2016-05-26 03:55:45', '2016-05-25 22:49:58', '::1', '0'),
(301, 'administrador', '1', '2016-05-26 09:28:42', '2016-05-26 17:43:14', '2016-05-26 06:18:28', '::1', '0'),
(302, 'administrador', '1', '2016-05-27 01:23:54', '2016-05-26 23:53:38', '2016-05-26 22:09:09', '::1', '0'),
(303, 'administrador', '1', '2016-05-27 04:24:29', '2016-05-27 01:22:04', '2016-05-27 00:19:50', '::1', '0'),
(304, 'administrador', '0', '2016-05-27 05:52:16', NULL, '0000-00-00 00:00:00', '::1', '0'),
(305, 'administrador', '1', '2016-05-27 05:52:25', '2016-05-27 05:15:33', '2016-05-27 03:17:17', '::1', '0'),
(306, 'administrador', '1', '2016-05-28 15:20:19', '2016-05-28 11:32:15', '2016-05-28 11:23:57', '::1', '0'),
(307, 'administrador', '1', '2016-05-28 16:02:53', '2016-05-28 14:30:35', '2016-05-28 13:04:52', '::1', '0'),
(308, 'administrador', '1', '2016-05-29 02:38:46', '2016-05-29 01:27:42', '2016-05-28 22:18:39', '::1', '0'),
(309, 'administrador', '1', '2016-05-29 07:38:28', '2016-05-29 12:44:20', '2016-05-29 03:59:36', '::1', '0'),
(310, 'administrador', '1', '2016-05-30 05:22:50', '2016-05-30 03:46:29', '2016-05-30 01:12:09', '::1', '0'),
(311, 'administrador', '1', '2016-05-30 08:16:38', '2016-05-30 15:35:00', '2016-05-30 03:46:43', '::1', '0'),
(312, 'administrador', '1', '2016-05-31 02:13:21', '2016-05-30 23:09:26', '2016-05-30 21:45:45', '::1', '0'),
(313, 'administrador', '1', '2016-05-31 20:19:31', '2016-05-31 16:17:58', '2016-05-31 15:49:32', '::1', '0'),
(314, 'administrador', '1', '2016-05-31 20:48:06', '2016-05-31 16:52:15', '2016-05-31 16:52:09', '192.168.0.111', '0'),
(315, '18672728', '1', '2016-05-31 21:04:05', '2016-06-19 00:02:03', '2016-05-31 16:38:35', '::1', '0'),
(316, 'administrador', '1', '2016-05-31 21:22:26', '2016-05-31 17:17:21', '2016-05-31 17:17:20', '192.168.0.111', '0'),
(317, 'administrador', '1', '2016-05-31 21:47:25', '2016-05-31 17:19:22', '2016-05-31 17:19:20', '192.168.0.111', '0'),
(318, 'administrador', '1', '2016-05-31 21:49:27', '2016-06-02 15:52:17', '2016-05-31 17:22:57', '192.168.0.111', '0'),
(319, 'administrador', '1', '2016-06-02 09:09:12', '2016-06-02 15:52:17', '2016-06-02 04:39:13', '::1', '0'),
(320, 'administrador', '1', '2016-06-02 21:35:29', '2016-06-02 21:59:47', '2016-06-02 17:38:58', '::1', '0'),
(321, 'administrador', '1', '2016-06-03 02:30:01', '2016-06-02 23:35:55', '2016-06-02 22:22:18', '::1', '0'),
(322, 'administrador', '1', '2016-06-04 05:54:18', '2016-06-04 08:42:04', '2016-06-04 06:37:02', '::1', '0'),
(323, 'administrador', '1', '2016-06-06 17:16:51', '2016-06-06 21:20:35', '2016-06-06 14:02:59', '::1', '0'),
(324, 'administrador', '1', '2016-06-08 00:28:02', '2016-06-07 21:12:11', '2016-06-07 20:01:05', '::1', '0'),
(325, 'administrador', '1', '2016-06-08 03:22:37', '2016-06-08 11:14:51', '2016-06-07 23:46:43', '::1', '0'),
(326, 'administrador', '1', '2016-06-10 03:09:39', '2016-06-10 06:57:38', '2016-06-09 22:59:46', '::1', '0'),
(327, 'administrador', '1', '2016-06-10 11:28:52', '2016-06-10 12:09:53', '2016-06-10 06:59:11', '::1', '0'),
(328, 'administrador', '1', '2016-06-10 16:40:07', '2016-06-13 13:08:02', '2016-06-10 12:57:43', '::1', '0'),
(329, 'administrador', '1', '2016-06-13 08:20:10', '2016-06-13 13:08:02', '2016-06-13 04:00:14', '::1', '0'),
(330, 'administrador', '1', '2016-06-15 02:39:00', '2016-06-15 00:28:23', '2016-06-14 23:02:52', '::1', '0'),
(331, 'administrador', '1', '2016-06-16 04:55:01', '2016-06-16 17:48:59', '2016-06-16 02:54:33', '::1', '0'),
(332, 'administrador', '1', '2016-06-18 04:59:06', '2016-06-18 13:24:29', '2016-06-18 00:29:15', '::1', '0'),
(333, 'administrador', '1', '2016-06-18 04:59:16', '2016-06-18 13:24:29', '2016-06-18 00:30:28', '::1', '0'),
(334, 'administrador', '1', '2016-06-18 19:24:43', '2016-06-18 16:47:27', '2016-06-18 15:50:39', '::1', '0'),
(335, 'administrador', '1', '2016-06-18 21:17:48', '2016-06-19 13:44:44', '2016-06-18 17:29:13', '192.168.0.105', '0'),
(336, '18672728', '1', '2016-06-18 22:37:59', '2016-06-19 00:02:03', '2016-06-18 18:22:54', '::1', '0'),
(337, 'administrador', '1', '2016-06-19 04:34:48', '2016-06-19 13:44:44', '2016-06-19 01:37:35', '::1', '0'),
(338, 'administrador', '1', '2016-06-20 03:53:29', '2016-06-20 08:34:28', '2016-06-20 06:08:08', '::1', '0'),
(339, 'administrador', '1', '2016-06-20 13:04:37', '2016-06-20 09:54:50', '2016-06-20 09:47:44', '::1', '0'),
(340, 'administrador', '1', '2016-06-20 14:25:00', '2016-06-20 10:00:20', '2016-06-20 10:00:19', '::1', '0'),
(341, 'administrador', '1', '2016-06-20 14:30:30', '2016-06-20 10:01:33', '2016-06-20 10:01:31', '::1', '0'),
(342, 'administrador', '1', '2016-06-20 14:31:50', '2016-06-20 10:04:06', '2016-06-20 10:04:04', '::1', '0'),
(343, 'administrador', '1', '2016-06-20 14:34:19', '2016-06-20 10:42:27', '2016-06-20 10:42:16', '::1', '0'),
(344, 'administrador', '1', '2016-06-20 15:12:38', NULL, '2016-06-20 14:37:46', '::1', '0'),
(345, 'administrador', '1', '2016-06-20 19:39:04', NULL, '2016-06-20 19:44:17', '::1', '0'),
(346, 'administrador', '1', '2016-06-22 03:41:39', NULL, '2016-06-21 23:11:44', '::1', '0'),
(347, 'administrador', '1', '2016-06-29 18:52:58', '2016-06-29 14:29:45', '2016-06-29 14:29:02', '192.168.0.103', '0'),
(348, 'dfrearqrwr', '0', '2016-06-29 18:59:52', NULL, '0000-00-00 00:00:00', '192.168.0.103', '0'),
(349, 'administrador', '1', '2016-06-29 19:00:27', '2016-06-29 14:30:38', '2016-06-29 14:30:27', '192.168.0.103', '0'),
(350, 'administrador', '1', '2016-06-29 19:01:43', NULL, '2016-06-29 14:51:32', '192.168.0.103', '0'),
(351, '18672728', '1', '2016-06-29 19:30:12', NULL, '2016-06-29 19:16:50', '::1', '0'),
(352, 'administrador', '1', '2016-06-29 19:41:27', NULL, '2016-06-29 15:16:54', '192.168.0.103', '0'),
(353, 'administrador', '1', '2016-06-29 19:47:59', NULL, '2016-06-29 15:26:23', '192.168.0.103', '0'),
(354, 'administrador', '1', '2016-06-29 23:47:33', NULL, '2016-06-29 23:09:18', '::1', '0'),
(355, 'administrador', '1', '2016-06-30 03:39:47', NULL, '2016-06-29 23:15:52', '::1', '0'),
(356, 'administrador', '1', '2016-06-30 04:51:49', '2016-06-30 04:17:24', '2016-06-30 04:12:38', '::1', '0'),
(357, 'administrador ', '1', '2016-07-02 16:48:26', NULL, '2016-07-02 12:31:56', '186.93.127.60', '0'),
(358, 'administrador', '1', '2016-07-02 22:14:59', NULL, '2016-07-02 17:45:00', '::1', '0'),
(359, 'administrador', '1', '2016-07-03 03:22:28', '2016-07-02 22:52:38', '2016-07-02 22:52:33', '::1', '0'),
(360, 'administrador', '1', '2016-07-04 23:25:29', '2016-07-04 19:15:43', '2016-07-04 19:15:22', '190.207.248.185', '0'),
(361, 'administrador', '0', '2016-07-05 00:09:07', NULL, '0000-00-00 00:00:00', '190.207.248.185', '0'),
(362, 'administrador', '1', '2016-07-05 00:10:29', '2016-07-04 19:48:19', '2016-07-04 19:40:29', '190.207.248.185', '0'),
(363, 'administrador', '1', '2016-07-05 00:41:10', '2016-07-04 20:55:06', '2016-07-04 20:55:01', '190.207.248.185', '0'),
(364, 'administrador', '1', '2016-07-05 20:39:08', NULL, '2016-07-05 16:09:16', '::1', '0'),
(365, 'administrador', '1', '2016-07-05 22:05:07', '2016-07-05 22:00:07', '2016-07-05 21:02:24', '190.207.248.185', '0'),
(366, 'administrador', '1', '2016-07-06 16:52:39', '2016-07-06 12:36:30', '2016-07-06 12:35:08', '190.207.248.185', '0'),
(367, 'administrador', '1', '2016-07-07 02:11:31', NULL, '2016-07-07 13:56:25', '::1', '0'),
(368, 'administrador', '1', '2016-07-12 16:50:41', NULL, '2016-07-12 12:28:49', '::1', '0'),
(369, 'administrador', '1', '2016-07-29 08:25:24', '2016-07-29 03:55:39', '2016-07-29 03:55:37', '::1', '0'),
(370, 'administrador', '1', '2016-08-08 19:46:27', '2016-08-08 15:17:06', '2016-08-08 15:16:28', '::1', '0'),
(371, 'administrador', '1', '2016-08-09 02:41:07', NULL, '2016-08-08 22:11:16', '::1', '0'),
(372, 'administrador', '0', '2016-10-07 23:41:46', NULL, '0000-00-00 00:00:00', '::1', '0'),
(373, 'administrador', '0', '2016-10-07 23:43:28', NULL, '0000-00-00 00:00:00', '::1', '0'),
(374, 'administrador', '0', '2016-10-07 23:44:26', NULL, '0000-00-00 00:00:00', '::1', '0'),
(375, 'administrador', '0', '2016-10-07 23:48:11', NULL, '0000-00-00 00:00:00', '::1', '0'),
(376, 'administrador', '0', '2016-10-07 23:48:44', NULL, '0000-00-00 00:00:00', '::1', '0'),
(377, 'administrador', '1', '2016-10-07 23:52:51', '2016-11-11 12:15:47', '2016-10-07 19:34:37', '::1', '0'),
(378, 'administrador', '0', '2016-11-11 16:31:29', NULL, '0000-00-00 00:00:00', '::1', '0'),
(379, 'administrador', '0', '2016-11-11 16:31:55', NULL, '0000-00-00 00:00:00', '::1', '0'),
(380, 'administrador', '0', '2016-11-11 16:33:03', NULL, '0000-00-00 00:00:00', '::1', '0'),
(381, 'administrador', '0', '2016-11-11 16:33:12', NULL, '0000-00-00 00:00:00', '::1', '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarea_conocimiento`
--

CREATE TABLE `tarea_conocimiento` (
  `idarea_conocimiento` int(11) NOT NULL,
  `nombreare` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `estatusare` char(1) COLLATE utf8_spanish2_ci DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tarea_conocimiento`
--

INSERT INTO `tarea_conocimiento` (`idarea_conocimiento`, `nombreare`, `estatusare`) VALUES
(1, 'ATENCION INTEGRAL TEMPRANA', '1'),
(2, 'BRAILLE LECTURA Y ESCRITURA', '1'),
(3, 'ORIENTACION Y MOVILIDAD', '1'),
(4, 'ACTIVIDADES DE LA VIDA DIARIA', '1'),
(5, 'DEPORTE Y RECREACION', '1'),
(6, 'ESTIMULACION VISUAL', '1'),
(7, 'TECNICAS DE INFORMACION  Y COMUNICACION', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarticulo`
--

CREATE TABLE `tarticulo` (
  `idarticulo` int(11) NOT NULL,
  `descripcionart` varchar(40) COLLATE utf8_bin NOT NULL,
  `idunidadmedida` int(11) NOT NULL,
  `idpresentacion` int(11) NOT NULL,
  `idgrupo` int(11) NOT NULL,
  `existencia` int(11) NOT NULL DEFAULT '0',
  `stockminimo` int(11) NOT NULL,
  `estatusart` char(1) COLLATE utf8_bin NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `tarticulo`
--

INSERT INTO `tarticulo` (`idarticulo`, `descripcionart`, `idunidadmedida`, `idpresentacion`, `idgrupo`, `existencia`, `stockminimo`, `estatusart`) VALUES
(1, 'CARTUCHO NRO 15', 4, 5, 1, 92, 3, '1'),
(2, 'SDFSDFASDA', 3, 2, 2, 40, 120, '1'),
(3, 'DSF', 3, 2, 2, 0, 120, '1'),
(4, 'ERTERT', 1, 2, 3, 182, 45, '1'),
(5, 'ASDASDA', 2, 1, 3, 234, 34, '1'),
(6, 'QWE342', 2, 2, 2, 200, 54, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tasignatura`
--

CREATE TABLE `tasignatura` (
  `idasignatura` int(11) NOT NULL,
  `nombreasi` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `horasteoricas` int(11) DEFAULT NULL,
  `horaspracticas` int(11) DEFAULT NULL,
  `tarea_idarea_conocimiento` int(11) NOT NULL,
  `estatusasi` char(1) COLLATE utf8_spanish2_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tasignatura`
--

INSERT INTO `tasignatura` (`idasignatura`, `nombreasi`, `horasteoricas`, `horaspracticas`, `tarea_idarea_conocimiento`, `estatusasi`) VALUES
(1, 'INFORMATICA', 4, 4, 7, '1'),
(2, 'AVD', 2, 3, 4, '1'),
(3, 'BRAILLE', 2, 4, 2, '1'),
(4, 'ATENCION TEMPRANA', 1, 4, 1, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tasistencia`
--

CREATE TABLE `tasistencia` (
  `idasistencia` int(11) NOT NULL,
  `idcurso_idparticipante` int(11) NOT NULL,
  `fechaasi` date NOT NULL,
  `asistenciaasi` char(1) COLLATE utf8_spanish2_ci NOT NULL,
  `observacionasi` text COLLATE utf8_spanish2_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tasistencia`
--

INSERT INTO `tasistencia` (`idasistencia`, `idcurso_idparticipante`, `fechaasi`, `asistenciaasi`, `observacionasi`) VALUES
(1, 1, '2015-05-09', '1', ''),
(2, 2, '2015-05-09', '1', ''),
(3, 3, '2015-05-09', '1', ''),
(4, 4, '2015-05-09', '1', ''),
(5, 5, '2015-05-09', '1', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tasistencia_objetivo`
--

CREATE TABLE `tasistencia_objetivo` (
  `tasistencia_idasistencia` int(11) NOT NULL,
  `tobjetivo_idobjetivo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tasistencia_objetivo`
--

INSERT INTO `tasistencia_objetivo` (`tasistencia_idasistencia`, `tobjetivo_idobjetivo`) VALUES
(1, 9),
(2, 9),
(3, 9),
(4, 9),
(5, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tasistencia_unidad`
--

CREATE TABLE `tasistencia_unidad` (
  `tasistencia_idasistencia` int(11) NOT NULL,
  `tunidad_idunidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tasistencia_unidad`
--

INSERT INTO `tasistencia_unidad` (`tasistencia_idasistencia`, `tunidad_idunidad`) VALUES
(1, 5),
(2, 5),
(3, 5),
(4, 5),
(5, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `taula`
--

CREATE TABLE `taula` (
  `idaula` int(11) NOT NULL,
  `nombreaul` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `tipoaul` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `capacidadaul` int(3) NOT NULL,
  `estatusaul` char(1) COLLATE utf8_spanish2_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `taula`
--

INSERT INTO `taula` (`idaula`, `nombreaul`, `tipoaul`, `capacidadaul`, `estatusaul`) VALUES
(1, 'AULA 1', 'AULA', 18, '1'),
(2, 'AULA 2', 'AULA', 20, '1'),
(3, 'AULA 3', 'AULA', 20, '1'),
(4, 'AULA 4', 'AULA', 18, '1'),
(5, 'AULA 5', 'AULA', 18, '1'),
(6, 'AULA 6', 'AULA', 17, '1'),
(7, 'AULA 7', 'AULA', 16, '1'),
(8, 'CBIT', 'LABORATORIO', 20, '1'),
(9, 'CANCHA MULTIPLE', 'CANCHA', 30, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbitacora`
--

CREATE TABLE `tbitacora` (
  `idbitacora` int(11) NOT NULL,
  `direccionbit` varchar(300) NOT NULL,
  `fechahorabit` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `valoranteriorbit` varchar(100) DEFAULT NULL,
  `valornuevobit` varchar(100) DEFAULT NULL,
  `ipbit` varchar(30) NOT NULL,
  `motivobit` varchar(20) NOT NULL,
  `operacionbit` varchar(20) NOT NULL,
  `campobit` varchar(45) NOT NULL,
  `tablabit` varchar(45) NOT NULL,
  `idusuario` varchar(20) NOT NULL,
  `serviciobit` varchar(50) NOT NULL DEFAULT 'Inicio'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbitacora`
--

INSERT INTO `tbitacora` (`idbitacora`, `direccionbit`, `fechahorabit`, `valoranteriorbit`, `valornuevobit`, `ipbit`, `motivobit`, `operacionbit`, `campobit`, `tablabit`, `idusuario`, `serviciobit`) VALUES
(1, '/caidv/vista/intranet.php', '2016-11-11 06:41:00', '', '', '::1', '-', 'Navegar', '-', '-', '', 'Panel_inicio');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tclave`
--

CREATE TABLE `tclave` (
  `idclave` int(11) NOT NULL,
  `clavecla` varchar(45) NOT NULL,
  `fechainiciocla` date NOT NULL,
  `fechafincla` date NOT NULL,
  `estatuscla` tinyint(1) NOT NULL DEFAULT '1',
  `tusuario_idusuario` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tclave`
--

INSERT INTO `tclave` (`idclave`, `clavecla`, `fechainiciocla`, `fechafincla`, `estatuscla`, `tusuario_idusuario`) VALUES
(1, '12345678', '2014-01-25', '2014-02-13', 1, 'administrador'),
(3, 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', '2014-02-13', '2014-10-15', 0, 'administrador'),
(9, 'a1ea88131cd3c74cee8e3f0712bfb707abe0e761', '2014-10-15', '2015-02-22', 0, 'administrador'),
(13, '7cc24b2198339d797e704bc53c6527dc6b400b59', '2015-10-02', '2016-03-19', 0, 'administrador'),
(14, '7c222fb2927d828af22f592134e8932480637c0d', '2015-03-23', '2015-03-23', 1, '15491963'),
(15, '47fa7fdd4db234bc01c34c85e5e0add77d4a1cc9', '2015-03-23', '2015-07-21', 0, '15491963'),
(16, '7c222fb2927d828af22f592134e8932480637c0d', '2015-03-23', '2015-07-21', 1, '17960877'),
(17, '7c222fb2927d828af22f592134e8932480637c0d', '2015-03-23', '2015-03-23', 0, '12526145'),
(18, '085d79cf841505f3e79f043884f8875416324966', '2015-03-23', '2015-07-21', 1, '12526145'),
(19, '7c222fb2927d828af22f592134e8932480637c0d', '2015-03-24', '2015-11-24', 0, '18672728'),
(20, '2b1d5aeaa2c4cd26852acb5149737844447c56ca', '2015-11-24', '2016-03-23', 1, '18672728'),
(21, '1f82ea75c5cc526729e2d581aeb3aeccfef4407e', '2016-03-19', '2016-07-17', 0, 'administrador'),
(22, '12', '2016-06-30', '2016-10-28', 1, '20390749');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tcurso`
--

CREATE TABLE `tcurso` (
  `idcurso` int(11) NOT NULL,
  `nombrecur` varchar(100) NOT NULL,
  `desgripcioncur` varchar(40) NOT NULL,
  `capacidadcur` int(11) NOT NULL,
  `estatuscur` char(1) NOT NULL DEFAULT '1',
  `tlapso_idlapso` int(11) NOT NULL,
  `tgrupo_idgrupo` int(11) NOT NULL,
  `tasignatura_idasignatura` int(11) NOT NULL,
  `taula_idaula` int(11) DEFAULT NULL,
  `tdocente_iddocente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tcurso`
--

INSERT INTO `tcurso` (`idcurso`, `nombrecur`, `desgripcioncur`, `capacidadcur`, `estatuscur`, `tlapso_idlapso`, `tgrupo_idgrupo`, `tasignatura_idasignatura`, `taula_idaula`, `tdocente_iddocente`) VALUES
(1, 'INICIAL - INFORMATICA', '', 20, '1', 2, 1, 1, 8, 19307641),
(2, 'JUVENIL - INFORMATICA', '', 20, '1', 2, 2, 1, 8, 19376868);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tcurso_tparticipante`
--

CREATE TABLE `tcurso_tparticipante` (
  `idcurso_participante` int(11) NOT NULL,
  `tcurso_idcurso` int(11) NOT NULL,
  `tparticipante_idparticipante` int(11) NOT NULL,
  `estatus` char(1) DEFAULT '1',
  `fecha_inscripcion` date DEFAULT NULL,
  `fecha_egreso` date DEFAULT NULL,
  `motivo` text,
  `idresponsable_ing` char(9) DEFAULT NULL,
  `idresponsable_egr` char(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tcurso_tparticipante`
--

INSERT INTO `tcurso_tparticipante` (`idcurso_participante`, `tcurso_idcurso`, `tparticipante_idparticipante`, `estatus`, `fecha_inscripcion`, `fecha_egreso`, `motivo`, `idresponsable_ing`, `idresponsable_egr`) VALUES
(1, 1, 2, '1', '2015-05-09', NULL, NULL, '10143804', NULL),
(2, 1, 3, '1', '2015-05-09', NULL, NULL, '10143804', NULL),
(3, 1, 8, '1', '2015-05-09', NULL, NULL, '10143804', NULL),
(4, 1, 9, '1', '2015-05-09', NULL, NULL, '10143804', NULL),
(5, 1, 11, '1', '2015-05-09', NULL, NULL, '10143804', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tdiagnostico`
--

CREATE TABLE `tdiagnostico` (
  `iddiagnostico` int(11) NOT NULL,
  `descripciondia` varchar(65) NOT NULL,
  `estatusdia` char(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tdiagnostico`
--

INSERT INTO `tdiagnostico` (`iddiagnostico`, `descripciondia`, `estatusdia`) VALUES
(1, 'VISION NORMAL', '1'),
(2, 'BAJA VISION', '1'),
(3, 'CIEGO', '1'),
(4, 'CIEGA', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tdocente`
--

CREATE TABLE `tdocente` (
  `nacionalidaddoc` char(1) DEFAULT 'V',
  `iddocente` char(9) NOT NULL,
  `nombreunodoc` varchar(45) NOT NULL,
  `nombredosdoc` varchar(45) DEFAULT NULL,
  `apellidounodoc` varchar(45) NOT NULL,
  `apellidodosdoc` varchar(45) DEFAULT NULL,
  `sexodoc` char(1) NOT NULL,
  `fechanacimientodoc` date NOT NULL,
  `direcciondoc` varchar(200) NOT NULL,
  `telefonodoc` varchar(12) NOT NULL,
  `correodoc` varchar(55) DEFAULT NULL,
  `titulodoc` varchar(30) NOT NULL,
  `tipodoc` varchar(45) DEFAULT NULL,
  `estatusdoc` char(1) NOT NULL DEFAULT '1',
  `tdiagnostico_iddiagnostico` int(11) NOT NULL,
  `tlocalidad_idlocalidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tdocente`
--

INSERT INTO `tdocente` (`nacionalidaddoc`, `iddocente`, `nombreunodoc`, `nombredosdoc`, `apellidounodoc`, `apellidodosdoc`, `sexodoc`, `fechanacimientodoc`, `direcciondoc`, `telefonodoc`, `correodoc`, `titulodoc`, `tipodoc`, `estatusdoc`, `tdiagnostico_iddiagnostico`, `tlocalidad_idlocalidad`) VALUES
('V', '10143804', 'YAJAIRA', '', 'SOTO', '', 'F', '1967-12-05', 'ARAURE', '04245642522', NULL, 'LICENCIADO EN EDUCACION', 'ESPECIALISTA', '1', 1, 2),
('V', '10636038', 'JOHNNY', '', 'MENA', '', 'M', '1969-06-15', 'ARAURE', '04168391072', NULL, 'LICENCIADO EN EDUCACION', 'ESPECIALISTA', '1', 1, 2),
('V', '11542306', 'AURA', '', 'TORREALBA', '', 'F', '1973-04-11', 'ACARIGUA', '04263083310', NULL, 'LICENCIADA EN EDUCACION', 'AULA', '1', 1, 1),
('V', '11544033', 'JULIMAR', '', 'CONDE', '', 'F', '1972-05-05', 'ACARIGUA', '04167597154', NULL, 'PREGRADO', 'ESPECIALISTA', '1', 1, 1),
('V', '11549138', 'MARIA', '', 'RODRIGUEZ', '', 'F', '1964-07-17', 'ARAURE', '04145943812', NULL, 'LICENCIADO EN EDUCACION', 'ESPECIALISTA', '1', 1, 2),
('V', '11849063', 'JAVIER', '', 'FUIGUEREDO', '', 'M', '1974-03-20', 'ACARIGUA', '04161502524', NULL, 'LICENCIADO EN EDUCACION', 'AULA', '1', 3, 1),
('V', '12265074', 'ANA', 'MARIA', 'SERRADA', '', 'F', '1974-01-18', 'ARAURE', '04161456847', NULL, 'TSU EN EDUCACION', 'AULA', '1', 1, 2),
('V', '12965189', 'CARMEN', '', 'SALCEDO', '', 'F', '1975-01-04', 'ACARIGUA', '04245199580', NULL, 'PREGRADO', 'AULA', '1', 1, 1),
('V', '13072250', 'MEIBRY', '', 'GRIMAN', '', 'F', '1976-03-08', 'ACARIGUA', '04145527240', NULL, 'LICENCIADO EN EDUCACION', 'ESPECIALISTA', '1', 1, 1),
('V', '13306670', 'MARLE', '', 'ALVARADO', '', 'F', '1976-06-04', 'ARAURE', '04267551363', NULL, 'LICENCIADO EN EDUCACION', 'AULA', '1', 1, 2),
('V', '19307641', 'CRITOBAL', '', 'OSPINO', '', 'M', '1986-02-28', 'ARAURE', '04167556649', NULL, 'LICENCIADO EN EDUCACION', 'AULA', '1', 3, 2),
('V', '19376868', 'IVON', '', 'CAMACHO', '', 'F', '1987-08-09', 'ACARIGUA', '04145787444', NULL, 'LICENCIADO EN EDUCACION', 'AULA', '1', 1, 1),
('V', '5957406', 'CARMEN', '', 'LOBO', '', 'F', '1959-10-31', 'ACARIGUA', '04260308331', NULL, 'POSTGRADO', 'ESPECIALISTA', '1', 1, 1),
('V', '7596895', 'YAJAIRA', '', 'PADILLA', '', 'F', '1962-02-23', 'ACARIGUA', '04163510058', NULL, 'LICENCIADO EN EDUCACION', 'AULA', '1', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tentesexternos`
--

CREATE TABLE `tentesexternos` (
  `idTentesexternos` int(11) NOT NULL,
  `RazonSocial` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `Rif` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `Telefono` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `Estatus` char(1) COLLATE utf8_spanish2_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tentesexternos`
--

INSERT INTO `tentesexternos` (`idTentesexternos`, `RazonSocial`, `Rif`, `Telefono`, `Estatus`) VALUES
(1, 'ALCALDIA', 'G-54211214', '0414-5442235', '1'),
(2, 'GOBERNACIÃ³N DE LARA', 'G-20450033-4', '0251-4545445', '1'),
(3, 'SAN JUDAS', 'G-12342345-3', '123455667788', '1'),
(4, 'INDER PAEZ', 'G-12345678-0', '0414-5052122', '1'),
(5, 'INQWE EQ', 'G-12354334-0', '0412-4322224', '1'),
(6, 'SAN JUAN 21', 'G-23456789-9', '0426-1234567', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tentrada`
--

CREATE TABLE `tentrada` (
  `identrada` int(11) NOT NULL,
  `idproveedor` int(11) DEFAULT NULL,
  `idFpersonal` char(9) CHARACTER SET utf8 COLLATE utf8_spanish2_ci DEFAULT NULL,
  `fecha` date NOT NULL,
  `fecharecepcion` date DEFAULT NULL,
  `estatusen` char(1) COLLATE utf8_bin NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `tentrada`
--

INSERT INTO `tentrada` (`identrada`, `idproveedor`, `idFpersonal`, `fecha`, `fecharecepcion`, `estatusen`) VALUES
(1, 2, '12526145', '2001-08-20', '2001-08-20', '0'),
(2, 1, '12526145', '2001-01-20', '2001-01-20', '0'),
(3, 1, '12526145', '2001-01-20', '2001-01-20', '0'),
(4, 1, '12526145', '2001-01-20', '0000-00-00', '0'),
(5, 2, '12526145', '2001-01-20', '0000-00-00', '0'),
(6, 5, '12526145', '2002-06-20', '2001-01-20', '2'),
(7, 11, '12526145', '2001-01-20', '2001-01-20', '2'),
(8, 11, '12526145', '2009-06-20', '2001-01-20', '0'),
(9, 14, '12526145', '2001-01-20', '2001-01-20', '2'),
(10, 9, '12526145', '2001-01-20', '2001-01-20', '2'),
(11, 11, '15491963', '2001-01-20', '2001-01-20', '2'),
(21, NULL, NULL, '2001-01-20', NULL, '0'),
(22, 9, '18672728', '2001-01-20', '2016-07-22', '2'),
(23, 9, '15491963', '2001-01-20', '2001-06-20', '2'),
(24, 11, '18672728', '2001-01-20', '2001-07-20', '2'),
(25, 9, '20390749', '2001-07-20', '2016-08-01', '2'),
(26, NULL, NULL, '2016-07-14', NULL, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tevaluacion`
--

CREATE TABLE `tevaluacion` (
  `idevaluacion` int(11) NOT NULL,
  `fechaeva` datetime NOT NULL,
  `observacioneva` text COLLATE utf8_spanish2_ci,
  `estatuseva` char(1) COLLATE utf8_spanish2_ci DEFAULT '1',
  `idcurso_idparticipante` int(11) NOT NULL,
  `tinstrumento_idinstrumento` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tevaluacion`
--

INSERT INTO `tevaluacion` (`idevaluacion`, `fechaeva`, `observacioneva`, `estatuseva`, `idcurso_idparticipante`, `tinstrumento_idinstrumento`) VALUES
(1, '2015-05-09 00:00:00', '', '1', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tevaluacion_item`
--

CREATE TABLE `tevaluacion_item` (
  `tevaluacion_idevaluacion` int(11) NOT NULL,
  `titem_iditem` int(11) NOT NULL,
  `valor` varchar(500) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tevaluacion_item`
--

INSERT INTO `tevaluacion_item` (`tevaluacion_idevaluacion`, `titem_iditem`, `valor`) VALUES
(1, 1, 'SI LOGRO LOS OBJETIVOS'),
(1, 2, 'BUEN AVANCE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tfamiliar`
--

CREATE TABLE `tfamiliar` (
  `nacionalidadfam` char(1) DEFAULT 'V',
  `idfamiliar` char(9) NOT NULL,
  `nombreunofam` varchar(45) NOT NULL,
  `nombredosfam` varchar(45) DEFAULT NULL,
  `apellidounofam` varchar(45) NOT NULL,
  `apellidodosfam` varchar(45) DEFAULT NULL,
  `sexofam` char(1) NOT NULL,
  `telefonofam` varchar(12) NOT NULL,
  `correofam` varchar(55) DEFAULT NULL,
  `fechanacimientofam` date NOT NULL,
  `direccionfam` varchar(200) NOT NULL,
  `ocupacionfam` varchar(30) NOT NULL,
  `gradoinstrucfam` varchar(20) NOT NULL,
  `numhijofam` int(2) NOT NULL,
  `ingresofam` double NOT NULL,
  `tdiagnostico_iddiagnostico` int(11) NOT NULL,
  `estatusfam` char(1) NOT NULL DEFAULT '1',
  `tlocalidad_idlocalidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tfamiliar`
--

INSERT INTO `tfamiliar` (`nacionalidadfam`, `idfamiliar`, `nombreunofam`, `nombredosfam`, `apellidounofam`, `apellidodosfam`, `sexofam`, `telefonofam`, `correofam`, `fechanacimientofam`, `direccionfam`, `ocupacionfam`, `gradoinstrucfam`, `numhijofam`, `ingresofam`, `tdiagnostico_iddiagnostico`, `estatusfam`, `tlocalidad_idlocalidad`) VALUES
('V', '11078708', 'GRISELIDYS', '', 'SILVA', '', 'F', '04161234568', NULL, '1978-07-19', 'ARAURE', 'AMA DE CASA', 'BACHILLERATO', 2, 5000, 1, '1', 2),
('V', '11079158', 'NAYIVEL', '', 'AMAYA', '', 'F', '00000000000', NULL, '1973-04-26', 'CASERÃ­O SABANETICA CALLE PRINCIPAL CASA S/N', 'AMA DE CASA', 'BACHILLERATO', 1, 0, 1, '1', 1),
('V', '11540170', 'RAFAEL ', 'RAMON', 'ADJUNTA', 'REYES', 'M', '04165368716', NULL, '1974-06-04', 'BARRIO SANTA  ELENA AV. 5 ENTRE CALLES 1 Y 2 CASA NRO 15.', 'OBRERO', 'PRIMARIA', 6, 5400, 1, '1', 1),
('V', '11542861', 'CARDINA', '', 'MEDINA', '', 'F', '04164514140', NULL, '1973-02-05', 'CASERÃ­O MIJAGUITO CALLE PRINCIPAL CASA # 55', 'AMA DE CASA', 'BACHILLERATO', 2, 0, 1, '1', 1),
('V', '11847486', 'MIRY ', '', 'ORTIZ', '', 'F', '04165368716', NULL, '1974-06-04', 'BARRIO "SANTA ELENA" AV. 5 ENTRE CALLES 1 Y 2. CASA NRO. 15 ', 'OFICIO DEL HOGAR', 'PRIMARIA', 5, 0, 1, '1', 1),
('V', '13353263', 'MARIA', 'EUGENIA', 'REYES', 'PEÃ±A', 'F', '04145146347', NULL, '1977-06-13', 'LA MIEL', 'GERENTE', 'LICENCIADO', 2, 20000, 1, '1', 2),
('V', '15493031', 'YASIREÃ© ', '', 'HERNÃ¡NDEZ', '', 'F', '04148876543', NULL, '1960-02-05', 'DIRECCION', 'AMA DE CASA', 'PRIMARIA', 3, 3000, 1, '1', 1),
('V', '16964940', 'CAROLINA', '', 'QUEVEDO', '', 'F', '04262405761', NULL, '1975-11-26', 'BARRIO LA DEMOCRACIA AV. 1 CALLEJÃ³N 1 CASA #32', 'AMA DE CASA', 'TECNICO MEDIO', 3, 5000, 1, '1', 1),
('V', '17364390', 'LEIDY', '', 'LOPEZ', '', 'F', '00000000000', NULL, '1986-12-07', 'URB DURIGUA 2 CALLE 4 CASA 1', 'AMA DE CASA', 'BACHILLERATO', 2, 0, 1, '1', 1),
('V', '18732314', 'MARIANGELA', '', 'QUEVEDO', '', 'F', '04268492413', NULL, '1987-07-30', 'RIO ACARIGUA CALLE 1 SECTOR EL SAMAN', 'ESTUDIANTE', 'BACHILLERATO', 1, 0, 1, '1', 7),
('V', '19170250', 'MARISOL', '', 'MONTES', '', 'F', '04167528081', NULL, '1989-02-08', 'BARRIO LA PAZ', 'OFICIO DEL HOGAR', 'BACHILLERATO', 2, 5600, 1, '1', 1),
('V', '20157379', 'JOSCARLY', '', 'RUIZ', '', 'M', '04160389433', NULL, '1992-07-07', 'URB SAN JOSE 2 LOTE A CASA 39', 'ESTUDIANTE', 'BACHILLERATO', 1, 0, 1, '1', 2),
('V', '21563851', 'YURAIMA', '', 'MEDINA', '', 'F', '00000000000', NULL, '1993-09-20', 'URB. SAN JOSÃ© II CALLE 15 TERRAZA # 05', 'ESTUDIANTE', 'BACHILLERATO', 1, 0, 1, '1', 2),
('V', '9837744', 'LEONOR', '', 'MENDOZA', '', 'F', '04266526658', NULL, '1974-07-17', 'URB. TRICENTENARIA F-8 CASA # 08', 'AMA DE CASA', 'BACHILLERATO', 2, 6000, 1, '1', 2),
('V', '99999999', 'MISMO', '', 'SE REPRESENTA ASI', '', 'M', '00000000000', NULL, '2000-01-01', 'NO APLICA', 'NO APLICA', 'PRIMARIA', 0, 0, 1, '1', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tgrupo`
--

CREATE TABLE `tgrupo` (
  `idgrupo` int(11) NOT NULL,
  `nombregru` varchar(45) NOT NULL,
  `descripciongru` varchar(45) DEFAULT NULL,
  `estatusgru` int(11) NOT NULL DEFAULT '1',
  `edadmin` char(2) NOT NULL,
  `edadmax` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tgrupo`
--

INSERT INTO `tgrupo` (`idgrupo`, `nombregru`, `descripciongru`, `estatusgru`, `edadmin`, `edadmax`) VALUES
(1, 'INICIAL', ' NIÃ‘OS EN EDADES ENTRE CERO Y SEIS AÃ‘', 1, '0', '6'),
(2, 'JUVENIL', 'ESTE GRUPO ESTA COMPREDIDO POR NIÃ‘OS DE SIET', 1, '7', '15'),
(3, 'ADULTO', 'ESTA COMPRENDIDO POR PERSONAS DE QUINCE AÃ‘OS', 1, '15', '99');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tinscripcion`
--

CREATE TABLE `tinscripcion` (
  `idinscripcion` int(11) NOT NULL,
  `idparticipante` int(11) NOT NULL,
  `gradoins` varchar(45) DEFAULT NULL,
  `seccionins` varchar(45) DEFAULT NULL,
  `fechains` date NOT NULL,
  `disponibilidadins` varchar(15) NOT NULL,
  `diasasistenciains` varchar(20) NOT NULL,
  `observacionins` varchar(150) DEFAULT NULL,
  `fotoins` varchar(45) NOT NULL,
  `partidanacimientoins` tinyint(4) NOT NULL,
  `copiacedulains` tinyint(4) NOT NULL,
  `informemedico` tinyint(4) NOT NULL,
  `estatusins` char(1) NOT NULL DEFAULT '1',
  `repitienteins` tinyint(4) NOT NULL,
  `tinstitucion_idinstitucion` int(11) DEFAULT NULL COMMENT 'institucion de la cual proviene',
  `motivocambioins` varchar(45) DEFAULT NULL,
  `resumendiagnosticoins` text,
  `estudia_actualmente` int(1) NOT NULL,
  `grado_instruccion` varchar(50) DEFAULT NULL,
  `turno` varchar(15) DEFAULT NULL,
  `docente_grado` varchar(100) DEFAULT NULL,
  `telefono_docente_grado` varchar(11) DEFAULT NULL,
  `docente_aula_integrada` varchar(100) DEFAULT NULL,
  `telefono_docente_aula_integrada` varchar(11) DEFAULT NULL,
  `director_institucion` varchar(100) DEFAULT NULL,
  `telefono_director_institucion` varchar(11) DEFAULT NULL,
  `tfamiliar_idresponsable` char(9) DEFAULT NULL,
  `ingresomensual` float(10,2) DEFAULT NULL,
  `otroingreso` float(10,2) DEFAULT NULL,
  `noingreso` varchar(255) DEFAULT NULL,
  `colaborarcaidv` text,
  `aprenderbraille` char(1) DEFAULT NULL,
  `tiempo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tinscripcion`
--

INSERT INTO `tinscripcion` (`idinscripcion`, `idparticipante`, `gradoins`, `seccionins`, `fechains`, `disponibilidadins`, `diasasistenciains`, `observacionins`, `fotoins`, `partidanacimientoins`, `copiacedulains`, `informemedico`, `estatusins`, `repitienteins`, `tinstitucion_idinstitucion`, `motivocambioins`, `resumendiagnosticoins`, `estudia_actualmente`, `grado_instruccion`, `turno`, `docente_grado`, `telefono_docente_grado`, `docente_aula_integrada`, `telefono_docente_aula_integrada`, `director_institucion`, `telefono_director_institucion`, `tfamiliar_idresponsable`, `ingresomensual`, `otroingreso`, `noingreso`, `colaborarcaidv`, `aprenderbraille`, `tiempo`) VALUES
(1, 1, '2 DO', 'A', '2015-03-24', 'MAÃ‘ANA', 'LU', '  BAJA VISION         ', '09837744.jpeg', 1, 1, 1, '1', 0, 10, '       ', ' ACROMATOPSIA CONGÃ©NITA.          ', 1, 'BACHILLER', 'MAÃ‘ANA', 'MARIA', '', 'ALBA QUINTANA', '', '', '', '9837744', 6000.00, 0.00, '', 'limpieza', '1', 'las maÃ±anas'),
(2, 2, '1 ERO', 'A', '2015-03-24', 'TARDE', 'LU,MA,MI,JU,VI', ' NINGUNA ', '', 0, 0, 1, '1', 0, 5, ' REFORZAR APRENDIZAJE ', ' MICROFTALMUS OD. DIGÃ©NESIS DEL SEGMENTO ANTERIOR. ', 1, 'PRIMARIA', 'MAÃ‘ANA', 'CRISTOBLA', '04245554321', 'JAVIER', '04147875436', '', '', '11078708', 5000.00, 0.00, '', 'limpieza', '1', 'las maÃ±anas'),
(3, 3, '1RO', 'B', '2015-03-24', 'MAÃ‘ANA', 'LU,MI', ' VDSFDSGFGFGS    ', '15493031.jpeg', 1, 1, 1, '1', 1, 6, ' DSD    ', ' MIOPÃ­A MAGNA EN AMBOS OJOS ASOCIADA.    ', 1, 'PRIMARIA', 'TARDE', 'ASDSD', '34232323', 'ASDSAD', '213342434', '', '', '15493031', 0.00, 0.00, 'Beca Madres del Barrio', 'Cocinar', '1', 'manana'),
(4, 4, '5 TO', 'B', '2015-03-24', 'TARDE', 'LU,MA,MI,JU,VI', ' CIEGO TOTALMENTE   ', '', 1, 0, 1, '1', 0, 4, ' MEJOR ADAPTACION   ', ' MICROFTALMUS BILATERAL CONGENITO   ', 1, 'PRIMARIA', 'MAÃ‘ANA', 'NO ', '00000000000', 'NO', '00000000000', '', '', '16964940', 0.00, 0.00, 'el esposo cubre los gastos', 'limpieza', '0', ''),
(5, 5, '1', 'A', '2015-03-24', 'MAÃ‘ANA', 'LU,MA,MI,JU,VI', 'APÃ¡TICO A LOS GRUPOS    ', '19170250.jpeg', 1, 1, 1, '1', 0, 1, ' NINGUNO    ', ' RETINOPATÃ­A DE LA PREMATURIDAD    ', 1, 'PRIMARIA', 'TARDE', 'YULIMAR CONDE', '02556659490', 'GENESIS PARADA', '02556645789', '', '', '19170250', 5600.00, 0.00, 'trabaja de oficios de hogares', 'cocinar y limpiar', '0', ''),
(6, 6, '6TO', 'B', '2015-03-26', 'MAÃ‘ANA', 'MI', ' ASISTE SEMANLMENTE AL CAIDV    ', '11847486.jpeg', 1, 1, 1, '1', 0, 9, '     ', ' MICROFTALMO EN AMBOS OJOS    ', 1, 'PRIMARIA', 'TARDE', 'ALBA QUINTANA', '04127743137', '', '', '', '', '11847486', 0.00, 0.00, 'no', 'no', '0', ''),
(7, 7, '', '', '2015-05-01', 'MAÃ‘ANA', 'LU,MA,MI,JU,VI', ' NO APLICA', '', 1, 0, 1, '1', 0, 0, ' ', ' CATARATA CONGÃ©NITA', 0, 'NINGUNO', '', '', '', '', '', '', '', '', 0.00, 0.00, 'no', 'no', '0', ''),
(8, 8, 'PRIMER  NIVEL', '', '2015-05-01', 'MAÃ‘ANA', 'LU,MA,MI,JU,VI', ' ', '', 1, 0, 1, '1', 0, 14, ' ', ' LEUCOMA CORNEAL Y GLAUCOMA BILATERAL CONGÃ©N', 1, 'PRE-ESCOLAR', 'MAÃ‘ANA', 'IVON CAMACHO', '', '', '', '', '', '', 0.00, 0.00, '', 'ELEBORACION DE MANUELIDADES', '1', 'TODOS LOS DIAS'),
(9, 9, '1 ER NIVEL', '', '2015-05-01', 'MAÃ‘ANA', 'LU,MA,MI,JU,VI', ' ', '', 1, 0, 1, '1', 0, 15, ' ', ' MICROFTALMUS', 1, 'PRE-ESCOLAR', 'MAÃ‘ANA', '', '', '', '', '', '', '', 0.00, 0.00, '', '', '0', ''),
(10, 10, '4TO', 'B', '2015-05-01', 'MAÃ‘ANA', 'LU,MA', '   ', '', 1, 1, 1, '1', 0, 10, '   ', '  CATARATA CONGÃ©NITA.\r\n ', 1, 'PRIMARIA', 'TARDE', '', '', '', '', '', '', '99999999', 0.00, 0.00, '', '', '1', ''),
(11, 11, '3 ER NIVEL', '', '2015-05-01', 'MAÃ‘ANA', 'LU,MA,MI,JU,VI', ' ', '', 1, 0, 1, '1', 0, 14, ' ', 'NIGTASMUS HORIZONTAL PENDULAR, MIOPÃ­A, ESTRABISMO ', 1, 'PRE-ESCOLAR', 'MAÃ‘ANA', '', '', '', '', '', '', '', 0.00, 0.00, '', '', '0', ''),
(12, 12, '', '', '2015-05-01', 'MAÃ‘ANA', 'LU,MA,MI,JU,VI', '  ', '', 1, 1, 1, '1', 0, 0, '  ', ' ATROFIA Ã³PTICA BILATERAL\r\n ', 0, 'NINGUNO', '', '', '', '', '', '', '', '99999999', 0.00, 0.00, '', '', '1', ''),
(13, 13, '', '', '2015-05-01', 'MAÃ‘ANA', 'LU,MA,MI,JU,VI', ' ', '', 1, 1, 1, '1', 0, 7, ' ', ' RETINOSIS PIGMENTARIA\r\n', 1, 'NINGUNO', 'MAÃ‘ANA', '', '', '', '', '', '', '', 0.00, 0.00, '', '', '1', ''),
(14, 14, '2 DO GRADO', '', '2015-05-01', 'MAÃ‘ANA', 'LU,MA,MI,JU,VI', ' ', '', 1, 0, 1, '1', 0, 12, ' ', ' RETINOPATÃ­A DE LA PREMATURIDAD', 1, 'PRIMARIA', 'MAÃ‘ANA', '', '', 'IVON CAMACHO', '', '', '', '', 0.00, 0.00, '', '', '0', ''),
(15, 15, '', '', '2015-05-01', 'MAÃ‘ANA', 'LU,MA,MI,JU,VI', ' ', '', 1, 1, 1, '1', 0, 7, ' ', ' RETINOSIS PIGMENTARIA\r\n', 1, 'NINGUNO', 'MAÃ‘ANA', '', '', '', '', '', '', '', 0.00, 0.00, '', '', '1', ''),
(16, 16, '4 TO GRADO', '', '2015-05-01', 'MAÃ‘ANA', 'LU,MA,MI,JU,VI', ' ', '', 1, 0, 1, '1', 0, 12, ' ', ' AMAUROSIS CONGÃ©NITA LEBER', 1, 'PRIMARIA', 'MAÃ‘ANA', '', '', 'IVON CAMACHO', '', '', '', '', 0.00, 0.00, '', '', '0', ''),
(17, 17, '', '', '2015-05-01', 'MAÃ‘ANA', 'LU,MA,MI,JU,VI', ' ', '', 1, 1, 1, '1', 0, 7, ' ', ' CIEGO\r\n', 1, 'NINGUNO', 'MAÃ‘ANA', '', '', '', '', '', '', '', 0.00, 0.00, '', '', '1', ''),
(18, 18, '', '', '2015-05-01', 'MAÃ‘ANA', 'LU,MA,MI,JU,VI', ' ', '', 1, 1, 1, '1', 0, 7, ' ', ' LEUCOMA Y GLAUCOMA EN AMBOS OJOS\r\n\r\n', 1, 'NINGUNO', 'MAÃ‘ANA', '', '', '', '', '', '', '', 0.00, 0.00, '', '', '1', ''),
(19, 19, '', '', '2015-05-01', 'MAÃ‘ANA', 'LU,MA,MI,JU,VI', ' ', '', 1, 1, 1, '1', 0, 7, ' ', ' RETINOBLASTOMA BILATERAL\r\n', 1, 'NINGUNO', 'MAÃ‘ANA', '', '', '', '', '', '', '', 0.00, 0.00, '', '', '1', ''),
(20, 20, '', '', '2015-05-01', 'MAÃ‘ANA', 'LU,MA,MI,JU,VI', ' ', '', 1, 1, 1, '1', 0, 7, ' ', ' ANIRIDIA CONGÃ©NITA.\r\n', 1, 'NINGUNO', 'MAÃ‘ANA', '', '', '', '', '', '', '', 0.00, 0.00, '', '', '1', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tinstitucion`
--

CREATE TABLE `tinstitucion` (
  `idinstitucion` int(11) NOT NULL,
  `descripcioninst` varchar(40) NOT NULL,
  `direccioninst` varchar(60) NOT NULL,
  `directorinst` varchar(60) NOT NULL,
  `estatusinst` tinyint(1) NOT NULL DEFAULT '1',
  `tlocalidad_idlocalidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tinstitucion`
--

INSERT INTO `tinstitucion` (`idinstitucion`, `descripcioninst`, `direccioninst`, `directorinst`, `estatusinst`, `tlocalidad_idlocalidad`) VALUES
(1, 'LICEO BOLIVARIANO JOSE ANTONIO PAEZ', 'AV. LIBERTADOR Y AV. 32 FRENTE A LA PLAZA ANDRES ELOY BLANCO', 'LICENCIADA MARITZA GUTIERREZ', 1, 1),
(2, 'ETIR SIMON BOLIVAR', 'AV. JOSE ANTONIO PAEZ FRENTE AL PARQUE MUSIU CARMELO ', 'LICENCIADA CARMINA LOMBANO', 1, 1),
(3, 'LICEO BOLIVARIANO CINCO DE DICIEMBRE', 'CALLE 31 VIA CEMENTERIO VIEJO AL LADO DEL EDIFICIO DE MALARI', 'LICENCIADO CARLOS HERNANDEZ', 1, 1),
(4, 'UNIDAD EDUCATIVA FE Y ALEGRIA NTRA SRA D', 'CALLE 28 CON AV 53 SECTOR BELLA VISTA 2', 'LICENCIADO EVELIN ZAPATA', 1, 1),
(5, ' UEN VEINTICUATRO DE JULIO', 'URB. 24 DE JULIO', 'MARIAN TAMAYO', 1, 2),
(6, 'ESCUELA BASICA PAYARA', 'PAYARA', 'FULANO', 1, 3),
(7, 'CAIDV', 'CALLE LUIS BRAILLE SECTOR LOS CORTIJOS DETRAS DE BELLAS ARTE', 'LIC IRMA SANCHEZ', 1, 1),
(8, 'E B MANUELITA SAENS', 'ARAURE', 'LIC ', 1, 2),
(9, 'COLEGIO FE Y ALEGRIA', 'SECTOR FE Y ALEGRIA', 'LIC', 1, 1),
(10, 'E P JESUS HORIZONTE Y CAMINO', 'ACARIGUA', 'LIC', 1, 1),
(11, 'U E E ALBERTO LEVYS MORA', 'BARRIO ANDRES ELOY BLANCO', 'LIC ', 1, 1),
(12, 'U E N SABANETICA', 'SABANETICA', 'LIC', 1, 1),
(13, 'U E N B YOLANDA DE PERUZZINE', 'URB BARAURE CENTRO ', 'LIC', 1, 2),
(14, 'C E I ARAURE', 'ARAURE', 'LIC', 1, 2),
(15, 'C E I LISANDRO AVARADO', 'ACARIGUA', 'LIC', 1, 1),
(16, 'C E I SAMUEL ROBINSON', 'ACARIGUA', 'LIC', 1, 1),
(17, 'AFAS', 'ASDAS', 'AWQE', 1, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tinstrumento`
--

CREATE TABLE `tinstrumento` (
  `idinstrumento` int(11) NOT NULL,
  `nombreins` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `tasignatura_idasignatura` int(11) NOT NULL,
  `estatusins` char(1) COLLATE utf8_spanish2_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tinstrumento`
--

INSERT INTO `tinstrumento` (`idinstrumento`, `nombreins`, `tasignatura_idasignatura`, `estatusins`) VALUES
(1, 'EVALUACIÃ“N DE LOS APRENDIZAJES', 1, '1'),
(2, 'EVALUACIÃ“N DE LOS APRENDIZAJES', 2, '1'),
(3, 'EVALUACIÃ“N DE LOS APRENDIZAJES', 3, '1'),
(4, 'ASPECTO FISIOLÃ“GICO', 2, '1'),
(5, 'ASPECTO COGNITIVO', 2, '1'),
(6, 'PRUEBA', 1, '1'),
(7, 'PRUEBA', 1, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tinstrumento_item`
--

CREATE TABLE `tinstrumento_item` (
  `tinstrumento_idinstrumento` int(11) NOT NULL,
  `titem_iditem` int(11) NOT NULL,
  `espacio` varchar(10) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tinstrumento_item`
--

INSERT INTO `tinstrumento_item` (`tinstrumento_idinstrumento`, `titem_iditem`, `espacio`) VALUES
(1, 1, 'completo'),
(1, 2, 'completo'),
(2, 1, 'completo'),
(2, 2, 'completo'),
(3, 1, 'completo'),
(3, 2, 'completo'),
(4, 3, 'mitad'),
(4, 4, 'mitad'),
(4, 5, 'mitad'),
(4, 6, 'mitad'),
(4, 9, 'mitad'),
(4, 10, 'mitad'),
(4, 11, 'mitad'),
(4, 12, 'mitad'),
(5, 13, 'mitad'),
(5, 14, 'mitad'),
(5, 29, 'mitad'),
(5, 15, 'mitad'),
(5, 16, 'mitad'),
(5, 17, 'mitad'),
(5, 18, 'mitad'),
(5, 19, 'mitad'),
(5, 20, 'mitad'),
(5, 21, 'mitad'),
(5, 22, 'mitad'),
(5, 23, 'mitad'),
(5, 24, 'mitad'),
(5, 25, 'mitad'),
(5, 26, 'mitad'),
(5, 27, 'mitad'),
(5, 28, 'mitad'),
(6, 14, 'mitad'),
(7, 17, 'mitad');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipobn`
--

CREATE TABLE `tipobn` (
  `id_tbien` int(11) NOT NULL,
  `cod_tbien` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `des_tbien` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `status` char(1) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipobn`
--

INSERT INTO `tipobn` (`id_tbien`, `cod_tbien`, `des_tbien`, `id_categoria`, `status`) VALUES
(1, '20010', 'COMPUTADORES', 2, '1'),
(2, '20030', 'TELEFONOS', 2, '1'),
(3, '20020', 'FILTROS', 1, '1'),
(4, '20040', 'HERRAMIENTAS DE DIBUJO', 3, '1'),
(5, '23123123', 'QWEQWE', 2, '1'),
(7, '20050', 'OK PRUEBAX', 1, '1'),
(8, '66666666666666666666', 'GREGORIO', 1, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipomotivo`
--

CREATE TABLE `tipomotivo` (
  `idTipoMotivo` int(11) NOT NULL,
  `Descripcion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `Estatus` char(1) COLLATE utf8_spanish_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipomotivo`
--

INSERT INTO `tipomotivo` (`idTipoMotivo`, `Descripcion`, `Estatus`) VALUES
(1, 'RECEPCIÃ“N', '1'),
(2, 'ANULACIÃ“NRE', '1'),
(3, 'ASIGNACIÃ“N', '1'),
(4, 'ANULACIÃ“NAS', '1'),
(5, 'DESINCORPORACIÃ“N', '1'),
(6, 'DEVOlUCIÃ“N', '1'),
(7, 'ANULACIÃ“NDES', '1'),
(8, 'BLOQUEOUS', '1'),
(9, 'ANULACIÃ“NDS', '1'),
(10, 'ANULACIÃ“NDV', '1'),
(11, 'PRESTAMO', '1'),
(12, 'RESTITUCIÓN PRESTAMO', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipomovibn`
--

CREATE TABLE `tipomovibn` (
  `id_tipo_mov` int(11) NOT NULL,
  `cod_tipo_mov` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `nom_tipo_mov` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `tipo_mov` char(1) COLLATE utf8_spanish_ci NOT NULL,
  `status` char(1) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipomovibn`
--

INSERT INTO `tipomovibn` (`id_tipo_mov`, `cod_tipo_mov`, `nom_tipo_mov`, `tipo_mov`, `status`) VALUES
(1, '21', 'RECEPCIÓN', '1', '1'),
(2, '21', 'ASIGNACIÓN', '2', '1'),
(3, '11', 'DEVOLUCIÓN', '3', '1'),
(4, '51', 'DESINCORPORACIÓN', '4', '1'),
(5, '60', 'PRESTAMO', '5', '1'),
(6, '70', 'RESTITUCIÓN DE PRESTAMO', '6', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `titem`
--

CREATE TABLE `titem` (
  `iditem` int(11) NOT NULL,
  `nombreite` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `descripcionite` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `tipoite` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `estatusite` char(1) COLLATE utf8_spanish2_ci DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `titem`
--

INSERT INTO `titem` (`iditem`, `nombreite`, `descripcionite`, `tipoite`, `estatusite`) VALUES
(1, 'DESCRIPCION DE LOGROS', 'DESCRIPCION DEL APRENDIZAJE', 'textarea', '1'),
(2, 'OBSERVACIONES', 'OBSERVACIONES DEL DOCENTE', 'textarea', '1'),
(3, 'SEXO', 'SEXO DEL PARTICIPANTE', 'select', '1'),
(4, 'EDAD', 'EDAD DEL PARTICIPANTE', 'text', '1'),
(5, 'PESO', 'PESO DEL PARTICIPANTE', 'text', '1'),
(6, 'TALLA CAMISA', 'TALLAS DEL PARTICIPANTE ', 'text', '1'),
(7, 'TALLA PANTALON', 'TALLA DEL PANTEALON', 'text', '1'),
(8, 'TALLA ZAPATOS', 'TALLA DEL CALZADO', 'text', '1'),
(9, 'ESTATURA', 'ESTATURA DEL PARTICIPANTE', 'text', '1'),
(10, 'DESCAPACIDAD', 'TIPO DE DISCAPACIDADES DEL PARTICIPANTE', 'checkbox', '1'),
(11, 'VACUNAS ', 'VACUNAS APLICADAS AL PARTICIPANTE', 'textarea', '1'),
(12, 'CONTROLA ESFÃ­NTERES', 'SI EL PARTICIPANTE CONTROLA ESFÃ­NTERES\r\n', 'select', '1'),
(13, 'ESTILO DE APRENDIZAJE VISUAL', 'ESTILO DE APRENDIZAJE DEL PARTICIPANTE', 'select', '1'),
(14, 'ESTILO DE APRENDIZAJE AUDITIVO', 'ESTILO DE APRENDIZAJE DEL PARTICIPANTE', 'select', '1'),
(15, 'PRONUNCIA CORRECTAMENTE', 'DESARROLLO DEL LENGUAJE DEL PARETICIPANTE', 'select', '1'),
(16, 'CONVERSA CON COHERENCIA', 'DESARROLLO DEL LENGUAJE DEL PARTICIPANTE', 'select', '1'),
(17, 'ATIENDE A LAS ACTIVIDADES', 'ATENCIÃ³N Y CONCENTRACIÃ³N', 'select', '1'),
(18, 'SE CONCENTRA POR 15 MINUTOS', 'ATENCIÃ³N Y CONCENTRACIÃ³N', 'select', '1'),
(19, 'SU ATENCIÃ³N ES DISPERSA', 'ATENCIÃ³N Y CONCENTRACIÃ³N', 'select', '1'),
(20, 'COMPRENDE Y RAZONA', 'ATENCIÃ³N Y CONCENTRACIÃ³N', 'select', '1'),
(21, 'REPITE SECUENCIA DE PALABRAS', 'ATENCION Y CONCENTRACION', 'select', '1'),
(22, 'RESPONDE A PREGUNTAS SIMPLES', 'ATENCION Y CONCENTRACION', 'select', '1'),
(23, 'REACCIONA ANTE SABORES', 'SENSOPERCEPCION', 'select', '1'),
(24, 'REACCIONA ANTE OLORES', 'SENSOPERCEPCION', 'select', '1'),
(25, 'REACCIONA AL LLAMADO DE SU NOMBRE', 'SENSOPERCEPCION', 'select', '1'),
(26, 'REACCIÃ³N ANTE ESTÃ­MULOS SONOROS', 'SENSOPERCEPCION', 'select', '1'),
(27, 'SU RITMO AL HABLAR ES LENTO', 'OTROS', 'select', '1'),
(28, 'SU VOCABULARIO ESTÃ¡ RELACIONADO CON SU AMBIENTE', 'OTROS', 'select', '1'),
(29, 'ESTILO DE APRENDIZAJE TACTIL', 'ESTILO DEL APRENDIZAJE', 'select', '1'),
(30, 'ES EXPRESIVO (A)', 'DESARROLLO DEL LENGUAJE', 'select', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tlapso`
--

CREATE TABLE `tlapso` (
  `idlapso` int(11) NOT NULL,
  `nombrelap` varchar(45) NOT NULL,
  `fechainilap` date DEFAULT NULL,
  `fechafinlap` date DEFAULT NULL,
  `estadolap` varchar(45) NOT NULL,
  `estatuslap` char(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tlapso`
--

INSERT INTO `tlapso` (`idlapso`, `nombrelap`, `fechainilap`, `fechafinlap`, `estadolap`, `estatuslap`) VALUES
(2, 'LAPSO 2014-2015', '2014-09-15', '2015-06-11', 'CERRADO', '1'),
(3, 'LAPSO 2015-2016', '2015-09-14', '2016-06-09', 'CERRADO', '1'),
(4, 'QQWEQE', '2016-06-10', '2017-03-06', 'APERTURADO', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tlocalidad`
--

CREATE TABLE `tlocalidad` (
  `idlocalidad` int(11) NOT NULL,
  `descripcionloc` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `estatusloc` tinyint(1) NOT NULL DEFAULT '1',
  `tmunicipio_municipio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tlocalidad`
--

INSERT INTO `tlocalidad` (`idlocalidad`, `descripcionloc`, `estatusloc`, `tmunicipio_municipio`) VALUES
(1, 'ACARIGUA', 1, 1),
(2, 'ARAURE', 1, 2),
(3, 'PAYARA', 1, 1),
(4, 'PINPINELA', 1, 1),
(5, 'RAMON PERAZA', 1, 1),
(6, 'AGUA BLANCA', 1, 3),
(7, 'RIO ACARIGUA', 1, 2),
(8, 'PIRITU', 1, 4),
(9, 'UVERAL', 1, 4),
(10, 'GUANARE', 1, 5),
(11, 'CORDOBA', 1, 5),
(12, 'GUANARITO', 1, 6),
(13, 'TRINIDAD DE LA CAPILLA', 1, 6),
(14, 'DIVINA PASTORA', 1, 6),
(15, 'PENA BLANCA', 1, 14),
(16, 'APARICION', 1, 7),
(17, 'LA ESTACION', 1, 7),
(18, 'OSPINO', 1, 7),
(19, 'CANO DELGADITO', 1, 8),
(20, 'PAPELON', 1, 8),
(21, 'ANTOLÃ­N TOVAR ANQUINO', 1, 9),
(22, 'BOCONOITO', 1, 9),
(23, 'SANTA FE', 1, 10),
(24, 'SAN RAFAEL DE ONOTO', 1, 10),
(25, 'THERMO MORALES', 1, 10),
(26, 'FLORIDA', 1, 11),
(27, ' EL PLAYON', 1, 11),
(28, 'BISCUCUY', 1, 12),
(29, 'CONCEPCIÃ³N', 1, 12),
(30, 'SAN JOSE DE SAGUAZ', 1, 12),
(31, 'SAN RAFAEL DE PALO ALZADO', 1, 12),
(32, 'UVENCIO ANTONIO VELÃ¡SQUEZ', 1, 12),
(33, 'VILLA ROSA', 1, 12),
(34, 'VILLA BRUZUAL', 1, 13),
(35, 'CANELONES', 1, 13),
(36, 'SANTA CRUZ', 1, 13),
(37, 'SAN ISIDRO LABRADOR', 1, 13),
(38, 'QWEQWE', 1, 3),
(39, 'QWEQWE', 1, 1),
(40, 'ASBVCBFDS', 1, 1),
(41, 'QWEQWE', 1, 4),
(42, 'QWEQWE', 1, 8),
(43, 'ASDQWEQWE', 1, 5),
(44, 'SARARE', 1, 18);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tmarcas`
--

CREATE TABLE `tmarcas` (
  `idTmarca` int(11) NOT NULL,
  `Descripcion` varchar(120) CHARACTER SET latin1 NOT NULL,
  `Estatus` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tmodelobn`
--

CREATE TABLE `tmodelobn` (
  `idTmodelo` int(11) NOT NULL,
  `idFtipoArticulo` int(11) NOT NULL,
  `idFmarca` int(11) NOT NULL,
  `Descripcion` varchar(120) COLLATE utf8_spanish2_ci NOT NULL,
  `Estatus` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tmodulo`
--

CREATE TABLE `tmodulo` (
  `idmodulo` int(11) NOT NULL,
  `nombremod` varchar(30) NOT NULL,
  `estatusmod` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tmodulo`
--

INSERT INTO `tmodulo` (`idmodulo`, `nombremod`, `estatusmod`) VALUES
(1, 'AdministraciÃ³n', 1),
(2, 'ConfiguraciÃ³n', 1),
(3, 'Curso', 1),
(4, 'Persona', 1),
(5, 'Seguridad', 1),
(6, 'Reporte', 1),
(7, 'Ayuda', 1),
(8, 'InscripciÃ³n', 1),
(9, 'Bienes Nacionales', 1),
(10, 'Consumibles', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tmodulo_trol`
--

CREATE TABLE `tmodulo_trol` (
  `idmodulo` int(11) NOT NULL,
  `idrol` int(11) NOT NULL,
  `orden` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tmodulo_trol`
--

INSERT INTO `tmodulo_trol` (`idmodulo`, `idrol`, `orden`) VALUES
(1, 1, 1),
(1, 2, 1),
(1, 3, 1),
(1, 4, 1),
(2, 1, 2),
(2, 2, 2),
(2, 3, 2),
(2, 4, 2),
(3, 1, 5),
(3, 2, 3),
(3, 3, 3),
(3, 4, 3),
(4, 1, 6),
(4, 2, 6),
(4, 3, 6),
(4, 4, 6),
(5, 1, 7),
(5, 2, 7),
(5, 3, 7),
(5, 4, 7),
(6, 1, 8),
(6, 2, 8),
(6, 3, 8),
(6, 4, 8),
(7, 1, 9),
(7, 2, 9),
(7, 3, 9),
(7, 4, 9),
(8, 1, 5),
(8, 2, 4),
(8, 3, 4),
(8, 4, 4),
(9, 1, 3),
(9, 2, 3),
(9, 3, 3),
(9, 4, 3),
(10, 1, 4),
(10, 2, 4),
(10, 3, 4),
(10, 4, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tmunicipio`
--

CREATE TABLE `tmunicipio` (
  `idmunicipio` int(11) NOT NULL,
  `descripcionmun` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `estatusmun` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tmunicipio`
--

INSERT INTO `tmunicipio` (`idmunicipio`, `descripcionmun`, `estatusmun`) VALUES
(1, 'PAEZ', 1),
(2, 'ARAURE', 1),
(3, 'AGUA BLANCA', 1),
(4, 'ESTELLER', 1),
(5, 'GUANARE', 1),
(6, 'GUANARITO', 1),
(7, 'OSPINO', 1),
(8, 'PAPELON', 1),
(9, 'SAN GENARO DE BOCONOITO', 1),
(10, 'SAN RAFAEL DE ONOTO', 1),
(11, 'SANTA ROSALIA', 1),
(12, 'SUCRE', 1),
(13, 'TUREN', 1),
(14, 'MONSEÃ‘OR JOSE VICENTE DE UNDA', 1),
(15, 'QWEQWE', 0),
(16, 'QWEQWEQWE', 1),
(17, 'WERWERWER', 1),
(18, 'SIMON PLANAS', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tnoticia`
--

CREATE TABLE `tnoticia` (
  `idnoticia` int(11) NOT NULL,
  `titulonot` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `textonot` text CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `imagennot` varchar(45) NOT NULL,
  `fechanot` date NOT NULL,
  `estatusnot` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tobjetivo`
--

CREATE TABLE `tobjetivo` (
  `idobjetivo` int(11) NOT NULL,
  `nombreobj` varchar(500) COLLATE utf8_spanish2_ci NOT NULL,
  `contenidoobj` text COLLATE utf8_spanish2_ci NOT NULL,
  `estatusobj` char(1) COLLATE utf8_spanish2_ci NOT NULL DEFAULT '1',
  `tunidad_idunidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tobjetivo`
--

INSERT INTO `tobjetivo` (`idobjetivo`, `nombreobj`, `contenidoobj`, `estatusobj`, `tunidad_idunidad`) VALUES
(1, 'Conceptos bÃ¡sicos', 'Conceptos bÃ¡sicos', '1', 1),
(9, 'FUNDAMENTOS Y ANTECEDENTES', 'DEFINICION, EVOLUCION, CLASIFICACION USO, IMPORTANCIA Y FUNCIONAMIENTO BASICO.\r\n                                                                    \r\n                                                                    ', '1', 5),
(10, 'PERIFERICOS DEENTRADA,SALIDA Y MIXTOS', 'CONCEPTOS, UTILIDAD, TIPOS Y CLASIFICACION. \r\n                                                                    \r\n                                                                    ', '1', 5),
(11, 'INTRODUCCION A LA  REDES', 'DEFINICION, FUNCIONAIENTO, COMPONENTE BASICOS, ASPECTOS GENERALES Y ANTECENDENTE DE INTERNET.\r\n                                                                    \r\n                                                                    ', '1', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tparentesco`
--

CREATE TABLE `tparentesco` (
  `idparentesco` int(11) NOT NULL,
  `descripcionpar` varchar(45) NOT NULL,
  `estatuspar` char(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tparentesco`
--

INSERT INTO `tparentesco` (`idparentesco`, `descripcionpar`, `estatuspar`) VALUES
(1, 'PADRE', '1'),
(2, 'MADRE', '1'),
(3, 'TIO', '1'),
(4, 'HERMANO', '1'),
(5, 'PRIMO', '1'),
(6, 'SOBRINO', '1'),
(7, 'ABUELO', '1'),
(8, 'ABUELA', '1'),
(9, 'TIA', '1'),
(10, 'NO APLICA', '1'),
(11, 'PRIMA', '1'),
(12, 'DSFSDFS', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tparticipante`
--

CREATE TABLE `tparticipante` (
  `idparticipante` int(11) NOT NULL,
  `nacionalidadpar` char(1) DEFAULT 'V',
  `cedulapar` char(9) DEFAULT NULL,
  `nombreunopar` varchar(45) NOT NULL,
  `nombredospar` varchar(45) DEFAULT NULL,
  `apellidounopar` varchar(45) NOT NULL,
  `apellidodospar` varchar(45) DEFAULT NULL,
  `sexopar` char(1) NOT NULL,
  `telefonopar` varchar(12) NOT NULL,
  `correopar` varchar(55) DEFAULT NULL,
  `direccionpar` varchar(200) NOT NULL,
  `fechanacimientopar` date NOT NULL,
  `numhijopar` tinyint(1) DEFAULT NULL,
  `medioviviendapar` varchar(10) NOT NULL,
  `viviendapar` varchar(20) DEFAULT NULL,
  `tipoconstruccionpar` varchar(30) DEFAULT NULL,
  `braillepar` char(1) DEFAULT NULL,
  `etniapar` varchar(2) DEFAULT 'No',
  `tdiagnostico_iddiagnostico` int(11) NOT NULL,
  `tlocalidad_idlocalidad` int(11) NOT NULL,
  `tinstitucion_idinstitucion` int(11) DEFAULT NULL,
  `estatuspar` char(1) NOT NULL DEFAULT '1',
  `numerohermanospar` int(4) DEFAULT NULL,
  `tlocalidad_idlugarnacimiento` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tparticipante`
--

INSERT INTO `tparticipante` (`idparticipante`, `nacionalidadpar`, `cedulapar`, `nombreunopar`, `nombredospar`, `apellidounopar`, `apellidodospar`, `sexopar`, `telefonopar`, `correopar`, `direccionpar`, `fechanacimientopar`, `numhijopar`, `medioviviendapar`, `viviendapar`, `tipoconstruccionpar`, `braillepar`, `etniapar`, `tdiagnostico_iddiagnostico`, `tlocalidad_idlocalidad`, `tinstitucion_idinstitucion`, `estatuspar`, `numerohermanospar`, `tlocalidad_idlugarnacimiento`) VALUES
(1, 'V', '09837744', 'LEONEL', 'ANDRES', 'GONZALEZ', '', 'M', '04266526658', 'leonel@gmail.com', 'URB. TRICENTENARIA F-8 CASA # 08', '2006-11-02', 2, 'RURAL', 'PROPIA', 'BLOQUES Y ZINC', '0', '0', 2, 2, 10, '1', 2, 2),
(2, 'V', '11078708', 'JAIMAR', 'JOSE', 'CASTILLO', 'SANCHEZ', 'F', '04245469080', 'janmar@gmail.com', 'URB. PRADOS DEL SOL SECTOR VENEZUELA E/T 2 Y 3 CALLE 8 CASA # 23', '2008-10-01', 1, 'URBANO', 'PROPIA', 'INAVI', '0', '0', 3, 1, 5, '1', 1, 1),
(3, 'V', '15493031', 'OSMAR ', '', 'HERNANDEZ', '', 'M', '04145568346', 'coreo@dfr.com', 'PAYARA CENTRO CALLE 11 C/AV 2 # 11', '2008-05-29', 3, 'URBANO', 'PROPIA', 'INAVI', '0', '0', 3, 1, 6, '1', 2, 1),
(4, 'V', '16964940', 'JESUS', 'DANIEL', 'NIEVES', 'Q', 'M', '04262405761', 'jesusdnieves@hotmail.com', 'BARRIO LA DEMOCRACIA AV. 1 CALLEJÃ³N 1 CASA #32', '2004-05-12', 2, 'URBANO', 'PROPIA', 'BLOQUES Y ZINC', '1', '0', 3, 1, 4, '1', 3, 1),
(5, 'V', '19170250', 'RONNY', '', 'RODRIGUEZ', '', 'M', '04167528081', 'ronny@hotmail.com', 'BARRIO LA PAZ ', '2006-12-09', 1, 'RURAL', 'INVADIDA', 'BLOQUES Y ZINC', '0', '0', 2, 1, 1, '1', 1, 1),
(6, 'V', '11847486', 'NAYILETH', 'MARIANELA', 'ADJUNTA', 'ORTIZ', 'F', '04165368716', '', 'BARRIO "SANTA ELENA", AV. 5 ENTRE CALLES 1 Y 2 CASA NRO. 15 ', '2002-12-01', 4, 'URBANO', 'PROPIA', 'BLOQUES Y ZINC', '0', '0', 3, 1, 9, '1', 1, 1),
(7, 'V', '11542861', 'HEIBER', '', 'PARADA', '', 'M', '04164514140', 'heiber@hotmail.com', 'CASERÃ­O MIJAGUITO CALLE PRINCIPAL CASA # 55', '1999-11-11', 1, 'RURAL', 'PROPIA', 'BLOQUES Y ZINC', '0', '0', 2, 1, 0, '1', 1, 1),
(8, 'V', '20157379', 'FRANCISBETH', '', 'COLMENAREZ', '', 'F', '04160389433', '', 'URB. SAN JOSE 2 LOTE A CASA 39', '2010-12-13', 1, 'URBANO', 'PROPIA', 'INAVI', '0', '0', 2, 2, 0, '1', 1, 2),
(9, 'V', '18732314', 'FEDERICA', '', 'QUEVEDO', '', 'F', '04268492413', '', 'RIO ACARIGUA CALLE 1 SECTOR EL SAMAN', '2010-06-01', 1, 'RURAL', 'PROPIA', 'BLOQUES Y ZINC', '0', '0', 3, 7, 0, '1', 1, 2),
(10, 'V', '24587474', 'JEAN', 'CARLOS', 'QUIROZ', '', 'M', '00000000000', '', 'BARRIO BOLÃ­VAR SECTOR LA LAGUNITA CALLE 5 C/A 8\r\n', '1994-02-01', 2, 'URBANO', 'PROPIA', 'INAVI', '0', '0', 2, 1, 0, '1', 1, 1),
(11, 'V', '17364390', 'MICHELLY', '', 'DURAN', '', 'F', '00000000000', '', 'URB DURIGUA 2 CALLE 4 CASA 1', '2009-07-28', 2, 'URBANO', 'PROPIA', 'INAVI', '0', '0', 2, 1, 0, '1', 2, 2),
(12, 'V', '24567206', 'ERIKA', '', 'MARTINEZ', '', 'F', '05226224844', '', 'C.H. SIMÃ³N BOLÃ­VAR TORRE 11-B APART. # \r\n', '1989-08-27', 1, 'URBANO', 'PROPIA', 'INAVI', '0', '0', 2, 1, 0, '1', 1, 1),
(13, 'V', '18691718', 'YEARLESKY', '', 'GUERRERO', '', 'F', '02556155551', '', 'C.H. SIMÃ³N BOLÃ­VAR\r\n', '1989-09-27', 1, 'URBANO', 'PROPIA', 'INAVI', '0', '0', 2, 1, 0, '1', 1, 1),
(14, 'V', '11079158', 'GRECIA', '', 'PEROZA', '', 'F', '00000000000', '', 'CASERÃ­O SABANETICA CALLE PRINCIPAL CASA S/N', '2006-07-15', 1, 'RURAL', 'PROPIA', 'BLOQUES Y ZINC', '1', '0', 2, 1, 0, '1', 1, 2),
(15, 'V', '19377573', 'MARIA', 'DE LOS ANGELES', 'BASTIDAS', '', 'F', '04267407396', '', 'LOS MALABARES CALLE PRINCIPAL SECTOR LA CAÃ±ADA S/N \r\n', '1986-11-19', 1, 'RURAL', 'PROPIA', 'BLOQUES Y ZINC', '0', '0', 2, 2, 0, '1', 1, 2),
(16, 'V', '21563851', 'KEVIN', '', 'MARQUEZ', '', 'M', '00000000000', '', 'URB. SAN JOSÃ© II CALLE 15 TERRAZA # 05', '2004-05-25', 1, 'URBANO', 'PROPIA', 'INAVI', '1', '0', 2, 2, 0, '1', 1, 2),
(17, 'V', '15070543', 'ROMMY', '', 'CASTAÃ±EDA', '', 'M', '04145593057', '', 'URB. EL BOSQUE AV. PRINCIPAL #51 SECTOR VILLA ARAURE I\r\n', '1981-02-16', 1, 'URBANO', 'PROPIA', 'INAVI', '0', '0', 3, 2, 0, '1', 1, 2),
(18, 'V', '16041804', 'YUSLEIDDY', '', 'MÃ¡RQUEZ', '', 'F', '02556156996', '', 'AV. 5 DE DICIEMBRE C/A 29 C/C 23 EDIF. VERCHONI # 08 \r\n', '1979-06-16', 1, 'URBANO', 'PROPIA', 'INAVI', '0', '0', 4, 2, 0, '1', 1, 2),
(19, 'V', '12446689', 'MARIÃ¡NGEL', '', 'SÃ¡NCHEZ', '', 'F', '04167547627', '', 'URB. LA GOAJIRA CALLE F VDA 10  CASA # 01\r\n', '1971-12-15', 1, 'URBANO', 'PROPIA', 'INAVI', '0', '0', 4, 2, 0, '1', 1, 2),
(20, 'V', '11847413', 'MINERVA', '', 'GALLARDO', '', 'F', '04167547627', '', 'URB. TRICENTENARIA MANZANA L-2 CASA #12\r\n', '1971-09-25', 1, 'URBANO', 'PROPIA', 'INAVI', '0', '0', 2, 2, 0, '1', 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tpersonal`
--

CREATE TABLE `tpersonal` (
  `idTpersonal` int(11) NOT NULL,
  `nacionalidadper` char(1) COLLATE utf8_spanish2_ci DEFAULT 'V',
  `idpersonal` char(9) COLLATE utf8_spanish2_ci NOT NULL,
  `nombreunoper` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `nombredosper` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `apellidounoper` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `apellidodosper` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `sexoper` char(1) COLLATE utf8_spanish2_ci NOT NULL,
  `fechanacimientoper` date NOT NULL,
  `correoper` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `direccionper` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `telefonoper` varchar(12) COLLATE utf8_spanish2_ci NOT NULL,
  `cargoper` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `estatusper` char(1) COLLATE utf8_spanish2_ci NOT NULL DEFAULT '1',
  `tdiagnostico_iddiagnostico` int(11) NOT NULL,
  `tlocalidad_idlocalidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tpersonal`
--

INSERT INTO `tpersonal` (`idTpersonal`, `nacionalidadper`, `idpersonal`, `nombreunoper`, `nombredosper`, `apellidounoper`, `apellidodosper`, `sexoper`, `fechanacimientoper`, `correoper`, `direccionper`, `telefonoper`, `cargoper`, `estatusper`, `tdiagnostico_iddiagnostico`, `tlocalidad_idlocalidad`) VALUES
(1, 'V', 'ADMINISTR', 'ADMINISTRADOR', 'ADMINISTRADOR', 'ADMINISTRADOR', 'ADMINISTRADOR', 'M', '2012-02-01', '', 'CAIDV 2014', '02556616161', 'WebMaster', '1', 1, 0),
(2, 'V', '12526145', 'LEIBI', '', 'GONZALEZ', '', 'M', '1975-08-12', 'leibigon@gmail.com', 'VILLAS DEL PILAR', '04125278606', 'WEB MASTER', '1', 1, 2),
(3, '', '15491963', 'GABRIELED', 'VICENTE', 'ESCALONA', 'BONIFACIO', 'M', '1981-07-30', 'SPADARO.ANTO@GMAIL.COM', 'LLANO ALTO', '04145591333', 'WEB MASTER', '1', 1, 1),
(4, '', '17960877', 'EFREN ', 'DA', 'DIAZ', 'MARTINEZ', 'M', '1988-05-05', 'EDM_126@HOTMAIL.COM', 'VILLA ARAURE 2', '04121516744', 'WEB MASTER', '1', 1, 8),
(5, 'V', '18672728', 'JORGE', '', 'APONTE', '', 'M', '1987-12-17', 'coreo@sdd.com', 'ARAURE', '04125351857', 'ASISTENTE', '1', 1, 2),
(6, 'V', '21394280', 'GREGORIO', 'ALEXANDER', 'COLMENAREZ', 'MAQUEZ', 'M', '1994-07-01', 'alejandro@hotmail.com', 'URB LA VIRGINIA', '04145218273', 'DOCENTE', '1', 1, 1),
(9, '', '20390749', 'PRUEBA', 'WQEQEQ', 'ALFA', 'EQWQE', 'M', '1991-12-01', 'rodescobar44@gmail.com', 'QWEQWEQWE', '04125279313', 'QE', '1', 1, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tpregunta`
--

CREATE TABLE `tpregunta` (
  `idpregunta` int(11) NOT NULL,
  `pregunta` varchar(30) NOT NULL,
  `respuesta` varchar(30) NOT NULL,
  `tusuario_idusuario` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tpregunta`
--

INSERT INTO `tpregunta` (`idpregunta`, `pregunta`, `respuesta`, `tusuario_idusuario`) VALUES
(1, 'QUIEN ERES?', 'ANTONIOSPADARO', '15491963'),
(2, 'MASCOTA', 'PEPITO', '15491963'),
(3, 'PERRO?', 'TOBI', '12526145'),
(4, 'APELLIDO', 'TOVAR', '12526145'),
(5, 'LUGAR DE NACIMIENTO DE LA MADR', 'ACARIGUA', '17960877'),
(6, 'PROFESOR FAVORITO', 'AQUILES', '17960877');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tpresentacion`
--

CREATE TABLE `tpresentacion` (
  `idpresentacion` int(11) NOT NULL,
  `nombre` varchar(40) COLLATE utf8_bin NOT NULL,
  `estatus` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `tpresentacion`
--

INSERT INTO `tpresentacion` (`idpresentacion`, `nombre`, `estatus`) VALUES
(1, 'BULTO', 1),
(2, 'SACO', 1),
(3, 'PALETA', 1),
(4, 'PAILA', 1),
(5, 'CAJA', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tres`
--

CREATE TABLE `tres` (
  `idTpersonal` int(11) NOT NULL,
  `nacionalidadper` char(1) COLLATE utf8_spanish2_ci DEFAULT 'V',
  `idpersonal` char(9) COLLATE utf8_spanish2_ci NOT NULL,
  `nombreunoper` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `nombredosper` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `apellidounoper` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `apellidodosper` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `sexoper` char(1) COLLATE utf8_spanish2_ci NOT NULL,
  `fechanacimientoper` date NOT NULL,
  `correoper` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `direccionper` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `telefonoper` varchar(12) COLLATE utf8_spanish2_ci NOT NULL,
  `cargoper` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `estatusper` char(1) COLLATE utf8_spanish2_ci NOT NULL DEFAULT '1',
  `tdiagnostico_iddiagnostico` int(11) NOT NULL,
  `tlocalidad_idlocalidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tres`
--

INSERT INTO `tres` (`idTpersonal`, `nacionalidadper`, `idpersonal`, `nombreunoper`, `nombredosper`, `apellidounoper`, `apellidodosper`, `sexoper`, `fechanacimientoper`, `correoper`, `direccionper`, `telefonoper`, `cargoper`, `estatusper`, `tdiagnostico_iddiagnostico`, `tlocalidad_idlocalidad`) VALUES
(1, 'V', 'administr', 'Administrador', 'Administrador', 'Administrador', 'Administrador', 'M', '2012-02-01', '', 'CAIDV 2014', '02556616161', 'WebMaster', '1', 1, 0),
(2, 'V', '12526145', 'LEIBI', '', 'GONZALEZ', '', 'M', '1975-08-12', 'leibigon@gmail.com', 'VILLAS DEL PILAR', '04125278606', 'WEB MASTER', '1', 1, 2),
(3, 'V', '15491963', 'ANTONIO', 'ALBERTO', 'SPADARO', 'BONIFACIO', 'M', '1981-07-30', 'SPADARO.ANTO@GMAIL.COM', 'LLANO ALTO', '04145591333', 'WEB MASTER', '1', 1, 2),
(4, 'V', '17960877', 'EFREN ', '', 'DIAZ', 'MARTINEZ', 'M', '1988-05-05', 'EDM_126@HOTMAIL.COM', 'VILLA ARAURE 2', '04121516744', 'WEB MASTER', '1', 1, 2),
(5, 'V', '18672728', 'JORGE', '', 'APONTE', '', 'M', '1987-12-17', 'coreo@sdd.com', 'ARAURE', '04125351857', 'ASISTENTE', '1', 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tresponsableente`
--

CREATE TABLE `tresponsableente` (
  `idTresponsableente` int(11) NOT NULL,
  `nacionalidadper` char(1) COLLATE utf8_spanish2_ci DEFAULT 'V',
  `cedula` char(9) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `idFenteExterno` int(11) DEFAULT NULL,
  `nombrefull` varchar(120) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `apellidofull` varchar(120) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `Estatus` char(1) COLLATE utf8_spanish2_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tresponsableente`
--

INSERT INTO `tresponsableente` (`idTresponsableente`, `nacionalidadper`, `cedula`, `idFenteExterno`, `nombrefull`, `apellidofull`, `Estatus`) VALUES
(1, 'V', 'ADMINISTR', 1, 'ADMINISTRADOR', 'ADMINISTRADOR', '1'),
(2, 'V', '12526145', 1, 'LEIBI', 'GONZALEZA', '1'),
(3, 'V', '15491963', 1, 'ANTONIO', 'SPADARO', '1'),
(4, 'V', '17960877', 1, 'EFREN ', 'DIAZ', '1'),
(5, 'V', '18672728', 2, 'JORGE', 'APONTE', '1'),
(6, 'E', '213123123', 1, 'QEWQWEQWE', 'QWEQWEQWEQ', '1'),
(7, 'V', '324234', 2, 'QWEQWE', 'EQWEQW', '1'),
(8, 'V', '21394280', 2, 'GREGORIO ALEXANDER', 'COLMENAREZ MARQUEZ', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trol`
--

CREATE TABLE `trol` (
  `idrol` int(11) NOT NULL,
  `nombrerol` varchar(45) NOT NULL,
  `estatusrol` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `trol`
--

INSERT INTO `trol` (`idrol`, `nombrerol`, `estatusrol`) VALUES
(1, 'ADMINISTRADOR', 1),
(2, 'DIRECTOR(A)', 1),
(3, 'DOCENTE', 1),
(4, 'SECRETARIA', 1),
(5, 'SUB-DIRECTORA', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trubro`
--

CREATE TABLE `trubro` (
  `idgrupo` int(11) NOT NULL,
  `nombreg` varchar(40) NOT NULL,
  `estatus` char(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `trubro`
--

INSERT INTO `trubro` (`idgrupo`, `nombreg`, `estatus`) VALUES
(2, 'COMPUTACION', '1'),
(3, 'ELECTRICIDAD', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tsalida`
--

CREATE TABLE `tsalida` (
  `idsalida` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `fechaentrega` date NOT NULL,
  `cod_tdepartamento` int(11) NOT NULL,
  `idFpersonal` char(9) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `idFresponsableDto` char(9) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `nomentrega` varchar(12) COLLATE utf8_bin NOT NULL,
  `cedrecibido` char(9) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `observacion` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT 'Entregado en su totalidad',
  `estatus` char(1) COLLATE utf8_bin NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `tsalida`
--

INSERT INTO `tsalida` (`idsalida`, `fecha`, `fechaentrega`, `cod_tdepartamento`, `idFpersonal`, `idFresponsableDto`, `nomentrega`, `cedrecibido`, `observacion`, `estatus`) VALUES
(1, '2001-08-20', '2001-08-20', 3, '21394280', '21394280', 'Jose Mazzei', '21394280', 'Si', '2'),
(2, '2001-05-20', '2001-05-20', 3, '21394280', '21394280', 'Jose Mazzei', '21394280', 'hgjghjgh', '2'),
(3, '2001-05-20', '0000-00-00', 2, '21394280', '21394280', '', '21394280', 'Entregado en su totalidad', '0'),
(4, '2001-05-20', '2016-07-30', 1, '21394280', '21394280', '', '21394280', 'ertetertetert', '2'),
(5, '2001-05-20', '2001-07-20', 2, '21394280', '21394280', '', '21394280', 'qweqwe', '2'),
(6, '2001-05-20', '2001-07-20', 4, '21394280', '21394280', '', '21394280', 'uyiyu', '2'),
(7, '2001-05-20', '2001-05-20', 1, '12526145', '17960877', '', '21394280', 'sfrser', '2'),
(8, '2001-08-20', '2001-05-20', 1, '17960877', '15491963', '', '17960877', 'DSFRWE', '2'),
(9, '2001-07-20', '2031-07-20', 2, '15491963', '17960877', '', '15491963', 'qeqwe', '2'),
(10, '2001-05-20', '0000-00-00', 2, '17960877', '18672728', '', '17960877', 'Entregado en su totalidad', '1'),
(11, '2016-07-12', '2016-07-20', 2, '17960877', '18672728', '', '17960877', 'ewrwer', '2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tservicio`
--

CREATE TABLE `tservicio` (
  `idservicio` int(11) NOT NULL,
  `nombreser` varchar(50) NOT NULL,
  `enlaceser` varchar(50) NOT NULL,
  `MarcaAgregacion` char(1) NOT NULL DEFAULT '1',
  `visibleser` tinyint(4) NOT NULL DEFAULT '1',
  `estatusser` tinyint(4) NOT NULL DEFAULT '1',
  `idmodulo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tservicio`
--

INSERT INTO `tservicio` (`idservicio`, `nombreser`, `enlaceser`, `MarcaAgregacion`, `visibleser`, `estatusser`, `idmodulo`) VALUES
(1, 'MÃ³dulo', 'seguridad/modulo', '0', 1, 1, 1),
(2, 'Registrar modulo', 'seguridad/registrar_modulo', '0', 0, 1, 1),
(4, 'Servicio', 'seguridad/servicio', '0', 1, 1, 1),
(5, 'Registrar servicio', 'seguridad/registrar_servicio', '0', 0, 1, 1),
(7, 'Rol', 'seguridad/rol', '0', 1, 1, 1),
(8, 'Registrar rol', 'seguridad/registrar_rol', '0', 0, 1, 1),
(10, 'Asignacion de modulos/servicios', 'seguridad/asignacion', '0', 1, 1, 1),
(11, 'Asignar mÃ³dulo', 'seguridad/asignar_modulo', '0', 1, 1, 1),
(12, 'Asignar servicio', 'seguridad/asignar_servicio', '0', 1, 1, 1),
(13, 'Consultar mÃ³dulo', 'seguridad/consultar_modulo', '0', 0, 1, 1),
(14, 'Consultar servicio', 'seguridad/consultar_servicio', '0', 0, 1, 1),
(15, 'Consultar rol', 'seguridad/consultar_rol', '0', 0, 1, 1),
(17, 'Auditoria de sistema', 'seguridad/bitacora', '0', 1, 1, 1),
(18, 'Consultar bitacora', 'seguridad/consultar_bitacora', '0', 0, 1, 1),
(19, 'Configurar sistema ', 'sistema/configurar', '0', 1, 1, 1),
(20, 'Municipio', 'archivo/municipio', '0', 1, 1, 2),
(21, 'Registrar municipio', 'archivo/registrar_municipio', '0', 0, 1, 2),
(22, 'Consultar municipio', 'archivo/consultar_municipio', '0', 0, 1, 2),
(23, 'Parentesco', 'archivo/parentesco', '0', 1, 1, 2),
(24, 'Registrar parentesco', 'archivo/registrar_parentesco', '0', 0, 1, 2),
(25, 'Consultar parentesco', 'archivo/consultar_parentesco', '0', 0, 1, 2),
(26, 'CondiciÃ³n visual', 'archivo/diagnostico', '0', 1, 1, 2),
(27, 'Registrar diagnostico', 'archivo/registrar_diagnostico', '0', 0, 1, 2),
(28, 'Consultar diagnostico', 'archivo/consultar_diagnostico', '0', 0, 1, 2),
(29, 'Localidad', 'archivo/localidad', '0', 1, 1, 2),
(30, 'Registrar localidad', 'archivo/registrar_localidad', '0', 0, 1, 2),
(31, 'Consultar localidad', 'archivo/consultar_localidad', '0', 0, 1, 2),
(32, 'Registrar Grupo', 'archivo/registrar_grupo', '0', 0, 1, 2),
(33, 'Consultar Grupo', 'archivo/consultar_grupo', '0', 0, 1, 2),
(34, 'Grupo', 'archivo/grupo', '0', 1, 1, 2),
(35, 'Registrar participante', 'persona/registrar_participante', '0', 0, 1, 4),
(36, 'Registrar Docente', 'persona/registrar_docente', '0', 0, 1, 4),
(37, 'Consultar docente', 'persona/consultar_docente', '0', 0, 1, 4),
(38, 'Docente', 'persona/docente', '0', 1, 1, 4),
(39, 'InstituciÃ³n', 'archivo/institucion', '0', 1, 1, 2),
(40, 'Registrar instituciÃ³n', 'archivo/registrar_institucion', '0', 0, 1, 2),
(41, 'Consultar instituciÃ³n', 'archivo/consultar_institucion', '0', 0, 1, 2),
(42, 'Hoja de vida del Participante', 'persona/participante', '0', 1, 1, 4),
(43, 'Consultar Participante', 'persona/consultar_participante', '0', 0, 1, 4),
(44, 'Lapso', 'curso/lapso', '0', 1, 1, 3),
(45, 'Apertura lapso', 'curso/registrar_lapso', '0', 0, 1, 3),
(46, 'Planificar curso', 'curso/registrar_curso', '0', 1, 1, 3),
(47, 'Curso activo / trasladar ', 'curso/curso', '0', 1, 1, 3),
(48, 'Personal', 'persona/personal', '0', 1, 1, 4),
(49, 'Registrar personal', 'persona/registrar_personal', '0', 0, 1, 4),
(50, 'Eliminar servicio', 'seguridad/eliminar_servicio', '0', 0, 1, 1),
(51, 'Eliminar modulo', 'seguridad/eliminar_modulo', '0', 0, 1, 1),
(52, 'Cambiar clave', 'seguridad/cambiar_clave', '0', 1, 1, 5),
(53, 'Pregunta secreta', 'seguridad/registrar_pregunta', '0', 1, 1, 5),
(54, 'Aula', 'archivo/aula', '0', 1, 1, 2),
(55, 'Registrar aula', 'archivo/registrar_aula', '0', 0, 1, 2),
(56, 'Consultar aula', 'archivo/consultar_aula', '0', 0, 1, 2),
(57, 'Eliminar aula', 'archivo/eliminar_aula', '0', 0, 1, 2),
(58, 'Area de Conocimiento', 'archivo/area_conocimiento', '0', 1, 1, 2),
(59, 'Registrar Area de Conocimiento', 'archivo/registrar_area', '0', 0, 1, 2),
(60, 'Consultar Area de Conocimiento', 'archivo/consultar_area', '0', 0, 1, 2),
(61, 'Eliminar Area de Conocimiento', 'archivo/eliminar_area', '0', 0, 1, 2),
(62, 'Asignatura', 'archivo/asignatura', '0', 1, 1, 2),
(63, 'Registrar Asignatura', 'archivo/registrar_asignatura', '0', 0, 1, 2),
(64, 'Consultar Asignatura', 'archivo/consultar_asignatura', '0', 0, 1, 2),
(65, 'Eliminar Asignatura', 'archivo/eliminar_asignatura', '0', 0, 1, 2),
(66, 'Eliminar rol', 'seguridad/eliminar_rol', '0', 0, 1, 1),
(67, 'Eliminar localidad', 'archivo/eliminar_localidad', '0', 0, 1, 2),
(68, 'Eliminar municipio', 'archivo/eliminar_municipio', '0', 0, 1, 2),
(69, 'Eliminar instituciÃ³n', 'archivo/eliminar_institucion', '0', 0, 1, 2),
(70, 'Eliminar diagnostico', 'archivo/eliminar_diagnostico', '0', 0, 1, 2),
(71, 'Consultar personal', 'persona/consultar_personal', '0', 0, 1, 4),
(72, 'Eliminar Personal', 'persona/eliminar_personal', '0', 0, 1, 4),
(73, 'Eliminar parentesco', 'archivo/eliminar_parentesco', '0', 0, 1, 2),
(74, 'Eliminar Grupo', 'archivo/eliminar_grupo', '0', 0, 1, 2),
(75, 'Eliminar aula', 'archivo/eliminar_aula', '0', 0, 1, 2),
(76, 'Registrar Noticia', 'sistema/registrar_noticia', '0', 0, 1, 1),
(77, 'Noticia', 'sistema/noticia', '0', 1, 1, 1),
(78, 'Consultar Noticia', 'sistema/consultar_noticia', '0', 0, 1, 1),
(79, 'Eliminar Noticia', 'sistema/eliminar_noticia', '0', 0, 1, 1),
(80, 'Registrar Slider', 'sistema/registrar_slider', '0', 0, 1, 1),
(81, 'Slider', 'sistema/slider', '0', 1, 1, 1),
(82, 'Consultar Slider', 'sistema/consultar_slider', '0', 0, 1, 1),
(83, 'Eliminar Slider', 'sistema/eliminar_slider', '0', 0, 1, 1),
(84, 'InscripciÃ³n masiva por curso', 'inscripcion/listado_cursos_inscribir', '0', 1, 1, 8),
(85, 'InscripciÃ³n por participante', 'inscripcion/listado_participantes_inscribir', '0', 1, 1, 8),
(86, 'InscripciÃ³n masiva', 'inscripcion/inscripcion_masiva', '0', 0, 1, 8),
(87, 'InscripciÃ³n individual', 'inscripcion/inscripcion_individual', '0', 0, 1, 8),
(88, 'Hoja de vida del Participante', 'reporte/planilla_inscripcion', '0', 1, 1, 6),
(89, 'Familiares', 'reporte/familiar_participante ', '0', 1, 0, 6),
(90, 'Eliminar participante', 'persona/eliminar_participante', '0', 0, 1, 4),
(91, 'Eliminar Docente', 'persona/eliminar_docente', '0', 0, 1, 4),
(92, 'Curso Inactivo', 'curso/cursos_inactivos', '0', 1, 1, 3),
(93, 'Consultar historial curso', 'curso/detalle_curso_inactivo', '0', 0, 1, 3),
(94, 'Primera vez', 'seguridad/primera_vez', '0', 0, 1, 5),
(95, 'Desbloquear', 'seguridad/desbloquear', '0', 1, 1, 1),
(99, 'Consultar Lapso', 'curso/consultar_lapso', '0', 0, 1, 3),
(100, 'Eliminar lapso', 'curso/eliminar_lapso', '0', 0, 1, 3),
(101, 'Consultar Curso', 'curso/detalle_curso_activo', '0', 0, 1, 3),
(102, 'Desincorporar por participante ', 'inscripcion/listado_participantes_desincorporar', '0', 1, 1, 8),
(103, 'Desincorporar masivamente por curso', 'inscripcion/listado_cursos_desincorporar', '0', 1, 1, 8),
(104, 'Desincorporar participante', 'inscripcion/desincorporar_participante', '0', 0, 1, 8),
(105, 'Desincorporar participantes', 'inscripcion/desincorporar_participantes', '0', 0, 1, 8),
(107, 'historial de cursos por participante', 'persona/historial_participante_detalle', '0', 0, 1, 3),
(108, 'Historial de lapso', 'reporte/historial_lapso', '0', 1, 1, 6),
(109, 'Historial Lapso', 'historial_lapso', '0', 0, 1, 6),
(110, 'Historial participante inscrito por curso', 'reporte/historial_participante', '0', 1, 1, 6),
(111, 'Familiar por participante', 'reporte/participante_familiar', '0', 1, 1, 6),
(112, 'Historial de curso', 'reporte/historial_curso', '0', 1, 1, 6),
(113, 'Listado Participante - Etnia', 'reporte/listado_participantes_etnia', '0', 1, 1, 6),
(114, 'Listado Participante - Huerfano', 'reporte/listado_participantes_huerfanos', '0', 1, 1, 6),
(115, 'Listado de docente por condiciÃ³n visual', 'reporte/listado_docente_diagnostico', '0', 1, 1, 6),
(116, 'Acerca de...', 'ayuda/acerca', '0', 1, 1, 7),
(117, 'Manual de Usuario', 'ayuda/manual_usuario', '0', 1, 1, 7),
(118, 'Auditoria de Usuario', 'seguridad/auditoria_usuarios', '0', 1, 1, 1),
(119, 'Consultar Usuario', 'seguridad/consultar_usuario', '0', 0, 1, 1),
(120, 'Criterio de evaluaciÃ³n', 'archivo/item', '0', 1, 1, 2),
(121, 'Registrar Item', 'archivo/registrar_item', '0', 0, 1, 2),
(122, 'Consultar item', 'archivo/consultar_item', '0', 0, 1, 2),
(123, 'Eliminar item', 'archivo/eliminar_item', '0', 0, 1, 2),
(124, 'Auditoria de Reporte', 'seguridad/bitacora_reporte', '0', 1, 1, 1),
(125, 'Consultar bitacora reporte', 'seguridad/consultar_bitacora_reporte', '0', 0, 1, 1),
(126, 'Bloquear/Desbloquear Usuario', 'seguridad/bloquear', '0', 1, 1, 1),
(127, 'Historial de clave', 'seguridad/listado_cambio_clave', '0', 1, 1, 1),
(128, 'Consultar claves', 'seguridad/consultar_claves', '0', 0, 1, 1),
(130, 'Mantenimiento Base de datos', 'seguridad/mantenimiento_bd', '0', 1, 1, 1),
(131, 'Asistencia', 'curso/asistencia', '0', 1, 1, 3),
(132, 'Registrar Asistencia', 'curso/registrar_asistencia', '0', 0, 1, 3),
(133, 'Instrumento', 'archivo/instrumento', '0', 1, 1, 2),
(134, 'Registrar Instrumento', 'archivo/registrar_instrumento', '0', 0, 1, 2),
(135, 'Consultar instrumento', 'archivo/consultar_instrumento', '0', 0, 1, 2),
(136, 'Eliminar instrumento', 'archivo/eliminar_instrumento', '0', 0, 1, 2),
(137, 'EvaluaciÃ³n', 'curso/evaluacion', '0', 1, 1, 3),
(138, 'Familiar', 'persona/familiar', '0', 1, 1, 4),
(139, 'Registrar Evaluacion', 'curso/registrar_evaluacion', '0', 0, 1, 3),
(140, 'Consultar EvaluaciÃ³n', 'curso/consultar_evaluacion', '0', 0, 1, 3),
(141, 'Eliminar EvaluaciÃ³n', 'curso/eliminar_evaluacion', '0', 0, 1, 3),
(142, 'Registrar Familiar', 'persona/registrar_familiar', '0', 0, 1, 4),
(143, 'Consultar Familiar', 'persona/consultar_familiar', '0', 0, 1, 4),
(144, 'Eliminar Familiar', 'persona/eliminar_familiar', '0', 0, 1, 4),
(145, 'TÃ©rminos y condiciones ', 'ayuda/terminos_condiciones', '0', 1, 1, 7),
(146, 'Normas y procedimientos', 'ayuda/normas_procedimientos', '0', 1, 1, 7),
(147, 'Participante inscrito por cursos', 'persona/historial_participante', '0', 1, 1, 3),
(148, 'Participante por evaluaciÃ³n', 'reporte/listado_participantes_evaluaciones', '0', 1, 1, 6),
(149, 'Consultar EvaluaciÃ³n', 'reporte/consultar_evaluaciones', '0', 0, 1, 6),
(150, 'Participante por asistencia', 'reporte/listado_participantes_asistencia', '0', 1, 1, 6),
(151, 'Consultar Asistencias', 'reporte/consultar_asistencias', '0', 0, 1, 6),
(152, 'RecepciÃ³n', 'inv_bienesnacionales/ver_inventario', '1', 1, 1, 9),
(153, 'Consumibles', 'inv_consumibles/ver_inventario', '0', 0, 1, 9),
(154, 'Registrar Consumible', 'inv_consumibles/registrar_articulocmb', '0', 0, 1, 9),
(155, 'Registrar Nacional', 'inv_bienesnacionales/recepcion_articulobn', '0', 0, 1, 9),
(157, 'Proveedor', 'archivo/proveedor', '1', 1, 1, 2),
(158, 'Registrar Proveedor', 'archivo/registrar_proveedor', '1', 0, 1, 2),
(159, 'Consultar Proveedor', 'archivo/consultar_proveedor', '1', 0, 1, 2),
(160, 'Motivo', 'archivo/motivo', '1', 1, 1, 2),
(161, 'Registrar Motivo', 'archivo/registrar_motivo', '1', 0, 1, 2),
(162, 'Consultar Motivo', 'archivo/consultar_motivo', '1', 0, 1, 2),
(163, 'Tipo de Bien', 'archivo/tipodebien', '1', 1, 1, 2),
(164, 'Registrar Tipo de Bien', 'archivo/registrar_tipodebien', '1', 0, 1, 2),
(165, 'Consultar Tipo de Bien', 'archivo/consultar_tipodebien', '1', 0, 1, 2),
(166, 'Marca ', 'archivo/marca', '1', 1, 1, 2),
(167, 'Registrar Marca ', 'archivo/registrar_marca', '1', 0, 1, 2),
(168, 'Consultar Marca ', 'archivo/consultar_marca', '1', 0, 1, 2),
(169, 'Modelo', 'archivo/modelo', '1', 1, 1, 2),
(170, 'Registrar Modelo', 'archivo/registrar_modelo', '1', 0, 1, 2),
(171, 'Consultar Modelo', 'archivo/consultar_modelo', '1', 0, 1, 2),
(172, 'CategorÃ­a de Bien', 'archivo/categoriadebien', '1', 1, 1, 2),
(173, 'Registrar Categoria de Bien', 'archivo/registrar_categoriadebien', '1', 0, 1, 2),
(174, 'Consultar Categoria de Bien', 'archivo/consultar_categoriadebien', '1', 0, 1, 2),
(175, 'Ente Externo', 'archivo/entereceptor', '1', 1, 1, 2),
(176, 'Registrar Ente Externo', 'archivo/registrar_entereceptor', '1', 0, 1, 2),
(177, 'Consultar Ente Externo', 'archivo/consultar_entereceptor', '1', 0, 1, 2),
(178, 'Asignar ArtÃculo', 'inv_bienesnacionales/asignacion_articulobn', '0', 0, 1, 9),
(179, 'DesincorporaciÃ³n', 'inv_bienesnacionales/ver_desincorporacion', '1', 1, 1, 9),
(180, 'DevoluciÃ³n', 'inv_bienesnacionales/ver_devolucion', '1', 1, 1, 9),
(181, 'Devolver ArtÃculo', 'inv_bienesnacionales/devolucion_articulobn', '0', 0, 1, 9),
(182, 'Desincorporar ArtÃculo', 'inv_bienesnacionales/desincorporar_articulobn', '0', 0, 1, 9),
(183, 'AsignaciÃ³n', 'inv_bienesnacionales/ver_asignacion', '1', 1, 1, 9),
(184, 'Prestamo', 'inv_bienesnacionales/ver_prestamo', '1', 1, 1, 9),
(185, 'Consultar RecepciÃ³n', 'inv_bienesnacionales/consultar_recepcion', '0', 0, 1, 9),
(186, 'Registrar Prestamo', 'inv_bienesnacionales/prestamo_articulobn', '0', 0, 1, 9),
(187, 'Consultar AsignaciÃ³n', 'inv_bienesnacionales/consultar_asignacion', '0', 0, 1, 9),
(188, 'Consultar DevoluciÃ³n', 'inv_bienesnacionales/consultar_devolucion', '0', 0, 1, 9),
(189, 'Consultar DesincorporaciÃ³n', 'inv_bienesnacionales/consultar_desincorporacion', '0', 0, 1, 9),
(190, 'Consultar Prestamo', 'inv_bienesnacionales/consultar_prestamo', '0', 0, 1, 9),
(191, 'Eliminar Proveedor', 'archivo/eliminar_proveedor', '1', 0, 1, 2),
(192, 'Eliminar Motivo', 'archivo/eliminar_motivo', '1', 0, 1, 2),
(193, 'Eliminar Tipo de Bien', 'archivo/eliminar_tipodebien', '1', 0, 1, 2),
(194, 'Eliminar Marca', 'archivo/eliminar_marca', '1', 0, 1, 2),
(195, 'Eliminar Modelo', 'archivo/eliminar_modelo', '1', 0, 1, 2),
(196, 'Eliminar Categoría de Bien', 'archivo/eliminar_categoriadebien', '1', 0, 1, 2),
(197, 'CatÃ¡logo', 'inv_consumibles/articulo', '2', 1, 1, 10),
(198, 'Solicitud de RecepciÃ³n', 'inv_consumibles/requisicion', '2', 1, 1, 10),
(199, 'Solicitud de AsignaciÃ³n', 'inv_consumibles/salida', '2', 1, 1, 10),
(200, 'Eliminar Ente Externo', 'archivo/eliminar_entereceptor', '1', 0, 1, 2),
(201, 'Responsable Ente Externo', 'persona/responsablereceptor', '1', 1, 1, 4),
(202, 'Consultar Responsable Receptor', 'persona/consultar_responsablereceptor', '1', 0, 1, 4),
(203, 'Consultar Responsable Receptor', 'persona/registrar_responsablereceptor', '1', 0, 1, 4),
(204, 'Eliminar Responsable Receptor', 'persona/eliminar_responsablereceptor', '1', 0, 1, 4),
(205, 'Hoja de vida del Bien Nacional', 'reporte/hojadevidabienes', '1', 1, 1, 6),
(206, 'Bienes Nacionales por rango de fecha', 'reporte/listadobienesfecha', '1', 1, 1, 6),
(207, 'Bienes Nacionales por departamento', 'reporte/listadobienesdepartamento', '1', 1, 1, 6),
(208, 'RestituciÃ³n', 'inv_bienesnacionales/ver_restitucion', '1', 1, 1, 9),
(209, 'Consultar RestituciÃ³n', 'inv_bienesnacionales/consultar_restitucion', '1', 0, 1, 9),
(210, 'Registrar RestituciÃ³n de Prestamo', 'inv_bienesnacionales/registrar_restitucion', '1', 0, 1, 9),
(211, 'Consultar Articulo', 'archivo/consultar_articulo', '2', 0, 1, 10),
(212, 'Registrar Articulo', 'archivo/registrar_articulo', '2', 0, 1, 10),
(213, 'Eliminar Articulo', 'archivo/eliminar_articulo', '2', 0, 1, 10),
(214, 'Consultar Salida', 'inv_consumibles/consultar_salida', '2', 0, 1, 10),
(215, 'Registrar Salida', 'inv_consumibles/registrar_salida', '2', 0, 1, 10),
(216, 'Consultar Requisicion', 'inv_consumibles/consultar_requisicion', '2', 0, 1, 10),
(217, 'Registrar Requisicion', 'inv_consumibles/registrar_requisicion', '2', 0, 1, 10),
(218, 'Eliminar Requisicion', 'inv_consumibles/eliminar_requisicion', '2', 0, 1, 10),
(219, 'Consultar RecepciÃ³n', 'inv_consumibles/consultar_entrada', '2', 0, 1, 10),
(220, 'Eliminar RecepciÃ³n', 'inv_consumibles/eliminar_entrada', '2', 0, 1, 10),
(221, 'Eliminar Salida', 'inv_consumibles/eliminar_salida', '2', 0, 1, 10),
(222, 'Consultar Salida Lista', 'inv_consumibles/consultar_salida_lista', '2', 0, 1, 10),
(223, 'PresentaciÃ³n', 'archivo/presentacion', '2', 1, 1, 2),
(224, 'Registrar presentaciÃ³n', 'archivo/registrar_presentacion', '2', 0, 1, 2),
(225, 'Consultar PresentaciÃ³n', 'archivo/consultar_presentacion', '2', 0, 1, 2),
(226, 'Unidad de medida', 'archivo/unidad_medida', '2', 1, 1, 2),
(227, 'Registrar unidad de medida', 'archivo/registrar_unidad_medida', '2', 0, 1, 2),
(228, 'Consultar unidad de medida', 'archivo/consultar_unidad_medida', '2', 0, 1, 2),
(229, 'Eliminar Unidad Medida', 'archivo/eliminar_unidad_medida', '2', 0, 1, 2),
(230, 'Eliminar PresentaciÃ³n', 'archivo/eliminar_presentacion', '2', 0, 1, 2),
(231, 'RecepciÃ³n de Consumibles', 'reporte/imprimir_entrada', '2', 1, 1, 6),
(232, 'Consumibles Faltantes', 'reporte/articulos_faltantes', '2', 1, 1, 6),
(233, 'Solicitud de Consumibles', 'reporte/imprimir_solicitud', '2', 1, 1, 6),
(234, 'AsignaciÃ³n de Consumibles', 'reporte/imprimir_salida', '2', 1, 1, 6),
(235, 'Consumibles Asignados Por Departamento', 'reporte/articulos_departamento', '2', 1, 1, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tservicio_trol`
--

CREATE TABLE `tservicio_trol` (
  `idservicio` int(11) NOT NULL,
  `idrol` int(11) NOT NULL,
  `orden` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tservicio_trol`
--

INSERT INTO `tservicio_trol` (`idservicio`, `idrol`, `orden`) VALUES
(1, 1, 2),
(2, 1, 0),
(4, 1, 3),
(5, 1, 0),
(7, 1, 1),
(8, 1, 0),
(11, 1, 4),
(12, 1, 5),
(13, 1, 0),
(14, 1, 0),
(15, 1, 0),
(17, 1, 6),
(17, 2, 1),
(18, 1, 0),
(18, 2, 0),
(19, 1, 0),
(19, 2, 7),
(20, 1, 1),
(20, 2, 1),
(20, 4, 1),
(21, 1, 0),
(21, 2, 0),
(21, 4, 0),
(22, 1, 0),
(22, 2, 0),
(22, 4, 0),
(23, 1, 5),
(23, 2, 5),
(23, 4, 4),
(24, 1, 0),
(24, 2, 0),
(24, 4, 0),
(25, 1, 0),
(25, 2, 0),
(25, 4, 0),
(26, 1, 4),
(26, 2, 4),
(26, 4, 3),
(27, 1, 0),
(27, 2, 0),
(27, 4, 0),
(28, 1, 0),
(28, 2, 0),
(28, 4, 0),
(29, 1, 2),
(29, 2, 2),
(29, 4, 2),
(30, 1, 0),
(30, 2, 0),
(30, 4, 0),
(31, 1, 0),
(31, 2, 0),
(31, 4, 0),
(32, 1, 0),
(32, 2, 0),
(32, 4, 0),
(33, 1, 0),
(33, 2, 0),
(33, 4, 0),
(34, 1, 6),
(34, 2, 6),
(34, 4, 5),
(35, 1, 0),
(35, 2, 0),
(35, 3, 0),
(35, 4, 0),
(36, 1, 0),
(36, 2, 0),
(36, 4, 0),
(37, 1, 0),
(37, 2, 0),
(37, 4, 0),
(38, 1, 1),
(38, 2, 1),
(38, 4, 1),
(39, 1, 3),
(39, 2, 3),
(39, 3, 1),
(39, 4, 0),
(40, 1, 0),
(40, 2, 0),
(40, 4, 0),
(41, 1, 0),
(41, 2, 0),
(41, 4, 0),
(42, 1, 3),
(42, 2, 2),
(42, 3, 0),
(42, 4, 2),
(43, 1, 0),
(43, 2, 0),
(43, 3, 0),
(43, 4, 0),
(44, 1, 1),
(44, 2, 1),
(44, 4, 1),
(45, 1, 0),
(45, 2, 0),
(45, 4, 0),
(46, 1, 2),
(46, 2, 2),
(46, 4, 2),
(47, 1, 3),
(47, 2, 3),
(47, 3, 1),
(47, 4, 3),
(48, 1, 4),
(48, 2, 3),
(48, 4, 3),
(49, 1, 0),
(49, 2, 0),
(49, 4, 0),
(50, 1, 0),
(51, 1, 0),
(52, 1, 1),
(52, 2, 1),
(52, 3, 1),
(52, 4, 1),
(53, 1, 2),
(53, 2, 2),
(53, 3, 2),
(53, 4, 2),
(54, 1, 7),
(54, 2, 7),
(54, 4, 6),
(55, 1, 0),
(55, 2, 0),
(55, 4, 0),
(56, 1, 0),
(56, 2, 0),
(56, 4, 0),
(57, 1, 0),
(57, 2, 0),
(57, 4, 0),
(58, 1, 8),
(58, 2, 8),
(58, 4, 7),
(59, 1, 0),
(59, 2, 0),
(59, 4, 0),
(60, 1, 0),
(60, 2, 0),
(60, 4, 0),
(61, 1, 0),
(61, 2, 0),
(61, 4, 0),
(62, 1, 9),
(62, 2, 9),
(62, 4, 8),
(63, 1, 0),
(63, 2, 0),
(63, 4, 0),
(64, 1, 0),
(64, 2, 0),
(64, 4, 0),
(65, 1, 0),
(65, 2, 0),
(65, 4, 0),
(66, 1, 0),
(67, 1, 0),
(67, 2, 0),
(67, 4, 0),
(68, 1, 0),
(68, 2, 0),
(68, 4, 0),
(69, 1, 0),
(69, 2, 0),
(69, 3, 0),
(69, 4, 0),
(70, 1, 0),
(70, 2, 0),
(70, 4, 0),
(71, 1, 0),
(71, 2, 0),
(71, 4, 0),
(72, 1, 0),
(72, 2, 0),
(72, 4, 0),
(73, 1, 0),
(73, 2, 0),
(73, 4, 0),
(74, 1, 0),
(74, 2, 0),
(74, 4, 0),
(75, 1, 0),
(75, 2, 0),
(75, 4, 0),
(76, 1, 0),
(76, 2, 0),
(77, 1, 9),
(77, 2, 4),
(77, 4, 1),
(78, 1, 0),
(78, 2, 0),
(79, 1, 0),
(79, 2, 0),
(80, 1, 0),
(80, 2, 0),
(81, 1, 10),
(81, 2, 5),
(81, 4, 2),
(82, 1, 0),
(82, 2, 0),
(83, 1, 0),
(83, 2, 0),
(84, 1, 1),
(84, 2, 1),
(84, 3, 1),
(84, 4, 1),
(85, 1, 2),
(85, 2, 2),
(85, 3, 2),
(85, 4, 2),
(86, 1, 0),
(86, 2, 0),
(86, 3, 0),
(86, 4, 0),
(87, 1, 0),
(87, 2, 0),
(87, 3, 0),
(87, 4, 0),
(88, 1, 1),
(88, 2, 1),
(88, 3, 1),
(88, 4, 1),
(90, 1, 0),
(90, 2, 0),
(90, 4, 0),
(91, 1, 0),
(91, 2, 0),
(91, 4, 0),
(92, 1, 4),
(92, 2, 4),
(92, 4, 4),
(93, 1, 0),
(93, 2, 0),
(93, 3, 0),
(93, 4, 0),
(94, 1, 0),
(94, 2, 0),
(94, 3, 0),
(94, 4, 0),
(99, 1, 0),
(99, 2, 0),
(99, 4, 0),
(100, 1, 0),
(100, 2, 0),
(100, 4, 0),
(101, 1, 0),
(101, 2, 0),
(101, 3, 0),
(101, 4, 0),
(102, 1, 4),
(102, 2, 3),
(102, 4, 4),
(103, 1, 3),
(103, 2, 4),
(103, 4, 3),
(104, 1, 0),
(104, 2, 0),
(104, 4, 0),
(105, 1, 0),
(105, 2, 0),
(105, 4, 0),
(107, 1, 0),
(107, 3, 0),
(108, 1, 3),
(108, 2, 7),
(108, 3, 2),
(108, 4, 3),
(109, 1, 0),
(109, 2, 0),
(109, 4, 0),
(110, 1, 4),
(110, 2, 6),
(110, 3, 3),
(110, 4, 4),
(111, 1, 2),
(111, 2, 5),
(111, 3, 4),
(111, 4, 2),
(112, 1, 5),
(112, 2, 2),
(112, 3, 5),
(112, 4, 5),
(113, 1, 6),
(113, 2, 4),
(113, 4, 6),
(114, 1, 7),
(114, 2, 3),
(114, 4, 7),
(115, 1, 8),
(115, 2, 8),
(115, 4, 8),
(116, 1, 1),
(116, 2, 1),
(116, 3, 1),
(116, 4, 1),
(117, 1, 2),
(117, 2, 2),
(117, 3, 2),
(117, 4, 2),
(118, 1, 7),
(118, 2, 2),
(119, 1, 0),
(119, 2, 0),
(120, 1, 10),
(120, 2, 10),
(120, 3, 2),
(121, 1, 0),
(121, 2, 0),
(121, 3, 0),
(122, 1, 0),
(122, 2, 0),
(122, 3, 0),
(123, 1, 0),
(123, 2, 0),
(123, 3, 0),
(124, 1, 8),
(124, 2, 3),
(125, 1, 0),
(125, 2, 0),
(126, 1, 11),
(126, 2, 6),
(127, 2, 8),
(128, 1, 0),
(128, 2, 0),
(130, 1, 19),
(130, 2, 3),
(130, 4, 3),
(131, 1, 6),
(131, 2, 5),
(131, 3, 2),
(131, 4, 5),
(132, 1, 0),
(132, 2, 0),
(132, 3, 0),
(132, 4, 0),
(133, 1, 11),
(133, 2, 11),
(133, 3, 3),
(134, 1, 0),
(134, 2, 0),
(134, 3, 0),
(135, 1, 0),
(135, 2, 0),
(135, 3, 0),
(136, 1, 0),
(136, 2, 0),
(136, 3, 0),
(136, 4, 0),
(137, 1, 8),
(138, 1, 2),
(139, 1, 0),
(140, 1, 0),
(141, 1, 0),
(142, 1, 0),
(143, 1, 0),
(144, 1, 0),
(145, 1, 3),
(145, 2, 3),
(145, 3, 3),
(145, 4, 3),
(146, 1, 4),
(146, 2, 4),
(146, 3, 4),
(146, 4, 4),
(147, 1, 5),
(148, 1, 9),
(149, 1, 0),
(150, 1, 10),
(151, 1, 0),
(152, 1, 0),
(152, 2, 0),
(153, 1, 1),
(154, 1, 1),
(155, 1, 1),
(157, 1, 12),
(158, 1, 0),
(159, 1, 0),
(160, 1, 13),
(161, 1, 0),
(162, 1, 0),
(163, 1, 15),
(164, 1, 0),
(165, 1, 0),
(166, 1, 16),
(167, 1, 0),
(168, 1, 0),
(169, 1, 17),
(170, 1, 0),
(171, 1, 0),
(172, 1, 14),
(173, 1, 0),
(174, 1, 0),
(175, 1, 18),
(176, 1, 0),
(177, 1, 0),
(178, 1, 0),
(178, 2, 0),
(179, 1, 3),
(179, 2, 3),
(180, 1, 2),
(180, 2, 2),
(181, 1, 0),
(181, 2, 1),
(182, 1, 0),
(182, 2, 1),
(183, 1, 1),
(183, 2, 1),
(184, 1, 5),
(184, 2, 5),
(185, 1, 6),
(185, 2, 6),
(186, 1, 7),
(186, 2, 7),
(187, 1, 8),
(187, 2, 8),
(188, 1, 9),
(188, 2, 9),
(189, 1, 10),
(189, 2, 10),
(190, 1, 11),
(190, 2, 11),
(191, 1, 0),
(191, 2, 0),
(192, 1, 0),
(192, 2, 0),
(193, 1, 0),
(193, 2, 0),
(194, 1, 0),
(194, 2, 0),
(195, 1, 0),
(195, 2, 0),
(196, 1, 0),
(196, 2, 0),
(197, 1, 1),
(197, 2, 1),
(198, 1, 2),
(198, 2, 2),
(199, 1, 3),
(199, 2, 3),
(200, 1, 0),
(200, 2, 0),
(201, 1, 19),
(201, 2, 19),
(202, 1, 0),
(202, 2, 0),
(203, 1, 0),
(203, 2, 0),
(204, 1, 0),
(204, 2, 0),
(205, 1, 11),
(205, 2, 11),
(206, 1, 12),
(206, 2, 12),
(207, 1, 13),
(207, 2, 13),
(208, 1, 6),
(208, 2, 6),
(209, 1, 0),
(209, 2, 0),
(210, 1, 0),
(210, 2, 0),
(211, 1, 0),
(211, 2, 0),
(212, 1, 0),
(212, 2, 0),
(213, 1, 0),
(213, 2, 0),
(214, 1, 0),
(214, 2, 0),
(215, 1, 0),
(215, 2, 0),
(216, 1, 0),
(216, 2, 0),
(217, 1, 0),
(217, 2, 0),
(218, 1, 0),
(218, 2, 0),
(219, 1, 0),
(219, 2, 0),
(220, 1, 0),
(220, 2, 0),
(221, 1, 0),
(221, 2, 0),
(222, 1, 0),
(222, 2, 0),
(223, 1, 19),
(223, 2, 19),
(224, 1, 0),
(224, 2, 0),
(225, 1, 0),
(225, 2, 0),
(226, 1, 20),
(226, 2, 20),
(227, 1, 0),
(227, 2, 0),
(228, 1, 0),
(228, 2, 0),
(229, 1, 0),
(229, 2, 0),
(230, 1, 0),
(230, 2, 0),
(231, 1, 14),
(231, 2, 14),
(232, 1, 15),
(232, 2, 15),
(233, 1, 16),
(233, 2, 16),
(234, 1, 17),
(234, 2, 17),
(235, 1, 18),
(235, 2, 18);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tsistema`
--

CREATE TABLE `tsistema` (
  `idconfiguracion` int(11) NOT NULL,
  `introducion` text,
  `mision` text,
  `vision` text,
  `historia` text,
  `objetivos` text,
  `direccion` text,
  `nropreguntas` varchar(2) DEFAULT NULL,
  `clavepredeterminada` varchar(45) DEFAULT NULL,
  `nrointentos` varchar(45) DEFAULT NULL,
  `tiempocaducida` varchar(3) DEFAULT NULL,
  `tiempoconexion` int(11) DEFAULT NULL,
  `tiempolapso` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tsistema`
--

INSERT INTO `tsistema` (`idconfiguracion`, `introducion`, `mision`, `vision`, `historia`, `objetivos`, `direccion`, `nropreguntas`, `clavepredeterminada`, `nrointentos`, `tiempocaducida`, `tiempoconexion`, `tiempolapso`) VALUES
(2, '<p>Bienvenidos al sistema..</p>', '<p>Administrar las polÃ­ticas de educaciÃ³n especial en el Ã¡rea de las deficiencias visuales a la poblaciÃ³n atendida</p>', '<p style="text-align: justify;">Alcanzar el mÃ¡ximo nivel de desarrollo de los participantes para su plena realizaciÃ³n personal, social, profesional y laboral.</p>', '<p style="text-align: justify;">AsÃ­ comenzÃ³ la educaciÃ³n de las personas con discapacidad visual del Estado Portuguesa, con un sueÃ±o compartido con otras personas, movidos por un sentimiento comÃºn, la pÃ©rdida del sentido de la vista. Un grupo de personas se reÃºne con la idea de formar una instituciÃ³n que le brindarÃ¡ atenciÃ³n educativa a todas las personas con discapacidad visual, y motivados por el seÃ±or Erasmo Conde quien dirigÃ­a la AsociaciÃ³n PortugueseÃ±a de Ciegos, quien contaba con todo el apoyo de sus miembros, se crea el Instituto de ciegos del estado Portuguesa que funcionÃ³ desde 1986 hasta 1991 con personal voluntario, en forma asistemÃ¡tica, su labor fue mÃ¡s de captaciÃ³n y preparaciÃ³n de recursos humanos y de informaciÃ³n a la comunidad, promociÃ³n y divulgaciÃ³n, que de una atenciÃ³n propiamente dicha. La capacitaciÃ³n del personal voluntario en el Ã¡rea de las deficiencias visuales, estuvo a cargo en un principio por profesionales del Centro de RehabilitaciÃ³n para el Discapacitado Visual adscrito al Ministerio de Sanidad de Caracas, dirigido por el Dr. Antonio Isea, mediante un gran programa de atenciÃ³n basado en la comunidad, con seis cursos intensivos a los cuales asistieron numerosas personas de toda la colectividad de Acarigua â€“ Araure, quedando solamente tres, comprometidos con la idea y con el objetivo claro por el cual se iba a luchar. El 15 de enero de 1992, el anterior Instituto se convierte en Centro de AtenciÃ³n Integral de Deficiencias Visuales, funcionando en un salÃ³n de un mÃ³dulo tipo R-2, sede de la AsociaciÃ³n PortugueseÃ±a de Personas con Discapacidad Visual, bajo la supervisiÃ³n del Departamento de EducaciÃ³n Especial y de la DirecciÃ³n de EducaciÃ³n del estado, recibiendo apoyo en la parte TÃ©cnico â€“Administrativo- Docente con dos lÃ­neas de mando lo cual creÃ³ una situaciÃ³n de ambigÃ¼edad, lo que trajo como consecuencia problemas para la consecuciÃ³n de recursos tanto econÃ³micos como de dotaciÃ³n de mobiliario, equipos, personal docente y tÃ©cnico (PsicÃ³logo, OftalmÃ³logo y Trabajador Social) El 21 de enero de ese mismo aÃ±o, el CAIDV inicia la educaciÃ³n integrada de niÃ±os y niÃ±as con discapacidad visual en el Ã¡mbito de preescolar, para ello se realiza un taller denominado â€œIntegraciÃ³n del niÃ±o Ciego al aula Regularâ€, auspiciado por los dos docentes que laboraban en ese momento, quienes estaban reciÃ©n nombrados oficialmente, uno por el Ministerio de EducaciÃ³n (el Sr. Erasmo Conde) y la otra por la DirecciÃ³n de EducaciÃ³n (la docente Blanca Torres) Es en 1997 cuando el Ministerio de EducaciÃ³n en una revisiÃ³n y reorientaciÃ³n del modelo educativo para las personas con discapacidad visual promueve unas jornadas con la nueva polÃ­tica y conceptualizaciÃ³n de atenciÃ³n educativa de las personas ciegas: y el documento presentado establece que todas las instituciones que imparten educaciÃ³n a personas ciegas desde ese momento se denominarÃ¡n â€œCentro de AtenciÃ³n Integralâ€ (CAI), lo que en principio se le cuestionaba a Portuguesa, en ese momento se le dio la razÃ³n.Es importante mencionar que este CAI es el primero en su gÃ©nero en el Ã¡mbito nacional, producto de la sinergia, sin embargo esto no fue suficiente para su codificaciÃ³n, porque el Ministerio de EducaciÃ³n alegaba que el personal del CAI era casi en su totalidad de la DirecciÃ³n de EducaciÃ³n y no le brindaba apoyo. Fue en el aÃ±o 2003, cuando la DirecciÃ³n de EducaciÃ³n del Estado Portuguesa, en el marco de la creaciÃ³n de la CoordinaciÃ³n de EducaciÃ³n Especial, le asigna al CAIDV Acarigua el CÃ³digo Educativo NÂ° 099000. Otro aspecto relevante es que para lograr el gran sueÃ±o, ha sido necesario un cÃºmulo de esfuerzos para conservarlo y hacerlo realidad, es necesario reforzar la imagen inicial de trabajo para lograr lo que queremos, cultivando la cultura del esfuerzo y la bÃºsqueda constante de nuevas formas de actuar, asÃ­ mismo se requiere desarrollar todo un programa mental que integre los planes tomando en cuenta nuestras fortalezas y oportunidades. En general se podrÃ­a decir que la experiencia de estos 20 aÃ±os, ha sido a grandes rasgos, la siguiente:</p>\r\n<ul style="text-align: justify;">\r\n<li>\r\n<p>Se crea la organizaciÃ³n en la cual se pone de manifiesto mayor interÃ©s en la integraciÃ³n a la vida diaria.</p>\r\n</li>\r\n</ul>\r\n<ul style="text-align: justify;">\r\n<li>\r\n<p>Se afronta la problemÃ¡tica de la persona con discapacidad visual desde una Ã³ptica mÃ¡s compleja, involucrando niÃ±os, niÃ±as, adolescentes, jÃ³venes y adultos en la preparaciÃ³n indispensable para desenvolverse en la vida.</p>\r\n</li>\r\n</ul>\r\n<ul style="text-align: justify;">\r\n<li>\r\n<p>&nbsp;Se crea otro CAI en la ciudad de Guanare con caracterÃ­sticas similares a Ã©ste para la atenciÃ³n de los municipios adyacentes.</p>\r\n</li>\r\n</ul>\r\n<ul style="text-align: justify;">\r\n<li>\r\n<p>Se logra la construcciÃ³n de otra R-2 ampliando asÃ­ el espacio fÃ­sico para la poblaciÃ³n del momento, e independizando el Ãrea Educativa del Ãrea gremial.</p>\r\n</li>\r\n</ul>\r\n<ul style="text-align: justify;">\r\n<li>\r\n<p>Se inicia la integraciÃ³n en niveles y modalidades del sistema educativo.</p>\r\n</li>\r\n</ul>\r\n<ul style="text-align: justify;">\r\n<li>\r\n<p>Se inicia la integraciÃ³n laboral de la persona con discapacidad.</p>\r\n</li>\r\n</ul>\r\n<ul>\r\n<li>\r\n<p>En el aÃ±o escolar 2005-2006, se inicia la aplicaciÃ³n del Proyecto de TecnologÃ­as Adaptativas para personas con discapacidad visual, mediante el Software Jaws, primero con la formaciÃ³n de un docente (TSU MarÃ­a JosÃ© Garantota) y actualmente con los participantes integrados en educaciÃ³n media, diversificada y universitaria. En otro orden de ideas la instituciÃ³n es tomada en cuenta actualmente como centro de pasantÃ­as de CEDUPORT, instituciÃ³n que forma auxiliares de educaciÃ³n Especial, y la Universidad Bolivariana en la cÃ¡tedra de formaciÃ³n de docentes, Colegio Universitario FermÃ­n Toro y Colegio Universitario MonseÃ±or de Talavera, ademÃ¡s en este centro se le ofrece atenciÃ³n formativa a estudiantes de diferentes universidades locales que asisten para investigar aspectos asociados al Ã¡rea de las deficiencias visuales. El CAIDV Acarigua es una unidad operativa que funciona como servicio de apoyo de la modalidad de EducaciÃ³n Especial, brinda atenciÃ³n educativa integral a la poblaciÃ³n de niÃ±os, niÃ±as, adolescentes, jÃ³venes y adultos con discapacidad visual, con o sin discapacidad asociada ubicados en los (7) siete municipios de la parte norte del estado Portuguesa, a travÃ©s de 2 alternativas de atenciÃ³n:</p>\r\n</li>\r\n</ul>\r\n<ol style="text-align: justify;">\r\n<li>\r\n<p>Directa: en el propio CAI, a la poblaciÃ³n con o sin discapacidad asociada, que aÃºn no ha sido integrada ni educativa ni laboralmente, o no puede ser integrada.</p>\r\n</li>\r\n<li>\r\n<p>Como unidad de Apoyo, a fin de garantizar:</p>\r\n</li>\r\n</ol>\r\n<ul style="padding-left: 30px; text-align: justify;">\r\n<li>\r\n<p>AtenciÃ³n integral temprana a niÃ±os, y niÃ±as con discapacidad visual con o sin discapacidad asociada, cuyas edades estÃ©n comprendidas entre 0 y 6 aÃ±os, atendidos en los Centros de Desarrollo Infantil, asÃ­ como garantizar la continuidad del proceso educativo de esta poblaciÃ³n.</p>\r\n</li>\r\n</ul>\r\n<ul style="padding-left: 30px;">\r\n<li>\r\n<p style="text-align: justify;">El proceso de integraciÃ³n escolar de esta poblaciÃ³n en los niveles de EducaciÃ³n Preescolar, BÃ¡sica, Media, Diversificada, Superior, Modalidades de EducaciÃ³n Especial y EducaciÃ³n de Adultos. Los CAI, por su condiciÃ³n de Unidad de apoyo, no estÃ¡n concebidos para brindar escolaridad a su poblaciÃ³n, pues esto es competencia de los planteles donde estÃ¡n integrados los educandos, razÃ³n por la cual se deben realizar acciones de manera cooperativa y coordinada con estas instancias educativas y con otros sectores (salud, social, entre otros).</p>\r\n</li>\r\n</ul>', '<ul>\r\n<li>\r\n<p>Brindar atenciÃ³n Integral a niÃ±os, niÃ±as, adolescentes, jÃ³venes y adultos con discapacidad visual, con o sin discapacidad asociada, a fin de desarrollar habilidades y destrezas que le permitan maximizar sus potencialidades y optimizar sus posibilidades para la integraciÃ³n familiar, educativa, comunitaria.</p>\r\n</li>\r\n</ul>\r\n<div>\r\n<ul>\r\n<li>\r\n<p>Aplicar estrategias que faciliten la formaciÃ³n y capacitaciÃ³n de jÃ³venes y adultos con discapacidad visual, con o sin discapacidades asociadas, mediante la articulaciÃ³n intrasectorial e intersectorial con la finalidad de lograr su IntegraciÃ³n Socio laboral.</p>\r\n</li>\r\n</ul>\r\n<ul>\r\n<li>\r\n<p>Orientar a la familia y comunidad en general para que participe activamente en el proceso de IntegraciÃ³n Social de niÃ±os, niÃ±as, adolescentes, jÃ³venes y adultos con discapacidad visual con o sin discapacidad asociada, mediante charlas, talleres, jornadas de difusiÃ³n, conferencias y otras actividades educativas, culturales, artÃ­sticas, recreativas, deportivas, cientÃ­ficas y tecnolÃ³gicas.</p>\r\n</li>\r\n</ul>\r\n<ul>\r\n<li style="text-align: justify;">\r\n<p>Ofrecer atenciÃ³n integral a la persona con discapacidad visual o baja visiÃ³n considerando tanto sus potencialidades como las condiciones que faciliten su integraciÃ³n social.</p>\r\n</li>\r\n</ul>\r\n<ul>\r\n<li>\r\n<p>Fomentar el respeto por los derechos de la persona con discapacidad visual.</p>\r\n</li>\r\n</ul>\r\n<ul>\r\n<li>\r\n<p>Promover atenciÃ³n preventiva e integral de la persona con discapacidad visual o con baja visiÃ³n desde su nacimiento, a fin de lograr el mÃ¡ximo aprovechamiento de sus potencialidades y su integraciÃ³n al nÃºcleo familiar, escolar y social.</p>\r\n</li>\r\n</ul>\r\n<ul>\r\n<li>\r\n<p>Incorporar la familia y la comunidad al proceso educativo de la persona con discapacidad visual y con baja visiÃ³n.</p>\r\n</li>\r\n</ul>\r\n<ul>\r\n<li>\r\n<p>Promover la capacitaciÃ³n de la persona con discapacidad visual para su incorporaciÃ³n en el campo laboral.</p>\r\n</li>\r\n</ul>\r\n</div>\r\n<div>&nbsp;</div>', '<p>Calle Luis Braille con Av. CircunvalaciÃ³n detrÃ¡s del Centro de Bellas Artes sector Los Cortijos.</p>', '2', '12345678', '4', '120', 60, 270);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tslider`
--

CREATE TABLE `tslider` (
  `idslider` int(11) NOT NULL,
  `titulosli` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `textosli` text COLLATE utf8_spanish2_ci NOT NULL,
  `imagensli` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `estatussli` char(1) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tslider`
--

INSERT INTO `tslider` (`idslider`, `titulosli`, `textosli`, `imagensli`, `estatussli`) VALUES
(1, 'CAIDV AVANZA', 'PresentaciÃ³n a la Comunidad CAIDV del proyecto.', 'IMG00305-20120517-1004.jpg', '1'),
(2, 'TRABAJO MANUAL', 'Una clase de manualidades', 'IMG_5163.JPG', '1'),
(3, 'PROYECTO SISCAIDV', 'Implantando el proyecto en el Laboratorio CEBIT del CAIDV', 'IMG-20150206-WA0002.jpg', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tunidad`
--

CREATE TABLE `tunidad` (
  `idunidad` int(11) NOT NULL,
  `nombreuni` varchar(500) COLLATE utf8_spanish2_ci NOT NULL,
  `estatusuni` char(1) COLLATE utf8_spanish2_ci NOT NULL DEFAULT '1',
  `tasignatura_idasignatura` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tunidad`
--

INSERT INTO `tunidad` (`idunidad`, `nombreuni`, `estatusuni`, `tasignatura_idasignatura`) VALUES
(1, 'Conceptos bÃ¡sicos', '1', 4),
(5, 'LA COMPUTADORA ', '1', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tunidadmedida`
--

CREATE TABLE `tunidadmedida` (
  `idunidadmedida` int(11) NOT NULL,
  `descripcion` varchar(40) COLLATE utf8_bin NOT NULL,
  `abreviatura` varchar(5) COLLATE utf8_bin DEFAULT NULL,
  `estatus` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `tunidadmedida`
--

INSERT INTO `tunidadmedida` (`idunidadmedida`, `descripcion`, `abreviatura`, `estatus`) VALUES
(1, 'TORRES', 'LS', 1),
(2, 'KILO', 'KG', 1),
(3, 'GALÃ³N', 'GL', 1),
(4, 'UNIDAD', 'U', 1),
(5, 'SDASDAD', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tusuario`
--

CREATE TABLE `tusuario` (
  `idTusuario` int(11) NOT NULL,
  `idusuario` varchar(20) NOT NULL,
  `idFpersonal` int(11) NOT NULL,
  `nombreusu` varchar(45) NOT NULL,
  `emailusu` varchar(55) NOT NULL,
  `estatususu` tinyint(1) NOT NULL DEFAULT '1',
  `ultima_actividadusu` datetime NOT NULL,
  `trol_idrol` int(11) NOT NULL,
  `cedula` char(9) DEFAULT 'S/C',
  `intentos_fallidos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tusuario`
--

INSERT INTO `tusuario` (`idTusuario`, `idusuario`, `idFpersonal`, `nombreusu`, `emailusu`, `estatususu`, `ultima_actividadusu`, `trol_idrol`, `cedula`, `intentos_fallidos`) VALUES
(1, '12526145', 2, 'GONZALEZ LEIBI', 'LEIBIGON@GMAIL.COM', 0, '2015-05-01 17:47:44', 1, '12526145', 1),
(2, '15491963', 3, 'SPADARO ANTONIO', 'SPADARO.ANTO@GMAIL.COM', 1, '2016-01-23 21:46:54', 1, '15491963', 0),
(3, '17960877', 4, 'DIAZ EFREN ', 'EDM_126@HOTMAIL.COM', 1, '2015-03-24 22:01:46', 1, '17960877', 0),
(4, '18672728', 5, 'APONTE JORGE', 'COREO@SDD.COM', 1, '2016-06-29 19:16:50', 1, '18672728', 0),
(5, 'administrador', 1, 'Web Master', 'webmaster@gmail.com', 1, '2016-10-07 19:34:37', 1, '0', 4),
(15, '20390749', 9, 'ALFA PRUEBA', 'RODESCOBAR44@GMAIL.COM', 1, '0000-00-00 00:00:00', 1, '20390749', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tvalor_item`
--

CREATE TABLE `tvalor_item` (
  `idvalor_item` int(11) NOT NULL,
  `valorval` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `estatusval` char(1) COLLATE utf8_spanish2_ci NOT NULL,
  `titem_iditem` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tvalor_item`
--

INSERT INTO `tvalor_item` (`idvalor_item`, `valorval`, `estatusval`, `titem_iditem`) VALUES
(3, 'VISUAL', '1', 10),
(4, 'AUDITIVA', '1', 10),
(5, 'LINGUISTICA', '1', 10),
(6, 'MOTORA', '1', 10),
(7, 'COGNITIVA', '1', 10),
(8, 'SI', '1', 12),
(9, 'NO', '1', 12),
(10, 'MASCULINO', '1', 3),
(11, 'FEMENINO', '1', 3),
(16, 'SI', '1', 13),
(17, 'NO', '1', 13),
(18, 'SI', '1', 14),
(19, 'NO', '1', 14),
(20, 'SI', '1', 15),
(21, 'NO', '1', 15),
(22, 'SI', '1', 16),
(23, 'NO', '1', 16),
(24, 'SI', '1', 17),
(25, 'NO', '1', 17),
(26, 'SI', '1', 18),
(27, 'NO', '1', 18),
(28, 'SI', '1', 19),
(29, 'NO', '1', 19),
(30, 'SI', '1', 20),
(31, 'NO', '1', 20),
(32, 'SI', '1', 21),
(33, 'NO', '1', 21),
(34, 'SI', '1', 22),
(35, 'NO', '1', 22),
(36, 'SI', '1', 23),
(37, 'NO', '1', 23),
(38, 'SI', '1', 24),
(39, 'NO', '1', 24),
(40, 'SI', '1', 25),
(41, 'NO', '1', 25),
(42, 'SI', '1', 26),
(43, 'NO', '1', 26),
(44, 'SI', '1', 27),
(45, 'NO', '1', 27),
(46, 'SI', '1', 28),
(47, 'NO', '1', 28),
(48, 'SI', '1', 29),
(49, 'NO', '1', 29),
(50, 'SI', '1', 30),
(51, 'NO', '1', 30);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulobn`
--
ALTER TABLE `articulobn`
  ADD PRIMARY KEY (`id_bien`),
  ADD KEY `bien_nacional_tipo_bien_idx` (`id_tbien`),
  ADD KEY `bien_nacional_condicion_idx` (`id_cond`),
  ADD KEY `bien_nacional_marca_idx` (`id_marca`),
  ADD KEY `id_modelo` (`id_modelo`);

--
-- Indices de la tabla `categoriabn`
--
ALTER TABLE `categoriabn`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `condicionbn`
--
ALTER TABLE `condicionbn`
  ADD PRIMARY KEY (`id_cond`);

--
-- Indices de la tabla `dentrada`
--
ALTER TABLE `dentrada`
  ADD PRIMARY KEY (`iddentrada`),
  ADD KEY `identrada` (`identrada`),
  ADD KEY `idarticulo` (`idarticulo`);

--
-- Indices de la tabla `dmovimientobn`
--
ALTER TABLE `dmovimientobn`
  ADD PRIMARY KEY (`id_detalle_mov`),
  ADD KEY `detalle_movimiento_movimiento_idx` (`id_mov`),
  ADD KEY `detalle_movimiento_bien_nacional_idx` (`id_bien`);

--
-- Indices de la tabla `dsalida`
--
ALTER TABLE `dsalida`
  ADD PRIMARY KEY (`iddsalida`),
  ADD KEY `idsalida` (`idsalida`),
  ADD KEY `idarticulo` (`idarticulo`);

--
-- Indices de la tabla `marcabn`
--
ALTER TABLE `marcabn`
  ADD PRIMARY KEY (`id_marca`);

--
-- Indices de la tabla `modelobn`
--
ALTER TABLE `modelobn`
  ADD PRIMARY KEY (`id_modelo`),
  ADD KEY `idFmarca` (`idFmarca`);

--
-- Indices de la tabla `motivobn`
--
ALTER TABLE `motivobn`
  ADD PRIMARY KEY (`id_motivo_mov`),
  ADD KEY `tipo_motivo` (`tipo_motivo`);

--
-- Indices de la tabla `movimientobn`
--
ALTER TABLE `movimientobn`
  ADD PRIMARY KEY (`id_mov`),
  ADD UNIQUE KEY `id_mov_prestamo` (`id_mov_prestamo`),
  ADD KEY `movimiento_tipo_movimiento_idx` (`id_tipo_mov`),
  ADD KEY `movimiento_proveedor_idx` (`id_prov`),
  ADD KEY `movimiento_personal_idx` (`id_per`),
  ADD KEY `movimiento_usuario_idx` (`id_usuario`),
  ADD KEY `movimiento_motivo_movimiento_idx` (`id_motivo_mov`),
  ADD KEY `movimiento_periodo_idx` (`id_periodo`),
  ADD KEY `movimiento_departamento_idx` (`id_dep`),
  ADD KEY `id_resp_dep` (`id_resp_dep`),
  ADD KEY `idFentefiador` (`idFentefiador`),
  ADD KEY `idFresponsableente` (`idFresponsableente`);

--
-- Indices de la tabla `participante_familiar`
--
ALTER TABLE `participante_familiar`
  ADD PRIMARY KEY (`tparticipante_idparticipante`,`tfamiliar_idfamiliar`),
  ADD KEY `fk_tparticipante_has_tfamiliar_tfamiliar1_idx` (`tfamiliar_idfamiliar`),
  ADD KEY `fk_tparticipante_has_tfamiliar_tparticipante1_idx` (`tparticipante_idparticipante`),
  ADD KEY `fk_tparticipante_has_tfamiliar_tparentesco1_idx` (`idparentesco`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id_prov`);

--
-- Indices de la tabla `tacceso`
--
ALTER TABLE `tacceso`
  ADD PRIMARY KEY (`idacceso`),
  ADD KEY `fk_tacceso_tusuario1_idx` (`idusuario`),
  ADD KEY `fk_tacceso_tservicio1_idx` (`exitoacc`);

--
-- Indices de la tabla `tarea_conocimiento`
--
ALTER TABLE `tarea_conocimiento`
  ADD PRIMARY KEY (`idarea_conocimiento`);

--
-- Indices de la tabla `tarticulo`
--
ALTER TABLE `tarticulo`
  ADD PRIMARY KEY (`idarticulo`),
  ADD KEY `idunidadmedida` (`idunidadmedida`),
  ADD KEY `idpresentacion` (`idpresentacion`),
  ADD KEY `idgrupo` (`idgrupo`);

--
-- Indices de la tabla `tasignatura`
--
ALTER TABLE `tasignatura`
  ADD PRIMARY KEY (`idasignatura`),
  ADD KEY `tarea_idarea_conocimiento` (`tarea_idarea_conocimiento`);

--
-- Indices de la tabla `tasistencia`
--
ALTER TABLE `tasistencia`
  ADD PRIMARY KEY (`idasistencia`),
  ADD KEY `fk_tasistencia_tcurso_tparticipante_1` (`idcurso_idparticipante`);

--
-- Indices de la tabla `tasistencia_objetivo`
--
ALTER TABLE `tasistencia_objetivo`
  ADD KEY `tasistencia_idasistencia` (`tasistencia_idasistencia`),
  ADD KEY `tobjetivo_idobjetivo` (`tobjetivo_idobjetivo`);

--
-- Indices de la tabla `tasistencia_unidad`
--
ALTER TABLE `tasistencia_unidad`
  ADD KEY `tasistencia_idasistencia` (`tasistencia_idasistencia`),
  ADD KEY `tunidad_idunidad` (`tunidad_idunidad`);

--
-- Indices de la tabla `taula`
--
ALTER TABLE `taula`
  ADD PRIMARY KEY (`idaula`);

--
-- Indices de la tabla `tbitacora`
--
ALTER TABLE `tbitacora`
  ADD PRIMARY KEY (`idbitacora`),
  ADD KEY `fk_tbitacora_tmotivo1_idx` (`motivobit`),
  ADD KEY `fk_tbitacora_toperacion1_idx` (`operacionbit`),
  ADD KEY `fk_tbitacora_tcampo1_idx` (`campobit`),
  ADD KEY `fk_tbitacora_tusuario1_idx` (`idusuario`);

--
-- Indices de la tabla `tclave`
--
ALTER TABLE `tclave`
  ADD PRIMARY KEY (`idclave`),
  ADD KEY `fk_tclave_tusuario1_idx` (`tusuario_idusuario`);

--
-- Indices de la tabla `tcurso`
--
ALTER TABLE `tcurso`
  ADD PRIMARY KEY (`idcurso`),
  ADD KEY `fk_tcurso_tlapso1_idx` (`tlapso_idlapso`),
  ADD KEY `fk_tcurso_tgrupo1_idx` (`tgrupo_idgrupo`),
  ADD KEY `tasignatura_idasignatura` (`tasignatura_idasignatura`),
  ADD KEY `taula_idaula` (`taula_idaula`);

--
-- Indices de la tabla `tcurso_tparticipante`
--
ALTER TABLE `tcurso_tparticipante`
  ADD PRIMARY KEY (`idcurso_participante`),
  ADD KEY `fk_tgrupo_has_tinscripcion_tgrupo1_idx` (`tcurso_idcurso`),
  ADD KEY `fk_tcurso_tinscripcion_tparticipante1_idx` (`tparticipante_idparticipante`);

--
-- Indices de la tabla `tdiagnostico`
--
ALTER TABLE `tdiagnostico`
  ADD PRIMARY KEY (`iddiagnostico`);

--
-- Indices de la tabla `tdocente`
--
ALTER TABLE `tdocente`
  ADD PRIMARY KEY (`iddocente`),
  ADD KEY `fk_tprofesor_tdiagnostico1_idx` (`tdiagnostico_iddiagnostico`);

--
-- Indices de la tabla `tentesexternos`
--
ALTER TABLE `tentesexternos`
  ADD PRIMARY KEY (`idTentesexternos`);

--
-- Indices de la tabla `tentrada`
--
ALTER TABLE `tentrada`
  ADD PRIMARY KEY (`identrada`),
  ADD KEY `idproveedor` (`idproveedor`),
  ADD KEY `idFpersonal` (`idFpersonal`),
  ADD KEY `idFpersonal_2` (`idFpersonal`);

--
-- Indices de la tabla `tevaluacion`
--
ALTER TABLE `tevaluacion`
  ADD PRIMARY KEY (`idevaluacion`),
  ADD KEY `fk_tevaluacion_tcurso_tparticipante_1` (`idcurso_idparticipante`),
  ADD KEY `fk_tevaluacion_tinstrumento_1` (`tinstrumento_idinstrumento`);

--
-- Indices de la tabla `tevaluacion_item`
--
ALTER TABLE `tevaluacion_item`
  ADD KEY `fk_tevaluacion_item_titem_1` (`titem_iditem`),
  ADD KEY `fk_tevaluacion_evaluacion_idevaluacion_1` (`tevaluacion_idevaluacion`);

--
-- Indices de la tabla `tfamiliar`
--
ALTER TABLE `tfamiliar`
  ADD PRIMARY KEY (`idfamiliar`),
  ADD KEY `fk_tfamiliar_tdiagnostico1_idx` (`tdiagnostico_iddiagnostico`);

--
-- Indices de la tabla `tgrupo`
--
ALTER TABLE `tgrupo`
  ADD PRIMARY KEY (`idgrupo`);

--
-- Indices de la tabla `tinscripcion`
--
ALTER TABLE `tinscripcion`
  ADD PRIMARY KEY (`idinscripcion`),
  ADD KEY `fk_tinscripcion_tparticipante1_idx` (`idparticipante`),
  ADD KEY `fk_tinscripcion_tinstitucion1_idx` (`tinstitucion_idinstitucion`);

--
-- Indices de la tabla `tinstitucion`
--
ALTER TABLE `tinstitucion`
  ADD PRIMARY KEY (`idinstitucion`),
  ADD KEY `fk_tinstitucion_tlocalidad1_idx` (`tlocalidad_idlocalidad`);

--
-- Indices de la tabla `tinstrumento`
--
ALTER TABLE `tinstrumento`
  ADD PRIMARY KEY (`idinstrumento`),
  ADD KEY `fk_tinstrumento_tasignatura_1` (`tasignatura_idasignatura`);

--
-- Indices de la tabla `tinstrumento_item`
--
ALTER TABLE `tinstrumento_item`
  ADD KEY `fk_tinstrumento_item_titem_1` (`titem_iditem`),
  ADD KEY `fk_tinstrumento_item_tinstrumento_1` (`tinstrumento_idinstrumento`);

--
-- Indices de la tabla `tipobn`
--
ALTER TABLE `tipobn`
  ADD PRIMARY KEY (`id_tbien`),
  ADD UNIQUE KEY `cod_tbien` (`cod_tbien`),
  ADD KEY `tipo_bien_categoria_idx` (`id_categoria`);

--
-- Indices de la tabla `tipomotivo`
--
ALTER TABLE `tipomotivo`
  ADD PRIMARY KEY (`idTipoMotivo`);

--
-- Indices de la tabla `tipomovibn`
--
ALTER TABLE `tipomovibn`
  ADD PRIMARY KEY (`id_tipo_mov`);

--
-- Indices de la tabla `titem`
--
ALTER TABLE `titem`
  ADD PRIMARY KEY (`iditem`);

--
-- Indices de la tabla `tlapso`
--
ALTER TABLE `tlapso`
  ADD PRIMARY KEY (`idlapso`);

--
-- Indices de la tabla `tlocalidad`
--
ALTER TABLE `tlocalidad`
  ADD PRIMARY KEY (`idlocalidad`),
  ADD KEY `fk_tlocalidad_tmunicipio1_idx` (`tmunicipio_municipio`);

--
-- Indices de la tabla `tmarcas`
--
ALTER TABLE `tmarcas`
  ADD PRIMARY KEY (`idTmarca`);

--
-- Indices de la tabla `tmodelobn`
--
ALTER TABLE `tmodelobn`
  ADD PRIMARY KEY (`idTmodelo`),
  ADD KEY `idFtipoArticulobn_idx` (`idFtipoArticulo`),
  ADD KEY `idFmarcabn_idx` (`idFmarca`);

--
-- Indices de la tabla `tmodulo`
--
ALTER TABLE `tmodulo`
  ADD PRIMARY KEY (`idmodulo`);

--
-- Indices de la tabla `tmodulo_trol`
--
ALTER TABLE `tmodulo_trol`
  ADD PRIMARY KEY (`idmodulo`,`idrol`),
  ADD KEY `fk_tmodulo_has_trol_trol1_idx` (`idrol`),
  ADD KEY `fk_tmodulo_has_trol_tmodulo1_idx` (`idmodulo`);

--
-- Indices de la tabla `tmunicipio`
--
ALTER TABLE `tmunicipio`
  ADD PRIMARY KEY (`idmunicipio`);

--
-- Indices de la tabla `tnoticia`
--
ALTER TABLE `tnoticia`
  ADD PRIMARY KEY (`idnoticia`);

--
-- Indices de la tabla `tobjetivo`
--
ALTER TABLE `tobjetivo`
  ADD PRIMARY KEY (`idobjetivo`),
  ADD KEY `fk_tobjetivo_tunidad_1` (`tunidad_idunidad`);

--
-- Indices de la tabla `tparentesco`
--
ALTER TABLE `tparentesco`
  ADD PRIMARY KEY (`idparentesco`);

--
-- Indices de la tabla `tparticipante`
--
ALTER TABLE `tparticipante`
  ADD PRIMARY KEY (`idparticipante`),
  ADD KEY `fk_tparticipante_tdiagnostico1_idx` (`tdiagnostico_iddiagnostico`),
  ADD KEY `fk_tparticipante_tinstitucion1_idx` (`tinstitucion_idinstitucion`),
  ADD KEY `tlocalidad_idlocalidad` (`tlocalidad_idlocalidad`);

--
-- Indices de la tabla `tpersonal`
--
ALTER TABLE `tpersonal`
  ADD PRIMARY KEY (`idTpersonal`),
  ADD UNIQUE KEY `idpersonal` (`idpersonal`),
  ADD KEY `fk_tprofesor_tdiagnostico1_idx` (`tdiagnostico_iddiagnostico`);

--
-- Indices de la tabla `tpregunta`
--
ALTER TABLE `tpregunta`
  ADD PRIMARY KEY (`idpregunta`),
  ADD KEY `fk_tpregunta_tusuario1_idx` (`tusuario_idusuario`);

--
-- Indices de la tabla `tpresentacion`
--
ALTER TABLE `tpresentacion`
  ADD PRIMARY KEY (`idpresentacion`);

--
-- Indices de la tabla `tres`
--
ALTER TABLE `tres`
  ADD PRIMARY KEY (`idTpersonal`),
  ADD KEY `fk_tprofesor_tdiagnostico1_idx` (`tdiagnostico_iddiagnostico`);

--
-- Indices de la tabla `tresponsableente`
--
ALTER TABLE `tresponsableente`
  ADD KEY `idTpersonal` (`idTresponsableente`),
  ADD KEY `idFenteExterno` (`idFenteExterno`);

--
-- Indices de la tabla `trol`
--
ALTER TABLE `trol`
  ADD PRIMARY KEY (`idrol`);

--
-- Indices de la tabla `trubro`
--
ALTER TABLE `trubro`
  ADD PRIMARY KEY (`idgrupo`);

--
-- Indices de la tabla `tsalida`
--
ALTER TABLE `tsalida`
  ADD PRIMARY KEY (`idsalida`),
  ADD KEY `idFpersonal` (`idFpersonal`),
  ADD KEY `idFresponsableDto` (`idFresponsableDto`),
  ADD KEY `cedrecibido` (`cedrecibido`),
  ADD KEY `idFresponsableDto_2` (`idFresponsableDto`),
  ADD KEY `idFpersonal_2` (`idFpersonal`),
  ADD KEY `cod_tdepartamento` (`cod_tdepartamento`);

--
-- Indices de la tabla `tservicio`
--
ALTER TABLE `tservicio`
  ADD PRIMARY KEY (`idservicio`),
  ADD KEY `fk_tservicio_tmodulo1_idx` (`idmodulo`);

--
-- Indices de la tabla `tservicio_trol`
--
ALTER TABLE `tservicio_trol`
  ADD PRIMARY KEY (`idservicio`,`idrol`),
  ADD KEY `fk_tservicio_has_trol_trol1_idx` (`idrol`),
  ADD KEY `fk_tservicio_has_trol_tservicio1_idx` (`idservicio`);

--
-- Indices de la tabla `tsistema`
--
ALTER TABLE `tsistema`
  ADD PRIMARY KEY (`idconfiguracion`);

--
-- Indices de la tabla `tslider`
--
ALTER TABLE `tslider`
  ADD PRIMARY KEY (`idslider`);

--
-- Indices de la tabla `tunidad`
--
ALTER TABLE `tunidad`
  ADD PRIMARY KEY (`idunidad`),
  ADD KEY `tasignatura_idasignatura` (`tasignatura_idasignatura`);

--
-- Indices de la tabla `tunidadmedida`
--
ALTER TABLE `tunidadmedida`
  ADD PRIMARY KEY (`idunidadmedida`);

--
-- Indices de la tabla `tusuario`
--
ALTER TABLE `tusuario`
  ADD PRIMARY KEY (`idTusuario`),
  ADD UNIQUE KEY `idusuario` (`idusuario`),
  ADD KEY `fk_tusuario_trol1_idx` (`trol_idrol`),
  ADD KEY `idFpersonal` (`idFpersonal`);

--
-- Indices de la tabla `tvalor_item`
--
ALTER TABLE `tvalor_item`
  ADD PRIMARY KEY (`idvalor_item`),
  ADD KEY `fk_tvalor_item_titem` (`titem_iditem`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulobn`
--
ALTER TABLE `articulobn`
  MODIFY `id_bien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=242;
--
-- AUTO_INCREMENT de la tabla `categoriabn`
--
ALTER TABLE `categoriabn`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `condicionbn`
--
ALTER TABLE `condicionbn`
  MODIFY `id_cond` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `dentrada`
--
ALTER TABLE `dentrada`
  MODIFY `iddentrada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT de la tabla `dmovimientobn`
--
ALTER TABLE `dmovimientobn`
  MODIFY `id_detalle_mov` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=342;
--
-- AUTO_INCREMENT de la tabla `dsalida`
--
ALTER TABLE `dsalida`
  MODIFY `iddsalida` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de la tabla `marcabn`
--
ALTER TABLE `marcabn`
  MODIFY `id_marca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `modelobn`
--
ALTER TABLE `modelobn`
  MODIFY `id_modelo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `motivobn`
--
ALTER TABLE `motivobn`
  MODIFY `id_motivo_mov` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT de la tabla `movimientobn`
--
ALTER TABLE `movimientobn`
  MODIFY `id_mov` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=343;
--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id_prov` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT de la tabla `tacceso`
--
ALTER TABLE `tacceso`
  MODIFY `idacceso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=382;
--
-- AUTO_INCREMENT de la tabla `tarea_conocimiento`
--
ALTER TABLE `tarea_conocimiento`
  MODIFY `idarea_conocimiento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `tarticulo`
--
ALTER TABLE `tarticulo`
  MODIFY `idarticulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `tasignatura`
--
ALTER TABLE `tasignatura`
  MODIFY `idasignatura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `tasistencia`
--
ALTER TABLE `tasistencia`
  MODIFY `idasistencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `taula`
--
ALTER TABLE `taula`
  MODIFY `idaula` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `tbitacora`
--
ALTER TABLE `tbitacora`
  MODIFY `idbitacora` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18618;
--
-- AUTO_INCREMENT de la tabla `tclave`
--
ALTER TABLE `tclave`
  MODIFY `idclave` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT de la tabla `tcurso`
--
ALTER TABLE `tcurso`
  MODIFY `idcurso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tcurso_tparticipante`
--
ALTER TABLE `tcurso_tparticipante`
  MODIFY `idcurso_participante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `tdiagnostico`
--
ALTER TABLE `tdiagnostico`
  MODIFY `iddiagnostico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `tentesexternos`
--
ALTER TABLE `tentesexternos`
  MODIFY `idTentesexternos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `tentrada`
--
ALTER TABLE `tentrada`
  MODIFY `identrada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT de la tabla `tevaluacion`
--
ALTER TABLE `tevaluacion`
  MODIFY `idevaluacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `tgrupo`
--
ALTER TABLE `tgrupo`
  MODIFY `idgrupo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tinscripcion`
--
ALTER TABLE `tinscripcion`
  MODIFY `idinscripcion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT de la tabla `tinstitucion`
--
ALTER TABLE `tinstitucion`
  MODIFY `idinstitucion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT de la tabla `tinstrumento`
--
ALTER TABLE `tinstrumento`
  MODIFY `idinstrumento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `tipobn`
--
ALTER TABLE `tipobn`
  MODIFY `id_tbien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `tipomotivo`
--
ALTER TABLE `tipomotivo`
  MODIFY `idTipoMotivo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `tipomovibn`
--
ALTER TABLE `tipomovibn`
  MODIFY `id_tipo_mov` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `titem`
--
ALTER TABLE `titem`
  MODIFY `iditem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT de la tabla `tlapso`
--
ALTER TABLE `tlapso`
  MODIFY `idlapso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `tlocalidad`
--
ALTER TABLE `tlocalidad`
  MODIFY `idlocalidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT de la tabla `tmarcas`
--
ALTER TABLE `tmarcas`
  MODIFY `idTmarca` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tmodelobn`
--
ALTER TABLE `tmodelobn`
  MODIFY `idTmodelo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tmodulo`
--
ALTER TABLE `tmodulo`
  MODIFY `idmodulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `tmunicipio`
--
ALTER TABLE `tmunicipio`
  MODIFY `idmunicipio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT de la tabla `tnoticia`
--
ALTER TABLE `tnoticia`
  MODIFY `idnoticia` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tobjetivo`
--
ALTER TABLE `tobjetivo`
  MODIFY `idobjetivo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `tparentesco`
--
ALTER TABLE `tparentesco`
  MODIFY `idparentesco` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `tparticipante`
--
ALTER TABLE `tparticipante`
  MODIFY `idparticipante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT de la tabla `tpersonal`
--
ALTER TABLE `tpersonal`
  MODIFY `idTpersonal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `tpregunta`
--
ALTER TABLE `tpregunta`
  MODIFY `idpregunta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `tpresentacion`
--
ALTER TABLE `tpresentacion`
  MODIFY `idpresentacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `tres`
--
ALTER TABLE `tres`
  MODIFY `idTpersonal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `tresponsableente`
--
ALTER TABLE `tresponsableente`
  MODIFY `idTresponsableente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `trol`
--
ALTER TABLE `trol`
  MODIFY `idrol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `trubro`
--
ALTER TABLE `trubro`
  MODIFY `idgrupo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tsalida`
--
ALTER TABLE `tsalida`
  MODIFY `idsalida` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `tservicio`
--
ALTER TABLE `tservicio`
  MODIFY `idservicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=236;
--
-- AUTO_INCREMENT de la tabla `tsistema`
--
ALTER TABLE `tsistema`
  MODIFY `idconfiguracion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tslider`
--
ALTER TABLE `tslider`
  MODIFY `idslider` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tunidad`
--
ALTER TABLE `tunidad`
  MODIFY `idunidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `tunidadmedida`
--
ALTER TABLE `tunidadmedida`
  MODIFY `idunidadmedida` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `tusuario`
--
ALTER TABLE `tusuario`
  MODIFY `idTusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `tvalor_item`
--
ALTER TABLE `tvalor_item`
  MODIFY `idvalor_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `articulobn`
--
ALTER TABLE `articulobn`
  ADD CONSTRAINT `articulobn_ibfk_1` FOREIGN KEY (`id_tbien`) REFERENCES `tipobn` (`id_tbien`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `articulobn_ibfk_2` FOREIGN KEY (`id_cond`) REFERENCES `condicionbn` (`id_cond`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `articulobn_ibfk_3` FOREIGN KEY (`id_marca`) REFERENCES `marcabn` (`id_marca`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `articulobn_ibfk_4` FOREIGN KEY (`id_modelo`) REFERENCES `modelobn` (`id_modelo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `dentrada`
--
ALTER TABLE `dentrada`
  ADD CONSTRAINT `dentrada_ibfk_1` FOREIGN KEY (`identrada`) REFERENCES `tentrada` (`identrada`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `dentrada_ibfk_2` FOREIGN KEY (`idarticulo`) REFERENCES `tarticulo` (`idarticulo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `dsalida`
--
ALTER TABLE `dsalida`
  ADD CONSTRAINT `dsalida_ibfk_1` FOREIGN KEY (`idsalida`) REFERENCES `tsalida` (`idsalida`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `dsalida_ibfk_2` FOREIGN KEY (`idarticulo`) REFERENCES `tarticulo` (`idarticulo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `modelobn`
--
ALTER TABLE `modelobn`
  ADD CONSTRAINT `modelobn_ibfk_1` FOREIGN KEY (`idFmarca`) REFERENCES `marcabn` (`id_marca`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `motivobn`
--
ALTER TABLE `motivobn`
  ADD CONSTRAINT `motivobn_ibfk_1` FOREIGN KEY (`tipo_motivo`) REFERENCES `tipomotivo` (`idTipoMotivo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `movimientobn`
--
ALTER TABLE `movimientobn`
  ADD CONSTRAINT `movimientobn_ibfk_1` FOREIGN KEY (`id_tipo_mov`) REFERENCES `tipomovibn` (`id_tipo_mov`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `movimientobn_ibfk_10` FOREIGN KEY (`id_per`) REFERENCES `tpersonal` (`idTpersonal`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `movimientobn_ibfk_11` FOREIGN KEY (`idFresponsableente`) REFERENCES `tresponsableente` (`idTresponsableente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `movimientobn_ibfk_12` FOREIGN KEY (`id_mov_prestamo`) REFERENCES `movimientobn` (`id_mov`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `movimientobn_ibfk_2` FOREIGN KEY (`id_prov`) REFERENCES `proveedores` (`id_prov`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `movimientobn_ibfk_3` FOREIGN KEY (`id_motivo_mov`) REFERENCES `motivobn` (`id_motivo_mov`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `movimientobn_ibfk_4` FOREIGN KEY (`id_dep`) REFERENCES `tasignatura` (`idasignatura`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `movimientobn_ibfk_7` FOREIGN KEY (`id_usuario`) REFERENCES `tusuario` (`idTusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `movimientobn_ibfk_8` FOREIGN KEY (`idFentefiador`) REFERENCES `tentesexternos` (`idTentesexternos`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `movimientobn_ibfk_9` FOREIGN KEY (`id_resp_dep`) REFERENCES `tpersonal` (`idTpersonal`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `participante_familiar`
--
ALTER TABLE `participante_familiar`
  ADD CONSTRAINT `fk_tparticipante_has_tfamiliar_tparentesco1` FOREIGN KEY (`idparentesco`) REFERENCES `tparentesco` (`idparentesco`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `participante_familiar_ibfk_1` FOREIGN KEY (`tparticipante_idparticipante`) REFERENCES `tparticipante` (`idparticipante`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `participante_familiar_ibfk_2` FOREIGN KEY (`tfamiliar_idfamiliar`) REFERENCES `tfamiliar` (`idfamiliar`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tarticulo`
--
ALTER TABLE `tarticulo`
  ADD CONSTRAINT `tarticulo_ibfk_1` FOREIGN KEY (`idunidadmedida`) REFERENCES `tunidadmedida` (`idunidadmedida`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tarticulo_ibfk_2` FOREIGN KEY (`idpresentacion`) REFERENCES `tpresentacion` (`idpresentacion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tarticulo_ibfk_3` FOREIGN KEY (`idgrupo`) REFERENCES `categoriabn` (`id_categoria`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tasignatura`
--
ALTER TABLE `tasignatura`
  ADD CONSTRAINT `tasignatura_ibfk_1` FOREIGN KEY (`tarea_idarea_conocimiento`) REFERENCES `tarea_conocimiento` (`idarea_conocimiento`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tasistencia`
--
ALTER TABLE `tasistencia`
  ADD CONSTRAINT `fk_tasistencia_tcurso_tparticipante_1` FOREIGN KEY (`idcurso_idparticipante`) REFERENCES `tcurso_tparticipante` (`idcurso_participante`);

--
-- Filtros para la tabla `tasistencia_objetivo`
--
ALTER TABLE `tasistencia_objetivo`
  ADD CONSTRAINT `tasistencia_objetivo_ibfk_1` FOREIGN KEY (`tasistencia_idasistencia`) REFERENCES `tasistencia` (`idasistencia`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `tasistencia_objetivo_ibfk_2` FOREIGN KEY (`tobjetivo_idobjetivo`) REFERENCES `tobjetivo` (`idobjetivo`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `tasistencia_unidad`
--
ALTER TABLE `tasistencia_unidad`
  ADD CONSTRAINT `tasistencia_unidad_ibfk_1` FOREIGN KEY (`tasistencia_idasistencia`) REFERENCES `tasistencia` (`idasistencia`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `tasistencia_unidad_ibfk_2` FOREIGN KEY (`tunidad_idunidad`) REFERENCES `tunidad` (`idunidad`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `tclave`
--
ALTER TABLE `tclave`
  ADD CONSTRAINT `fk_tclave_tusuario1` FOREIGN KEY (`tusuario_idusuario`) REFERENCES `tusuario` (`idusuario`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tcurso`
--
ALTER TABLE `tcurso`
  ADD CONSTRAINT `fk_tcurso_taula_1` FOREIGN KEY (`taula_idaula`) REFERENCES `taula` (`idaula`),
  ADD CONSTRAINT `fk_tcurso_tgrupo1` FOREIGN KEY (`tgrupo_idgrupo`) REFERENCES `tgrupo` (`idgrupo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tcurso_tlapso1` FOREIGN KEY (`tlapso_idlapso`) REFERENCES `tlapso` (`idlapso`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tcurso_ibfk_1` FOREIGN KEY (`tasignatura_idasignatura`) REFERENCES `tasignatura` (`idasignatura`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tcurso_tparticipante`
--
ALTER TABLE `tcurso_tparticipante`
  ADD CONSTRAINT `fk_tcurso_idcurso` FOREIGN KEY (`tcurso_idcurso`) REFERENCES `tcurso` (`idcurso`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `tcurso_tparticipante_ibfk_1` FOREIGN KEY (`tparticipante_idparticipante`) REFERENCES `tparticipante` (`idparticipante`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tdocente`
--
ALTER TABLE `tdocente`
  ADD CONSTRAINT `fk_tprofesor_tdiagnostico1` FOREIGN KEY (`tdiagnostico_iddiagnostico`) REFERENCES `tdiagnostico` (`iddiagnostico`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tentrada`
--
ALTER TABLE `tentrada`
  ADD CONSTRAINT `tentrada_ibfk_1` FOREIGN KEY (`idproveedor`) REFERENCES `proveedores` (`id_prov`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tentrada_ibfk_2` FOREIGN KEY (`idFpersonal`) REFERENCES `tpersonal` (`idpersonal`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tevaluacion`
--
ALTER TABLE `tevaluacion`
  ADD CONSTRAINT `fk_tevaluacion_tcurso_tparticipante_1` FOREIGN KEY (`idcurso_idparticipante`) REFERENCES `tcurso_tparticipante` (`idcurso_participante`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tevaluacion_tinstrumento_1` FOREIGN KEY (`tinstrumento_idinstrumento`) REFERENCES `tinstrumento` (`idinstrumento`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `tevaluacion_item`
--
ALTER TABLE `tevaluacion_item`
  ADD CONSTRAINT `fk_tevaluacion_item_tevaluacion_1` FOREIGN KEY (`tevaluacion_idevaluacion`) REFERENCES `tevaluacion` (`idevaluacion`),
  ADD CONSTRAINT `fk_tevaluacion_item_titem_1` FOREIGN KEY (`titem_iditem`) REFERENCES `titem` (`iditem`);

--
-- Filtros para la tabla `tfamiliar`
--
ALTER TABLE `tfamiliar`
  ADD CONSTRAINT `fk_tfamiliar_tdiagnostico1` FOREIGN KEY (`tdiagnostico_iddiagnostico`) REFERENCES `tdiagnostico` (`iddiagnostico`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tinscripcion`
--
ALTER TABLE `tinscripcion`
  ADD CONSTRAINT `fk_tinscripcion_tparticipante` FOREIGN KEY (`idparticipante`) REFERENCES `tparticipante` (`idparticipante`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tinstitucion`
--
ALTER TABLE `tinstitucion`
  ADD CONSTRAINT `fk_tinstitucion_tlocalidad1` FOREIGN KEY (`tlocalidad_idlocalidad`) REFERENCES `tlocalidad` (`idlocalidad`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tinstrumento`
--
ALTER TABLE `tinstrumento`
  ADD CONSTRAINT `fk_tinstrumento_tasignatura_1` FOREIGN KEY (`tasignatura_idasignatura`) REFERENCES `tasignatura` (`idasignatura`);

--
-- Filtros para la tabla `tinstrumento_item`
--
ALTER TABLE `tinstrumento_item`
  ADD CONSTRAINT `fk_tinstrumento_item_titem_1` FOREIGN KEY (`titem_iditem`) REFERENCES `titem` (`iditem`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tinstrumento_item_ibfk_1` FOREIGN KEY (`tinstrumento_idinstrumento`) REFERENCES `tinstrumento` (`idinstrumento`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `tipobn`
--
ALTER TABLE `tipobn`
  ADD CONSTRAINT `tipobn_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoriabn` (`id_categoria`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tlocalidad`
--
ALTER TABLE `tlocalidad`
  ADD CONSTRAINT `fk_tlocalidad_tmunicipio1` FOREIGN KEY (`tmunicipio_municipio`) REFERENCES `tmunicipio` (`idmunicipio`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tmodulo_trol`
--
ALTER TABLE `tmodulo_trol`
  ADD CONSTRAINT `fk_tmodulo_has_trol_tmodulo1` FOREIGN KEY (`idmodulo`) REFERENCES `tmodulo` (`idmodulo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tmodulo_has_trol_trol1` FOREIGN KEY (`idrol`) REFERENCES `trol` (`idrol`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tobjetivo`
--
ALTER TABLE `tobjetivo`
  ADD CONSTRAINT `fk_tobjetivo_tunidad_1` FOREIGN KEY (`tunidad_idunidad`) REFERENCES `tunidad` (`idunidad`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tparticipante`
--
ALTER TABLE `tparticipante`
  ADD CONSTRAINT `fk_tparticipante_tdiagnostico1` FOREIGN KEY (`tdiagnostico_iddiagnostico`) REFERENCES `tdiagnostico` (`iddiagnostico`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tpregunta`
--
ALTER TABLE `tpregunta`
  ADD CONSTRAINT `fk_tpregunta_tusuario1` FOREIGN KEY (`tusuario_idusuario`) REFERENCES `tusuario` (`idusuario`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tresponsableente`
--
ALTER TABLE `tresponsableente`
  ADD CONSTRAINT `tresponsableente_ibfk_1` FOREIGN KEY (`idFenteExterno`) REFERENCES `tentesexternos` (`idTentesexternos`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tsalida`
--
ALTER TABLE `tsalida`
  ADD CONSTRAINT `tsalida_ibfk_1` FOREIGN KEY (`cod_tdepartamento`) REFERENCES `tasignatura` (`idasignatura`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tsalida_ibfk_2` FOREIGN KEY (`idFpersonal`) REFERENCES `tpersonal` (`idpersonal`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tsalida_ibfk_3` FOREIGN KEY (`idFresponsableDto`) REFERENCES `tpersonal` (`idpersonal`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tsalida_ibfk_4` FOREIGN KEY (`cedrecibido`) REFERENCES `tpersonal` (`idpersonal`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tservicio`
--
ALTER TABLE `tservicio`
  ADD CONSTRAINT `fk_tservicio_tmodulo1` FOREIGN KEY (`idmodulo`) REFERENCES `tmodulo` (`idmodulo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tservicio_trol`
--
ALTER TABLE `tservicio_trol`
  ADD CONSTRAINT `fk_tservicio_has_trol_trol1` FOREIGN KEY (`idrol`) REFERENCES `trol` (`idrol`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tservicio_has_trol_tservicio1` FOREIGN KEY (`idservicio`) REFERENCES `tservicio` (`idservicio`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tunidad`
--
ALTER TABLE `tunidad`
  ADD CONSTRAINT `tunidad_ibfk_1` FOREIGN KEY (`tasignatura_idasignatura`) REFERENCES `tasignatura` (`idasignatura`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tusuario`
--
ALTER TABLE `tusuario`
  ADD CONSTRAINT `fk_tusuario_trol1` FOREIGN KEY (`trol_idrol`) REFERENCES `trol` (`idrol`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tusuario_ibfk_1` FOREIGN KEY (`idFpersonal`) REFERENCES `tpersonal` (`idTpersonal`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tvalor_item`
--
ALTER TABLE `tvalor_item`
  ADD CONSTRAINT `fk_tvalor_item_titem` FOREIGN KEY (`titem_iditem`) REFERENCES `titem` (`iditem`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
