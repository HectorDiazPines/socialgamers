-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-11-2014 a las 20:45:01
-- Versión del servidor: 5.6.20
-- Versión de PHP: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `socialgamers`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consolas`
--

CREATE TABLE IF NOT EXISTS `consolas` (
  `id` int(4) NOT NULL,
  `nombre` varchar(20) CHARACTER SET latin1 NOT NULL,
  `descripcion` varchar(300) CHARACTER SET latin1 NOT NULL,
  `imagen` varchar(30) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `consolas`
--

INSERT INTO `consolas` (`id`, `nombre`, `descripcion`, `imagen`) VALUES
(1, 'PS3', 'PlayStation 3(oficialmente abreviada como PS3) es la tercera videoconsola del modelo PlayStation de Sony Computer Entertainment. Forma parte de las videoconsolas de séptima generación y sus competidores son la Xbox 360 de Microsoft y la Wii de Nintendo.', 'ps3.jpg'),
(2, 'PS4', 'PlayStation 4 es para aquellos jugadores que quieren embarcarse en increíbles viajes por nuevos mundos de juego y formar parte de una comunidad de juego estrechamente conectada. Con una destacada colección de juegos ya disponible y muchos más en desarrollo, PS4 es el mejor lugar para jugar.', 'ps4.jpg'),
(3, 'XBOX 360', 'Xbox 360 (comúnmente abreviada como XB360) es la segunda videoconsola de sobremesa de la marca Xbox producida por Microsoft. Fue desarrollada en colaboración con IBM y ATI y lanzada en América del sur, América del Norte, Japón, Europa y Australia entre 2005 y 2006.', 'Xbox-360.png'),
(4, 'XBOX ONE', 'Añadiendo constantemente prestaciones, contenido y funciones, Xbox One ha sido diseñada para crecer contigo. Las actualizaciones desde Xbox Live se realizarán en segundo plano mientras tú disfrutas de tu juego preferido. Inicia sesión en cualquier Xbox One para ver tu pantalla de inicio y disfrutar ', 'one.jpg'),
(5, 'PC', 'No disponible', 'pc.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE IF NOT EXISTS `eventos` (
`id` int(10) NOT NULL,
  `nombre` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `imagen` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(600) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`id`, `nombre`, `imagen`, `descripcion`, `fecha`) VALUES
(1, 'Tokyo Game Show 2014', 'tokio.jpg', 'Toda la actualidad desde el evento de videojuegos más importante de Asia.', '2014-09-18'),
(2, 'Gamescom 2014', 'gamescom.jpg', 'La Gamescom 2014 se celebra en la ciudad de Colonia, en Alemania, y es la cita más importante de la industria europea de los videojuegos.', '2014-08-13'),
(3, 'E3 2014', 'e3.jpg', 'Los Ángeles, toda la actualidad del videojuego se da cita en la feria más importante del año. ', '2014-11-10'),
(4, 'Madrid Games Week', 'madridgamesweek.jpg', '', '2014-11-02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `juegos`
--

CREATE TABLE IF NOT EXISTS `juegos` (
`id_juego` int(5) NOT NULL,
  `nombre` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `anio` int(11) NOT NULL,
  `num_jugadores` int(2) NOT NULL,
  `online` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `categoria` varchar(20) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `descripcion` varchar(1200) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `puntuacion` int(2) NOT NULL,
  `imagen` varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `consola` varchar(15) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `juegos`
--

INSERT INTO `juegos` (`id_juego`, `nombre`, `anio`, `num_jugadores`, `online`, `categoria`, `descripcion`, `puntuacion`, `imagen`, `consola`) VALUES
(1, 'Call of Duty', 2003, 1, 'multijugador', 'shooter', 'Call of Duty es una serie de videojuegos en primera persona (FPS), de estilo bélico, creada por Ben Chichoski, desarrollada principal e inicialmente por Infinity Ward, y distribuida por Activision. La franquicia comenzó para computadora personal y posteriormente fue expandiéndose hacia videoconsolas', 8, 'callofduty.jpg', '1,2,3,4,5'),
(2, 'Castlevania: Lords of Shadow', 2010, 1, 'no', 'Aventura', 'Lords of Shadow es un juego de acción y aventura en tercera persona en el que el jugador controla el personaje principal, Gabriel Belmont. El combate consiste en una cruz con cadena retráctil llamado la Cruz de Combate. El jugador puede realizar hasta cuarenta desbloqueables combos con él. Los comandos consisten en ataques directos para infligir daño a enemigos individuales y ataques de área débiles cuando están rodeados de ellos. También es capaz de interacciones con armas secundarias, tales como dagas de plata, frascos de agua bendita, contenedores de hadas y los raros cristales oscuros que ', 7, 'castlevania.jpg', '1,3,5'),
(3, 'Alice: Madness Returns', 2011, 1, 'no', 'Aventura', 'Alice: Madness Returns es un videojuego de plataformas y acción con toques góticos desde una perspectiva de tercera persona con ataques y combos fáciles de usar parecidos a la series de Devil May Cry la diferencia es que no se pueden ejecutar combos de ataque aéreos. El jugador controla a Alice durante todo el juego corriendo, saltando, esquivando y atacando.', 9, 'alicemadnessreturns.jpg', '3,4'),
(4, 'Civilization V', 2010, 1, 'si', 'Estrategia', 'Civilization V sigue teniendo la base de los antiguos Civilization; un colono y un guerrero que esperan fundar una ciudad. Como principal mejora se encuentra la novedosa disposición del "tablero" con hexágonos, ya que los creadores afirman que da más naturalidad al juego.', 8, 'civilization5.jpg', '4,2,1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `juegos_consolas`
--

CREATE TABLE IF NOT EXISTS `juegos_consolas` (
  `id_juego` int(3) NOT NULL,
  `id_consola` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `muro_juego`
--

CREATE TABLE IF NOT EXISTS `muro_juego` (
  `id_juego` int(10) NOT NULL,
  `id_usuario` int(10) NOT NULL,
  `comentario` varchar(300) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE IF NOT EXISTS `noticias` (
`id` int(11) NOT NULL,
  `titular` varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `imagen` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(600) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`id`, `titular`, `imagen`, `descripcion`, `fecha`) VALUES
(1, 'FIFA World actualiza su motor de juego en la version 9.0', 'fifa.jpg', 'Electronic Arts ha anunciado el lanzamiento de la actualización 9.0 de FIFA World, la entrega de PC gratuita -free to play- de esta serie de fútbol.\r\n\r\nPrincipales novedades o cambios de la versión 9.0\r\n\r\n- Inteligencia ofensiva\r\n- Regate completo\r\n- Control al primer toque\r\n- Nuevas filigranas y celebraciones\r\n- Tácticas rápidas\r\n- Nuevas animaciones\r\n- Rediseño completo del control Teclado+Ratón\r\n- Nuevo diseño del interfaz', '2014-11-06'),
(2, 'Un nuevo estudio concluye que los juegos violentos no influyen en los usuarios', 'rascaypica.jpg', 'Un estudio realizado por Christopher Ferguson, profesor e investigador de psicología en la Universidad Stetson ha concluido que no hay una correlación entre comprar y consumir material audiovisual violento y la violencia real. Concretamente, se han comparado el consumo de juegos y películas violentas con las estadísticas de homicidios.En la primera parte del estudio se investigó la violencia gráfica de las películas de 1920 a 2005, y no se vio ninguna relación. Durante mediados del siglo XX apareció una pequeña, pero tras 1990 se redujo incluso con el aumento explícito.', '2014-11-02'),
(3, '\r\nBlizzard anuncia Overwatch, su nueva saga de videojuegos', 'blizzard.jpg', 'Estará ambientado en un universo futurista y será un juego de acción multijugador online por equipos en primera persona, en el que nuestros personajes tendrán la posibilidad de usar diversos artefactos llamados "amplificadores" para poder desatar diferentes poderes y habilidades, como la posibilidad de teletransportarnos', '2014-11-04'),
(4, 'Se muestran artes oficiales del nuevo Mass Effect', 'mass_effect.jpg', 'Con motivo del N7, la fecha que todos los años los fans de la saga celebran (N7 es el nombre de la nave espacial del juego y hoy es 7 de noviembre), BioWare ha organizado un mesa redonda con miembros del equipo del nuevo Mass Effect, donde se han aclaro ciertos detalles de este esperado juego y han mostrado nuevos artes.', '2014-11-07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puntuaciones`
--

CREATE TABLE IF NOT EXISTS `puntuaciones` (
  `id_juego` int(20) NOT NULL,
  `id_usuario` int(20) NOT NULL,
  `puntuacion` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
`id` int(11) NOT NULL,
  `usuario` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `pass` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `fecha_alta` date NOT NULL,
  `pais` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `cuidad` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `foto` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `genero` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `estado` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL DEFAULT 'activo'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `correo`, `pass`, `fecha_nacimiento`, `fecha_alta`, `pais`, `cuidad`, `foto`, `genero`, `estado`) VALUES
(1, '1', '1', '1', '2014-10-01', '2014-10-01', '1', '1', '1', '1', 'activo'),
(2, 'pepe', 'pepe@correo.es', 'pepe', '2014-10-05', '2014-10-08', '', '', '', '', 'activo');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `consolas`
--
ALTER TABLE `consolas`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `juegos`
--
ALTER TABLE `juegos`
 ADD PRIMARY KEY (`id_juego`);

--
-- Indices de la tabla `juegos_consolas`
--
ALTER TABLE `juegos_consolas`
 ADD PRIMARY KEY (`id_juego`,`id_consola`);

--
-- Indices de la tabla `muro_juego`
--
ALTER TABLE `muro_juego`
 ADD PRIMARY KEY (`id_usuario`,`fecha`);

--
-- Indices de la tabla `noticias`
--
ALTER TABLE `noticias`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `puntuaciones`
--
ALTER TABLE `puntuaciones`
 ADD PRIMARY KEY (`id_juego`,`id_usuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `usuario` (`usuario`), ADD UNIQUE KEY `correo` (`correo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `juegos`
--
ALTER TABLE `juegos`
MODIFY `id_juego` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `noticias`
--
ALTER TABLE `noticias`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
