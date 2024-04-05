-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-04-2024 a las 22:50:15
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
  `id_curso` int(11) NOT NULL,
  `nombre_curso` varchar(10) DEFAULT NULL,
  `id_grado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `curso`
--

INSERT INTO `curso` (`id_curso`, `nombre_curso`, `id_grado`) VALUES
(601, '601', 6),
(602, '602', 6),
(603, '603', 6),
(701, '701', 7),
(702, '702', 7),
(703, '703', 7),
(801, '801', 8),
(802, '802', 8),
(803, '803', 8),
(901, '901', 9),
(902, '902', 9),
(903, '903', 9),
(1001, '1001', 10),
(1002, '1002', 10),
(1003, '1003', 10),
(1101, '1101', 11),
(1102, '1102', 11),
(1103, '1103', 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docente`
--

CREATE TABLE `docente` (
  `ID_profesor` int(11) NOT NULL,
  `Nombre` varchar(100) DEFAULT NULL,
  `Apellido` varchar(100) NOT NULL,
  `Identificacion` int(11) NOT NULL,
  `Direccion` varchar(80) NOT NULL,
  `Celular` varchar(20) NOT NULL,
  `Correo_electrónico` varchar(100) DEFAULT NULL,
  `Contraseña` varchar(20) NOT NULL,
  `ID_rol` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `docente`
--

INSERT INTO `docente` (`ID_profesor`, `Nombre`, `Apellido`, `Identificacion`, `Direccion`, `Celular`, `Correo_electrónico`, `Contraseña`, `ID_rol`) VALUES
(1, 'Fernando', 'Ortiz', 1000678165, 'cra 58 # 34 56 su', '300331452', 'kaka@gmail.com', 'Ditunombre1', 1),
(2, 'Pedirto', 'Zambrano', 1298301283, 'cra 27 # 36 sur ', '3003371222', 'elpedrito@gmail.com', 'Ditunombre1', 1),
(3, 'pepe', 'fernandez', 100031209, 'cra 745 b 48953 suir', '3003371492', 'dasdadadapdaksojfduakj@gmail.com', 'Ditunombre1', 1),
(4, 'Laura', 'González', 215478963, 'Calle 10 #20-30', '3101234567', 'laura@example.com', 'clave123', 1),
(5, 'Carlos', 'Martínez', 365214789, 'Avenida 5 #15-25', '3209876543', 'carlos@example.com', 'contraseña456', 1),
(6, 'Ana', 'López', 789654123, 'Carrera 30 #40-50', '3005554444', 'ana@example.com', 'clave789', 1),
(7, 'Pedro', 'Ramírez', 456789321, 'Calle 15 #25-35', '3158889999', 'pedro@example.com', 'password123', 1),
(8, 'María', 'Hernández', 987654321, 'Avenida 20 #30-40', '3507778888', 'maria@example.com', 'contraseña789', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE `estudiante` (
  `ID_estudiante` int(11) NOT NULL,
  `Nombres` varchar(100) NOT NULL,
  `Apellidos` varchar(100) NOT NULL,
  `identificacion` int(11) NOT NULL,
  `Contraseña` varchar(20) NOT NULL,
  `Fecha_nacimiento` date DEFAULT NULL,
  `Género` varchar(10) DEFAULT NULL,
  `Dirección` varchar(200) DEFAULT NULL,
  `Teléfono` varchar(20) DEFAULT NULL,
  `Correo_electrónico` varchar(100) DEFAULT NULL,
  `id_curso` int(11) NOT NULL,
  `ID_grado` int(11) DEFAULT NULL,
  `ID_rol` int(11) DEFAULT NULL,
  `Fecha_ingreso` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estudiante`
--

INSERT INTO `estudiante` (`ID_estudiante`, `Nombres`, `Apellidos`, `identificacion`, `Contraseña`, `Fecha_nacimiento`, `Género`, `Dirección`, `Teléfono`, `Correo_electrónico`, `id_curso`, `ID_grado`, `ID_rol`, `Fecha_ingreso`) VALUES
(1, 'Juan', 'Perez', 100123456, 'contraseña123', '2005-05-10', 'Masculino', 'Calle 123', '1234567890', 'juan@example.com', 701, 7, 1, '2023-01-15'),
(2, 'María', 'Lopez', 100234567, 'clave456', '2006-03-15', 'Femenino', 'Avenida 456', '9876543210', 'maria@example.com', 801, 8, 1, '2023-02-20'),
(3, 'Pedro', 'Patiño', 100345678, 'password789', '2007-07-20', 'Masculino', 'Carrera 789', '5678901234', 'pedro@example.com', 1001, 10, 1, '2023-03-25'),
(4, 'Valentina', 'Arroyo', 1011083556, 'Ditunombre1', '0000-00-00', 'F', 'FFFGFG', '2389374', 'DSDDFSF', 601, 6, 2, '0000-00-00'),
(6, 'Jose', 'Fuentes', 12323343, 'Ditunombre1', '2012-10-23', 'M', 'dfgsdgdfgfg', '345656456', 'fdgfgf@gmail.com', 602, 6, 2, '2012-12-23'),
(7, 'Jose', 'Fuentes', 12323343, 'Ditunombre1', '2012-10-23', 'M', 'dfgsdgdfgfg', '345656456', 'fdgfgf@gmail.com', 602, 6, 2, '2012-12-23'),
(8, 'Valentina', 'Arroyo', 1011083556, 'Ditunombre1', '0000-00-00', 'F', 'FFFGFG', '2389374', 'DSDDFSF', 601, 6, 2, '0000-00-00');

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
  `Nombre_materia` varchar(100) DEFAULT NULL,
  `docente_asignado` varchar(100) NOT NULL,
  `id_asignatura` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `materia`
--

INSERT INTO `materia` (`ID_materia`, `Nombre_materia`, `docente_asignado`, `id_asignatura`) VALUES
(1, 'Religion', '', 0),
(2, 'Ingles', '', 1),
(3, 'Español', '', 0),
(4, 'Educacion Fisica', '', 0),
(5, 'Informatica', '', 0),
(6, 'Artes', '', 0),
(8, 'Matematicas', '', 0),
(9, 'Ciencias', '', 0),
(10, 'Sociales', '', 0),
(11, 'Estadistica', '', 0),
(12, 'Geometria', '', 0),
(13, 'Quimica', '', 0),
(14, 'Fisica', '', 0),
(15, 'Democracia', '', 0),
(16, 'Geografia', '', 0),
(17, 'Historia', '', 0),
(18, 'Catedra de la paz', '', 0),
(19, 'Trigonometria', '', 0),
(20, 'Filosofia', '', 0),
(21, 'Politica', '', 0),
(22, 'Economia', '', 0),
(23, 'Algebra', '', 0),
(24, 'Estadistica', '', 0),
(25, 'Danzas', '', 0);

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

--
-- Volcado de datos para la tabla `nota`
--

INSERT INTO `nota` (`ID_nota`, `ID_estudiante`, `ID_asignatura`, `Valor`, `Periodo`, `Fecha_registro`, `Observaciones`) VALUES
(1, 6, NULL, 45, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `relacion_curso_materia`
--

CREATE TABLE `relacion_curso_materia` (
  `id_curso` int(11) NOT NULL,
  `ID_materia` int(11) NOT NULL
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
  ADD PRIMARY KEY (`ID_asignatura`);

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
  ADD PRIMARY KEY (`id_curso`),
  ADD KEY `id_grado` (`id_grado`);

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
  ADD KEY `ID_grado` (`ID_grado`),
  ADD KEY `ID_rol` (`ID_rol`),
  ADD KEY `id_curso` (`id_curso`);

--
-- Indices de la tabla `grado`
--
ALTER TABLE `grado`
  ADD PRIMARY KEY (`ID_grado`);

--
-- Indices de la tabla `materia`
--
ALTER TABLE `materia`
  ADD PRIMARY KEY (`ID_materia`),
  ADD KEY `id_asignatura` (`id_asignatura`);

--
-- Indices de la tabla `nota`
--
ALTER TABLE `nota`
  ADD PRIMARY KEY (`ID_nota`),
  ADD KEY `ID_estudiante` (`ID_estudiante`),
  ADD KEY `ID_asignatura` (`ID_asignatura`);

--
-- Indices de la tabla `relacion_curso_materia`
--
ALTER TABLE `relacion_curso_materia`
  ADD PRIMARY KEY (`id_curso`,`ID_materia`),
  ADD KEY `ID_materia` (`ID_materia`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`ID_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `curso`
--
ALTER TABLE `curso`
  MODIFY `id_curso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6024;

--
-- AUTO_INCREMENT de la tabla `docente`
--
ALTER TABLE `docente`
  MODIFY `ID_profesor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  MODIFY `ID_estudiante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `materia`
--
ALTER TABLE `materia`
  MODIFY `ID_materia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asignatura`
--
ALTER TABLE `asignatura`
  ADD CONSTRAINT `asignatura_ibfk_1` FOREIGN KEY (`ID_asignatura`) REFERENCES `materia` (`id_asignatura`);

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
  ADD CONSTRAINT `curso_ibfk_1` FOREIGN KEY (`id_grado`) REFERENCES `grado` (`ID_grado`);

--
-- Filtros para la tabla `docente`
--
ALTER TABLE `docente`
  ADD CONSTRAINT `docente_ibfk_1` FOREIGN KEY (`ID_rol`) REFERENCES `rol` (`ID_rol`);

--
-- Filtros para la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD CONSTRAINT `estudiante_ibfk_2` FOREIGN KEY (`ID_grado`) REFERENCES `grado` (`ID_grado`),
  ADD CONSTRAINT `estudiante_ibfk_3` FOREIGN KEY (`ID_rol`) REFERENCES `rol` (`ID_rol`),
  ADD CONSTRAINT `estudiante_ibfk_4` FOREIGN KEY (`id_curso`) REFERENCES `curso` (`id_curso`);

--
-- Filtros para la tabla `nota`
--
ALTER TABLE `nota`
  ADD CONSTRAINT `nota_ibfk_1` FOREIGN KEY (`ID_estudiante`) REFERENCES `estudiante` (`ID_estudiante`),
  ADD CONSTRAINT `nota_ibfk_2` FOREIGN KEY (`ID_asignatura`) REFERENCES `asignatura` (`ID_asignatura`);

--
-- Filtros para la tabla `relacion_curso_materia`
--
ALTER TABLE `relacion_curso_materia`
  ADD CONSTRAINT `relacion_curso_materia_ibfk_1` FOREIGN KEY (`id_curso`) REFERENCES `curso` (`id_curso`),
  ADD CONSTRAINT `relacion_curso_materia_ibfk_2` FOREIGN KEY (`ID_materia`) REFERENCES `materia` (`ID_materia`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
