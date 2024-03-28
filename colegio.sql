-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-02-2024 a las 19:33:36
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `colegio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignatura`
--

CREATE TABLE `asignatura` (
  `ID_asignatura` int(11) NOT NULL,
  `Nombre_asignatura` varchar(100) DEFAULT NULL,
  `ID_materia` int(11) DEFAULT NULL,
  `Docente_asignado` varchar(100) DEFAULT NULL,
  `Horario_clase` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencia`
--

CREATE TABLE `asistencia` (
  `ID_asistencia` int(11) NOT NULL,
  `ID_estudiante` int(11) DEFAULT NULL,
  `ID_asignatura` int(11) DEFAULT NULL,
  `Fecha_asistencia` date DEFAULT NULL,
  `Tipo` varchar(20) DEFAULT NULL,
  `Justificada` varchar(3) DEFAULT NULL,
  `Observaciones` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE `curso` (
  `ID_curso` int(11) NOT NULL,
  `Nombre_curso` varchar(100) DEFAULT NULL,
  `ID_grado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `curso`
--

INSERT INTO `curso` (`ID_curso`, `Nombre_curso`, `ID_grado`) VALUES
(901, '901', 9),
(902, '902', 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docente`
--

CREATE TABLE `docente` (
  `ID_profesor` int(11) NOT NULL,
  `Nombre` varchar(100) DEFAULT NULL,
  `identificacion` int(11) NOT NULL,
  `Correo_electrónico` varchar(100) DEFAULT NULL,
  `Contraseña` varchar(20) NOT NULL,
  `ID_rol` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `docente`
--

INSERT INTO `docente` (`ID_profesor`, `Nombre`, `identificacion`, `Correo_electrónico`, `Contraseña`, `ID_rol`) VALUES
(1, 'Fernando', 1000678165, 'kaka@gmail.com', 'Ditunombre1', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE `estudiante` (
  `ID_estudiante` int(11) NOT NULL,
  `Nombre` varchar(100) DEFAULT NULL,
  `identificacion` int(11) NOT NULL,
  `Contraseña` varchar(20) NOT NULL,
  `Fecha_nacimiento` date DEFAULT NULL,
  `Género` varchar(10) DEFAULT NULL,
  `Dirección` varchar(200) DEFAULT NULL,
  `Teléfono` varchar(20) DEFAULT NULL,
  `Correo_electrónico` varchar(100) DEFAULT NULL,
  `ID_curso` int(11) DEFAULT NULL,
  `ID_grado` int(11) DEFAULT NULL,
  `ID_rol` int(11) DEFAULT NULL,
  `Fecha_ingreso` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estudiante`
--

INSERT INTO `estudiante` (`ID_estudiante`, `Nombre`, `identificacion`, `Contraseña`, `Fecha_nacimiento`, `Género`, `Dirección`, `Teléfono`, `Correo_electrónico`, `ID_curso`, `ID_grado`, `ID_rol`, `Fecha_ingreso`) VALUES
(1, 'Carlos', 1000687143, 'Ditunombre1', '2003-03-05', 'M', 'cra 7 53 56 sur', '3003376153', 'kakada23@gmail.com', 902, 9, 2, '2020-03-23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grado`
--

CREATE TABLE `grado` (
  `ID_grado` int(11) NOT NULL,
  `Nombre_grado` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `grado`
--

INSERT INTO `grado` (`ID_grado`, `Nombre_grado`) VALUES
(1, 'Primero'),
(2, 'Segundo'),
(3, 'Tercero'),
(4, 'Cuarto'),
(5, 'Quinto'),
(6, 'Sexto'),
(7, 'Septimo'),
(8, 'Octavo'),
(9, 'Noveno'),
(10, 'Decimo'),
(11, 'Once');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia`
--

CREATE TABLE `materia` (
  `ID_materia` int(11) NOT NULL,
  `Nombre_materia` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `materia`
--

INSERT INTO `materia` (`ID_materia`, `Nombre_materia`) VALUES
(1, 'Etica'),
(2, 'Religion'),
(3, 'Español'),
(4, 'Educacionn Fisica'),
(5, 'Informatica'),
(6, 'Artes'),
(7, 'Ingles'),
(8, 'Matematicas'),
(9, 'Ciencias'),
(10, 'Sociales'),
(11, 'Estadistica'),
(12, 'Geometria'),
(13, 'Quimica'),
(14, 'Fisica'),
(15, 'Democracia'),
(16, 'Geografia'),
(17, 'Historia'),
(18, 'Catedra de la paz'),
(19, 'Trigonometria'),
(20, 'Filosofia'),
(21, 'Politica'),
(22, 'Economia'),
(23, 'Algebra'),
(24, 'Estadistica'),
(25, 'Danzas'),
(26, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nota`
--

CREATE TABLE `nota` (
  `ID_nota` int(11) NOT NULL,
  `ID_estudiante` int(11) DEFAULT NULL,
  `ID_asignatura` int(11) DEFAULT NULL,
  `Valor` float DEFAULT NULL,
  `Periodo` varchar(50) DEFAULT NULL,
  `Fecha_registro` date DEFAULT NULL,
  `Observaciones` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `ID_rol` int(11) NOT NULL,
  `Nombre_rol` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`ID_rol`, `Nombre_rol`) VALUES
(1, 'Docente'),
(2, 'Estudiante');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asignatura`
--
ALTER TABLE `asignatura`
  ADD PRIMARY KEY (`ID_asignatura`),
  ADD KEY `ID_materia` (`ID_materia`);

--
-- Indices de la tabla `asistencia`
--
ALTER TABLE `asistencia`
  ADD PRIMARY KEY (`ID_asistencia`),
  ADD KEY `ID_estudiante` (`ID_estudiante`),
  ADD KEY `ID_asignatura` (`ID_asignatura`);

--
-- Indices de la tabla `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`ID_curso`),
  ADD KEY `fk_curso_grado` (`ID_grado`);

--
-- Indices de la tabla `docente`
--
ALTER TABLE `docente`
  ADD PRIMARY KEY (`ID_profesor`),
  ADD KEY `ID_rol` (`ID_rol`);

--
-- Indices de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD PRIMARY KEY (`ID_estudiante`),
  ADD KEY `ID_curso` (`ID_curso`),
  ADD KEY `ID_grado` (`ID_grado`),
  ADD KEY `ID_rol` (`ID_rol`);

--
-- Indices de la tabla `grado`
--
ALTER TABLE `grado`
  ADD PRIMARY KEY (`ID_grado`);

--
-- Indices de la tabla `materia`
--
ALTER TABLE `materia`
  ADD PRIMARY KEY (`ID_materia`);

--
-- Indices de la tabla `nota`
--
ALTER TABLE `nota`
  ADD PRIMARY KEY (`ID_nota`),
  ADD KEY `ID_estudiante` (`ID_estudiante`),
  ADD KEY `ID_asignatura` (`ID_asignatura`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`ID_rol`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asignatura`
--
ALTER TABLE `asignatura`
  ADD CONSTRAINT `asignatura_ibfk_1` FOREIGN KEY (`ID_materia`) REFERENCES `materia` (`ID_materia`);

--
-- Filtros para la tabla `asistencia`
--
ALTER TABLE `asistencia`
  ADD CONSTRAINT `asistencia_ibfk_1` FOREIGN KEY (`ID_estudiante`) REFERENCES `estudiante` (`ID_estudiante`),
  ADD CONSTRAINT `asistencia_ibfk_2` FOREIGN KEY (`ID_asignatura`) REFERENCES `asignatura` (`ID_asignatura`);

--
-- Filtros para la tabla `curso`
--
ALTER TABLE `curso`
  ADD CONSTRAINT `fk_curso_grado` FOREIGN KEY (`ID_grado`) REFERENCES `grado` (`ID_grado`);

--
-- Filtros para la tabla `docente`
--
ALTER TABLE `docente`
  ADD CONSTRAINT `docente_ibfk_1` FOREIGN KEY (`ID_rol`) REFERENCES `rol` (`ID_rol`);

--
-- Filtros para la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD CONSTRAINT `estudiante_ibfk_1` FOREIGN KEY (`ID_curso`) REFERENCES `curso` (`ID_curso`),
  ADD CONSTRAINT `estudiante_ibfk_2` FOREIGN KEY (`ID_grado`) REFERENCES `grado` (`ID_grado`),
  ADD CONSTRAINT `estudiante_ibfk_3` FOREIGN KEY (`ID_rol`) REFERENCES `rol` (`ID_rol`);

--
-- Filtros para la tabla `nota`
--
ALTER TABLE `nota`
  ADD CONSTRAINT `nota_ibfk_1` FOREIGN KEY (`ID_estudiante`) REFERENCES `estudiante` (`ID_estudiante`),
  ADD CONSTRAINT `nota_ibfk_2` FOREIGN KEY (`ID_asignatura`) REFERENCES `asignatura` (`ID_asignatura`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
