-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 27-02-2019 a las 19:54:02
-- Versión del servidor: 5.7.21
-- Versión de PHP: 7.1.16

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
-- Estructura de tabla para la tabla `eventos`
--

DROP TABLE IF EXISTS `eventos`;
CREATE TABLE IF NOT EXISTS `eventos` (
  `id_evento` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Llave primaria del registro. Autoincrement',
  `nombre` varchar(128) NOT NULL COMMENT 'Nombre del evento que afecta el recurso. Ej: cambio de nombre',
  `descripcion` varchar(256) NOT NULL COMMENT 'Descripción que detalla el evento con el fin de tener claridad de que se trata.',
  PRIMARY KEY (`id_evento`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`id_evento`, `nombre`, `descripcion`) VALUES
(1, 'creacion', 'Momento en que se ingresa el registro'),
(2, 'cambio estado', 'Cambio de estado. Por ejemplo: ingresado, en producción, publicado'),
(3, 'cambio categoría', 'Cambio de categoría: Gestionado, producción interna, contratación.'),
(4, 'cambio tipo', 'Tipo de recurso.  Por ejemplo RPG, multimedia, web app, etc'),
(5, 'cambio contacto', 'Cambio del nombre de la persona de contacto'),
(6, 'cambio instancia', 'Cambio de la instancia de la persona que solicita el recurso'),
(7, 'cambio audios', 'Cambio en la cantidad de audios'),
(8, 'cambio videos', 'Cambio en la cantidad de videos'),
(9, 'cambio documentos', 'Cambio en la cantidad de documentos'),
(10, 'cambio imagenes', 'Cambio en la cantidad de imágnes'),
(11, 'modificacion equipo', 'Modificación equipo de tarbajo responsable del recurso'),
(12, 'modificicacion obsrvacion', 'Modificación del campo observaciones');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
