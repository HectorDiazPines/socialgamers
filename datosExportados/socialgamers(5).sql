-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-10-2014 a las 23:16:16
-- Versión del servidor: 5.6.11
-- Versión de PHP: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `socialgamers`
--
CREATE DATABASE IF NOT EXISTS `socialgamers` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `socialgamers`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consolas`
--

CREATE TABLE IF NOT EXISTS `consolas` (
  `id_consola` int(4) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `descripcion` varchar(300) NOT NULL,
  `imagen` varchar(30) NOT NULL,
  PRIMARY KEY (`id_consola`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `consolas`
--

INSERT INTO `consolas` (`id_consola`, `nombre`, `descripcion`, `imagen`) VALUES
(1, 'PS3', 'PlayStation 3(oficialmente abreviada como PS3)6 es la tercera videoconsola del modelo PlayStation de Sony Computer Entertainment. Forma parte de las videoconsolas de séptima generación y sus competidores son la Xbox 360 de Microsoft y la Wii de Nintendo.', 'ps3.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `juegos`
--

CREATE TABLE IF NOT EXISTS `juegos` (
  `id_juego` int(5) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  `anio` int(11) NOT NULL,
  `num_jugadores` int(2) NOT NULL,
  `online` varchar(20) NOT NULL,
  `categoria` varchar(20) NOT NULL,
  `descripcion` varchar(1200) NOT NULL,
  `puntuacion` int(2) NOT NULL,
  `imagen` varchar(40) NOT NULL,
  PRIMARY KEY (`id_juego`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `juegos`
--

INSERT INTO `juegos` (`id_juego`, `nombre`, `anio`, `num_jugadores`, `online`, `categoria`, `descripcion`, `puntuacion`, `imagen`) VALUES
(1, 'Call of Duty', 2003, 1, 'multijugador', 'shooter', 'Call of Duty es una serie de videojuegos en primera persona (FPS), de estilo bélico, creada por Ben Chichoski, desarrollada principal e inicialmente por Infinity Ward, y distribuida por Activision. La franquicia comenzó para computadora personal y posteriormente fue expandiéndose hacia videoconsolas', 8, 'callofduty.jpg'),
(2, 'Castlevania: Lords of Shadow', 2010, 1, 'no', ' Aventura', 'Lords of Shadow es un juego de acción y aventura en tercera persona en el que el jugador controla el personaje principal, Gabriel Belmont. El combate consiste en una cruz con cadena retráctil llamado la Cruz de Combate. El jugador puede realizar hasta cuarenta desbloqueables combos con él. Los comandos consisten en ataques directos para infligir daño a enemigos individuales y ataques de área débiles cuando están rodeados de ellos. También es capaz de interacciones con armas secundarias, tales como dagas de plata, frascos de agua bendita, contenedores de hadas y los raros cristales oscuros que ', 7, 'castlevania.jpg'),
(3, 'Alice: Madness Returns', 2011, 1, 'no', 'Aventura', 'Alice: Madness Returns es un videojuego de plataformas y acción con toques góticos desde una perspectiva de tercera persona con ataques y combos fáciles de usar parecidos a la series de Devil May Cry la diferencia es que no se pueden ejecutar combos de ataque aéreos. El jugador controla a Alice durante todo el juego corriendo, saltando, esquivando y atacando.', 9, 'alicemadnessreturns.jpg'),
(4, 'Civilization V', 2010, 1, 'si', 'Estrategia', 'Civilization V sigue teniendo la base de los antiguos Civilization; un colono y un guerrero que esperan fundar una ciudad. Como principal mejora se encuentra la novedosa disposición del "tablero" con hexágonos, ya que los creadores afirman que da más naturalidad al juego.', 8, 'civilization5.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `juegos_consolas`
--

CREATE TABLE IF NOT EXISTS `juegos_consolas` (
  `id_juego` int(3) NOT NULL,
  `id_consola` int(3) NOT NULL,
  PRIMARY KEY (`id_juego`,`id_consola`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `muro_juego`
--

CREATE TABLE IF NOT EXISTS `muro_juego` (
  `id_juego` int(10) NOT NULL,
  `id_usuario` int(10) NOT NULL,
  `comentario` varchar(300) NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id_usuario`,`fecha`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puntuaciones`
--

CREATE TABLE IF NOT EXISTS `puntuaciones` (
  `id_juego` int(20) NOT NULL,
  `id_usuario` int(20) NOT NULL,
  `puntuacion` int(2) NOT NULL,
  PRIMARY KEY (`id_juego`,`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `usuario` varchar(30) NOT NULL,
  `correo` varchar(40) NOT NULL,
  `pass` varchar(30) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `fecha_alta` date NOT NULL,
  `pais` varchar(20) NOT NULL,
  `cuidad` varchar(20) NOT NULL,
  `foto` varchar(20) NOT NULL,
  `genero` varchar(10) NOT NULL,
  PRIMARY KEY (`correo`),
  UNIQUE KEY `usuario` (`usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usuario`, `correo`, `pass`, `fecha_nacimiento`, `fecha_alta`, `pais`, `cuidad`, `foto`, `genero`) VALUES
('1', '1', '1', '2014-10-01', '2014-10-01', '1', '1', '1', '1'),
('pepe', 'pepe@correo.es', 'pepe', '2014-10-05', '2014-10-08', '', '', '', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
