-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-12-2024 a las 18:03:46
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
-- Base de datos: `vella_serenata`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`, `descripcion`) VALUES
(1, 'Corda', 'Instrumentos de Corda'),
(2, 'Vento', 'Instrumentos de Vento'),
(3, 'Percusión', 'Instrumentos de Percusión');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `envios`
--

CREATE TABLE `envios` (
  `id_envio` int(11) NOT NULL,
  `pais` varchar(50) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `provincia` varchar(50) NOT NULL,
  `cp` varchar(25) NOT NULL,
  `id_venta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `envios`
--

INSERT INTO `envios` (`id_envio`, `pais`, `direccion`, `provincia`, `cp`, `id_venta`) VALUES
(18, 'Portugal', 'campo estrada 1 ', 'Lisboa', '85681', 29),
(19, 'España', 'campo estrada 1 ', 'Pontevedra', '15001', 30),
(20, 'España', 'campo estrada 1 ', 'Lisboa', '15001', 31);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formulario_contacto`
--

CREATE TABLE `formulario_contacto` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `asunto` text NOT NULL,
  `mensaje` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE `marcas` (
  `id` int(11) NOT NULL,
  `marca` varchar(50) NOT NULL,
  `imagen` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`id`, `marca`, `imagen`) VALUES
(1, 'Cincinnati Washboards Co.', 'brand_01.png'),
(2, 'National', 'brand_02.png'),
(3, 'Kalamazoo', 'brand_03.png'),
(4, 'Hohner', 'brand_04.png'),
(5, 'Melton', ''),
(6, 'Yamaha', ''),
(7, 'Columbus Washboards Co.', ''),
(8, 'Gibson', ''),
(9, 'Clarke', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `id` int(11) NOT NULL,
  `metodo` varchar(50) NOT NULL,
  `id_venta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pagos`
--

INSERT INTO `pagos` (`id`, `metodo`, `id_venta`) VALUES
(5, 'paypal', 29),
(6, 'paypal', 30),
(7, 'paypal', 31);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(300) NOT NULL,
  `descripcion` text NOT NULL,
  `precio` double NOT NULL,
  `imagen` varchar(200) NOT NULL,
  `inventario` int(11) NOT NULL DEFAULT 1,
  `id_categoria` int(11) NOT NULL,
  `id_marca` int(50) NOT NULL,
  `especificaciones` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `precio`, `imagen`, `inventario`, `id_categoria`, `id_marca`, `especificaciones`) VALUES
(1, 'Táboa de lavar', 'Feita ó redor de 1954 e 1957. Foi atopada nunha antiga tenda de segunda man en Clarksdale, Mississippi, USA. Restaurada por nós con moito coidado e agarimo.', 150, 'shop_05.jpg', 1, 3, 7, 'Madeira orixinal: Abeto.\r\nMetal da parte resoadora: Latón.\r\nPerfecta para Blues, Swing, e derivados.'),
(2, 'Guitarra', 'Foi construída no ano 1948. Perteneceu a un luthier alemán que a tivo sempre moi coidada e mantendo todas as súas pezas orixináis.', 1050, 'shop_01.jpg', 1, 1, 3, 'Madeiras:\r\nAbeto no corpo e caoba no mástil.\r\nPonte: \r\nUnha soa peza de ébano.\r\nPerfecta para fingerpicking ou para usar con púa.\r\nAcción baixa para máis comodidade.\r\nMonta cordas 0.13 - 0.56.'),
(3, 'Resoadora', 'Feita ó redor de 1965 e 1958. É unha clásica dentro das guitarras resoadoras. Moi difícil de conseguir. Axustada e afinada para a afinaciónd e Sol aberto.', 700, 'shop_02.jpg', 1, 1, 2, 'Madeiras:\r\nLatón no corpo e caoba no mástil.\r\nPonte: \r\nTipo biscuit\r\nPerfecta para fingerpicking ou slide.\r\nAcción amedia para poder alternar dixitación con slide.\r\nMonta cordas 0.13 - 0.56.'),
(4, 'Kazoo', 'Non podemos datar o ano en concreto pero cálculamos que pode ser da década dos anos 30\'s. Todo orixinal e axustado para ter máis proxección e volumen.', 30, 'shop_03.jpg', 1, 2, 9, 'Metal: Latón\r\nUsado sobre todo para Swing e New Orleans Jazz, aínda que pode ter moitos máis usos.'),
(5, 'Banjo', 'Feito ó redor de 1978. Foi traído dende Memphis, Tennessee, USA.\r\nRestaurouse por completo para darlle un aspecto máis actual pero á vez retro.', 1000, 'shop_04.jpg', 1, 1, 8, 'Madeira: \r\nCaoba en mástil e aro.\r\nParche do corpo: \r\nPel natural.\r\nPerfecto para Country e derivados.'),
(6, 'Tuba', 'Feita ó redor de 1950. Foi atopada nunha antiga tenda de segunda man en Innsbruck , Austria. Restaurada polo prestixioso luthier de Ferrol Óscar Trashorras.', 2500, 'shop_06.png', 1, 2, 5, 'Metal: Latón lacado.\r\n\r\nAfinación: Do.\r\n\r\nVálvulas: 6.\r\n\r\nBoquillla: 2,40 cm.'),
(7, 'Clarinete', 'Feito ó redor de 1944 e 1945. Completamente restaurado polo luthier de Ferrol Óscar Trashorras.', 1500, 'shop_07.jpg', 1, 2, 6, 'Madeira orixinal: Ébano.\r\nBoquilla: Lengüeta simple.\r\nEncádrasee dentro dos clarinetes baixos. Perfecto para Awing e New orleans Jazz.'),
(8, 'Táboa de lavar', 'Feita no 1967. Foi enviada directamente dende Arxentina por Cincinnati Washboards.', 200, 'shop_08.png', 1, 3, 1, 'Madeira orixinal: Abeto\r\nMetal da parte resoadora: Latón\r\nPerfecta para Blues, Swing, e derivados.\r\nMoi portátil en manexable.\r\nIncorpora un timbre de bicicleta.'),
(9, 'Armónica', 'Peza orixinal \"Marine Band\" pero completamente restaurada e customizada por Deak Harp, Clarksdale, Mississippi, USA. ', 100, 'shop_09.png', 1, 2, 4, 'Peza orixinal: Marine Band.\r\nAfinacción: La.\r\nPerfecta para principiantes porque é moito máis sinxelo facer bendings.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_venta`
--

CREATE TABLE `productos_venta` (
  `id` int(11) NOT NULL,
  `id_venta` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` double NOT NULL,
  `precio` double NOT NULL,
  `subtotal` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `productos_venta`
--

INSERT INTO `productos_venta` (`id`, `id_venta`, `id_producto`, `cantidad`, `precio`, `subtotal`) VALUES
(34, 29, 4, 1, 30, 30),
(35, 30, 4, 1, 30, 30),
(36, 31, 9, 1, 100, 100);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `suscripciones`
--

CREATE TABLE `suscripciones` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `telefono` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nivel` varchar(50) NOT NULL DEFAULT 'usuario'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `apellidos`, `telefono`, `email`, `password`, `nivel`) VALUES
(21, 'Isabel', 'Guillén', '123456789', 'isa@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `total` double NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id`, `id_usuario`, `total`, `fecha`) VALUES
(29, 21, 30, '2024-11-15 04:11:31'),
(30, 21, 30, '2024-11-15 04:11:03'),
(31, 21, 100, '2024-11-25 05:11:48');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `envios`
--
ALTER TABLE `envios`
  ADD PRIMARY KEY (`id_envio`),
  ADD KEY `id_venta` (`id_venta`);

--
-- Indices de la tabla `formulario_contacto`
--
ALTER TABLE `formulario_contacto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_venta` (`id_venta`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_categoria` (`id_categoria`),
  ADD KEY `id_marca` (`id_marca`);

--
-- Indices de la tabla `productos_venta`
--
ALTER TABLE `productos_venta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_venta` (`id_venta`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `suscripciones`
--
ALTER TABLE `suscripciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `envios`
--
ALTER TABLE `envios`
  MODIFY `id_envio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `formulario_contacto`
--
ALTER TABLE `formulario_contacto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `productos_venta`
--
ALTER TABLE `productos_venta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `suscripciones`
--
ALTER TABLE `suscripciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `envios`
--
ALTER TABLE `envios`
  ADD CONSTRAINT `envios_ibfk_1` FOREIGN KEY (`id_venta`) REFERENCES `ventas` (`id`);

--
-- Filtros para la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD CONSTRAINT `pagos_ibfk_1` FOREIGN KEY (`id_venta`) REFERENCES `ventas` (`id`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id`),
  ADD CONSTRAINT `productos_ibfk_2` FOREIGN KEY (`id_marca`) REFERENCES `marcas` (`id`);

--
-- Filtros para la tabla `productos_venta`
--
ALTER TABLE `productos_venta`
  ADD CONSTRAINT `productos_venta_ibfk_1` FOREIGN KEY (`id_venta`) REFERENCES `ventas` (`id`),
  ADD CONSTRAINT `productos_venta_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id`);

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
