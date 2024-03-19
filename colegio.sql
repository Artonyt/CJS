-- Base de datos: `colegio`

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignatura`
--

CREATE TABLE `asignatura` (
  `ID_asignatura` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre_asignatura` varchar(100) DEFAULT NULL,
  `ID_materia` int(11) DEFAULT NULL,
  `Docente_asignado` varchar(100) DEFAULT NULL,
  `Horario_clase` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID_asignatura`),
  KEY `FK_asignatura_materia` (`ID_materia`),
  CONSTRAINT `FK_asignatura_materia` FOREIGN KEY (`ID_materia`) REFERENCES `materia` (`ID_materia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencia`
--

CREATE TABLE `asistencia` (
  `ID_asistencia` int(11) NOT NULL AUTO_INCREMENT,
  `ID_estudiante` int(11) DEFAULT NULL,
  `ID_asignatura` int(11) DEFAULT NULL,
  `Fecha_asistencia` date DEFAULT NULL,
  `Tipo` varchar(20) DEFAULT NULL,
  `Justificada` varchar(3) DEFAULT NULL,
  `Observaciones` text DEFAULT NULL,
  PRIMARY KEY (`ID_asistencia`),
  KEY `FK_asistencia_estudiante` (`ID_estudiante`),
  KEY `FK_asistencia_asignatura` (`ID_asignatura`),
  CONSTRAINT `FK_asistencia_asignatura` FOREIGN KEY (`ID_asignatura`) REFERENCES `asignatura` (`ID_asignatura`),
  CONSTRAINT `FK_asistencia_estudiante` FOREIGN KEY (`ID_estudiante`) REFERENCES `estudiante` (`ID_estudiante`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE `curso` (
  `ID_curso` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre_curso` varchar(100) DEFAULT NULL,
  `ID_grado` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_curso`),
  KEY `FK_curso_grado` (`ID_grado`),
  CONSTRAINT `FK_curso_grado` FOREIGN KEY (`ID_grado`) REFERENCES `grado` (`ID_grado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docente`
--

CREATE TABLE `docente` (
  `ID_profesor` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(100) DEFAULT NULL,
  `identificacion` int(11) NOT NULL,
  `Correo_electrónico` varchar(100) DEFAULT NULL,
  `Contraseña` varchar(20) NOT NULL,
  `ID_rol` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_profesor`),
  KEY `FK_docente_rol` (`ID_rol`),
  CONSTRAINT `FK_docente_rol` FOREIGN KEY (`ID_rol`) REFERENCES `rol` (`ID_rol`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE `estudiante` (
  `ID_estudiante` int(11) NOT NULL AUTO_INCREMENT,
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
  `Fecha_ingreso` date DEFAULT NULL,
  PRIMARY KEY (`ID_estudiante`),
  KEY `FK_estudiante_curso` (`ID_curso`),
  KEY `FK_estudiante_grado` (`ID_grado`),
  KEY `FK_estudiante_rol` (`ID_rol`),
  CONSTRAINT `FK_estudiante_curso` FOREIGN KEY (`ID_curso`) REFERENCES `curso` (`ID_curso`),
  CONSTRAINT `FK_estudiante_grado` FOREIGN KEY (`ID_grado`) REFERENCES `grado` (`ID_grado`),
  CONSTRAINT `FK_estudiante_rol` FOREIGN KEY (`ID_rol`) REFERENCES `rol` (`ID_rol`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grado`
--

CREATE TABLE `grado` (
  `ID_grado` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre_grado` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID_grado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia`
--

CREATE TABLE `materia` (
  `ID_materia` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre_materia` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID_materia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nota`
--

CREATE TABLE `nota` (
  `ID_nota` int(11) NOT NULL AUTO_INCREMENT,
  `ID_estudiante` int(11) DEFAULT NULL,
  `ID_asignatura` int(11) DEFAULT NULL,
  `Valor` float DEFAULT NULL,
  `Periodo` varchar(50) DEFAULT NULL,
  `Fecha_registro` date DEFAULT NULL,
  `Observaciones` text DEFAULT NULL,
  PRIMARY KEY (`ID_nota`),
  KEY `FK_nota_estudiante` (`ID_estudiante`),
  KEY `FK_nota_asignatura` (`ID_asignatura`),
  CONSTRAINT `FK_nota_asignatura` FOREIGN KEY (`ID_asignatura`) REFERENCES `asignatura` (`ID_asignatura`),
  CONSTRAINT `FK_nota_estudiante` FOREIGN KEY (`ID_estudiante`) REFERENCES `estudiante` (`ID_estudiante`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `ID_rol` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre_rol` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID_rol`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- E
