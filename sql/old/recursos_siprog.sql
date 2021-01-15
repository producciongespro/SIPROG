-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 05-02-2019 a las 07:40:58
-- Versión del servidor: 5.6.41
-- Versión de PHP: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `recursos_siprog`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `areas`
--

CREATE TABLE `areas` (
  `id` tinyint(4) NOT NULL,
  `nombre_area` varchar(128) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `areas`
--

INSERT INTO `areas` (`id`, `nombre_area`) VALUES
(1, 'Desarrollo'),
(2, 'Diseño gráfico'),
(3, 'Audiovisual'),
(4, 'Jefatura'),
(5, 'Secretarial');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bitacora`
--

CREATE TABLE `bitacora` (
  `id_evento` int(11) NOT NULL COMMENT 'Identificador del evento o acción realizada',
  `usuario` varchar(128) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Usuario que realiza el evento',
  `evento` varchar(128) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Acción realizada',
  `fecha_evento` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha en que sucede el evento',
  `id_registro` int(11) NOT NULL COMMENT 'Identificador el ingreso modificado',
  `nombre` varchar(256) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Nombre del registro afectado'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Tabla para documentar eventos de los usuarios en el sistema';

--
-- Volcado de datos para la tabla `bitacora`
--

INSERT INTO `bitacora` (`id_evento`, `usuario`, `evento`, `fecha_evento`, `id_registro`, `nombre`) VALUES
(1, 'Patricia Hernández', 'Ingreso', '2018-11-28 17:08:17', 1, 'Costa Rica Pura Vida in Many Ways'),
(2, 'Patricia Hernández', 'Ingreso', '2018-11-28 17:14:13', 2, 'Manual de atube Catcher'),
(3, 'Patricia Hernández', 'Ingreso', '2018-11-28 17:22:49', 3, 'Mini-book Inglés'),
(4, 'Patricia Hernández', 'Ingreso', '2018-11-28 17:24:22', 4, 'Cuenticos'),
(5, 'Patricia Hernández', 'Ingreso', '2018-11-28 17:32:46', 5, 'Flautaoke'),
(6, 'Patricia Hernández', 'Ingreso', '2018-11-28 17:34:54', 6, 'Vida Clips'),
(7, 'Patricia Hernández', 'Actualización', '2018-11-28 17:36:05', 6, 'Vida Clips'),
(8, 'Patricia Hernández', 'Actualización', '2018-11-28 17:36:50', 4, 'Cuenticos'),
(9, 'Patricia Hernández', 'Actualización', '2018-11-28 17:37:19', 5, 'Flautaoke'),
(10, 'Patricia Hernández', 'Ingreso', '2018-11-28 17:40:22', 7, 'Micro conversaciones francés'),
(11, 'Patricia Hernández', 'Ingreso', '2018-11-28 17:43:15', 8, 'Formulario de Control de Calidad'),
(12, 'Patricia Hernández', 'Ingreso', '2018-11-28 17:47:18', 9, 'Sicrop'),
(13, 'Patricia Hernández', 'Ingreso', '2018-11-28 17:50:04', 10, 'Sitio Orienta'),
(14, 'Patricia Hernández', 'Ingreso', '2018-11-28 17:51:34', 11, 'DDIE Recurso de gestión de solicitudes'),
(15, 'Patricia Hernández', 'Actualización', '2018-11-28 17:53:21', 11, 'Gestión DDIE '),
(16, 'Patricia Hernández', 'Actualización', '2018-11-28 17:54:04', 11, 'Gestión DDIE '),
(17, 'Patricia Hernández', 'Actualización', '2018-11-28 17:54:08', 11, 'Gestión DDIE '),
(18, 'Patricia Hernández', 'Actualización', '2018-11-28 18:40:39', 9, 'Siprog'),
(19, 'Patricia Hernández', 'Ingreso', '2018-11-28 18:45:46', 12, 'Leyendas de Costa Rica en Ngäbere*'),
(20, 'Patricia Hernández', 'Ingreso', '2018-11-28 18:49:05', 13, 'Brigada Ecosónica'),
(21, 'Patricia Hernández', 'Ingreso', '2018-11-28 18:49:55', 14, 'Apocalipsis Zomby la comunidad del tronco caído'),
(22, 'Patricia Hernández', 'Ingreso', '2018-11-28 18:50:13', 15, 'Apocalipsis Zomby la comunidad de la charca'),
(23, 'Patricia Hernández', 'Ingreso', '2018-11-28 18:52:48', 16, 'Sitio de Artes Plásticas'),
(24, 'Patricia Hernández', 'Ingreso', '2018-11-28 18:55:20', 17, 'Safari coordenadas de matemática'),
(25, 'Patricia Hernández', 'Ingreso', '2018-11-28 18:57:06', 18, 'Patrones y Sucesiones'),
(26, 'Patricia Hernández', 'Ingreso', '2018-11-28 18:59:59', 19, 'Módulo de técnica'),
(27, 'Patricia Hernández', 'Ingreso', '2018-11-28 19:02:02', 20, 'Cuento-Narrador-ilustrador para preescolar'),
(28, 'Patricia Hernández', 'Ingreso', '2018-11-28 19:03:56', 21, 'Juego Monópoli '),
(29, 'Patricia Hernández', 'Ingreso', '2018-11-28 19:05:14', 22, 'Karaoke Limón Intercultural e Interreligioso'),
(30, 'Patricia Hernández', 'Ingreso', '2018-11-28 19:05:34', 23, 'Frases en lengua indígena costarricense'),
(31, 'Patricia Hernández', 'Ingreso', '2018-11-28 19:06:01', 24, 'Interculturalidad: Videos Enciclopedia'),
(32, 'Patricia Hernández', 'Ingreso', '2018-11-28 19:08:18', 25, 'Educación Intercultural  (Videos contextualización)'),
(33, 'Patricia Hernández', 'Actualización', '2018-11-28 19:09:05', 3, 'Mini-book Inglés'),
(34, 'Patricia Hernández', 'Actualización', '2018-11-28 19:09:26', 4, 'Cuenticos'),
(35, 'Patricia Hernández', 'Actualización', '2018-11-28 19:09:51', 5, 'Flautaoke'),
(36, 'Patricia Hernández', 'Actualización', '2018-11-28 19:10:25', 3, 'Mini-book Inglés'),
(37, 'Patricia Hernández', 'Actualización', '2018-11-28 19:15:04', 3, 'Mini-book Inglés'),
(38, 'Patricia Hernández', 'Actualización', '2018-11-28 19:15:36', 3, 'Mini-book Inglés1'),
(39, 'Patricia Hernández', 'Actualización', '2018-11-28 19:15:49', 3, 'Mini-book Inglés'),
(40, 'Patricia Hernández', 'Ingreso', '2018-11-28 19:36:32', 26, 'Bachi-Practicas'),
(41, 'Patricia Hernández', 'Ingreso', '2018-11-28 19:42:20', 27, 'Sitio Piensa en Arte Español'),
(42, 'Patricia Hernández', 'Ingreso', '2018-11-28 19:43:47', 28, 'Sitio Piensa en Arte Español'),
(43, 'Patricia Hernández', 'Eliminación', '2018-11-28 19:44:29', 28, 'Sitio Piensa en Arte Español'),
(44, 'Patricia Hernández', 'Actualización', '2018-11-28 19:45:28', 26, 'Bachi-Practicas'),
(45, 'Patricia Hernández', 'Actualización', '2018-11-28 19:46:42', 21, 'Juego Monópoli  Religión'),
(46, 'Patricia Hernández', 'Ingreso', '2018-11-28 19:52:25', 29, 'Sitio Evaluación de los aprendizajes'),
(47, 'Patricia Hernández', 'Ingreso', '2018-11-28 19:54:20', 30, 'Viabilidad del sistema Suite CRM para tecno-aprender'),
(48, 'Patricia Hernández', 'Ingreso', '2018-11-28 19:57:25', 31, 'Sistema PFP'),
(49, 'Patricia Hernández', 'Ingreso', '2018-11-28 19:58:59', 32, 'El metiche'),
(50, 'Patricia Hernández', 'Ingreso', '2018-11-28 20:01:00', 33, 'Sitio Matricula Preescolar'),
(51, 'Patricia Hernández', 'Ingreso', '2018-11-28 20:02:37', 34, 'https://www.mep.go.cr/educatico/portal-espanol'),
(52, 'Patricia Hernández', 'Ingreso', '2018-11-28 20:16:27', 35, 'Sitio de Inglés Primaria'),
(53, 'Patricia Hernández', 'Ingreso', '2018-11-28 20:20:44', 36, 'CyberlabTeens 10th and 11th Grades'),
(54, 'Patricia Hernández', 'Ingreso', '2018-11-28 20:22:40', 37, 'Un viaje por Costa Rica '),
(55, 'Patricia Hernández', 'Ingreso', '2018-11-28 20:24:37', 38, 'Sitio Olimpiadas de matemática'),
(56, 'Patricia Hernández', 'Ingreso', '2018-11-28 20:27:50', 39, 'Propuesta de Abordaje: ejemplos de planeamiento Estudios Sociales'),
(57, 'Patricia Hernández', 'Ingreso', '2018-11-28 20:29:39', 40, 'Flora and Fauna in Costa Rica'),
(58, 'Patricia Hernández', 'Ingreso', '2018-11-28 20:30:50', 41, 'Holidays Around the World'),
(59, 'Patricia Hernández', 'Ingreso', '2018-11-28 20:32:19', 42, 'Mi historia, mi herencia'),
(60, 'Patricia Hernández', 'Ingreso', '2018-11-28 20:36:26', 43, 'Sitio de Recursos Liceos Experimentales Bilingues y Grupos Bilingues (LEBs)'),
(61, 'Patricia Hernández', 'Ingreso', '2018-11-28 20:38:31', 44, 'Krei'),
(62, 'Patricia Hernández', 'Ingreso', '2018-11-28 20:40:27', 45, 'El templo de las 1000 puertas'),
(63, 'Patricia Hernández', 'Ingreso', '2018-11-28 21:12:59', 46, 'Sitio de Recursos Guía Sétimo Año'),
(64, 'Patricia Hernández', 'Actualización', '2018-11-28 21:14:19', 37, 'Un viaje por Costa Rica '),
(65, 'Patricia Hernández', 'Actualización', '2018-11-28 21:15:06', 38, 'Sitio Olimpiadas de matemática'),
(66, 'Patricia Hernández', 'Actualización', '2018-12-03 19:42:19', 46, 'Sitio de Recursos Guía Sétimo Año (7)'),
(67, 'Patricia Hernández', 'Ingreso', '2019-01-16 20:56:13', 47, 'La aventura de Chantli'),
(68, 'Patricia Hernández', 'Actualizaci??n', '2019-01-16 20:58:33', 34, 'Portal español'),
(69, 'Patricia Hernández', 'Actualizaci??n', '2019-01-16 21:05:19', 26, 'Bachi-Practicas'),
(70, 'Patricia Hernández', 'Actualizaci??n', '2019-01-16 21:14:06', 38, 'Sitio Olimpiadas de matemática'),
(71, 'Patricia Hernández', 'Actualizaci??n', '2019-01-16 21:14:52', 39, 'Propuesta de Abordaje: ejemplos de planeamiento Estudios Sociales'),
(72, 'Patricia Hernández', 'Actualizaci??n', '2019-01-16 21:15:17', 42, 'Mi historia, mi herencia'),
(73, 'Patricia Hernández', 'Ingreso', '2019-01-16 21:21:44', 48, 'Actualizaciones'),
(74, 'Patricia Hernández', 'Ingreso', '2019-01-16 21:28:36', 49, 'Sitio de Recursos Guía Octavo Año (8)'),
(75, 'Patricia Hernández', 'Actualizaci??n', '2019-01-16 21:30:02', 26, 'Bachi-Practicas'),
(76, 'Patricia Hernández', 'Actualizaci??n', '2019-01-16 21:31:27', 48, 'Actualizaciones'),
(77, 'Patricia Hernández', 'Actualizaci??n', '2019-01-16 21:36:40', 2, 'Manual de atube Catcher'),
(78, 'Patricia Hernández', 'Actualizaci??n', '2019-01-16 21:47:07', 38, 'Sitio Olimpiadas de matemática'),
(79, 'Patricia Hernández', 'Actualizaci??n', '2019-01-16 21:47:45', 43, 'Sitio de Recursos Liceos Experimentales Bilingues y Grupos Bilingues (LEBs)'),
(80, 'Patricia Hernández', 'Actualizaci??n', '2019-01-16 21:48:17', 46, 'Sitio de Recursos Guía Sétimo Año (7)'),
(81, 'Patricia Hernández', 'Actualizaci??n', '2019-01-16 21:49:02', 40, 'Flora and Fauna in Costa Rica'),
(82, 'Patricia Hernández', 'Actualizaci??n', '2019-01-16 21:50:34', 27, 'Sitio Piensa en Arte Español'),
(83, 'Patricia Hernández', 'Actualizaci??n', '2019-01-16 21:50:57', 29, 'Sitio Evaluación de los aprendizajes'),
(84, 'Patricia Hernández', 'Actualizaci??n', '2019-01-16 21:51:18', 31, 'Sistema PFP'),
(85, 'Patricia Hernández', 'Actualizaci??n', '2019-01-16 21:51:44', 33, 'Sitio Matricula Preescolar'),
(86, 'Patricia Hernández', 'Actualizaci??n', '2019-01-16 21:52:16', 34, 'Portal español'),
(87, 'Patricia Hernández', 'Actualizaci??n', '2019-01-16 21:53:57', 35, 'Sitio de Inglés Primaria'),
(88, 'Patricia Hernández', 'Ingreso', '2019-01-17 15:32:16', 50, 'Video Global Steam Classroom Initiative:  Nueva Laboratorio Emma Gamboa School '),
(89, 'Patricia Hernández', 'Ingreso', '2019-01-17 19:09:50', 51, 'Tool Kit for Teachers and Students');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nombre_categoria` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(512) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre_categoria`, `descripcion`) VALUES
(1, 'Gestionado', 'Recurso desarrollado por terceros a los que se les da acompañamiento.'),
(2, 'Producción interna', 'Recurso 100% desarrollado por recursos humano interno de GESPRO.'),
(3, 'Contratación administrativa', 'Recursos adquiridos mediante licitaciones a los que se les da acompañamiento.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados`
--

CREATE TABLE `estados` (
  `id` int(11) NOT NULL COMMENT 'Identificador del estado del recurso',
  `nombre_estado` varchar(128) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Estado de recurso',
  `descripcion` varchar(256) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Explicación de cada estado'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `estados`
--

INSERT INTO `estados` (`id`, `nombre_estado`, `descripcion`) VALUES
(1, 'Ingresado', 'Solicitudes que ingresan pero su desarrollo no se ha iniciado.'),
(2, 'En producción', 'Recursos que se encuentran en construcción.'),
(3, 'En revisión', 'Recursos entregados a solicitantes para su revisión'),
(4, 'Publicado', 'Recurso que ya se comparte en Educatico'),
(5, 'Desestimado', 'Recurso iniciado que por alguna razón de descontinúa su desarrollo.'),
(6, 'Obsoleto', 'Recurso con tecnología o contenido desactualizado.'),
(7, 'Prioridad', 'Proyectos que las jefaturas solicitan sean desarrollado con mayor premura que el resto'),
(8, 'Actualización', 'Proyecto que se había dado por concluido pero que requiere de cambios o mejoras');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingresos`
--

CREATE TABLE `ingresos` (
  `id_registro` int(255) NOT NULL,
  `id_estado` int(11) NOT NULL COMMENT 'Código que indica el estado del recurso',
  `nombre_proyecto` varchar(512) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_cat` int(11) NOT NULL COMMENT 'identificación de la categoría',
  `id_tipo` int(11) NOT NULL COMMENT 'identificación del tipo',
  `fecha_pub` date NOT NULL COMMENT 'Fecha en que se publica en Educatico',
  `trimestre` varchar(11) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Dato que ingresa de forma automatizada en base a fecha de publicación',
  `url` varchar(256) CHARACTER SET utf8 NOT NULL COMMENT 'Dirección donde esta publicado',
  `equipo` varchar(1024) CHARACTER SET utf8 NOT NULL COMMENT 'Nombre del encargado del proyecto ',
  `audios` int(255) NOT NULL COMMENT 'Cantidad de audios en el proyecto',
  `videos` int(255) NOT NULL COMMENT 'Cantidad de videos en el proyecto',
  `documentos` int(255) NOT NULL COMMENT 'Cantidad de documentos en el proyecto',
  `imagenes` int(255) NOT NULL COMMENT 'Cantidad de imágenes en el proyecto',
  `usu_ingreso` varchar(128) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Identificador del usuario que ingresa el recurso',
  `fecha_ing` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha en que se ingresa o actualiza el recurso',
  `solicitante` varchar(256) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Persona contacto que solicita el recurso',
  `id_instancia` tinyint(4) NOT NULL COMMENT 'Identificador  de la instancia que solicita',
  `observaciones` text CHARACTER SET utf8 NOT NULL COMMENT 'Comentario interno del proyecto'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `ingresos`
--

INSERT INTO `ingresos` (`id_registro`, `id_estado`, `nombre_proyecto`, `id_cat`, `id_tipo`, `fecha_pub`, `trimestre`, `url`, `equipo`, `audios`, `videos`, `documentos`, `imagenes`, `usu_ingreso`, `fecha_ing`, `solicitante`, `id_instancia`, `observaciones`) VALUES
(1, 4, 'Costa Rica Pura Vida in Many Ways', 3, 2, '2018-03-05', 'I', 'https://www.mep.go.cr/educatico/busqueda?keys=Costa+Rica+Pura+Vida+in+Many+Ways&mtr=All&nvl=All&tpr=All', '[\"katherine.williams.jimenez@mep.go.cr\"]', 0, 0, 0, 0, 'patricia.hernandez.conejo@mep.go.cr', '2018-11-28 17:08:17', 'Granados Sirias Marianela; Ortega Cordero Alfredo; Williams Jiménez Katherine. ', 1, ''),
(2, 4, 'Manual de atube Catcher', 2, 4, '2018-03-21', 'I', 'https://www.mep.go.cr/educatico/busqueda?keys=atube+catcher&mtr=All&nvl=All&tpr=All', 'undefined', 0, 0, 1, 1, 'patricia.hernandez.conejo@mep.go.cr', '2018-11-28 17:14:13', 'Patricia Hernández Conejo', 10, ''),
(3, 2, 'Mini-book Inglés', 2, 1, '0000-00-00', 'N/A', 'N/A', '[\"oscar1.perez.ramirez@mep.go.cr\",\"luis@correo.de\",\"patricia.hernandez.conejo@mep.go.cr\",\"katherine.williams.jimenez@mep.go.cr\",\"sirleny.chaves.chaves@mep.go.cr\"]', 0, 0, 0, 0, 'patricia.hernandez.conejo@mep.go.cr', '2018-11-28 17:22:49', 'Katherine Williams, ', 10, ''),
(4, 2, 'Cuenticos', 2, 5, '0000-00-00', 'N/A', 'N/A', '[\"oscar1.perez.ramirez@mep.go.cr\",\"luis@correo.de\",\"patricia.hernandez.conejo@mep.go.cr\",\"katherine.williams.jimenez@mep.go.cr\",\"sirleny.chaves.chaves@mep.go.cr\"]', 0, 0, 0, 0, 'patricia.hernandez.conejo@mep.go.cr', '2018-11-28 17:24:22', 'Evelyn Araya Fonseca', 1, ''),
(5, 2, 'Flautaoke', 2, 1, '0000-00-00', 'N/A', 'N/A', '[\"oscar1.perez.ramirez@mep.go.cr\",\"luis@correo.de\",\"patricia.hernandez.conejo@mep.go.cr\",\"katherine.williams.jimenez@mep.go.cr\",\"sirleny.chaves.chaves@mep.go.cr\"]', 0, 0, 0, 0, 'patricia.hernandez.conejo@mep.go.cr', '2018-11-28 17:32:46', 'Monserrat Pares Zamora; Edgar Varela Jara; Andres Campos Mendez ', 2, ''),
(6, 2, 'Vida Clips', 2, 5, '0000-00-00', 'N/A', 'N/A', '[\"oscar1.perez.ramirez@mep.go.cr\",\"luis@correo.de\",\"patricia.hernandez.conejo@mep.go.cr\",\"katherine.williams.jimenez@mep.go.cr\",\"sirleny.chaves.chaves@mep.go.cr\"]', 0, 0, 0, 0, 'patricia.hernandez.conejo@mep.go.cr', '2018-11-28 17:34:54', 'Marco Fernandez Picado ', 2, ''),
(7, 2, 'Micro conversaciones francés', 2, 5, '0000-00-00', 'N/A', 'N/A', '[\"oscar1.perez.ramirez@mep.go.cr\",\"luis@correo.de\",\"patricia.hernandez.conejo@mep.go.cr\",\"mariana.molina.rojas@mep.go.cr\"]', 0, 0, 0, 0, 'patricia.hernandez.conejo@mep.go.cr', '2018-11-28 17:40:22', 'Eugenia Rodriguez Gonzalez ', 2, ''),
(8, 2, 'Formulario de Control de Calidad', 2, 5, '0000-00-00', 'N/A', 'N/A', '[\"oscar1.perez.ramirez@mep.go.cr\",\"luis@correo.de\",\"ana.araya.salazar@mep.go.cr\"]', 0, 0, 0, 0, 'patricia.hernandez.conejo@mep.go.cr', '2018-11-28 17:43:15', 'Rosa Carranza Rojas ', 9, ''),
(9, 2, 'Siprog', 2, 5, '0000-00-00', 'N/A', 'N/A', '[\"oscar1.perez.ramirez@mep.go.cr\",\"luis@correo.de\",\"patricia.hernandez.conejo@mep.go.cr\"]', 0, 0, 0, 0, 'patricia.hernandez.conejo@mep.go.cr', '2018-11-28 17:47:18', 'Oscar Pérez, Luis Chacón, Patricia Hernández', 10, ''),
(10, 2, 'Sitio Orienta', 2, 5, '0000-00-00', 'N/A', 'N/A', '[\"mariana.molina.rojas@mep.go.cr\",\"ana.araya.salazar@mep.go.cr\"]', 0, 0, 0, 0, 'patricia.hernandez.conejo@mep.go.cr', '2018-11-28 17:50:04', 'Ana T Araya', 11, ''),
(11, 1, 'Gestión DDIE ', 2, 5, '0000-00-00', 'N/A', 'N/A', '[\"oscar1.perez.ramirez@mep.go.cr\",\"luis@correo.de\",\"patricia.hernandez.conejo@mep.go.cr\"]', 0, 0, 0, 0, 'patricia.hernandez.conejo@mep.go.cr', '2018-11-28 17:51:34', 'Maribel Villalobos Villalobos', 10, ''),
(12, 1, 'Leyendas de Costa Rica en Ngäbere*', 2, 4, '0000-00-00', 'N/A', 'N/A', '[\"luis@correo.de\",\"patricia.hernandez.conejo@mep.go.cr\"]', 0, 0, 0, 0, 'patricia.hernandez.conejo@mep.go.cr', '2018-11-28 18:45:46', 'Evelyn Araya Fonseca', 1, ''),
(13, 2, 'Brigada Ecosónica', 3, 2, '0000-00-00', 'N/A', 'N/A', '[\"sonia.hernandez.gonzalez@mep.go.cr\"]', 0, 0, 0, 0, 'patricia.hernandez.conejo@mep.go.cr', '2018-11-28 18:49:05', 'Monserrat Pares Zamora, Andres Campos Mendez, Edgar Varela Jara.', 2, ''),
(14, 2, 'Apocalipsis Zomby la comunidad del tronco caído', 3, 2, '0000-00-00', 'N/A', 'N/A', '[\"sonia.hernandez.gonzalez@mep.go.cr\"]', 0, 0, 0, 0, 'patricia.hernandez.conejo@mep.go.cr', '2018-11-28 18:49:55', 'Monserrat Pares Zamora, Andres Campos Mendez, Edgar Varela Jara.', 2, ''),
(15, 2, 'Apocalipsis Zomby la comunidad de la charca', 3, 2, '0000-00-00', 'N/A', 'N/A', '[\"sonia.hernandez.gonzalez@mep.go.cr\"]', 0, 0, 0, 0, 'patricia.hernandez.conejo@mep.go.cr', '2018-11-28 18:50:13', 'Monserrat Pares Zamora, Andres Campos Mendez, Edgar Varela Jara.', 2, ''),
(16, 1, 'Sitio de Artes Plásticas', 2, 5, '0000-00-00', 'N/A', 'N/A', '[\"oscar1.perez.ramirez@mep.go.cr\",\"luis@correo.de\",\"patricia.hernandez.conejo@mep.go.cr\",\"sirleny.chaves.chaves@mep.go.cr\"]', 0, 0, 0, 0, 'patricia.hernandez.conejo@mep.go.cr', '2018-11-28 18:52:48', 'Rosalia Ramírez Chavarría', 1, ''),
(17, 5, 'Safari coordenadas de matemática', 2, 1, '0000-00-00', 'N/A', 'N/A', '[\"oscar1.perez.ramirez@mep.go.cr\",\"luis@correo.de\",\"patricia.hernandez.conejo@mep.go.cr\",\"lilliam.rojas.artavia@mep.go.cr\"]', 0, 0, 0, 0, 'patricia.hernandez.conejo@mep.go.cr', '2018-11-28 18:55:20', 'Lilliam Rojas Artavia', 10, 'Este desarrollo estaba hecho en Constructor, y se ha intentado por más de 1 año en agendar para seguimiento, pero debido a las cargas de trabajo no se ha logrado hacer esta reunión.'),
(18, 3, 'Patrones y Sucesiones', 3, 2, '0000-00-00', 'N/A', 'N/A', '[\"luis@correo.de\",\"lilliam.rojas.artavia@mep.go.cr\"]', 0, 0, 0, 0, 'patricia.hernandez.conejo@mep.go.cr', '2018-11-28 18:57:06', 'Lilliam Rojas Artavia', 10, ''),
(19, 3, 'Módulo de técnica', 2, 5, '0000-00-00', 'N/A', 'N/A', '[\"luis@correo.de\",\"lilliam.rojas.artavia@mep.go.cr\"]', 0, 0, 0, 0, 'patricia.hernandez.conejo@mep.go.cr', '2018-11-28 18:59:59', 'Luis Gilberto Marín Gamboa', 4, 'Se presentó el recurso y se envió para su revisión, aún no se ha tenido respuesta ya que cambiaron los programas y están desarrollando nuevos programas para subir al gestor de contenidos.'),
(20, 1, 'Cuento-Narrador-ilustrador para preescolar', 2, 1, '0000-00-00', 'N/A', 'N/A', '[\"oscar1.perez.ramirez@mep.go.cr\",\"luis@correo.de\",\"patricia.hernandez.conejo@mep.go.cr\"]', 0, 0, 0, 0, 'patricia.hernandez.conejo@mep.go.cr', '2018-11-28 19:02:02', 'Ofelia Montoya García', 5, ''),
(21, 1, 'Juego Monópoli  Religión', 2, 3, '0000-00-00', 'N/A', 'N/A', '[\"oscar1.perez.ramirez@mep.go.cr\",\"luis@correo.de\",\"patricia.hernandez.conejo@mep.go.cr\"]', 0, 0, 0, 0, 'patricia.hernandez.conejo@mep.go.cr', '2018-11-28 19:03:56', 'Marvin Barquero Barquero ', 3, ''),
(22, 1, 'Karaoke Limón Intercultural e Interreligioso', 2, 1, '0000-00-00', 'N/A', 'N/A', '[\"oscar1.perez.ramirez@mep.go.cr\",\"luis@correo.de\",\"patricia.hernandez.conejo@mep.go.cr\"]', 0, 0, 0, 0, 'patricia.hernandez.conejo@mep.go.cr', '2018-11-28 19:05:14', 'Victor Pineda Rodríguez', 6, ''),
(23, 1, 'Frases en lengua indígena costarricense', 2, 1, '0000-00-00', 'N/A', 'N/A', '[\"oscar1.perez.ramirez@mep.go.cr\",\"luis@correo.de\",\"patricia.hernandez.conejo@mep.go.cr\"]', 0, 0, 0, 0, 'patricia.hernandez.conejo@mep.go.cr', '2018-11-28 19:05:34', 'Victor Pineda Rodríguez', 6, ''),
(24, 1, 'Interculturalidad: Videos Enciclopedia', 2, 4, '0000-00-00', 'N/A', 'N/A', '[\"oscar1.perez.ramirez@mep.go.cr\",\"luis@correo.de\",\"patricia.hernandez.conejo@mep.go.cr\"]', 0, 0, 0, 0, 'patricia.hernandez.conejo@mep.go.cr', '2018-11-28 19:06:01', 'Victor Pineda Rodríguez', 6, ''),
(25, 6, 'Educación Intercultural  (Videos contextualización)', 2, 4, '0000-00-00', 'N/A', 'N/A', '[\"luis@correo.de\",\"patricia.hernandez.conejo@mep.go.cr\",\"christian.vargas.rojas@mep.go.cr\"]', 0, 0, 0, 0, 'patricia.hernandez.conejo@mep.go.cr', '2018-11-28 19:08:18', 'Victor Pineda Rodríguez', 6, 'No se envío los contenidos a pesar de las múltiples ocasiones en que se pidió esto debido a que los videos tenían otros derechos adquiridos.'),
(26, 4, 'Bachi-Practicas', 2, 1, '2018-10-01', 'IV', 'https://www.mep.go.cr/educatico/practicas-bachillerato-tu-medida-2', 'undefined', 0, 0, 20, 1928, 'patricia.hernandez.conejo@mep.go.cr', '2018-11-28 19:36:32', 'Norberto Solano Navarro ', 7, ''),
(27, 4, 'Sitio Piensa en Arte Español', 2, 4, '2018-09-10', 'III', 'https://www.mep.go.cr/educatico/busqueda?keys=Sitio+Piensa+en+Arte+Espa%C3%B1ol&mtr=All&nvl=All&tpr=All', 'undefined', 1, 0, 160, 182, 'patricia.hernandez.conejo@mep.go.cr', '2018-11-28 19:42:20', 'Araya Fonseca, Evelyn', 1, ''),
(51, 3, 'Tool Kit for Teachers and Students', 2, 4, '0001-01-01', 'I', 'URL', '[\"mariana.molina.rojas@mep.go.cr\",\"marco.brenes.lopez@mep.go.cr\",\"katherine.williams.jimenez@mep.go.cr\"]', 0, 0, 0, 0, 'patricia.hernandez.conejo@mep.go.cr', '2019-01-17 19:09:50', 'Marianela Granados Sirias y Alfredo Ortega Cordero', 2, 'N/A'),
(29, 4, 'Sitio Evaluación de los aprendizajes', 2, 4, '2018-09-10', 'III', 'https://www.mep.go.cr/educatico/orientaciones-procesos-evaluacion-aprendizajes', 'undefined', 0, 0, 7, 21, 'patricia.hernandez.conejo@mep.go.cr', '2018-11-28 19:52:25', 'Julio Leiva Méndez', 7, ''),
(30, 3, 'Viabilidad del sistema Suite CRM para tecno-aprender', 2, 5, '0000-00-00', 'N/A', 'N/A', '[\"oscar1.perez.ramirez@mep.go.cr\"]', 0, 3, 0, 0, 'patricia.hernandez.conejo@mep.go.cr', '2018-11-28 19:54:20', 'Ana Gabriela Castro', 10, ''),
(31, 4, 'Sistema PFP', 2, 6, '2018-09-17', 'III', 'http://sistemapfp.mep.go.cr/', 'undefined', 0, 0, 0, 0, 'patricia.hernandez.conejo@mep.go.cr', '2018-11-28 19:57:25', 'Adriana Retana Varela', 8, ''),
(32, 4, 'El metiche', 3, 2, '2018-09-17', 'III', 'https://www.mep.go.cr/educatico/busqueda?keys=El+metiche&mtr=All&nvl=All&tpr=All', '[\"luis@correo.de\",\"lilliam.rojas.artavia@mep.go.cr\"]', 0, 0, 0, 0, 'patricia.hernandez.conejo@mep.go.cr', '2018-11-28 19:58:59', ' Roxana Martínez Rodríguez', 1, ''),
(33, 4, 'Sitio Matricula Preescolar', 2, 4, '2018-07-31', 'III', 'https://www.mep.go.cr/educatico/busqueda?keys=Sitio+Matricula+Preescolar&mtr=All&nvl=All&tpr=All', 'undefined', 1, 0, 4, 10, 'patricia.hernandez.conejo@mep.go.cr', '2018-11-28 20:01:00', 'Ofelia Montoya García', 5, ''),
(34, 4, 'Portal español', 2, 4, '2018-07-31', 'III', 'https://www.mep.go.cr/educatico/portal-espanol', 'undefined', 1, 0, 23, 74, 'patricia.hernandez.conejo@mep.go.cr', '2018-11-28 20:02:37', 'Evelyn Araya Fonseca', 1, ''),
(35, 4, 'Sitio de Inglés Primaria', 2, 4, '2018-08-28', 'III', 'https://www.mep.go.cr/educatico/recursos-guia-primaria', 'undefined', 27, 6, 13, 35, 'patricia.hernandez.conejo@mep.go.cr', '2018-11-28 20:16:27', 'Ana Campos Centeno, Yaudy Ramírez Vásquez.', 1, ''),
(50, 4, 'Video Global Steam Classroom Initiative:  Nueva Laboratorio Emma Gamboa School ', 1, 7, '2018-11-05', 'IV', 'https://recursos.mep.go.cr/sitio_primaria_ingles/otros.html', '[\"katherine.williams.jimenez@mep.go.cr\"]', 0, 1, 0, 0, 'patricia.hernandez.conejo@mep.go.cr', '2019-01-17 15:32:16', 'Katherine Williams', 10, 'N/A'),
(36, 4, 'CyberlabTeens 10th and 11th Grades', 1, 3, '2018-03-12', 'I', 'https://www.mep.go.cr/educatico/cyberlabteens', '[\"katherine.williams.jimenez@mep.go.cr\"]', 0, 0, 0, 0, 'patricia.hernandez.conejo@mep.go.cr', '2018-11-28 20:20:44', 'Quesada Pacheco, Allen ', 2, ''),
(37, 4, 'Un viaje por Costa Rica ', 3, 2, '2018-02-28', 'I', 'https://www.mep.go.cr/educatico/busqueda?keys=un+viaje+por+costa+rica&mtr=All&nvl=All&tpr=All', '[\"patricia.hernandez.conejo@mep.go.cr\"]', 0, 0, 0, 0, 'patricia.hernandez.conejo@mep.go.cr', '2018-11-28 20:22:40', 'Evelyn Araya Fonseca,   Richard Navarro Garro ', 1, ''),
(38, 4, 'Sitio Olimpiadas de matemática', 2, 4, '2018-05-07', 'II', 'https://www.mep.go.cr/educatico/busqueda?keys=Sitio+Olimpiadas+de+matem%C3%A1tica&mtr=All&nvl=All&tpr=All', 'undefined', 1, 0, 23, 22, 'patricia.hernandez.conejo@mep.go.cr', '2018-11-28 20:24:37', 'Elizabeth Figueroa Fallas,   Hermes Mena Picado, ', 1, ''),
(39, 4, 'Propuesta de Abordaje: ejemplos de planeamiento Estudios Sociales', 2, 4, '2018-10-16', 'IV', 'https://www.mep.go.cr/educatico/propuesta-abordaje-ejemplos-planeamiento', 'undefined', 1, 0, 20, 20, 'patricia.hernandez.conejo@mep.go.cr', '2018-11-28 20:27:50', 'Rosales Rodríguez, María Luisa', 1, ''),
(48, 4, 'Actualizaciones', 2, 6, '2018-12-01', 'IV', 'https://recursos.mep.go.cr/actualizacion/index.html', 'undefined', 0, 0, 0, 1, 'patricia.hernandez.conejo@mep.go.cr', '2019-01-16 21:21:44', 'Patricia-Oscar-Luis', 10, 'Se coloca en esta fecha debido a que el recurso se público en Educatico pero luego solicitaron cerrarlo por Evelyn Araya Fonseca contacto sobre Piensa en Arte'),
(40, 4, 'Flora and Fauna in Costa Rica', 3, 2, '2018-04-09', 'II', 'https://www.mep.go.cr/educatico/flora-and-fauna-costa-rica', 'undefined', 0, 0, 0, 0, 'patricia.hernandez.conejo@mep.go.cr', '2018-11-28 20:29:39', 'Ana  Campos Centeno,  Yaudi  Ramírez Vásquez, ', 1, ''),
(41, 4, 'Holidays Around the World', 3, 2, '2018-04-02', 'II', 'https://www.mep.go.cr/educatico/holidays-around-world', '[\"katherine.williams.jimenez@mep.go.cr\"]', 0, 0, 0, 0, 'patricia.hernandez.conejo@mep.go.cr', '2018-11-28 20:30:50', 'Alfredo Ortega Cordero,  Marianela Granados Siria, ', 2, ''),
(42, 4, 'Mi historia, mi herencia', 3, 2, '2018-05-07', 'II', 'https://www.mep.go.cr/educatico/mi-historia-mi-herencia', 'undefined', 0, 0, 0, 0, 'patricia.hernandez.conejo@mep.go.cr', '2018-11-28 20:32:19', 'María Luisa Rosales Rodríguez, ', 1, ''),
(43, 4, 'Sitio de Recursos Liceos Experimentales Bilingues y Grupos Bilingues (LEBs)', 2, 4, '2018-04-30', 'II', 'https://www.mep.go.cr/educatico/busqueda?keys=Sitio+LEBs&mtr=All&nvl=All&tpr=All', 'undefined', 4, 11, 19, 23, 'patricia.hernandez.conejo@mep.go.cr', '2018-11-28 20:36:26', 'Marianella Granados Sirias,  Alfredo Ortega Cordero, ', 2, ''),
(44, 4, 'Krei', 3, 2, '2018-04-19', 'II', 'https://www.mep.go.cr/educatico/krei', '[\"luis@correo.de\"]', 0, 0, 0, 0, 'patricia.hernandez.conejo@mep.go.cr', '2018-11-28 20:38:31', 'Ángel  Alvarado Cruz,  Maleni Granados Carvajal, ', 2, ''),
(45, 4, 'El templo de las 1000 puertas', 3, 2, '2018-04-19', 'II', 'https://www.mep.go.cr/educatico/templo-mil-puertas', '[\"luis@correo.de\",\"lilliam.rojas.artavia@mep.go.cr\"]', 0, 0, 0, 0, 'patricia.hernandez.conejo@mep.go.cr', '2018-11-28 20:40:27', 'Emilia Corrales Vilchez,Lilliam   Rojas Artavia, ', 1, ''),
(46, 4, 'Sitio de Recursos Guía Sétimo Año (7)', 2, 4, '2018-05-23', 'II', 'https://www.mep.go.cr/educatico/recursos-guia-setimo-ano', 'undefined', 37, 25, 8, 41, 'patricia.hernandez.conejo@mep.go.cr', '2018-11-28 21:12:59', 'Marianela Granados Sirias, Alfredo  Ortega Cordero, ', 2, ''),
(47, 4, 'La aventura de Chantli', 3, 2, '2018-05-07', 'II', 'https://www.mep.go.cr/educatico/aventura-chantli', '[\"patricia.hernandez.conejo@mep.go.cr\"]', 0, 0, 0, 0, 'patricia.hernandez.conejo@mep.go.cr', '2019-01-16 20:56:13', 'Laura Lara', 2, 'N/A'),
(49, 4, 'Sitio de Recursos Guía Octavo Año (8)', 2, 4, '2018-08-10', 'III', 'https://www.mep.go.cr/educatico/recursos-guia-octavo-ano', '[\"oscar1.perez.ramirez@mep.go.cr\",\"luis@correo.de\",\"patricia.hernandez.conejo@mep.go.cr\",\"katherine.williams.jimenez@mep.go.cr\"]', 27, 20, 9, 36, 'patricia.hernandez.conejo@mep.go.cr', '2019-01-16 21:28:36', 'Granados Sirias, Marianella./ Ortega Cordero, Alfredo', 2, 'N/A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instancias`
--

CREATE TABLE `instancias` (
  `id` tinyint(4) NOT NULL COMMENT 'Identificador para las instancias donde laboran los solicitantes de recursos',
  `nombre_instancia` varchar(256) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Instancias solicitantes'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `instancias`
--

INSERT INTO `instancias` (`id`, `nombre_instancia`) VALUES
(1, 'Primero y Segundo Ciclo'),
(2, 'Tercer Ciclo y Educación diversificada'),
(3, 'Educación Religiosa'),
(4, 'Educación Técnica'),
(5, 'Educación de primera infancia'),
(6, 'Educación intercultural'),
(7, 'Evaluación de los aprendizajes'),
(8, 'Instituto de desarrollo Profesional'),
(9, 'Dirección de Gestión y Evaluación de la calidad'),
(10, 'Solicitudes internas (DRTE)'),
(11, 'Vida estudiantil');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos`
--

CREATE TABLE `tipos` (
  `id` int(11) NOT NULL COMMENT 'Identificador de los tipos de recursos',
  `nombre_tipo` varchar(128) COLLATE utf8_unicode_ci NOT NULL COMMENT 'tipo de recurso',
  `descripcion` varchar(256) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tipos`
--

INSERT INTO `tipos` (`id`, `nombre_tipo`, `descripcion`) VALUES
(1, 'Juego interacción \r\nBásica ', 'Arrastrar, armar, identificar, colocar, completar, seleccionar.'),
(2, 'RPG', 'Recursos (Roll-player-game)  personaje que se desplaza en diferentes direcciones, realizando diferentes acciones. Puede tener obstáculos. '),
(3, 'Recursos multimedio interactivo', 'Textos emergentes, videos, audios, objetos con movimiento, sitios web, portal, repositorios, galerías.'),
(4, 'Catálogo de recursos', 'PDF, videos, prácticas, manuales, entre otros.'),
(5, 'Aplicación Web', 'Cms (content management system)  sistema de gestión de contenidos.'),
(6, 'No pedagógico', 'Sistemas administrativo o de gestión  no necesariamente para estudiantes.'),
(7, 'Producción audiovisual', 'Recursos tipo video, audios, o similares');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `id` int(11) NOT NULL,
  `tipo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`id`, `tipo`) VALUES
(1, 'Asesor'),
(2, 'Jefatura'),
(3, 'Asistente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL COMMENT 'Identificador para usuario',
  `password` varchar(130) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido1` varchar(255) NOT NULL COMMENT 'Primer apellido del usuario',
  `apellido2` varchar(255) NOT NULL COMMENT 'Segundo apellido del usuario',
  `id_area` tinyint(11) NOT NULL,
  `correo` varchar(80) NOT NULL,
  `last_session` datetime DEFAULT NULL,
  `activacion` int(11) NOT NULL DEFAULT '0',
  `token` varchar(40) NOT NULL COMMENT 'código alfanumerico que se genera al resetear contraseña',
  `token_password` varchar(100) DEFAULT NULL,
  `password_request` int(11) DEFAULT '0',
  `id_tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `password`, `nombre`, `apellido1`, `apellido2`, `id_area`, `correo`, `last_session`, `activacion`, `token`, `token_password`, `password_request`, `id_tipo`) VALUES
(1, '$2y$10$En/me0LnPWlUuT6GhLW6AO1/UALE25N67KpgKg8uyV/w2kQ.TiMRy', 'Oscar', 'Pérez', 'Ramírez', 1, 'oscar1.perez.ramirez@mep.go.cr', '2018-11-21 07:33:59', 1, '', '', 1, 1),
(2, '$2y$10$En/me0LnPWlUuT6GhLW6AO1/UALE25N67KpgKg8uyV/w2kQ.TiMRy', 'Luis', 'Chacón', 'Campos', 1, 'luis@correo.de', '2018-11-21 07:33:59', 1, '', '', 1, 1),
(3, '$2y$10$En/me0LnPWlUuT6GhLW6AO1/UALE25N67KpgKg8uyV/w2kQ.TiMRy', 'Patricia', 'Hernández', 'Conejo', 1, 'patricia.hernandez.conejo@mep.go.cr', '2018-11-21 07:33:59', 1, '', '', 1, 1),
(4, '$2y$10$En/me0LnPWlUuT6GhLW6AO1/UALE25N67KpgKg8uyV/w2kQ.TiMRy', 'Christian', 'Vargas', 'Rojas', 1, 'christian.vargas.rojas@mep.go.cr', '0000-00-00 00:00:00', 1, '', '', 1, 1),
(5, '$2y$10$En/me0LnPWlUuT6GhLW6AO1/UALE25N67KpgKg8uyV/w2kQ.TiMRy', 'Mauricio', 'Sanabria', 'Monestel', 1, 'mauricio.sanabria.monestel@mep.go.cr', '0000-00-00 00:00:00', 1, '', '', 1, 1),
(6, '$2y$10$En/me0LnPWlUuT6GhLW6AO1/UALE25N67KpgKg8uyV/w2kQ.TiMRy', 'Mariana', 'Molina', 'Rojas', 1, 'mariana.molina.rojas@mep.go.cr', '0000-00-00 00:00:00', 1, '', '', 1, 1),
(7, '$2y$10$En/me0LnPWlUuT6GhLW6AO1/UALE25N67KpgKg8uyV/w2kQ.TiMRy', 'Marco', 'Brenes', 'Lopez', 1, 'marco.brenes.lopez@mep.go.cr', '0000-00-00 00:00:00', 1, '', '', 1, 1),
(8, '$2y$10$En/me0LnPWlUuT6GhLW6AO1/UALE25N67KpgKg8uyV/w2kQ.TiMRy', 'Karla', 'Guevara', 'Murillo', 1, 'karla.guevara.murillo@mep.go.cr', '0000-00-00 00:00:00', 1, '', '', 1, 1),
(9, '$2y$10$En/me0LnPWlUuT6GhLW6AO1/UALE25N67KpgKg8uyV/w2kQ.TiMRy', 'Lilliam', 'Rojas', 'Artavia', 1, 'lilliam.rojas.artavia@mep.go.cr', '0000-00-00 00:00:00', 1, '', '', 1, 1),
(10, '$2y$10$En/me0LnPWlUuT6GhLW6AO1/UALE25N67KpgKg8uyV/w2kQ.TiMRy', 'Ana', 'Araya', 'Salazar', 1, 'ana.araya.salazar@mep.go.cr', '0000-00-00 00:00:00', 1, '', '', 1, 1),
(11, '$2y$10$En/me0LnPWlUuT6GhLW6AO1/UALE25N67KpgKg8uyV/w2kQ.TiMRy', 'Katherine', 'Williams', 'Jimenez', 1, 'katherine.williams.jimenez@mep.go.cr', '0000-00-00 00:00:00', 1, '', '', 1, 1),
(12, '$2y$10$En/me0LnPWlUuT6GhLW6AO1/UALE25N67KpgKg8uyV/w2kQ.TiMRy', 'Sirleny', 'Chaves', 'Chaves', 1, 'sirleny.chaves.chaves@mep.go.cr', '0000-00-00 00:00:00', 1, '', '', 1, 1),
(13, '$2y$10$En/me0LnPWlUuT6GhLW6AO1/UALE25N67KpgKg8uyV/w2kQ.TiMRy', 'Sonia', 'Hernandez', 'Gonzalez', 1, 'sonia.hernandez.gonzalez@mep.go.cr', '0000-00-00 00:00:00', 1, '', '', 1, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  ADD PRIMARY KEY (`id_evento`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ingresos`
--
ALTER TABLE `ingresos`
  ADD PRIMARY KEY (`id_registro`);

--
-- Indices de la tabla `instancias`
--
ALTER TABLE `instancias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipos`
--
ALTER TABLE `tipos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `areas`
--
ALTER TABLE `areas`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  MODIFY `id_evento` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador del evento o acción realizada', AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `estados`
--
ALTER TABLE `estados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador del estado del recurso', AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `ingresos`
--
ALTER TABLE `ingresos`
  MODIFY `id_registro` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT de la tabla `instancias`
--
ALTER TABLE `instancias`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT COMMENT 'Identificador para las instancias donde laboran los solicitantes de recursos', AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `tipos`
--
ALTER TABLE `tipos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador de los tipos de recursos', AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador para usuario', AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
