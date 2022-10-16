-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-10-2022 a las 07:11:50
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `infobdn`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administracio`
--

CREATE TABLE `administracio` (
  `dni` varchar(250) COLLATE utf8_bin NOT NULL,
  `pass` varchar(100) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `administracio`
--

INSERT INTO `administracio` (`dni`, `pass`) VALUES
('prueba@prueba.com', 'c893bad68927b457dbed39460e6afd62');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnes`
--

CREATE TABLE `alumnes` (
  `dni_alumne` varchar(250) COLLATE utf8_bin NOT NULL,
  `nom` varchar(250) COLLATE utf8_bin NOT NULL,
  `cognom` varchar(250) COLLATE utf8_bin NOT NULL,
  `pass` varchar(100) COLLATE utf8_bin NOT NULL,
  `edat` varchar(250) COLLATE utf8_bin NOT NULL,
  `titol_academic` varchar(250) COLLATE utf8_bin NOT NULL,
  `fotografia` varchar(250) COLLATE utf8_bin NOT NULL,
  `cursos_matriculats` varchar(250) COLLATE utf8_bin NOT NULL,
  `sexe` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `alumnes`
--

INSERT INTO `alumnes` (`dni_alumne`, `nom`, `cognom`, `pass`, `edat`, `titol_academic`, `fotografia`, `cursos_matriculats`, `sexe`) VALUES
('1', 'Bryan', 'Pastrana', '1', '21', '', '', '', 'h'),
('2', 'Salma', 'Alami', '1', '18', '', '', '', 'd'),
('3', 'Guillem', 'Anglada', '1', '18', '', '', '', 'h'),
('9', 'dos', 'tres', '1', '22', '', 'img/1665593520-Redouan.jpg', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE `cursos` (
  `idCurso` int(11) NOT NULL,
  `nom_curs` varchar(250) COLLATE utf8_bin NOT NULL,
  `descripcio` varchar(250) COLLATE utf8_bin NOT NULL,
  `horas` int(4) NOT NULL,
  `data_inici` date NOT NULL,
  `data_final` date NOT NULL,
  `dni_prof` varchar(250) COLLATE utf8_bin NOT NULL,
  `actiu` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`idCurso`, `nom_curs`, `descripcio`, `horas`, `data_inici`, `data_final`, `dni_prof`, `actiu`) VALUES
(30, 'JS', 'REGEX', 110, '2022-10-13', '2022-01-08', '47334063V', 0),
(47, 'BBDD', 'DDL, DML, DCL', 120, '2022-10-13', '2022-05-30', '47334063V', 1),
(56, 'Angles', 'A1', 150, '2022-10-13', '2022-08-30', '55534062F', 0),
(62, 'PHP', 'MVC', 150, '2022-10-13', '2022-09-29', '55534062F', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `matricula`
--

CREATE TABLE `matricula` (
  `idCurso` int(11) NOT NULL,
  `dni_alum` varchar(250) COLLATE utf8_bin NOT NULL,
  `nota` varchar(250) COLLATE utf8_bin NOT NULL,
  `actiu` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `matricula`
--

INSERT INTO `matricula` (`idCurso`, `dni_alum`, `nota`, `actiu`) VALUES
(30, '1', '5', 0),
(30, '2', '', 0),
(30, '9', '', 0),
(47, '1', '8', 1),
(47, '2', '', 0),
(47, '3', '6', 0),
(47, '9', '', 0),
(56, '1', '3', 1),
(56, '2', '', 1),
(56, '9', '', 0),
(62, '1', '7', 0),
(62, '2', '', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `professors`
--

CREATE TABLE `professors` (
  `dni_prof` varchar(250) COLLATE utf8_bin NOT NULL,
  `nom_professor` varchar(250) COLLATE utf8_bin NOT NULL,
  `cognom_professor` varchar(250) COLLATE utf8_bin NOT NULL,
  `pass` varchar(100) COLLATE utf8_bin NOT NULL,
  `titol_academic` varchar(250) COLLATE utf8_bin NOT NULL,
  `fotografia` varchar(250) COLLATE utf8_bin NOT NULL,
  `cursos_imparteixen` varchar(250) COLLATE utf8_bin NOT NULL,
  `actiu` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `professors`
--

INSERT INTO `professors` (`dni_prof`, `nom_professor`, `cognom_professor`, `pass`, `titol_academic`, `fotografia`, `cursos_imparteixen`, `actiu`) VALUES
('47334063V', 'REDOUAN', 'NATI', '1234', 'Enginyeria informàtica', '', '', 0),
('55534062F', 'Olga', 'Domene', '1234', 'Enyinyer informàtic', '', '', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administracio`
--
ALTER TABLE `administracio`
  ADD PRIMARY KEY (`dni`);

--
-- Indices de la tabla `alumnes`
--
ALTER TABLE `alumnes`
  ADD PRIMARY KEY (`dni_alumne`);

--
-- Indices de la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`idCurso`),
  ADD KEY `dni_prof` (`dni_prof`);

--
-- Indices de la tabla `matricula`
--
ALTER TABLE `matricula`
  ADD PRIMARY KEY (`idCurso`,`dni_alum`),
  ADD KEY `dni_alum` (`dni_alum`);

--
-- Indices de la tabla `professors`
--
ALTER TABLE `professors`
  ADD PRIMARY KEY (`dni_prof`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cursos`
--
ALTER TABLE `cursos`
  MODIFY `idCurso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD CONSTRAINT `cursos_ibfk_1` FOREIGN KEY (`dni_prof`) REFERENCES `professors` (`dni_prof`);

--
-- Filtros para la tabla `matricula`
--
ALTER TABLE `matricula`
  ADD CONSTRAINT `matricula_ibfk_1` FOREIGN KEY (`idCurso`) REFERENCES `cursos` (`idCurso`),
  ADD CONSTRAINT `matricula_ibfk_2` FOREIGN KEY (`dni_alum`) REFERENCES `alumnes` (`dni_alumne`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
