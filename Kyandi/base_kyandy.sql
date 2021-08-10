-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-08-2021 a las 13:12:10
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `carrito`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `id` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` double NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(400) COLLATE utf8_unicode_ci NOT NULL,
  `imagen` varchar(400) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`, `descripcion`, `imagen`) VALUES
(1, 'Galletas', '', 'galleta_icon(v2).png'),
(2, 'Bebidas', '', 'soda-icon(v2).png'),
(3, 'Snacks', '', 'snack-icon.png'),
(4, 'Ramen ', '', 'ramen-icon(v2).png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `ingredientes` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `inf_nutricional` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `caducidad` date DEFAULT NULL,
  `precio` double NOT NULL,
  `imagen` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `inventario` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `cantidad` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sabor` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `ingredientes`, `inf_nutricional`, `caducidad`, `precio`, `imagen`, `inventario`, `id_categoria`, `cantidad`, `sabor`) VALUES
(1, 'Fanta Japonesa Premium de Naranja | 16% Zumo | 380 ml', 'Deliciosa bebida de naranja, lista para tomar', 'Agua, zumo de naranja, isoglucosa, pulpa de naranja, diÃ³xido de carbono (E290), aroma, acidulante, colorantes (calÃ©ndula, caroteno), antioxidante: vitamina C.', 'por cada 100 ml:\r\n8 kcal, Grasas: 0g, Saturadas: 0g, Carbohidratos: 12g, AzÃºcares: 12g, ProteÃ­nas: 0g y Sal: 0.02g.', '2022-05-13', 100, '005-Fanta.jpg', 10, 2, '380ml', 'naranja'),
(2, 'Fanta Japonesa Premium de Uva | 16% Zumo | 380 ml', 'Â¡Deliciosa bebida de uva lista para tomar!', 'agua, zumo de naranja, isoglucosa, pulpa de naranja, diÃ³xido de carbono (E290), aroma, acidulante, colorantes (calÃ©ndula, caroteno), antioxidante: vitamina C.', '48 kcal, Grasas: 0g, Saturadas: 0g, Carbohidratos: 12g, Azucares: 12g, ProteÃ­nas: 0g y Sal: 0.02g', '2023-07-13', 100, '006-Fanta.jpg', 10, 2, '380 ml', 'uva'),
(3, 'Pocky Choco Banana Parfait 70 gr', '5656565', 'galleta, chocolate, harina', '0.65kl por cada 100 grms', '2023-09-13', 120, '001-Pocky.png', 1, 1, '62gr', 'choco banana'),
(4, 'Pocky Chocolate Cacao Intenso 62 grs', 'inserte una descripcion aqui xd', 'galleta, chocolate, almendraz', '65kl cada 100gr', '2023-09-14', 110, '002-Pocky.jpg', 1, 1, '62gr', 'Chocolate Cacao Intenso'),
(5, 'Pocky con Almendra', 'inserte una descripcion aqui :v', 'galleta, chocolate, harina', '66kl cada 100gr', '2022-07-21', 130, '003-Pocky.png', 4, 1, '62gr', 'almendra'),
(6, 'Pocky Te Verde Matcha 70 grs.', 'Sticks Pocky recubiertos de crema de chocolate blanco y te verde japones matcha. Receta Clasica', 'Harina de TRIGO, manteca de cacao, chocolate blanco, LECHE entera en polvo, LECHE condensada, azucar, sal, aceite de palma, te verde en polvo, especias comestibles, levadura, aditivo alimentario (emulsionante E322 (lecitina de SOJA), E473, E476, antiaglomerante E500ii).', '', '2024-02-08', 120, '\r\n	004-Pocky.jpg', 8, 1, '70grms', 'Te Verde'),
(7, 'Mini Kit Kats de Banana y Caramelo 118 grs.', 'Te traemos el nuevo Kit kat japones de Banana y Caramelo, un sabor que ha triunfado entre los japoneses. Disfruta de sus barritas recubiertas de chocolate blanco con una deliciosa combinacion de banana y dulce caramelo, con un interior de crujiente barquillo.', 'Azucar, LECHE entera en polvo, aceite vegetal, harina de TRIGO, masa de cacao, LACTOSA, manteca de cacao, semola de SOJA en polvo, platano en polvo, caramelo en polvo, cacao en polvo, levadura, lecitina de SOJA, aromas, bicarbonato sodico, levadura en polvo.', 'por cada 100 ml:\r\n8 kcal, Grasas: 0g, Saturadas: 0g, Carbohidratos: 12g, Azucares: 12g, Proteinas: 0g y Sal: 0.02g.', '2024-03-20', 130, '\r\n	00013-KitKat.jpg', 50, 1, '118grms', 'Banana y Caramelo '),
(8, 'Refresco Sabor Chupa Chups Limon Cream 250 ml.', 'Â¡Refresco de Chupa Chups! Disfruta de su sabor a Chupa Chups de Limon con Nata. Todo el sabor de Chupa Chups, ahora en extraordinario refresco.', 'Agua, jarabe de glucosa-fructosa, azucar, 1% de zumo de limon, LECHE fermentada concentrada [LECHE, LECHE en polvo desnatada, cultivo iniciador (I.Acidophilus, B.lactis), lactasa], LECHE en polvo [LECHE en polvo desnatada, suero en polvo (LECHE)], dioxido de carbono, estabilizador: hemicelulosa de SOJA, reguladores de la acidez (E330, E338), colorante E105, espirulina, aromas.', '48 kcal, Grasas: 0g, Saturadas: 0g, Carbohidratos: 12g, Azucares: 12g, Proteinas: 0g y Sal: 0.02g', '2024-05-21', 80, '\r\n	007-Chups.jpg', 46, 2, '250ml', 'Limon'),
(9, 'Refresco Sabor Chupa Chups Fresa Cream 250 ml.', 'Â¡Refresco de Chupa Chups! Disfruta de su sabor a Chupa Chups de Fresa con Nata. Todo el sabor de Chupa Chups, ahora en extraordinario refresco.', 'Agua, jarabe de glucosa-fructosa, azucar, 1% de zumo de limon, LECHE fermentada concentrada [LECHE, LECHE en polvo desnatada, cultivo iniciador (I.Acidophilus, B.lactis), lactasa], LECHE en polvo [LECHE en polvo desnatada, suero en polvo (LECHE)], dioxido de carbono, estabilizador: hemicelulosa de SOJA, reguladores de la acidez (E330, E338), colorante E105, espirulina, aromas.', '48 kcal, Grasas: 0g, Saturadas: 0g, Carbohidratos: 12g, Azucares: 12g, Proteinas: 0g y Sal: 0.02g', '2021-11-18', 80, '\r\n	008-Chups.jpg', 50, 2, '250ml', 'Fresa'),
(12, 'pocky verde', '23132132132', '321321321', '51231321', '2021-08-13', 100, '\r\n	61769842163742.jpg', 6, 1, '62grms', 'te verde');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `productos_venta`
--

INSERT INTO `productos_venta` (`id`, `id_venta`, `id_producto`, `cantidad`, `precio`, `subtotal`) VALUES
(1, 1, 4, 1, 110, 110),
(2, 1, 8, 1, 80, 80),
(3, 1, 12, 1, 100, 100),
(4, 2, 6, 1, 120, 120),
(5, 2, 4, 1, 110, 110),
(6, 3, 3, 1, 120, 120),
(7, 3, 8, 1, 80, 80),
(8, 3, 4, 1, 110, 110);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `primer_apellido` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `segundo_apellido` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `estado` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `municipio` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `colonia` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `codigo_postal` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `calle` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `correo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `contrasena` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `tipo` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `primer_apellido`, `segundo_apellido`, `estado`, `municipio`, `colonia`, `codigo_postal`, `calle`, `telefono`, `correo`, `contrasena`, `tipo`) VALUES
(6, 'Eduardo', 'Maqueda', 'Hernandez', 'Mexico', 'Tepotzotlan', 'Texcacoa', '54608', '', '5535772930', 'admin@live.com', 'c7ad44cbad762a5da0a452f9e854fdc1e0e7a52a38015f23f3eab1d80b931dd472634dfac71cd34ebc35d16ab7fb8a90c81f975113d6c7538dc69dd8de9077ec', 1),
(14, '1231', '123', '132132', '321', '32132', '132', '321', '23132', '32', 'ed1@live.com', 'c7ad44cbad762a5da0a452f9e854fdc1e0e7a52a38015f23f3eab1d80b931dd472634dfac71cd34ebc35d16ab7fb8a90c81f975113d6c7538dc69dd8de9077ec', 0),
(15, 'Eduardo', 'Maqueda', 'Hernandez', 'Mexico', 'Tepotzotlan', 'Texcacoa', '54608', 'privada juarez 1', '5535772930', 'edu674@live.com', 'c7ad44cbad762a5da0a452f9e854fdc1e0e7a52a38015f23f3eab1d80b931dd472634dfac71cd34ebc35d16ab7fb8a90c81f975113d6c7538dc69dd8de9077ec', 0),
(16, 'Eduardo', 'Maqueda', 'maqueeda', 'Mexico', 'Tepotzotlan', 'Texcacoa', '54608', '321321', '5535772930', 'eddmaq@live.com', 'c7ad44cbad762a5da0a452f9e854fdc1e0e7a52a38015f23f3eab1d80b931dd472634dfac71cd34ebc35d16ab7fb8a90c81f975113d6c7538dc69dd8de9077ec', 0),
(17, 'ivan', 'Maqueda', 'zoto', 'Mexico', '3213', 'Texcacoa', '54608', 'privada juarez 1', '5535772930', 'ivan@live.com', 'c7ad44cbad762a5da0a452f9e854fdc1e0e7a52a38015f23f3eab1d80b931dd472634dfac71cd34ebc35d16ab7fb8a90c81f975113d6c7538dc69dd8de9077ec', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` int(11) NOT NULL,
  `clave_transaccion` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `paypal` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp(),
  `correo` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `total` decimal(60,2) NOT NULL,
  `status` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id`, `clave_transaccion`, `paypal`, `fecha`, `correo`, `total`, `status`) VALUES
(1, 'r28r4e7dtet4lk9jp66r7nttgd', '', '2021-08-10 05:16:29', 'edu674@live.com', '390.00', 'enviado'),
(2, 'r28r4e7dtet4lk9jp66r7nttgd', '', '2021-08-10 05:37:54', 'eddmaq@live.com', '330.00', 'enviado'),
(3, 'r28r4e7dtet4lk9jp66r7nttgd', '', '2021-08-10 05:39:02', 'ivan@live.com', '410.00', 'enviado');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos_venta`
--
ALTER TABLE `productos_venta`
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
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `productos_venta`
--
ALTER TABLE `productos_venta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
